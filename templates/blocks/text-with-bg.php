<section
    class="info <?= get_field('size') ?> info_fix_post"
        <?php
        $image = get_field('bg_image');
        if ( $image ){ ?>
            style="background-image:url(<?= htmlspecialchars( $image['url'] ) ?>);"
        <?php } ?>
    id="block_number_<?= $GLOBALS["block_number"] ?>"
    >
    <div class="container">
        <h2 class="heading">
            <?php
            $line1st = explode("|", get_field('line_1') );
            if ( is_array( $line1st ) && count($line1st) > 1 ) : ?>
            <span class="toAnimate flipper-line line-1">
                <ul>
                    <?php foreach ( $line1st as $line ) : ?>
                    <li><?= htmlspecialchars( $line ) ?></li>
                    <?php endforeach; ?>
                </ul>
            </span>
            <?php elseif ( count($line1st) == 1 ) : ?>
            <span class="toAnimate line line-1">
                <?= htmlspecialchars( $line1st[0] ) ?>
            </span>
            <?php endif; ?>

            <?php
            $line2nd = explode("|", get_field('line_2') );
            if ( is_array( $line2nd ) && count($line2nd) > 1 ) : ?>
            <ul class="flipper-line line-2">
                <?php foreach ( $line2nd as $line ) : ?>
                <li>
                    <?= htmlspecialchars( $line ) ?>
                </li>
                <?php endforeach; ?>
            </ul>
            <?php elseif ( count($line1st) == 1 ) : ?>
            <span class="toAnimate line line-2">
                <?= htmlspecialchars( $line2nd[0] ) ?>
            </span>
            <?php endif; ?>

            <?php
            $line3rd = explode("|", get_field('line_3') );
            if ( is_array( $line3rd ) && count($line3rd) > 1 ) : ?>
            <span class="toAnimate flipper-line line-3">
                <ul>
                    <?php foreach ( $line3rd as $line ) : ?>
                    <li><?= htmlspecialchars( $line ) ?></li>
                    <?php endforeach; ?>
                </ul>
            </span>
            <?php elseif ( count($line1st) == 1 ) : ?>
            <span class="toAnimate line line-3 line-3_fix9">
                <?= htmlspecialchars( $line3rd[0] ) ?>
            </span>
            <?php endif; ?>
        </h2>

        <?php if ( get_field('text') ) : ?>
        <div class="desc toAnimate">
            <?php the_field('text'); ?>
        </div>
        <?php endif; ?>

        <?php if ( get_field('btn_text') ) : ?>
        <div class="buttons" data-aos="fade-up" data-aos-delay="<?= $delay += 200 ?>">
            <a class="btn btn-outline-secondary" href="<?php the_field('btn_link'); ?>">
                <?php the_field('btn_text'); ?>
            </a>
        </div>
        <?php endif; ?>
    </div>
</section>