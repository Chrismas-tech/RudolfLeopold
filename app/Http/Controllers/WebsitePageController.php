<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
    private $paginate_default;

    public function __construct(Request $request)
    {
        SeoController::metaTag();
        $this->general_website_settings = GeneralWebsiteSettings::find(1);

        if ($request->lg == 'en') {
            session()->forget('lang');
            session()->put('lang', 'en');
        } elseif ($request->lg == 'at') {
            session()->forget('lang');
            session()->put('lang', 'at');
        }
    }

    public function home()
    {
        $ytb_videos = YoutubeVideo::orderBy('id', 'desc')->take(9)->get();
        $photos_gallery = Photo::orderBy('id', 'desc')->take(12)->get();
        $tracks = MusicTrack::orderBy('id', 'desc')->take(5)->get();

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

    public function videos_gallery()
    {

        $ytb_videos = YoutubeVideo::paginate($this->paginate_default);

        return view(
            'website.pages.page-videos-gallery',
            [
                'general_website_settings' => $this->general_website_settings,
                'ytb_videos' => $ytb_videos,
            ]
        );
    }

    public function photos_gallery()
    {

        $photos_gallery = Photo::paginate($this->paginate_default);

        return view(
            'website.pages.page-photos-gallery',
            [
                'general_website_settings' => $this->general_website_settings,
                'photos_gallery' => $photos_gallery,
            ]
        );
    }

    public function tracks()
    {

        $tracks = MusicTrack::paginate($this->paginate_default);

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

    public function test(Request $request)
    {
    }

    public function page_404()
    {
        $title_page = "Page not Found";
        $categories_nested = Category::whereNull('parent_id')
            ->with('children')
            ->orderby('name', 'asc')
            ->get();

        return view(
            'website.layouts.error',
            [
                'title_page' => $title_page,
                'categories_nested' => $categories_nested,
                'general_website_settings' => $this->general_website_settings,
            ]
        );
    }

    public function sitemap()
    {
        SitemapGenerator::create(env('APP_URL'))->writeToFile(public_path('sitemap.xml'));
        return Redirect::to('sitemap.xml');
    }
}
