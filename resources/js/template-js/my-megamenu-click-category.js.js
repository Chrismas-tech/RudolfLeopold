// IF CLICK ON CATEGORY MEGA MENU 
$(document).on('click', '.mega-menu-category', function(e) {
    let text = $(this).text().trim();
    $('#input_searchbar_id').val(text)
    $('#form-searchbar').submit()
})