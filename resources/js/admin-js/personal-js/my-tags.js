$(function() {
    /* console.log('my-tags.js'); */

    tags = []

    //Fill Hidden Input if old value
    target_server = $('.input_tags_array_1')
    fill_hidden_input_old_value(target_server)

    //ADD Tag Input
    $(document).on('click', '.create_tag_option', function(e) {
        e.preventDefault()
        add_tag_input($(this))
    })

    //ADD Tag Input Key Press
    $('.create_tag_input').on('keypress', function(e) {
        // IF ENTER
        if (e.which == 13) {
            add_tag_input($(this))
        }
    });

    //REMOVE tag input
    $(document).on('click', '.create_tag_list .fa-window-close', function() {
        remove_tag_input($(this))
    })

    // When Backspace press => remove last tag
    $('.create_tag_input').on('keyup', function(e) {
        p = e.which;
        if (p == 8 && $('.create_tag_input').val() == '') {
            console.log('remove');
            remove_last_tag()
        }
    });

    function add_tag_input(thisObj) {
        input_tag_value = $(thisObj).closest('div').find('.create_tag_input').val()
        input_tag = $(thisObj).closest('div').find('.create_tag_input')

        if (input_tag_value.length > 0) {
            if (verify_duplicata(input_tag_value)) {
                // Push
                tags.push(input_tag_value)

                // Update Hidden Input
                update_hidden_input(thisObj)

                //Display 
                $(thisObj).closest('.create_tag_div').find('.create_tag_list').append(`<div class="tag-badge badge my-bg-primary my-1 me-1">
                    <span class="me-1 value-tag">` + input_tag_value + `</span>
                    <span><i class="fas fa-window-close pointer"></i></span>
                </div>`)
            }
        }
        //Remove input string
        $(input_tag).val('');
    }

    function verify_duplicata(input) {
        result = true
        tags.forEach(el => {
            if (el == input) {
                result = false
            }
        });
        return result
    }

    function remove_tag_input(thisObj) {

        // Remove from tags array
        value = $(thisObj).closest('.tag-badge').find('.value-tag').text()
            /* test = $(thisObj).closest('.tag-badge').html()
            console.log(value);
            console.log(test); */
        remove_from_tags_array(value)

        // Update Hidden Input
        update_hidden_input()

        // Remove Display
        $(thisObj).closest('.tag-badge').remove()
            /* console.log(tags); */
    }

    function remove_from_tags_array(value) {
        tags.forEach((el, index) => {
            if (el == value) {
                tags.splice(index, 1)
            }
        });

        console.log('remove value ' + tags);
    }

    function update_hidden_input(thisObj) {
        // Fill Hidden Input 
        $(thisObj).closest('div').find('.input_tags_array_1').val(JSON.stringify(tags))
        console.log($(thisObj).closest('div').find('.input_tags_array_1').val());
    }

    function fill_hidden_input_old_value(target_server) {
        if (target_server.val()) {
            Json_Parse_Hidden_input = JSON.parse(target_server.val());

            Json_Parse_Hidden_input.forEach(el => {
                tags.push(el)
            });
            console.log(tags);
        }
    }

    function remove_last_tag() {
        //Remove from array
        tags.splice(tags.length - 1, 1)
            //Remove display
        input_tag = $('.create_tag_list').find('.tag-badge')
        input_tag.each((index, input) => {
            if (index == input_tag.length - 1) {
                $(input).remove()
            }
        })

        console.log(tags);
    }
})