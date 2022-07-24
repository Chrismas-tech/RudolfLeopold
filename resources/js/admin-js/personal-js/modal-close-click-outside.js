$(document).on('click', function(e) {
    if ($(e.target).closest('.modal-content').length == 0) {
        $('.modal').modal('hide');
    }
})