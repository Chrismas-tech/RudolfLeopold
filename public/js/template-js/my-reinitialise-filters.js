$(function() {
    $(document).on('click', '.reinitialize-filters', function() {
        reinitialize_filters()
        $('#form-searchbar').submit()
    })

    function reinitialize_filters() {
        $('#min_price').val('')
        $('#max_price').val('')
        $('#filter_price').val('')
        $('#filter_nb_result').val('')
        $('#color').val('')
        $('#brand').val('')
    }
})