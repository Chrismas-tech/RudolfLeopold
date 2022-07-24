$(document).ready(function() {

    $('.multi_img_variants').on('change', function() {
        /* console.log('change'); */
        $(this).parent().find('.current_preview_images').html('');
        let preview_multi_images = $(this).parent().find('.preview_multi_images').html('')
        let title_preview_multi_img = $(this).parent().find('.preview_multi_images').html('')

        /* $(title_preview_multi_img).text("Preview Multiple images") */

        if (window.File && window.FileReader && window.FileList && window.Blob) {
            var data = $(this)[0].files;

            $.each(data, function(index, file) {
                if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) {
                    var fRead = new FileReader();
                    fRead.onload = (function(file) {
                        return function(e) {

                            // Div that contains images => width: 350px; height: 350px; background-color: white;
                            let div_1 = $(document.createElement('div'))

                            // height:100%;
                            let img = $('<img/>')
                                .attr('src', e.target.result)
                                .addClass('img-fluid-preview')
                                .addClass('mt-2')

                            $(div_1).append(img)

                            $(preview_multi_images).append(div_1);

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