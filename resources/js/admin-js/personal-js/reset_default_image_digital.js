$(document).ready(function() {
    $('#reset_default_input').on('click', function(e) {
        e.preventDefault()
        $('#mainImg').val('');
        $('#input-div-field-main-img-digital').remove()
        $('#current_preview_main_image').html('')
        $('#reset_default_image').attr('value', 1)
        $('#alert-default-image').toggleClass('d-none')
    })
});