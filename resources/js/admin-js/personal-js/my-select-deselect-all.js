$(function() {
    //Variables

    //Check Multiple Deletion
    let checkbox_ids = []

    // select All
    $('#select_all').on('click', function() {
        $('.switch-input').prop('checked', true);

        let switch_inputs = $('.switch-input')

        checkbox_ids = []
        switch_inputs.each((index, input) => {
            checkbox_ids.push($(input).attr('id').split('_')[1]);
        });

        $('#delete_multiple_entries').val(JSON.stringify(checkbox_ids))

        $('#select_all').addClass('d-none')
        $('#deselect_all').removeClass('d-none')
        $('.delete_button').removeClass('d-none')
    })

    // Deselect All
    $('#deselect_all').on('click', function() {
        $('.switch-input').prop('checked', false);

        checkbox_ids = []

        $('#select_all').removeClass('d-none')
        $('#deselect_all').addClass('d-none')
        $('.delete_button').addClass('d-none')
    })

    $(document).on('click', '.switch-input', function() {

        // Update Input Result
        target_extract_id = $(this).attr('id').split('_')[1];
        if ($(this).is(':checked')) {
            checkbox_ids.push(target_extract_id)
        } else {
            checkbox_ids.forEach((el, index) => {
                if (el == target_extract_id) {
                    checkbox_ids.splice(1, index)
                }
            });
        }

        console.log($('.delete-button_' + target_extract_id));

        $('#delete_multiple_entries').val(JSON.stringify(checkbox_ids))
        console.log($('#delete_multiple_entries').val(JSON.stringify(checkbox_ids)));

        // Display/Remove Delete Button
        if ($('.delete-button_' + target_extract_id).is(':visible')) {
            $('.delete-button_' + target_extract_id).addClass('d-none')
        } else {
            $('.delete-button_' + target_extract_id).removeClass('d-none')
        }

        /* if ($(this).closest('td').find('.delete_button').is(':visible')) {
            $(this).closest('td').find('.delete_button').addClass('d-none')
        } else {
            $(this).closest('td').find('.delete_button').removeClass('d-none')
        } */

    })

})