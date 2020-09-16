import $ from 'jquery';

class Subscription {
  constructor(formSelector, toggleSelector) {
    this.$forms = $(formSelector);
    this.$toggles = $(toggleSelector);
  }

  init() {
    this.$toggles.on('click', function (event) {
      event.preventDefault();
      var $this = $(this);
      var $form = $($this.data('subscribe-toggle'));

      $this.remove();
      $form.removeClass('d-sm-none').show();
      $form.find('input:first').focus();
    });
  }
}

export {
  Subscription
}