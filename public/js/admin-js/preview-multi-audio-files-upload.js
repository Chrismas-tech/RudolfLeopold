$(document).ready(function() {

    $('.multi_audio_files').on('change', function() {
        /* console.log('change'); */
        $(this).parent().find('#preview_multi_tracks').html('')
        console.log(preview_multi_tracks);

        if (window.File && window.FileReader && window.FileList && window.Blob) {
            var data = $(this)[0].files;

            count_files = $(this)[0].files.length
            $('#title_preview').text(count_files + ' files ready to upload !')

            $.each(data, function(index, file) {
                if (/(\.|\/)(wav|mp3|mpeg)$/i.test(file.type)) {
                    var fRead = new FileReader();
                    fRead.onload = (function(file) {
                        return function(e) {

                            let name = file.name

                            let div_1 = $(document.createElement('div'))
                                .addClass('badge rounded-pill my-bg-success mb-2 mx-2').text(name)

                            $('#preview_multi_tracks').append(div_1);

                        };
                    })(file);
                    fRead.readAsDataURL(file);
                }
            });


        } else {
            alert("Your browser doesn't support File API!");
        }
    });
});