<?php

namespace App\Http\Controllers;

use App\Models\YoutubeVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class YoutubeVideoController extends Controller
{
    private $admin;

    public function __construct()
    {
        /* Permet de construire des autres Admin si un jour le besoin */
        $this->middleware(function ($request, $next) {
            $this->admin = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function videos_all()
    {
        $youtube_videos = YoutubeVideo::orderBy('created_at', 'asc')->paginate(10);

        return view('admin.pages.youtube-videos.youtube-videos-all', [
            'admin' => $this->admin,
            'youtube_videos' => $youtube_videos,
        ]);
    }

    public function store(Request $request)
    {
        /* dd($request->all()); */

        $validator = Validator::make(
            $request->all(),
            [
                'video_name' => 'required',
                'url_video' => 'required',
            ],
            [
                'url_video.required' => 'The youtube video url is required.',
                'video_name.required' => 'The youtube video name is required.',
            ]
        );

        if ($validator->fails()) {
            Alert::toast('Please verify your formular again !', 'error');
            return redirect()->back()
                ->with('form_1', true)
                ->withErrors($validator->errors())
                ->withInput();
        }


        $url_embed = $this->extract_url_embed_youtube_video($request->url_video);

        YoutubeVideo::create(
            [
                'video_name' => $request->video_name,
                'url' => $url_embed,
            ]
        );

        Alert::toast('You successfully added a Youtube Video !', 'success');
        return redirect()->back();
    }

    public function ajax_edit(Request  $request)
    {
        if ($request->ajax()) {
            $id = $request->get('id');
            $youtube_video = YoutubeVideo::where('id', $id)->first();

            return response()->json([
                'message' => true,
                'youtube_video' =>  $youtube_video,
            ]);
        }
    }



    public function update(Request $request)
    {
        /* dd($request->all()); */
        $validator = Validator::make(
            $request->all(),
            [
                'edit_video_url' => 'required|string',
                'edit_video_name' => 'required|string',
                'edit_video_id' => 'required|string',
            ],
            [
                'edit_video_url.required' => 'The youtube video url is required.',
                'edit_video_name.required' => 'The youtube video name is required.',
                'edit_video_id.required' => 'The youtube video id is required.',
            ]
        );

        if ($validator->fails()) {
            Alert::toast('Please verify your formular again !', 'error');
            return redirect()->back()
                ->with('form_1', true)
                ->withErrors($validator->errors())
                ->withInput();
        }

        $update = YoutubeVideo::findOrFail($request->edit_video_id);
        $url_embed = $this->extract_url_embed_youtube_video($request->edit_video_url);

        $update->update(
            [
                'url' => $url_embed,
                'video_name' => $request->edit_video_name,
            ]
        );

        Alert::toast('You successfully updated your Youtube Video !', 'success');
        return redirect()->back();
    }


    public function delete(Request $request)
    {
        /* dd($request->all()); */
        if ($request->delete_checkbox) {
            $checkbox_ids = json_decode($request->delete_checkbox);

            foreach ($checkbox_ids as $id) {
                $youtub_video = YoutubeVideo::find($id);
                $youtub_video->delete();
                Alert::toast('You successfully deleted the Youtube Video !', 'success');
            }
        }

        return redirect()->back();
    }

    public function extract_url_embed_youtube_video($url)
    {
        // FROM https://youtu.be/a_Bv7eqoqb0
        // FROM https://www.youtube.com/watch?v=S9Bz_a3RyjQ
        // OR https://youtu.be/a_Bv7eqoqb0?t=123

        // TO https://www.youtube.com/embed/a_Bv7eqoqb0
        // OR https://www.youtube.com/embed/oJnFxbWq0yE?start=123"

        $new_url = '';

        if (str_contains($url, 'youtu.be/')) {
            if (str_contains($url, '?t=')) {
                $parts = preg_split('/(https:\/\/youtu.be\/|\?t=)/', $url);
                $new_url = 'https://www.youtube.com/embed/' . $parts[1] . '?start=' . $parts[2];
            } else {
                $explode =  explode('youtu.be/', $url);
                $new_url = 'https://www.youtube.com/embed/' . $explode[1];
            }
        }

        if (str_contains($url, 'watch?v=')) {
            $explode =  explode('watch?v=', $url);
            $new_url = 'https://www.youtube.com/embed/' . $explode[1];
        }

        // CASE NO CHANGES
        if (str_contains($url, 'https://www.youtube.com/embed/')) {
            $new_url = $url;
        }

        return $new_url;
    }
}
