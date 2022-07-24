$(function() {

    let width_w = $(window).width();

    // MY DROPDOWN
    $('#UL-NESTED-MAIN a').on('click', function() {
        /* console.log('click'); */

        lis_level = $(this).closest('ul').children()
        li_index = $(this).closest('li').index()
        uls = $(this).closest('li').find('ul')

        //Show first ul from this by clicking
        $(uls).each(function(index, el) {
            if (index == 0) {
                $(el).show()

                let offset = $(el).offset()
                let width_el = $(el).width()
                let height_el = $(el).find('li').height()
                let posX = offset.left - $(el).scrollLeft()

                /* console.log(posX);*/
                /* console.log(height_el); */
                /* console.log(width_el); */

                // Responsive Prevent result to be outside of screen
                if ((posX + width_el) > width_w) {
                    /*  console.log('outside'); */
                    $(el).css({ 'left': '-1px', 'top': height_el + 'px' })
                }

            } else {
                $(el).hide()
            }
        });

        // Hide others Li ul 
        $(lis_level).each(function(index, el) {
            if (index !== li_index) {
                $(el).find('ul').hide()
            }
        });
    })

    // Click Outside close all ul
    $(document).on('click', function(e) {
        /* console.log($(this));
        console.log($(e.target).closest('#UL-NESTED-MAIN').length); */

        if ($(e.target).closest('#UL-NESTED-MAIN').length == 0) {
            $('#UL-NESTED-MAIN').find('ul').hide()
        }
    })

    // Hover On Show Icon
    $('#UL-NESTED-MAIN a').stop().hover(
        function(e) {
            $(this).find('.fa-angle-right').show()
        },
        function(e) {
            $(this).find('.fa-angle-right').hide()
        })


    // Responsive When click on Category -> hide all after uls
    $(document).on('click', '.ul-nested-category-name', function(e) {
        /* console.log('click'); */
        // Tous les Ul après this -> hide
        ul_s = $(this).closest('ul').find('ul')
            /*  console.log(ul_s); */
        ul_s.each(function(index, ul) {
            $(ul).hide()
        });
    })


    /*------------------------------------------------------------------------------------------------*/
    /* START RESULT SIDEBAR CATEGORIES */
    /*------------------------------------------------------------------------------------------------*/

    // SEE ALL -> SHOW ALL PRODUCTS OF CATEGORY CLICKED
    $(document).on('click', '.see-all', function(e) {
        text = $(this).closest('.sidebar-categories-head').find('.ul-nested-category-name').text().trim()
        $('#search_bar').val(text)
        $('#form-searchbar').submit()
    })

    // SEE ALL -> SHOW ALL PRODUCTS OF LAST CATEGORY CLICKED
    $(document).on('click', '.see-category-last', function(e) {
        text = $(this).find('.see-category-name-last').text().trim()
        $('#search_bar').val(text)
        $('#form-searchbar').submit()
    })

    /*------------------------------------------------------------------------------------------------*/
    /* END RESULT SIDEBAR CATEGORIES */
    /*------------------------------------------------------------------------------------------------*/
})