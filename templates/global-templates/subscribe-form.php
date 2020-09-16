
<form action="/api/subscribe" method="post" class="subscribe-form">
    <div class="input-group inpug-group-lg">
        <input type="email" name="email" class="form-control" placeholder="<?= __('YOUR EMAIL', 'dfrost'); ?>">
        <div class="input-group-append">
            <button class="ml-2" type="submit">
                <i class="icon-arrow-right-circle"></i>
            </button>
        </div>
    </div>
</form>

<div class="popup_bg popup_subscribe_bg">
    <div class="popup">
        <div class="close_button close_popup_button" style="position: absolute;top: 25px !important;right: 25px;">
            <a href="#" onclick="return false"><i class="icon-black_close_button_" style="display: block; background-image: url(/wp-content/themes/understrap-dfrost/assets/img/white_close_button.png); width: 29px; height: 29px;background-repeat: no-repeat;background-position: center;background-size: contain;"></i></a>
        </div>
        <div class="popup_title"><?= __('You are subscribed successfully!') ?></div>
    </div>
</div>
