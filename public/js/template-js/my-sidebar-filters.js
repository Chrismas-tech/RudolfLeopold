// SLIDE TOGGLE FILTERS
$(document).on('click', '.filters-slide-toggle', function(e) {

    if ($('.shop-slide-titles').hasClass('d-none')) {

        $('.shop-slide-titles').toggleClass('d-none')
        $('.div-shop-filters').toggleClass('col-lg-3')
        $('.div-shop-products-list').toggleClass('col-lg-9')
        $('.div-shop-filters').toggleClass('col-lg-1')
        $('.div-shop-products-list').toggleClass('col-lg-11')

        $(this).closest('.shop-container').find('.shop-filters-slide').stop().slideToggle('medium')
    } else {
        $('.shop-slide-titles').toggleClass('d-none')

        $(this).closest('.shop-container').find('.shop-filters-slide').stop().slideToggle('medium', function() {
            $('.div-shop-filters').toggleClass('col-lg-3')
            $('.div-shop-products-list').toggleClass('col-lg-9')
            $('.div-shop-filters').toggleClass('col-lg-1')
            $('.div-shop-products-list').toggleClass('col-lg-11')
        });
    }
})