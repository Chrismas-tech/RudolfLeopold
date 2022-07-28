@extends('website.layouts.base-website')
@section('title')
Photos Gallery
@endsection
@section('content')

<section class="breadcumb-area bg-img bg-overlay">
    <div class="bradcumbContent">
        @if(Session::get('lang') == 'en')
        <p>Album Photos</p>
        <h2>Photos Gallery</h2>
        @elseif(Session::get('lang') == 'at')
        <p>Album Fotos</p>
        <h2>Fotos Gallerie</h2>
        @endif
    </div>
</section>


@include('website.pages.return-home-button')


@if($photos_gallery)
<div class="flex-complete mt-3 mb-3">
    {!! $photos_gallery->links() !!}
</div>


<section class="oneMusic-buy-now-area has-fluid bg-gray section-padding-100">

    <div id="nanogallery" data-nanogallery2='{
            "thumbnailWidth":  "300",
            "thumbnailHeight":  "220",
            "thumbnailAlignment": "center",
            "thumbnailBorderHorizontal": 0,
            "thumbnailBorderVertical": 0,
            "thumbnailGutterWidth": 10,
            "thumbnailGutterHeight": 10,
            "thumbnailHoverEffect2": "customlayer_backgroundColor_rgba(0,0,0,0.0)_rgba(0,0,0,0.5)_1000"
            }'>
        @forelse ($photos_gallery as $photo)
        <a href="{{asset($photo->file_path)}}" data-ngthumb="{{asset($photo->file_path)}}"></a>
        @empty
        @endforelse
    </div>
</section>

<div class="flex-complete mt-3 mb-3">
    {!! $photos_gallery->links() !!}
</div>


@include('website.pages.return-home-button')
@endif
@endsection
