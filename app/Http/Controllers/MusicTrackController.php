<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelpers;
use App\Helpers\MusicTracksHelpers;
use App\Models\MusicTrack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class MusicTrackController extends Controller
{
    private $admin;

    // 1MB => 1048Kbs
    private $ratio_megabytes_to_kilobytes = 1048;
    private $limit_size_multiple_files_upload = 600; // in MB
    private $limit_size_main_image = 5; // in MB

    public function __construct()
    {
        /* Permet de construire des autres Admin si un jour le besoin */
        $this->middleware(function ($request, $next) {
            $this->admin = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tracks_all()
    {
        $albums = MusicTrack::orderBy('created_at', 'asc')
            ->groupBy('album_name')
            ->paginate(5);

        return view('admin.pages.music-player.music-track-all', [
            'admin' => $this->admin,
            'albums' => $albums,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* dd($request->all()); */

        $validator = Validator::make(
            $request->all(),
            [
                // Tracks
                'album_name' => 'required|string|unique:music_tracks',
                'img_file' => 'required|string|unique:music_tracks',
                'audio_files.*' => 'file|mimes:wav,mp3,mpeg|max:' . ($this->limit_size_multiple_files_upload * $this->ratio_megabytes_to_kilobytes),
                'audio_files' => 'required',

                // Album Image
                'img_file' => 'sometimes|mimes:jpeg,jpg,png|max:' . ($this->limit_size_main_image * $this->ratio_megabytes_to_kilobytes),
            ],
            [
                // Tracks
                'audio_files.required'  => 'You forgot to upload audio files.',
                'audio_files.*.mimes'  => 'Multiple Tracks Upload : only jwav, mp3, mpeg formats allowed.',
                'audio_files.*.max'  => 'Upload Size Tracks : The total size upload must not exceed ' . $this->limit_size_multiple_files_upload . 'MB',
                'album_name.required' => 'The Album Name is required',

                // Main Image
                'img_file.mimes'  => 'Main Image Product Variant : only jpeg, jpg formats allowed.',
            ]
        );

        if ($validator->fails()) {
            Alert::toast('Please verify your formular again !', 'error');
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('form_1', true);
        }
        MusicTracksHelpers::save_audio_files_and_img_album($request->album_name, $request->audio_files, $request->img_file);
        Alert::toast('You successfully added an Audio Album !', 'success');
        return redirect()->back();
    }


    public function update_positions(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                // Tracks
                'position' => 'required',
                'album_name' => 'required',
            ],
            []
        );

        if ($validator->fails()) {
            Alert::toast('Please verify your formular again !', 'error');
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('form_1', true);
        }

        foreach ($request->track_ids as $key => $id) {
            $music_track = MusicTrack::findorFail($id);
            $music_track->update(
                [
                    'position' => $request->position[$key],
                ]
            );
        }
        //tes
        // Reorder Position from 1 to X
        $musicTracks = MusicTrack::whereIn('id', $request->track_ids)
            ->orderby('position', 'asc')
            ->get();


        foreach ($musicTracks as $key => $track) {
            $track->update(['position' => $key + 1]);
        }

        Alert::toast('You successfully updated the position tracks of your Album !', 'success');
        return redirect()->back();
    }

    public function delete(Request $request)
    {
        if ($request->delete_checkbox) {
            $checkbox_ids = json_decode($request->delete_checkbox);

            foreach ($checkbox_ids as $id) {
                $track = MusicTrack::find($id);
                //Delete all audio files one by one
                FileHelpers::delete_file(public_path($track->audio_file));

                // Delete all main images one by one
                // Note Image can be null
                if ($track->img_file) {
                    FileHelpers::delete_file(public_path($track->img_file));
                }

                // If Empty folder music => delete folder
                if (FileHelpers::folder_empty(public_path('music/' . $track->album_name . '/tracks'))) {
                    FileHelpers::delete_folder(public_path('music/' . $track->album_name));
                }

                $track->delete();
            }

            Alert::toast('You successfully deleted the Music Tracks !', 'success');
        }

        return redirect()->back();
    }
}
