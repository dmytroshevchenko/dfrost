<section 
    class="bg_image"
    <?php
    $bg_image = get_field('bg_image');
    if( $bg_image ){ ?>
        style="background-image:url(<?php echo $bg_image ?>)" 
    <?php } ?>
    >
    <div class="container">
    </div>
</section>