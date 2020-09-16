
<section class="contact-us" id="block_number_<?= $GLOBALS["block_number"] ?>">
    <div class="container container_fix15">
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
            <a class="btn btn-outline-secondary aos-animate" href="tel:<?php the_field('phone') ?>" data-aos="_fade-right" data-aos-delay="200">
                <?php the_field('phone') ?>
            </a>
            <?php endif; ?>
            <?php if ( get_field('email') ) : ?>
            <a class="btn btn-outline-secondary aos-animate" href="mailto:<?php the_field('email') ?>" data-aos="_fade-right" data-aos-delay="200">
                <?php the_field('email') ?>
            </a>
            <?php endif; ?>
        </div>
    </div>

    <style>
        <?php if( get_field('bg_image_mob') ){ ?>
        #block_number_<?= $GLOBALS["block_number"] ?>{
            background-image:url(<?= htmlspecialchars( get_field('bg_image_mob')['url'] ) ?>);
        }
        <?php } else{ ?>
            #block_number_<?= $GLOBALS["block_number"] ?>{
                background-image:url(<?= htmlspecialchars( get_field('bg_image')['url'] ) ?>);
            }
        <?php } ?>

        @media (min-width: 768px) {
            #block_number_<?= $GLOBALS["block_number"] ?>{
                background-image:url(<?= htmlspecialchars( get_field('bg_image')['url'] ) ?>);
            }
        }
    </style>

</section>