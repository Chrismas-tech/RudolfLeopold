@extends('website.layouts.base-website')
@section('title')
CD Album Tracks
@endsection
@section('content')

<section class="breadcumb-area bg-img bg-overlay">
    <div class="bradcumbContent">
        <p>CD Album</p>
        @if(Session::get('lang') == 'en')
        <h2>Cello Recordings</h2>
        @else
        <h2>Cello Aufnahmen</h2>
        @endif
    </div>
</section>

@include('website.pages.return-home-button')

@if($tracks)
<div class="flex-complete mt-3 mb-3">
    {!! $tracks->links() !!}
</div>

<section class="featured-artist-area section-padding-100 bg-img bg-overlay bg-fixed" style="background-image: url('img/img-template/bg-img/musikverein.png');">
    <div class="container">

        @php
        $new_album = '';
        @endphp

        @forelse ($tracks as $key => $track)
        <div class="row align-items-end mb-50">
            <div class="col-12 col-md-5 col-lg-4">
                <!-- Display if new album -->
                @if($new_album !== $track->album_name)
                <div class="featured-artist-thumb">
                    <img class="img-fluid" src="{{asset($track->img_file)}}" alt="">
                </div>
                @else
                <div class="featured-artist-thumb">
                    <img class="img-fluid" src="{{asset('img/img-template/no_image.jpg')}}" alt="">
                </div>
                @endif
            </div>

            <div class="col-12 col-md-7 col-lg-8">
                <div class="featured-artist-content">

                    @if($key == 0)
                    <div class="section-heading white text-left">
                        <p>CD Albums</p>
                        <h2>Cello Recordings</h2>
                    </div>
                    @endif

                    <div class="song-play-area">
                        <div class="song-name">
                            <audio preload="auto" controls>
                                <source src="{{asset($track->audio_file)}}">
                            </audio>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @php
        if($new_album !== $track->album_name) {
        $new_album = $track->album_name;
        }
        @endphp

        @empty

        @endforelse
    </div>
</section>
<!-- ##### Featured Artist Area End ##### -->


<div class="flex-complete mt-3 mb-3">
    {!! $tracks->links() !!}
</div>


@include('website.pages.return-home-button')
@endif
@endsection
