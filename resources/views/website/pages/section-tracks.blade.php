<section class="featured-artist-area section-padding-100 bg-img bg-overlay bg-fixed" style="background-image: url('img/img-template/bg-img/musikverein.png');">
    <div class="container">

        <div class="section-heading style-2">
            @if(Session::get('lang') == 'en')
            <p class="text-white">CD Albums</p>
            <h2 class="text-white">Cello Recordings</h2>
            @elseif(Session::get('lang') == 'at')
            <p class="text-white">CD Albums</p>
            <h2 class="text-white">Cello Aufnahmen</h2>
            @endif
        </div>

        @php
        $new_album = '';
        @endphp

        @forelse ($tracks as $key => $track)
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
    </div>

    <div class="flex-complete mt-30 oneMusic-buttons-area">
        <a href="{{route('website.tracks')}}" class="btn oneMusic-btn m-2">
            @if(Session::get('lang') == 'en')
            More Cello Recordings
            @elseif(Session::get('lang') == 'at')
            Mehr Cello Aufnahmen
            @endif
            <i class="fa fa-angle-double-right"></i>
        </a>
    </div>
</section>
<!-- ##### Featured Artist Area End ##### -->
