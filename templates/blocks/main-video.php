<?php

	$video = get_field('background_video');
	$image = get_field('background_image');

	$additionalSectionClasses = '';
	$additionalSectionAttributes = '';

	if ($image) {
		$additionalSectionClasses .= ' image';
	}

?>

<section class="fullscreen-hero <?= $additionalSectionClasses ?> <?php echo is_array($video) ? 'fullscreen-hero_video_fix' : '' ?>" id="block_number_<?= $GLOBALS["block_number"] ?>">
    <?php if( $video ) : ?>
    <video autoplay="" muted="" loop="" playsinline="">
        <source src="<?= htmlspecialchars( $video['url'] ) ?>" type="video/mp4">
    </video>
    <?php elseif ( $image ) : ?>


        <style>
            <?php if( get_field('mobile_background_image') ){ ?>
            #block_number_<?= $GLOBALS["block_number"] ?> .fullscreen-hero__image{
                background-image:url(<?= htmlspecialchars( get_field('mobile_background_image')['url'] ) ?>);
            }
            <?php } else{ ?>
                #block_number_<?= $GLOBALS["block_number"] ?> .fullscreen-hero__image{
                    background-image:url(<?= htmlspecialchars( get_field('background_image')['url'] ) ?>);
                }
            <?php } ?>

            @media (min-width: 768px) {
                #block_number_<?= $GLOBALS["block_number"] ?> .fullscreen-hero__image{
                    background-image:url(<?= htmlspecialchars( get_field('background_image')['url'] ) ?>);
                }
            }
        </style>

		<div class="fullscreen-hero__image"></div>
    <?php endif; ?>

    <div class="container">
        <h1 class="heading">
            <span class="toAnimate line line-1">
                <?php the_field('line_1'); ?>
            </span>
            <span class="toAnimate line line-2">
                <?php the_field('line_2'); ?>
            </span>
            <span class="toAnimate line line-3">
                <?php the_field('line_3'); ?>
            </span>
        </h1>
    </div>
        <div class="mousey">
            <div class="scroller"></div>
        </div>
</section>
