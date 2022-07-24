$(function() {
    $(document).on('mouseenter', '[id*="mega-menu-tabs-links_"]', function(e) {
        /* console.log('mouseenter'); */
        target_extract_id = $(this).attr('id').split('_')[1];
        $('.mega-menu-tabs-content').removeClass('d-none')

        $('#mega-menu-content-rows-' + target_extract_id)
            .removeClass('d-none')
            .siblings()
            .addClass('d-none')

        $(this).addClass('border-bottom-mega-menu').siblings().removeClass('border-bottom-mega-menu')
    })

    $(document).on('mouseleave', '.mega-menu', function(e) {
        /*  console.log('mouseleave'); */
        $('.mega-menu-tabs-content').addClass('d-none')
    })
})