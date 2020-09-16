<section class="citation citation_fixend"  id="block_number_<?= $GLOBALS["block_number"] ?>" style="background-color: <?= get_field('background_color') ?>;">
    <div class="container <?= get_field('thin') ? 'thin' : '' ?>">
        <blockquote>
            <?php the_field('quote'); ?>
        </blockquote>
    </div>
</section>
