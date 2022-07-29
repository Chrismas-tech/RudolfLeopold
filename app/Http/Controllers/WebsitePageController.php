<?php

namespace App\Http\Controllers;

use App\Models\GeneralWebsiteSettings;
use App\Models\MusicTrack;
use App\Models\Photo;
use App\Models\YoutubeVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Spatie\Sitemap\SitemapGenerator;

class WebsitePageController extends Controller
{
    private $general_website_settings;
    private $paginate_default = 20;
    private $paginate_album = 10;

    public function __construct()
    {
        SeoController::metaTag();
        $this->general_website_settings = GeneralWebsiteSettings::find(1);
    }

    public function home(Request $request)
    {
        $ytb_videos = YoutubeVideo::orderBy('id', 'desc')->take(6)->get();
        $photos_gallery = Photo::orderBy('id', 'desc')->take(12)->get();
        $albums = MusicTrack::orderBy('created_at', 'asc')
        ->groupBy('album_name')
        ->take(2)
        ->get();
        
        /* dd($albums); */

        $this->manage_lang($request);

        return view(
            'website.pages.home',
            [
                'general_website_settings' => $this->general_website_settings,
                'ytb_videos' => $ytb_videos,
                'photos_gallery' => $photos_gallery,
                'albums' => $albums,
            ]
        );
    }

    public function videos_gallery(Request $request)
    {
        $ytb_videos = YoutubeVideo::paginate($this->paginate_default);

        $this->manage_lang($request);

        return view(
            'website.pages.page-videos-gallery',
            [
                'general_website_settings' => $this->general_website_settings,
                'ytb_videos' => $ytb_videos,
            ]
        );
    }

    public function photos_gallery(Request $request)
    {

        $photos_gallery = Photo::paginate($this->paginate_default);

        $this->manage_lang($request);

        return view(
            'website.pages.page-photos-gallery',
            [
                'general_website_settings' => $this->general_website_settings,
                'photos_gallery' => $photos_gallery,
            ]
        );
    }

    public function tracks(Request $request)
    {
        $albums = MusicTrack::groupBy('album_name')->paginate($this->paginate_album);

        $this->manage_lang($request);

        return view(
            'website.pages.page-tracks',
            [
                'general_website_settings' => $this->general_website_settings,
                'albums' => $albums,
            ]
        );
    }

    public function contact()
    {
        return view(
            'website.pages.page-contact',
            [
                'general_website_settings' => $this->general_website_settings,
            ]
        );
    }

    public function page_404()
    {
        $title_page = "Page not Found";

        return view(
            'website.layouts.error',
            [
                'title_page' => $title_page,
                'general_website_settings' => $this->general_website_settings,
            ]
        );
    }

    public function sitemap()
    {
        SitemapGenerator::create(env('APP_URL'))->writeToFile(public_path('sitemap.xml'));
        return Redirect::to('sitemap.xml');
    }

    private function manage_lang($request)
    {
        if ($request->lg == 'en') {
            session()->forget('lang');
            session()->put('lang', 'en');
        } elseif ($request->lg == 'at') {
            session()->forget('lang');
            session()->put('lang', 'at');
        }

        /* if(!$request->lg) {
            session()->put('lang', 'en');
        } */
    }
}
