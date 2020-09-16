
<section class="small-contacts"  id="block_number_<?= $GLOBALS["block_number"] ?>">
        <div class="container">
            <h2 class="title" data-aos="fade-up"><?php the_field('title'); ?></h2>
            <div class="subtitle" data-aos="fade-up"><?php the_field('subtitle'); ?></div>
            <?php if( get_field('image') ){ ?>
                <div class="image" data-aos="fade-up" style="background-image:url(<?= get_field('image')['url']; ?>)"></div>
            <?php } ?>
            <div class="name" data-aos="fade-up"><?php the_field('name'); ?></div>
            <div class="text" data-aos="fade-up"><?php the_field('text'); ?></div>
        </div>
    <!-- </div> -->
</section>