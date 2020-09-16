import $ from 'jquery';

/*
  ~/sass/theme/_child_theme_variables.scss
  xs: 0,
  sm: 425px,
  md: 768px,
  lg: 1024px,
  xl: 1440px,
  xxl: 1920px

 */
  // Interval in ms when to rotate brands
const rotateInterval = 3000 + Math.floor(Math.random() * Math.floor(2500));

const itemsPerDevice = {
  xs: 15,
  sm: 15,
  md: 30,
  lg: 25,
  xl: 20,
  xxl: 32
};



Brands = function (selector) {


  /**
   * Remove exceed brand elements from the list.
   */

  this.draw = function( one_selector ) {

    if(window.matchMedia('(min-width: 1920px)').matches){
      this.current = itemsPerDevice.xxl
    } else if(window.matchMedia('(max-width: 1919px) and (min-width: 1440px)').matches){
      this.current = itemsPerDevice.xl
    } else if(window.matchMedia('(max-width: 1439px) and (min-width: 1024px)').matches){
      this.current = itemsPerDevice.lg
    } else if(window.matchMedia('(max-width: 1023px) and (min-width: 768px)').matches){
      this.current = itemsPerDevice.md
    } else if(window.matchMedia('(max-width: 767px) and (min-width: 425px)').matches){
      this.current = itemsPerDevice.sm
    } else {
      this.current = itemsPerDevice.xs
    }

    this.prev = this.current;
    let count = this.current;

    one_selector.find('.brand').removeClass('d-none');
    one_selector.find('.brand').filter(function (index) {
      return index >= count;
    }).addClass('d-none');
  }

  this.rotate = function( one_selector, brands ) {
    this.rotated++;


    brands.sort(function () {
      return 0.5 - Math.random();
    });
    let count = this.current;
    one_selector.find('.brand').each(function (index) {
      if (index >= count) {
        return;
      }
      let $figure = $(this).find('figure');
      let $img = [
        $figure.find('img:first'), 
        null
      ];
      if ($figure.find('img').length < 2) {
        $img[0].addClass('top');
        $('<img class="bottom transparent" src="" />').appendTo($figure);
      }
      $img[1] = $figure.find('img.bottom');

      let k = $img[0].hasClass('transparent') ? 0 : 1;
      $img[k].attr({'src': brands[index].src});

      const change_time = 50 + Math.floor(Math.random() * Math.floor(1000));
      const transition_duration = parseInt($img[0].css('transition-duration').match(/\d/)[0], 10);


      setTimeout(function () {
        $img[1 - k].addClass('transparent');
        setTimeout(function () {
          $img[k].removeClass('transparent');
        }, transition_duration*1200);

      }, change_time);
    
    });

  }

  if (this.__initialized) {
    return;
  }


  let brands = [];
  selector.forEach(function(one_selector){

    this.$brands = one_selector;

    this.rotated = 0;
    this.__initialized = true;

    let brands = [];

    let id = 1;
    brands[ one_selector.attr('id') ] = []

    this.$brands.find('.brand').each(function () {
      brands[ one_selector.attr('id') ].push({
        id: id,
        src: $(this).find('img').attr('src')
      });
      id++;
    });

    $(window).on('resize', function(){
      this.draw( one_selector )
    } );
    $(window).on('load', function(){
      this.draw( one_selector )
    } );
    this.draw( one_selector );

    this.interval = setInterval(this.rotate, rotateInterval, one_selector, brands[ one_selector.attr('id') ]);
  });



}

export {
  Brands
}