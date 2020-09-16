<section class="single_page" id="block_number_<?= $GLOBALS["block_number"] ?>">
    <style>
        <?php
        $image = get_field('bg_image');
        if ( $image ){ ?>
            #block_number_<?= $GLOBALS["block_number"] ?>::after{
                background-image:url(<?= htmlspecialchars( $image['url'] ) ?>);
            }
        <?php } ?>

    </style>


    <div class="close_page_button">
        <a href="<?= home_url(); ?>">
            <div class="icon-black_close_button"></div>
        </a>
    </div>

    <div class="container" data-aos="fade-up">
        <h3 class="title center" data-aos="fade-up"><?php the_field('title'); ?></h3>
        <div class="subtitle" data-aos="fade-up"><?php the_field('subtitle'); ?></div>
        <?php if( have_rows('contacts') ): ?>
            <div class="few_contacts">
                <?php while ( have_rows('contacts') ) : the_row(); ?>
                    <div class="one_few_contacts">
                        <?php if( get_sub_field('image') ){ ?>
                            <div class="image" data-aos="fade-up" style="background-image:url(<?= get_sub_field('image')['url']; ?>)"></div>
                        <?php } ?>
                        <div class="name" data-aos="fade-up"><?php the_sub_field('name'); ?></div>
                        <div class="text" data-aos="fade-up"><?php the_sub_field('text'); ?></div>
                    </div>

                <?php endwhile; ?>
            </div>
        <?php else : endif; ?>

        <h2 class="contact_form_tite" data-aos="fade-up"><?= __('Contact us'); ?></h2>
        <form class="contact_form one_col" method="post" action="" enctype="multipart/form-data" data-aos="fade-up">

            <div class="contact_form_input_title"><?= __('Name'); ?></div>
            <div class="contact_form_input_block">
                <input type="text" name="your_name">
            </div>
            <div class="contact_form_input_title"><?= __('E-mail address'); ?></div>
            <div class="contact_form_input_block">
                <input type="text" name="email">
            </div>
            <div class="contact_form_input_title"><?= __('Message'); ?></div>
            <div class="contact_form_textarea_block">
                <textarea name="message"></textarea>
            </div>
            <div class="contact_form_btn_block">
                <button type="submit" class="btn btn-outline-secondary"><?= __('Send Message'); ?></button>
            </div>

            <input type="hidden" name="form_type" value="contacts">
            <input type="hidden" name="form_title" value="Contacts page">

        </form>

    </div>
</section>



<div class="popup_bg popup_contact_bg">
    <div class="popup">
        <div class="close_button close_popup_button">
            <i class="icon-cancel-circle"></i>
        </div>
        <div class="popup_title"><?= __('Vielen Dank für Deine Nachricht') ?></div>
        <div class="popup_content"><?= __('Wir melden uns in Kürze bei dir. Sincerely your Brand Companions.') ?></div>
        </div>
    </div>
</div>