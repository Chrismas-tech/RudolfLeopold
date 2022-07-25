/* Si on clique sur une ancre commençant par # --> on se déplace jusqu'à l'ancre en question moins le padding */

let $scroll_padding_top = 85;

/* console.log($scroll_padding_top); */

$('#scroll-jumbo, #anchor-biography').on('click', function(e) {
    e.preventDefault();
    let $offset_top_target = $('#biography').offset().top
    let $distance = $offset_top_target - $scroll_padding_top
    $('html, body').animate({ scrollTop: $distance }, 600)
})



/* Si on clique sur une ancre commençant par # --> on se déplace jusqu'à l'ancre en question moins le padding */

/* 


let $scroll_padding_top = 0;

$('a[href*=about],a[href*=testimonials],a[href*=portfolio],a[href*=contact]').on('click', function(e) {
    
    e.preventDefault();
    console.log($($(this).attr('href')).offset().top);
    let $offset_top_target = $($(this).attr('href')).offset().top
    let $distance = $offset_top_target - $scroll_padding_top
    
    if ($('.modal').css('display') == 'block') {
        $('.modal').modal('toggle');
    }

      $('html, body').animate({ scrollTop: $distance }, 0)
}) */