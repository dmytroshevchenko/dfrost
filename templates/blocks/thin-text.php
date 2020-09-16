<section class="thin_text <?= get_field('large_margin') ? 'large_margin' : '' ?>"  id="block_number_<?= $GLOBALS["block_number"] ?>">
	<div class="container">
		<?php if( get_field('title') ){ ?>
			<div class="title">
				<?php the_field('title') ?>
			</div>
		<?php } ?>
		<div class="content">
			<?php the_field('content') ?>
		</div>
	</div>
</section>