<?php
$image = get_field('bg_image');
?>
<section
    id="career_<?= $GLOBALS["block_number"] ?>"
    class="info vacancies bg <?php the_field('size') ?>" style="background-image:url( <?php echo $image['url']; ?> );" >
    <style>
        <?php
        if ( $image ){ ?>
            #block_number_<?= $GLOBALS["block_number"] ?>::after{
                background-image:url(<?= htmlspecialchars( $image['url'] ) ?>);
            }
        <?php } ?>

    </style>
    <a name="career_" id="career_position"></a>
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
            <span class="toAnimate line line-3">
                <?= htmlspecialchars( $line3rd[0] ) ?>
            </span>
            <?php endif; ?>
        </h2>

        <?php if ( get_field('text') ) : ?>
        <div class="desc toAnimate">
            <?php the_field('text'); ?>
        </div>
        <?php endif; ?>



        <?php
        $args = [
            'post_type'    => 'vacancy',
            'posts_per_page' => -1,//get_field('number_of_posts'),
            'order'        => 'ASC'
        ];

        $the_query = new WP_Query( $args );
        if ($the_query->have_posts() ) : ?>
            <div class="vacancies_block">
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <div class="one_vacancy" data-aos="fade-up" data-url="<?php the_permalink(); ?>">
                    <div class="vacancy_date"><?= get_the_date('d.m.Y') ?></div>
                    <div class="vacancy_title"><?php $title = the_title('', '', false); echo strtoupper($title); ?></div>
                    <div class="vacancy_excerpt"><?php the_excerpt(); ?></div>

                    <div class="buttons">
                        <a class="btn btn-outline-secondary" href="<?php the_permalink(); ?>">
                            <?php echo __('More information', 'understrap-dfrost'); ?>
                        </a>
                    </div>
                </div>
            <?php endwhile; ?>
            </div>

        <?php endif; ?>


    </div>
</section>
