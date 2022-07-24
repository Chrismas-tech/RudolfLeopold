$(function() {

    // Show SideBar Categories
    $(document).on('click', '.no-results-found, .shop-toggle', function() {
        /*  console.log('click 1'); */
        $('.shop-sidebar-categories').toggleClass('toggle-left')
        $('.shop-overlay').fadeIn()
    })

    //Click Outside of SideBar
    $(document).on('click', function(e) {

        /* console.log('click 2');
        console.log($(e.target).closest('.shop-sidebar-categories').length);
        console.log($(e.target).closest('.shop-toggle').length); */

        if ($('.shop-sidebar-categories').hasClass('toggle-left')) {
            if (
                $(e.target).closest('.shop-sidebar-categories').length == 0 &&
                $(e.target).closest('.shop-toggle').length == 0 &&
                $(e.target).closest('.no-results-found').length == 0
            ) {
                /*  console.log('click 3'); */
                $('.shop-sidebar-categories').toggleClass('toggle-left')
                $('.shop-overlay').fadeOut()
            }
        }
    })

    // Close Sidebar button
    $(document).on('click', '.fa-circle-xmark', function() {
        /*  console.log('click 4'); */
        $('.shop-sidebar-categories').removeClass('toggle-left')
        $('.shop-overlay').fadeOut()
    })
})