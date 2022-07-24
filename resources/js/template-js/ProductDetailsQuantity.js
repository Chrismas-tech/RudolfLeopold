export class ProductDetailsQuantity {
    constructor(
        target_click,
        target_class,
        direction,
    ) {
        this.target_click = target_click
        this.target_class = target_class
        this.direction = direction

        this.incr_decr(this.target_click, this.target_class, this.direction)
    }

    incr_decr(target_click, target_class, direction) {
        $(document).on('click', target_click, function() {

            let qty = parseInt($(target_class).val())

            if (direction == '+') {
                qty += 1
            } else {
                if (direction == '-') {
                    if ((qty - 1) !== 0) {
                        qty -= 1
                    }
                }
            }

            $(target_class).val(qty)
        })
    }
}


if ($('.product-details-container').length) {
    new ProductDetails('.product-details-container .bi-plus-square', '#product_details_qty', '+')
    new ProductDetails('.product-details-container .bi-file-minus', '#product_details_qty', '-')
}