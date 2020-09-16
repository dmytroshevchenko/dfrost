<?php
$container = get_theme_mod('understrap_container_type');


$works = get_field('works');
?>

<?php if( have_rows('works') ): ?>

<section class="latest-works" id="block_number_<?= $GLOBALS["block_number"] ?>" >
    <div class="<?= $container ?>">
        <div class="works-grid">


            <?php
                while ( have_rows('works') ) :

                    $row = the_row();

                    $client = get_sub_field_object('client');

                    $fields = get_fields();

	                $bg_image_ratio = 1;
                    $bg_image = get_sub_field('image')['url'];
                    if ($bg_image !== false) {
                        $bg_image_size = getimagesize($bg_image);
                        $bg_image_ratio = round($bg_image_size[0]/$bg_image_size[1], 1);
                    }

                    $featured_video = get_sub_field('featured_video');
	                if ($featured_video !== false && strlen($featured_video['url'])) {
		                $bg_image_ratio = round($featured_video['width'] / $featured_video['height'], 1);
		                $video = '<video width="100%" autoplay="" muted="" loop="" playsinline="">'.
			                '<source src="'.$featured_video['url'].'" type="video/mp4"></video>';
		                $height_320 = 'height_320';
	                } else {
		                $video = '';
		                $height_320 = '';
	                }

            ?>

                <div class="work work_fix2 <?= $height_320 ?>" data-aos="fade-up" onclick='location.href="<?= get_sub_field('link') ?>"' data-ratio="<?= $bg_image_ratio ?>">

                    <div class="work-header d-flex justify-content-between align-items-end">
                        <div class="work-title">
                            <?php the_sub_field('title') ?>
                        </div>
                        <div class="work-customer">
                            <?php echo $client['value']->name ?>
                        </div>
                    </div>
	                <?php if (strlen($video)) : ?>
                        <div class="work-image">
                            <div class="work-image-image" style="background-image:url()">
                                <?= $video ?>
                            </div>
                        </div>
	                <?php else : ?>
                        <div class="work-image">
                            <div class="work-image-image" style="background-image:url('<?= $bg_image ?>')"></div>
                        </div>
                    <?php endif; ?>
                </div>


            <?php endwhile; ?>

        </div>
        <?php if ( get_field('btn_text') ) : ?>
        <div class="latest-works-btn text-center">
            <a class="btn btn-outline-dark btn-outline-dark_fix3" href="<?php the_field('btn_link'); ?>">
                <?php the_field('btn_text'); ?>
            </a>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>