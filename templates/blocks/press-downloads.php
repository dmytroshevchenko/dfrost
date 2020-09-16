<?php
$args = [
    'post_type'    => 'story',
    'posts_per_page' => -1,
];

$the_query = new WP_Query( $args );
if ($the_query->have_posts() ) : ?>
<?php endif; ?>



<section class="press press-downloads all_stories d-flex align-items-center"  id="block_number_<?= $GLOBALS["block_number"] ?>">
	<div class="container">

		<?php if( have_rows('downloads') ): ?>
		<div class="press_block masonry_grid"  data-aos="fade-up">
			<?php
                while ( have_rows('downloads') ) :
                    the_row();

	                $bg_image_ratio = 1;
	                $bg_image = get_sub_field('image')['url'];
	                if ($bg_image !== false) {
		                $bg_image_size = getimagesize($bg_image);
		                $bg_image_ratio = round($bg_image_size[0]/$bg_image_size[1], 1);
	                }
            ?>
				<div class="grid-item one-story" data-ratio="<?= $bg_image_ratio; ?>">
	                <div class="one-story-image" onclick="location.href='<?= get_sub_field('file')['url']; ?>'">
	                	<div class="one-story-image-image" style="background-image:url(<?= $bg_image; ?>"></div>
	                </div>
	            	<div class="story-content">
	                    <div class="story-title">
	                        <div class="story-title-title story-title-title_fix5">
	                            <?php the_sub_field('title') ?>
	                        </div>
	                        <div class="story-cat">
	                        	<?php the_sub_field('text') ?>
	                        </div>
	                    </div>

                        <?php
                            $desc = get_sub_field('description');
                            if (strlen($desc)) :
                        ?>
						    <div class="story-description story-description_fix5">
							    <?php the_sub_field('description'); ?>
						    </div>
                        <?php endif; ?>

	                <?php if( get_sub_field('file') ){ ?>
	                	<div class="story-links">
	                		<a style="width:100%" class="download_link" href="<?= get_sub_field('file')['url']; ?>">
                        <span style="">
                          <svg width='16px' height="16px" aria-hidden="true" focusable="false" data-prefix="far" data-icon="arrow-to-bottom" role="img" xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 384 512" class="svg-inline--fa fa-arrow-to-bottom fa-w-12 fa-3x">
                            <path fill="#000" d="M348.5 232.1l-148 148.4c-4.7 4.7-12.3 4.7-17 0l-148-148.4c-4.7-4.7-4.7-12.3 0-17l19.6-19.6c4.8-4.8 12.5-4.7 17.1.2l93.7 97.1V44c0-6.6 5.4-12 12-12h28c6.6 0 12 5.4 12 12v248.8l93.7-97.1c4.7-4.8 12.4-4.9 17.1-.2l19.6 19.6c4.9 4.7 4.9 12.3.2 17zM372 428H12c-6.6 0-12 5.4-12 12v28c0 6.6 5.4 12 12 12h360c6.6 0 12-5.4 12-12v-28c0-6.6-5.4-12-12-12z" class="">
                            </path>
                          </svg>
                        </span><?= __('Download', 'understrap-dfrost'); ?></a>
	                    </div>
	                <?php } ?>
	                </div>
	            </div>
			<?php endwhile; ?>
		</div>
		<?php else : endif; ?>



	</div>

</section>
