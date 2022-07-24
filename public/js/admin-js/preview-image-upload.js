/* Display Thumbnail before adding Product */
$(function() {
    $('#mainImg').on('change', function(e) {

        const file = this.files[0]

        console.log('change');
        if (file) {
            let reader = new FileReader();
            reader.onload = function(e) {

                if ($('.gallery-main')) {
                    $('.gallery-main').html('')
                }

                if ($('.div-img').hasClass('d-none')) {
                    $('.div-img').toggleClass('d-none')
                }

                $('#preview_main_image').attr('src', e.target.result)
                $('#preview_main_image').attr('href', e.target.result)
                $('#preview_main_image').addClass('img-fluid')
                $('#preview_main_image').css('max-width', '40%')
                $('#preview_main_image').css('max-height', 'auto')
                $('#title_preview_img').text('Preview Main Image')
            };
            reader.readAsDataURL(file);
        } else {
            console.log('no image');
        }
    })
})