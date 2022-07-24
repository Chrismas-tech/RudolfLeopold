/* Modal Edit Youtube Video */
$('[data-bs-target="#edit-youtube-video"]').on('click', function() {
    $target = $(this).attr('id')

    $name = $('#current_url_video_' + $target).text().trim()

    $('[name="edit_url_video"]').val($name)

    // Input field hidden
    $('[name="edit_url_video_id"]').val($target)


    /* Focus the field, needs setTimeout*/
    setTimeout(() => {
        $('[name="edit_url_video"]').focus()
    }, 480);
})