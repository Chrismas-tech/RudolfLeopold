// Call Ajax Main and Multi Images Just after Loading Page
$(function() {

    input_radio_values = $('.product-main-infos input[type="radio"]:checked')
    let id = $('#product_id').val()

    let input_values = [];
    input_radio_values.each((index, value) => {
        input_values.push($(value).attr('id'))
    })
    old_input_values = input_values
    ajax_call(input_values, id)

    // Update Ajax Main and Multi Images

    $(document).on('click', '.product-main-infos input[type="radio"]', function() {
        input_radio_values = $('.product-main-infos input[type="radio"]:checked')

        let input_values = [];
        input_radio_values.each((index, value) => {
            input_values.push($(value).attr('id'))
        })

        if (JSON.stringify(old_input_values) !== JSON.stringify(input_values)) {
            old_input_values = input_values
            ajax_call(input_values, id)
        }
    })
})


function ajax_call(input_values, id) {
    /* console.log('ajax'); */
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $.ajax({
        type: 'POST',
        url: '/ajax-option-product',
        data: {
            input_values: input_values,
            id: id,
        },
        success: function(data) {
            /* console.log(data); */
            if (data.message == true) {
                let price = data.product.unit_price / 100
                let qty = data.product.qty
                let preview_images_front = data.multi_images_variant
                let variant_id = data.product.id

                if (price > 0 && qty !== null && preview_images_front.length > 0) {
                    $('#variant-available').addClass('d-none')
                    $('#product-stock').removeClass('d-none')
                    $('#product-price').removeClass('d-none')
                        /* $('#add-to-cart').attr('disabled', false) */

                    regenerate_preview_images(preview_images_front)
                    change_main_image(preview_images_front)
                    update_cart_inputs_hidden(variant_id)

                    $('#selling_price').text(price)

                    qty = '(' + qty + ')'
                    $('#product-qty').text(qty)
                } else {
                    $('#variant-available').removeClass('d-none')
                    $('#product-stock').addClass('d-none')
                    $('#product-price').addClass('d-none')
                    update_cart_inputs_hidden(variant_id)
                        /*  $('#add-to-cart').attr('disabled', true) */
                }
            }
        }
    });
}

function regenerate_preview_images(array_imgs_server) {
    /* console.log('regenerate'); */
    $('.product-details-previews-imgs').html('')
    array_imgs_server.forEach(el => {
        $('.product-details-previews-imgs').append(
            `<div class="me-1">
            <img class="product-details-preview-img" src="` + el + `" data-zoom=` + el + ` alt="">
        </div>`
        )
    });
}

function change_main_image(preview_images_front) {
    $('.product-details-main-img').attr('src', preview_images_front[0])
    $('.product-details-main-img').attr('data-zoom', preview_images_front[0])
}

function update_cart_inputs_hidden(variant_id) {
    $('#variant_id').val(variant_id)
        /* console.log($('#variant_id').val()); */
}