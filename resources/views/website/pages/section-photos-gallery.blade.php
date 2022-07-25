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

    <div class="flex-complete mt-50 oneMusic-buttons-area">
        <a href="{{route('website.photos-gallery')}}" class="btn oneMusic-btn btn-2 m-2">
            More Photos
            <i class="fa fa-angle-double-right"></i>
        </a>
    </div>
</section>
