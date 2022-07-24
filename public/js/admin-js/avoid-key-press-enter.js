/* Avoid submit by adding some tags to product tags */
$(document).on('keypress', function(e) {
    if (e.which == 13) {
        e.preventDefault()
    }
})