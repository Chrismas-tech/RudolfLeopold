import { Ajax } from './Ajax'

export class Cart {

    increment(target_click, direction) {
        $(document).on('click', target_click, function() {

            let target_class = $(this).parent().parent().find('.input-qty-css')
            let qty = parseInt($(this).parent().parent().find('.input-qty-css').val())

            if (direction == '+') {
                qty += 1
            }

            $(target_class).val(qty)
        })
    }

    decrement(target_click, direction) {
        $(document).on('click', target_click, function() {

            let target_class = $(this).parent().parent().find('.input-qty-css')
            let qty = parseInt($(this).parent().parent().find('.input-qty-css').val())

            if (direction == '-') {
                if ((qty - 1) !== 0) {
                    qty -= 1
                }
            }

            $(target_class).val(qty)
        })
    }
}

const Incr_decr_qty = new Cart()
Incr_decr_qty.increment('.bi-plus-square', '+')
Incr_decr_qty.decrement('.bi-file-minus', '-')