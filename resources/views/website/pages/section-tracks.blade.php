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
                    <img src="{{asset($track->img_file)}}" alt="">
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

                    @if($new_album !== $track->album_name)
                    <p>{{$track->album_name}}</p>
                    @endif

                    {{-- <p>Nam tristique ex vel magna tincidunt, ut porta nisl finibus. Vivamus eu dolor eu quam varius rutrum. Fusce nec justo id sem aliquam fringilla nec non lacus. Suspendisse eget lobortis nisi, ac cursus odio. Vivamus nibh velit, rutrum at ipsum ac, dignissim iaculis ante. Donec in velit non elit pulvinar pellentesque et non eros.</p> --}}

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


        @if($new_album !== $track->album_name)
        {{ $new_album = $track->album_name; }}
        @endif

        @empty

        @endforelse
    </div>

    <div class="flex-complete mt-30 oneMusic-buttons-area">
        <a href="{{route('website.tracks')}}" class="btn oneMusic-btn m-2">
            @if(Session::get('lang') == 'en')
            More Cello Recordings
            @else
            Mehr Cello Aufnahmen
            @endif
            <i class="fa fa-angle-double-right"></i>
        </a>
    </div>
</section>
<!-- ##### Featured Artist Area End ##### -->
