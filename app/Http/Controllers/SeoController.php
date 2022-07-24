<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;

class SeoController extends Controller
{
    public static function metaTag()
    {
        $meta_description = 'Description of website';

        SEOMeta::setCanonical(url()->full());
        
        SEOMeta::setDescription($meta_description);
        SEOMeta::addKeyword([
            'Word 1',
            'Word 2',
            'Word 3',
        ]);

        OpenGraph::setTitle(env('APP_NAME'));
        OpenGraph::setDescription($meta_description);
        OpenGraph::setUrl(url()->full());
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addImage(asset('img/bg-3.jpg'));
        

        TwitterCard::setTitle(env('APP_NAME'));
        TwitterCard::setDescription($meta_description);
        TwitterCard::setUrl(url()->full());
        TwitterCard::addImage(asset('img/bg-3.jpg'));
    }
}
