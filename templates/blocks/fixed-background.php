<section class="single_page single_page_fix3" id="block_number_<?= $GLOBALS["block_number"] ?>">



    <style>
        <?php
        $image = get_field('bg_image');
        if ( $image ){ ?>
            #block_number_<?= $GLOBALS["block_number"] ?>::after{
                background-image:url(<?= htmlspecialchars( $image['url'] ) ?>);
            }
        <?php } ?>

    </style>
    <div class="container">

        <div class="close_page_button"> <!-- close_vacancy_button -->
            <a href="<?= home_url(); ?>">
                <div class="icon-black_close_button"></div> <!-- icon-cancel-circle -->
            </a>
        </div>

        <div class="little_container">
            <div class="post_content">
                <?php the_field('content'); ?>
            </div>
        </div>


        <?php if( have_rows('items') ): ?>

            <div class="items">
            <?php while ( have_rows('items') ) : the_row(); ?>
                <div class="item">
                    <div class="item_title"><?php the_sub_field('title'); ?></div>
                    <div class="item_text"><?php the_sub_field('text'); ?></div>
                </div>

            <?php endwhile; ?>
            </div>

        <?php else : endif; ?>



    </div>
</section>