$(function() {
    if ($('#variant:checked').length > 0) {
        $('.div-options-checkboxes').removeClass('d-none')
    }

    // Toggle Checkbox Options DIV
    $(document).on('change', '#variant', function() {

        if ($('.div-options-checkboxes').hasClass('d-none')) {
            $('.div-options-checkboxes').removeClass('d-none')

            // DeActivate all inputs
            $('.div-options-checkboxes input:first').prop("checked", true);
        } else {

            $('.div-options-checkboxes').addClass('d-none')
                // Activate first input of div
            $('.div-options-checkboxes input').prop("checked", false);
        }
    })
})