// Update Ajax Main and Multi Images
$(function() {
    $(document).on('click', '#add-to-cart', function(e) {
        e.preventDefault()
        let variant_id = $('#variant_id').val()
        let product_id = $('#product_id').val()
        let qty = $('[name="product_details_qty"]').val()

        console.log(qty);

        console.log(variant_id, product_id, qty);
        ajax_call(product_id, variant_id, qty)
    })
})

function ajax_call(product_id, variant_id, qty) {
    /*  console.log('ajax'); */
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $.ajax({
        type: 'POST',
        url: '/add-to-cart',
        data: {
            variant_id: variant_id,
            product_id: product_id,
            qty: qty,
        },
        success: function(data) {
            console.log(data);
            $('.cart_nb_items').text(data.cart_nb_items)
            Fire_Toast(data.message, data.response)
        }
    });
}

function Fire_Toast(message, response) {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-start',
        showConfirmButton: false,
        timer: 5000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    if (response) {
        Toast.fire({
            icon: 'success',
            title: message
        })
    } else {
        /* console.log("error"); */
        Toast.fire({
            icon: 'error',
            title: message
        })
    }

}