<?php
$args = [
    'post_type'    => 'story',
    'posts_per_page' => -1,
];

$the_query = new WP_Query( $args ); ?>



<section class="press"  id="block_number_<?= $GLOBALS["block_number"] ?>">
	<div class="container">
		<div class="press_block">
		<?php
		while ( $the_query->have_posts() ) : $the_query->the_post();
            echo one_story_template(get_the_ID(), true);
    	endwhile; ?>
    	</div>
	</div>
</section>
