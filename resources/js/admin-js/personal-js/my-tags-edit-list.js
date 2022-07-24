/* Sweet Alert product option edit list */
$(function() {
    tags_edit = []

    tr_memory = ''
    name_option = ''
    values_option = ''
    id = ''

    input_tag = ''
    input_value = ''

    //ADD Tag Input Edit
    $(document).on('click', '.add_edit_option', function(e) {
        e.preventDefault()
        add_edit_tags_input($(this))
    })

    // REMOVE TAG INPUT EDIT
    $(document).on('click', '.table-responsive .fa-window-close', function(e) {
        // Catch Needed values and Fill Tags Edit
        remove_tags_edit($(this))
    })

    // REMOVE TAGS FUNCTION
    function remove_tags_edit(thisObj) {
        // 1) Variables 
        tr_memory = $(thisObj).closest('tr')
        id = $(tr_memory).attr('id')
        name_option = $(tr_memory).find('.edit_option_name').val()

        // 2) REMOVE DISPLAY
        $(thisObj).closest('.tag-badge').remove()

        // 3) Values options
        values_option = $(tr_memory).find('.edit_option_value')
        tags_edit = []

        // 4) Push in tags_edit from display
        values_option.each((index, input) => {
            tags_edit.push($(input).text().trim())
        });
    }

    //ADD Tag Input Key Press
    $('.input-keypress').on('keypress', function(e) {
        // IF ENTER
        if (e.which == 13) {
            add_edit_tags_input($(this))
        }
    });

    // When Backspace press => remove last tag
    /* $('.input-keypress').on('keyup', function(e) {
        p = e.which;
        if (p == 8 && $('.input-keypress').val() == '') {
            console.log('remove');
            remove_tags_edit($(this))
        }
    }); */


    function add_edit_tags_input(thisObj) {
        display_new_tag(thisObj)
    }

    function display_new_tag(thisObj) {
        // Display new Value
        input_tag = $(thisObj).closest('div').find('input')
        input_tag_value = $(thisObj).closest('div').find('input').val()
        div_to_fill = $(thisObj).closest('div')

        // Display if input_tag_value not empty
        if (input_tag_value.length > 0) {
            if (verify_duplicata(thisObj, input_tag_value)) {
                //Update display append
                $(div_to_fill).closest('.edit_option_value_td').append(`
                    <div class="tag-badge badge my-bg-primary my-1 mx-1">
                        <span class="edit_option_value me-1">` + input_tag_value + `</span>
                        <span><i class="fas fa-window-close pointer"></i></span>
                    </div>`)

                //Reset Values Option
                values_option = $(tr_memory).find('.edit_option_value')
            }
        }

        $(input_tag).val('')
    }

    function verify_duplicata(thisObj, input) {
        //Fill tags_edit
        fill_tags_edit(thisObj)

        result = true
        tags_edit.forEach(el => {
            if (el == input) {
                result = false
            }
        });

        console.log(result);
        return result
    }


    /* Sweet Alert product option edit list */
    $(function() {
        //Click Sweet alert
        $(document).on('click', '[id*="update_option_"]', function(e) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success text-white',
                    cancelButton: 'btn btn-danger me-2'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "Do you really want to update this product option ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, update !',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    fill_tags_edit($(this))
                    inject_hidden_input()
                    $('#form-option-update').submit();
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            })
        })
    })

    function fill_tags_edit(thisObj) {
        // We prepare all variables to Inject 
        // We reset and fill tags_edit with existing values

        tr_memory = $(thisObj).closest('tr')

        id = $(tr_memory).attr('id')
        name_option = tr_memory.find('.edit_option_name').val()
        values_option = tr_memory.find('.edit_option_value')

        tags_edit = []

        values_option.each((index, input) => {
            tags_edit.push($(input).text().trim())
        });
    }

    function inject_hidden_input() {
        // Inject to Hidden input values 
        $('#edit_option_id_hidden').val(id)
        $('#edit_option_name_hidden').val(name_option)
        $('#edit_option_value_hidden').val(JSON.stringify(tags_edit))
    }
})