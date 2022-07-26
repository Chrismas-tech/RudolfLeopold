<?php

namespace App\Http\Controllers;

use App\Models\GeneralWebsiteSettings;
use App\Models\MusicTrack;
use App\Models\Photo;
use App\Models\YoutubeVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Spatie\Sitemap\SitemapGenerator;

class WebsitePageController extends Controller
{
    private $general_website_settings;
    private $paginate_default;

    public function __construct()
    {
        SeoController::metaTag();
        $this->general_website_settings = GeneralWebsiteSettings::find(1);
    }

    public function home(Request $request)
    {
        $ytb_videos = YoutubeVideo::orderBy('id', 'desc')->take(6)->get();
        $photos_gallery = Photo::orderBy('id', 'desc')->take(12)->get();
        $tracks = MusicTrack::orderBy('id', 'desc')->take(5)->get();

        $this->manage_lang($request);

        return view(
            'website.pages.home',
            [
                'general_website_settings' => $this->general_website_settings,
                'ytb_videos' => $ytb_videos,
                'photos_gallery' => $photos_gallery,
                'tracks' => $tracks,
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
        $tracks = MusicTrack::paginate($this->paginate_default);

        $this->manage_lang($request);

        return view(
            'website.pages.page-tracks',
            [
                'general_website_settings' => $this->general_website_settings,
                'tracks' => $tracks,
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
    }
}
