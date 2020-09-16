<section class="counts" id="block_number_<?= $GLOBALS["block_number"] ?>">
    <div class="container">
        <div class="counts_block">
            <?php if( have_rows('counts') ): ?>

                <?php while ( have_rows('counts') ) : the_row(); ?>

                    <div class="one_count_block" data-aos="fade-up">
                        <div class="one_count_count"><?php the_sub_field('count'); ?></div>
                        <div class="one_count_title"><?php the_sub_field('title'); ?></div>
                        <div class="one_count_text"><?php the_sub_field('subtitle'); ?></div>
                    </div>


                <?php endwhile; ?>

            <?php else : endif; ?>
        </div>
    </div>
</section>