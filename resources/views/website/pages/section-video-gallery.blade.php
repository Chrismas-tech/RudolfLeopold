<section class="latest-albums-area section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading style-2">
                    <p>Cello Recordings</p>
                    @if($default_language == 'en')
                    <h2>Video Gallery</h2>
                    @else
                    <h2>Video Gallerie</h2>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            @forelse ($ytb_videos as $video)
            <div class="col-sm-6 col-md-4 gy-1">
                <iframe class="youtube-iframe" src="{{asset($video->url)}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                </iframe>
                <div class="album-info">
                    <a href="#">
                        <h5>{{$video->video_name}}</h5>
                    </a>
                    {{-- <p>Second Song</p> --}}
                </div>
            </div>
            @empty
            @endforelse
        </div>
    </div>
</section>
