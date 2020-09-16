import $ from 'jquery';
import { gsap, TweenMax } from "gsap";
// import SplitText from "gsap/SplitText";

class Animate {
  constructor() {

  }

  /** 
   * Animate elements.
   * 
   * @param string selector The CSS selector for elements to work with.
   */
  static start(selector) {
    let delay = 0;
    $(selector).each(function() {
      // @refactor >> 1. less CPU / more RAM
      let $this = $(this);
      // @refactor >> 2. less tabs
      if (!$this.visible()) {
        return;
      }
      const h = $this.height();
      gsap.timeline({ immediateRender: false })
        .to($this, { duration: 0.5, y: 0, delay: delay });
      delay += 0.1;
      // @refactor >> 3. Chaining
      $this.removeClass('in').addClass('out');
      // $this.addClass('out');
    });
  }

  /** 
   * Reset animation for animated elements.
   * 
   * @param string selector The CSS selector for elements to work with.
   */
  static reset(selector) {
    $(selector).each(function() {
      // @refactor >> 1. less CPU / more RAM
      let $this = $(this);
      // @refactor >> 2. less tabs
      if ($this.visible()) {
        return;
      }
      // @refactor >> 3. Chaining
      $this.removeClass('out').addClass('in').removeAttr('style');
      // $this.addClass('in');
      // $this.removeAttr('style');
    });
  }

  /** 
   * Split words into <span class="word"><span class="in"> WORD </span></span>
   * 
   * @param string selector The CSS selector for elements to work with.
   */
  static prepare(selector) {
    $(selector).each(function () {
      let $this  = $(this); 
      let text   = $this.text().trim();
      let words  = text.split(/\s{1,}/);
      $this.empty();
      words.forEach((word) => {
        if ('' === word.trim()) {
          // skip empty words
          return;
        }
        let $span = $('<span class="word" />');
        $('<span class="in" />').text(word).appendTo($span);
        $this.append($span);
      });

      $this.addClass('animated');
    });
  }

  static prepareText(selector) {
    let $p = $(selector);
    // console.log($p.text());
    $p.find('*').each(function() {
      let $this = $(this);
      // console.log($this.get(0).innerHTML);
    });
    // let split = new SplitText(selector);
    // $(split.chars).each(function(i){
    //   TweenMax.from($(this), 2.5, {
    //       opacity: 0,
    //       x: random(-500, 500),
    //       y: random(-500, 500),
    //       z: random(-500, 500),
    //       scale: .1,
    //       delay: i * .02,
    //       yoyo: true,
    //       repeat: -1,
    //       repeatDelay: 10
    //   });
    // });
  }

  /**
   * The flipper animation.
   * 
   * Element states:
   * - open (only one)
   * - closing (only one + one opening)
   * - opening (only one + one closing)
   * - closed (the rest / default state) 
   * 
   * @param string select The CSS selector of element.
   */
  static flipper(selector) {
    const FLIPPER_TIMEOUT = 2000;
    const STOP_WHEN_COMPLETE = false;

    const $selector = $(selector);
    const count = $selector.find('li').length;
    if (count < 2) {
      return false;
    }
    let index = 0;

    const prevIndex = function (i) {
      return 0 === i ? count - 1 : i - 1;
    }

    const nextIndex = function (i) {
      return i < count - 1 ? i + 1 : 0;
    }

    // first element
    $selector.find('li:first').addClass('open');
    $selector.find('li').filter(function (i) {
      return i > 0;
    }).addClass('closed');
    index = nextIndex(index);

    // reset();
    // next();
    let interval = setInterval(function () {

      let $curr = $selector.find('li:eq(' + index + ')');
      let $prev = $selector.find('li:eq(' + prevIndex(index) + ')');

      $prev.removeClass('open').addClass('closing');
      setTimeout(function () {
        $curr.removeClass('closed').addClass('opening');
      }, 150);
      setTimeout(function () {
        $curr.removeClass('opening').addClass('open');
        $prev.removeClass('closing').addClass('closed');
      }, 500);
  
      index = nextIndex(index);
      if (STOP_WHEN_COMPLETE && 0 === index) {
        clearInterval(interval);
      }
    }, FLIPPER_TIMEOUT);
    return true;
  }
}

function random(min, max){
  return (Math.random() * (max - min)) + min;
}

export {
  Animate
};