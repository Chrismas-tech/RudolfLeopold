<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;

class SeoController extends Controller
{
    public static function metaTag()
    {
        $meta_description = 'The Viennese cellist Rudolf Leopold is one of the most versatile musicians of his generation. He completed his studies at the University of Music and ...';

        SEOMeta::setCanonical(url()->full());
        
        SEOMeta::setDescription($meta_description);
        SEOMeta::addKeyword([
            'Rudolf Leopold',
            'Cello',
            'Vienna',
            'Wien',
        ]);

        OpenGraph::setTitle('Rudolf Leopold');
        OpenGraph::setDescription($meta_description);
        OpenGraph::setUrl(url()->full());
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addImage(asset('img/img-template/rudolf-leopold/rudolf-leopold-2.jpg'));
        

        TwitterCard::setTitle('Rudolf Leopold');
        TwitterCard::setDescription($meta_description);
        TwitterCard::setUrl(url()->full());
        TwitterCard::addImage(asset('img/img-template/rudolf-leopold/rudolf-leopold-2.jpg'));
    }
}
