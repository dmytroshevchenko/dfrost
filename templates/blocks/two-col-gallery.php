<?php
if( have_rows('gallery') ):
?>
<section class="two_col_gallery d-flex align-items-center"  id="block_number_<?= $GLOBALS["block_number"] ?>">
    <div class="container little_container">
        
        <div class="masonry_grid mob_slider">
            <?php
            while ( have_rows('gallery') ) : the_row(); ?>
            <div class="grid-item one-gallery_item" data-aos="fade-up">
                <div class="one-gallery_item-image" style="background-image:url('<?php echo get_sub_field('image')['url']; ?>')"></div>
                <div class="gallery_item-content">
                    <div class="gallery_item-title">
                        <div class="gallery_item-title-title">
                            <?php the_sub_field('title'); ?>
                        </div>
                        <div class="gallery_item-cat">
                            <?php the_sub_field('right_text'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>

    </div>
</section>
<?php endif; ?>