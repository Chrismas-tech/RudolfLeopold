/* Modal Edit Youtube Video */
$('[data-bs-target="#edit-youtube-video"]').on('click', function() {
    $id = $(this).attr('id')

    $('#edit_video_id').val($id)

    /* Focus the field, needs setTimeout*/
    setTimeout(() => {
        $('[name="edit_url_video"]').focus()
    }, 480);

    let this_instance = this

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $.ajax({
        type: 'POST',
        url: 'youtube-videos/ajax-edit',
        data: {
            id: $id,
        },
        success: function(data) {
            $('#edit_video_name').val(data.youtube_video.video_name)
            $('#edit_video_url').val(data.youtube_video.url)
        },
        error: function(data) {},
    })
})