<?php

namespace App\Http\Controllers;

use App\Helpers\AudioFilesHelpers;
use App\Helpers\FileHelpers;
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
        $tracks = MusicTrack::orderBy('created_at', 'asc')->paginate(10);

        return view('admin.pages.music-player.music-track-all', [
            'admin' => $this->admin,
            'tracks' => $tracks,
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
        /*  dd(phpinfo());
        dd($request->all()); */

        $validator = Validator::make(
            $request->all(),
            [
                // Tracks
                'album_name' => 'required|string|unique:music_tracks',
                'tracks.*' => 'file|mimes:wav,mp3,mpeg|max:' . ($this->limit_size_multiple_files_upload * $this->ratio_megabytes_to_kilobytes),
            ],
            [
                // Tracks
                'tracks.*.mimes'  => 'Multiple Tracks Upload : only jwav, mp3, mpeg formats allowed.',
                'tracks.*.max'  => 'Upload Size Tracks : The total size upload must not exceed ' . $this->limit_size_multiple_files_upload . 'MB',

                'album_name.required' => 'The Album Name is required',
            ]
        );

        if ($validator->fails()) {
            Alert::toast('Please verify your formular again !', 'error');
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('form_1', true);
        }

        AudioFilesHelpers::save_audio_files($request->album_name, $request->tracks);
        Alert::toast('You successfully added an Audio Album !', 'success');
        return redirect()->back();
    }


    public function update(Request $request, MusicTrack $musicTrack)
    {
        //
    }

    public function delete(Request $request)
    {
        /* dd($request->all()); */
        if ($request->delete_checkbox) {
            $checkbox_ids = json_decode($request->delete_checkbox);

            foreach ($checkbox_ids as $id) {
                $track = MusicTrack::find($id);
                //Delete Old Main image variant if exist
                FileHelpers::delete_file(public_path($track->file_path));

                $track->delete();
                Alert::toast('You successfully deleted the Music Tracks !', 'success');
            }
        }

        return redirect()->back();
    }
}
