export class IncrementDecrement {
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

        if ($(target_class).length) {

            $(document).on('click', target_click, function() {

                let result = parseInt($(this).parent().parent().find(target_class).val())

                if (direction == '+') {
                    result += 1
                } else {
                    if (direction == '-') {
                        if ((result - 1) !== 0) {
                            result -= 1
                        }
                    }
                }

                $(this).parent().parent().find(target_class).val(result)
            })
        }
    }
}


new IncrementDecrement('.music-tracks-page .bi-plus-square', '.position-track', '+')
new IncrementDecrement('.music-tracks-page .bi-file-minus', '.position-track', '-')