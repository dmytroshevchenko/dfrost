import $ from 'jquery';
import 'jquery-visible';
import 'bootstrap';
import 'owl.carousel';
import { gsap } from "gsap";

const animate = function(selector) {
  let delay = 0;
  $(selector).each(function() {
    if ($(this).visible()) {
      const h = $(this).height();
      gsap.timeline({ immediateRender: false })
        .to($(this), { duration: 1.5, y: 0, delay: delay });
      delay += 0.1;
      $(this).removeClass('in');
      $(this).addClass('out');
    }
  });
}
const resetAnimate = function(selector) {
  $(selector).each(function() {
    if (!$(this).visible()) {
      $(this).removeClass('out');
      $(this).addClass('in');
    }
  });
}
animate('.toAnimate .in');
$(document).on('scroll', function(event) {
  animate('.toAnimate .in');
  resetAnimate('.toAnimate .out');
});

(function ($, window, document, undefined) {
  if (undefined !== window.AOS) {
    AOS.init({
      delay: 200
    });
  }

  $(function($) {
    $('.stories-carousel .owl-carousel').owlCarousel({
      margin: 30,
      loop: true,
      items: 2,
      touchDrag: true,
      autoplay: true,
      autoplayTimeout: 5000,
      autoplayHoverPause: true,
      autoplaySpeed: 2000,
      nav: true,
      dotsEach: 2,
      responsive: {
        0: {
          items: 1.5,
        },
        769: {
          items: 2,
        },
      },
      navText: ['<i class="icon-arrow-left-circle"></i>', '<i class="icon-arrow-right-circle"></i>']
    });
  });
})(jQuery, window, document);
