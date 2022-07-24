$(function() {
    $(document).on('click', '.avatar-account', function() {
        $(this).find('.fa-angle-down').toggleClass('rotate-180');
        $(this).parent().find('.account-dropdown').fadeToggle()
    })

    //Click Outside of Menu
    $(document).on('click', function(e) {
        /* console.log($(e.target).closest('.navigation-responsive').length); */
        if ($(e.target).closest('.avatar-account').length == 0) {
            $(this).find('.fa-angle-down').removeClass('rotate-180');
            $('.account-dropdown').fadeOut()
        }
    })
})