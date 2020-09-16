<?php
// Showing much more brands for the test
// @todo remove condition when going live

/*if ('demo' === 'demo') {
    include( __DIR__ . '/brands-demo.php');
    return;
}*/

$container = get_theme_mod( 'understrap_container_type' );
$itemsToShow = 32;
?>
<section class="brands" id="block_number_<?= $GLOBALS["block_number"] ?>">
    <div class="<?= $container ?>">
        <div class="brands-grid">
            <h3 class="heading">
                <span class="toAnimate line line-1"><?php the_field('line_1') ?></span>
                <span class="toAnimate line line-2"><?php the_field('line_2') ?></span>
            </h3>
            <?php
            $count = get_field('count');
            $index = 0;
            for ( $i = 0; $i < 32; $i++ ) :

                $gallery = get_field('brands');
                if ( $gallery ){

                    foreach( $gallery as $image ){ ?>
                        <?php if ( $count ) : ?>
                          <?php if ( $index < $count ): ?>
                            <div class="brand">
                                <figure><img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>" /></figure>
                            </div>
                          <?php endif; ?>
                        <?php else : ?>
                          <div class="brand">
                              <figure><img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>" /></figure>
                          </div>
                        <?php endif; ?>
                        <?php
                        $index++;
                    }

                } else {
//	                $itemsToShow = 1000;
                    $args = [
                        'post_type'      => 'brand',
                        'posts_per_page' => -1,
                        'orderby'          => 'rand()',
                    ];

                    $the_query = new WP_Query( $args );
                    if ($the_query->have_posts()) :
                        $counter = 0;
                        while ( $the_query->have_posts() ) :
                            $the_query->the_post();
//	                        if ( $index >= $itemsToShow ) break;
                        ?>
                            <div class="brand b17_3" data-id="<?= $index ?>">
                                <?php the_post_thumb(); ?>
                            </div>
                        <?php
                        $index++;
                        endwhile;
                    endif;
                    $the_query->rewind_posts();
                }

                if ( $index >= $itemsToShow ) break;
            endfor;
            ?>
        </div>
    </div>
</section>
