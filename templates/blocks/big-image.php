<section 
    class="bg_image"
    <?php
    $bg_image = get_field('bg_image');
    if( $bg_image['type'] == 'image' ){ ?>
        style="background-image:url(<?php echo $bg_image['url'] ?>)" 
    <?php } ?>
     data-aos="fade-up"
    >
    <?php if( $bg_image['type'] == 'video' ){ ?>
        <video autoplay muted>
            <source src="<?= get_field('bg_image')['url']; ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    <?php } ?>
</section>