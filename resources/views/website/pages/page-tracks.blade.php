@extends('website.layouts.base-website')
@section('title')
CD Album Tracks
@endsection
@section('content')

<section class="breadcumb-area bg-img bg-overlay">
    <div class="bradcumbContent">
        @if(Session::get('lang') == 'en')
        <p>CD Albums</p>
        <h2>Cello Recordings</h2>
        @elseif(Session::get('lang') == 'at')
        <p>CD Albums</p>
        <h2>Cello Aufnahmen</h2>
        @endif
    </div>
</section>

@include('website.pages.return-home-button')

@if($albums)
<div class="flex-complete mt-3 mb-3">
    {!! $albums->links() !!}
</div>

<section class="featured-artist-area section-padding-100 bg-img bg-overlay bg-fixed" style="background-image: url('img/img-template/bg-img/musikverein.png');">
    <div class="container">

        @forelse ($albums as $key => $track)


        @php
        $new_album = '';
        @endphp

        @forelse (MusicTracksHelpers::all_tracks_album($track->album_name) as $track)

        <div class="row align-items-end mb-3 ">
            <div class="col-md-3">
                <!-- Display if new album -->
                @if($new_album !== $track->album_name)
                <div class="featured-artist-thumb">
                    <img class="img-tracks" src="{{asset($track->img_file)}}" alt="">
                </div>
                @endif
                <!-- Display if new album -->
            </div>
            <div class="col-md-9">
                <div class="featured-artist-content">
                    <div>
                        @if($new_album !== $track->album_name)
                        <p>{{$track->album_name}}</p>
                        @endif
                    </div>
                    <div class="song-play-area">
                        <div class="song-name">
                            <p>{{$track->audio_file_name}}</p>
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

        @empty
        @endforelse
    </div>
</section>
<!-- ##### Featured Artist Area End ##### -->


<div class="flex-complete mt-3 mb-3">
    {!! $albums->links() !!}
</div>


@include('website.pages.return-home-button')
@endif
@endsection
