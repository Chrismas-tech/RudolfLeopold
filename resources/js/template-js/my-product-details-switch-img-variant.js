$(function() {
    $(document).on('click', '.product-details-preview-img', function() {
        let src = $(this).attr('src');
        $(this).closest('.product-details-container').find('.product-details-main-img').attr('src', src)
        $(this).closest('.product-details-container').find('.product-details-main-img').attr('data-zoom', src)
    })
})