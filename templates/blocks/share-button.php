<section class="share_buttons"  id="block_number_<?= $GLOBALS["block_number"] ?>">
    <dvi class="container">

        <div class="share-buttons-block text-center">
            <a class="btn btn-outline-dark share_button" href="#">
                <?= __('Share') ?>
            </a>
            <?php if( get_field('second_button_type') != 'none' && get_field('btn_text') ){
                if( get_field('second_button_type') == 'file' ){
                    $link = get_field('btn_file')['url'];
                } else if( get_field('second_button_type') == 'link' ){
                    $link = get_field('btn_link');
                }

                ?>
                <a class="btn btn-outline-dark" href="<?= $link; ?>">
                    <?php the_field('btn_text'); ?>
                </a>
            <?php } ?>
        </div>

    </dvi>
</section>

<div class="popup_bg popup_share_bg">
    <div class="popup popup_fix16">
        <div class="close_popup_button close_page_button_" style="position: absolute;top: 25px !important;right: 25px; ">
            <a href="#"><i class="icon-black_close_button_" style="display: block; background-image: url(/wp-content/themes/understrap-dfrost/assets/img/white_close_button.png); width: 29px; height: 29px;background-repeat: no-repeat;background-position: center;background-size: contain;"></i></a>
        </div>
        <div class="popup_title"><?php the_field('popup_title'); ?></div>
        <div class="social_links">
            <a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&source=<?= home_url(); ?>"><?= __('Linkedin'); ?></a>
            <a target="_blank" href="https://www.xing.com/app/user?op=share;url=<?php the_permalink(); ?>"><?= __('Xing'); ?></a>
            <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>&t=<?php the_title(); ?>"><?= __('Facebook'); ?></a>
            <a target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?= the_post_thumbnail_url() ?>"><?= __('Pinterest'); ?></a>
            <a target="_blank" href="mailto:?subject=<?php the_title(); ?>&body=<?php the_permalink(); ?>"><?= __('E-mail'); ?></a>
        </div>
    </div>
</div>