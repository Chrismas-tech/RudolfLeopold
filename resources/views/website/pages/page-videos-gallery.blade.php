@extends('website.layouts.base-website')
@section('title')
Videos Gallery
@endsection
@section('content')


<section class="breadcumb-area bg-img bg-overlay">
    <div class="bradcumbContent">
        {{dd(Session::get('lang'))}}
        @if(Session::get('lang') == 'en')
        <p>Cello Recordings</p>
        <h2>Videos Gallery</h2>
        @elseif(Session::get('lang') == 'at')
        <p>Cello Aufnahmen</p>
        <h2>Videos Gallerie</h2>
        @endif
    </div>
</section>


@if($ytb_videos)
@include('website.pages.return-home-button')


<div class="flex-complete mt-3 mb-3">
    {!! $ytb_videos->links() !!}
</div>

<section class="latest-albums-area section-padding-50">
    <div class="container">
        <div class="row">
            @forelse ($ytb_videos as $video)
            <div class="col-sm-6 col-md-4 gy-2">
                <iframe class="youtube-iframe" src="{{asset($video->url)}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                </iframe>
                <div class="album-info">
                    <a href="#">
                        <h5>{{$video->video_name}}</h5>
                    </a>
                </div>
            </div>
            @empty
            @endforelse
        </div>
    </div>
</section>



<div class="flex-complete mt-3 mb-3">
    {!! $ytb_videos->links() !!}
</div>


@include('website.pages.return-home-button')
@endif
@endsection
