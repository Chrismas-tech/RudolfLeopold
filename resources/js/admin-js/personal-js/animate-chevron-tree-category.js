/* Animate chevron tree category */
/* Main category badge changed */

$('.fa-chevron-circle-right').on('click', function() {

    $badge = $(this).parent().find('span[class*="main-category-badge-change-"]')
        /*   console.log($badge); */

    if ($(this).hasClass('fa-chevron-circle-right')) {
        $(this).removeClass('fa-chevron-circle-right')
        $(this).addClass('fa-chevron-circle-down')

    } else {

        $(this).addClass('fa-chevron-circle-right')
        $(this).removeClass('fa-chevron-circle-down')
    }
    badgeChange($badge);
    $(this).parent().find('ul:first').stop().slideToggle();
})

$('.fa-chevron-circle-down').on('click', function() {
    $badge = $(this).parent().find('span[class*="main-category-badge-change-"]')
        /*   console.log($badge); */

    if ($(this).hasClass('fa-chevron-circle-down')) {
        $(this).removeClass('fa-chevron-circle-down')
        $(this).addClass('fa-chevron-circle-right')

    } else {
        $(this).addClass('fa-chevron-circle-down')
        $(this).removeClass('fa-chevron-circle-right')
    }
    badgeChange($badge);
    $(this).parent().find('ul:first').stop().slideToggle();
})



function badgeChange($badge) {
    $($badge).toggleClass('bg-warning')
    $($badge).toggleClass('my-bg-success')
    $($badge).toggleClass('text-dark')
    $($badge).toggleClass('text-white')
}