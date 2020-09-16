<section class="subscribe subscribe_marquee" id="block_number_<?= $GLOBALS["block_number"] ?>">
    <div class="offside">
    	<div class="marquee_content"><?php the_field('text'); ?></div>
    </div>
        <!--<ul class="marquee_content">
            <li><?php the_field('text'); ?></li>
            <li><?php the_field('text'); ?></li>
        </ul>-->

    <div class="form">
        <?php get_template_part('templates/global-templates/subscribe', 'form'); ?>
    </div>


</section>