jQuery(function($) {

  $('.box-slide-image').addClass('owl-carousel').owlCarousel({
    margin: 0,
    /*loop: true,*/
    items: 1,
    touchDrag: true,
    animateOut: 'fadeOut',
    /*autoplay: true,*/
    /*autoplayTimeout: 5000,*/
    /*autoplayHoverPause: true,
    autoplaySpeed: 2000,*/
    nav: true,
    navText: ['<i class="icon-arrow-left-circle"></i>', '<i class="icon-arrow-right-circle"></i>']
  });


  $('.ajax_load_more').click(function(){

    var _attr = $(this).attr('step');
    if ( _attr > 0 ) {
      _attr++;
      $(this).attr('step', _attr);
    } else {
      $(this).attr('step', 1);
    }

  });

  //$('[data-post_id]').click()

});
