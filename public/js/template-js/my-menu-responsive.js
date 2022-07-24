$(function() {

    //Prepare top nav responsive outside of body
    height_nav_desktop = $('.navigation').height()
    height_nav_responsive = $('.navigation-responsive').height()
    $('.navigation-responsive').css('top', '-' + height_nav_responsive + 'px');

    $(document).on('click', '.fa-bars, .fa-xmark', function() {
        if ($('.fa-bars').is(':visible')) {

            $('.navigation-responsive').show()
            $('.navigation-responsive').stop().animate({ top: height_nav_desktop + 'px' });
            $('.fa-xmark').removeClass('d-none')
            $('.fa-bars').addClass('d-none')
                /* console.log('visible bars'); */
        } else {
            $('.navigation-responsive').stop().animate({ top: '-' + height_nav_responsive + 'px' });
            $('.fa-xmark').addClass('d-none')
            $('.fa-bars').removeClass('d-none')
                /*  console.log('not visible bars'); */
        }
    })

    //Banner margin top
    $('.my-banner').css('margin-top', height_nav_desktop + 'px')

    //Click Outside of Menu
    $(document).on('click', function(e) {
        /* console.log($(e.target).closest('.navigation-responsive').length); */
        if ($(e.target).closest('.navigation-responsive').length == 0 &&
            $(e.target).closest('.fa-bars').length == 0) {
            $('.navigation-responsive').stop().animate({ top: '-' + height_nav_responsive + 'px' });
            $('.fa-xmark').addClass('d-none')
            $('.fa-bars').removeClass('d-none')
        }
    })
})