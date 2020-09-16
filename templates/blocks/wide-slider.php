<style media="screen">
  .info .story figure {
    max-width: 100% !important;
  }
</style>

<?php if( have_rows('slides') ): ?>

<section class="info no-before d-flex align-items-center" id="block_number_<?= $GLOBALS["block_number"] ?>">
        <div class="container-fluid">
            <div class="stories-carousel <?= get_field('black')? 'black' : '' ?>">
                <div class="owl-carousel single">

					<?php while ( have_rows('slides') ) : the_row(); ?>


                    <div class="story">
                        <figure>
                            <div class="story-image wide" style="background-image: url('<?= get_sub_field('image')['url']; ?>')">
                            	<div class="container">
									<h2 class="heading">
									    <?php
									    $line1st = explode("|", get_sub_field('line_1') );
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
									    $line2nd = explode("|", get_sub_field('line_2') );
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
									    $line3rd = explode("|", get_sub_field('line_3') );
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

									<?php if ( get_sub_field('text') ) : ?>
									<div class="desc toAnimate">
									    <?= nl2br( htmlspecialchars( get_sub_field('text') ) ) ?>
									</div>
									<?php endif; ?>

									<?php if ( get_sub_field('btn_text') ) : ?>
									<div class="buttons" data-aos="fade-up" data-aos-delay="<?= $delay += 200 ?>">
									    <a class="btn btn-outline-secondary" href="<?php the_sub_field('btn_link'); ?>">
									        <?php the_sub_field('btn_text'); ?>
									    </a>
									</div>
									<?php endif; ?>
								</div>

                            </div>
                        </figure>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
</section>
<?php endif; ?>
