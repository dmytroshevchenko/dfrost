
<section class="contact-us" 
    <?php
        $image = get_field('bg_image');
        if ( $image ){ ?>
            style="background-image:url(<?= htmlspecialchars( $image['url'] ) ?>);"
        <?php } ?>

    >
    <!-- <div class="wp-block-cover"> -->
        <div class="container">
            <h2 class="heading">
                <span class="toAnimate line line-1">
                    <?php the_field('line_1'); ?>
                </span>
                <span class="toAnimate line line-2">
                    <?php the_field('line_2'); ?>
                </span>
            </h2>
            <div class="buttons">
                <?php if ( get_field('phone') ) : ?>
                <a class="btn btn-outline-secondary" href="tel:<?= $section->tel ?>" data-aos="fade-right" data-aos-delay="<?= $delay += $delayStep ?>">
                    <?php the_field('phone') ?>
                </a>
                <?php endif; ?>
                <?php if ( get_field('email') ) : ?>
                <a class="btn btn-outline-secondary" href="mailto:<?php the_field('email') ?>" data-aos="fade-left"  data-aos-delay="<?= $delay += $delayStep ?>">
                    <?php the_field('email') ?>
                </a>
                <?php endif; ?>
            </div>
        </div>
    <!-- </div> -->
</section>
