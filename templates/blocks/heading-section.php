<?php
$background = get_field('background');

$additionalSectionAttributes = '';

if (isset($background['color'])) {
	$additionalSectionAttributes .= ' style="background-color: ' . htmlspecialchars( $background['color'] ) . ';"';
}
?>

<section class="heading-section" id="block_number_<?= $GLOBALS["block_number"] ?>"<?= $additionalSectionAttributes ?>>

	<div class="container">
		<h1 class="heading">
			<span class="toAnimate line line-1">
				<?php the_field('super_line'); ?>
			</span>
			<span class="toAnimate line line-2">
				<?php the_field('flipper_line'); ?>
			</span>
			<span class="toAnimate line line-3">
				<?php the_field('static_line'); ?>
			</span>
		</h1>
	</div>

</section>
