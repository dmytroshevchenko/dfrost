<?php
	$fields = get_fields();
	$background = get_field('background');

	$backgroundVideoFps = ($background['background_video_fps'] ?? 30) ?: 30;
	$backgroundVideoFrameHeight = ($background['background_video_frame_height'] ?? 1) ?: 1;
	$backgroundVideoSrc = isset($background['background_video']['url']) ? $background['background_video']['url'] : null;

	$slideDotVideoSyncConfigs = [];
?>

<section class="expertises">
	<div class="expertises__scrollmagic">
		<div class="expertises__video-container">
			<?php if ($backgroundVideoSrc) : ?>
			<video class="expertises__video" data-video-fps="<?= $backgroundVideoFps ?>" data-video-frame-height="<?= $backgroundVideoFrameHeight ?>" muted playsinline preload="auto">
				<source src="<?= $backgroundVideoSrc; ?>" type="video/mp4">
			</video>
			<?php endif; ?>
		</div>

		<div class="expertises__overlay">
			<div class="expertises__container">
			<?php
				if( have_rows('animation_sequence') ):
					while( have_rows('animation_sequence') ): the_row();
						$animationConfig = get_sub_field('animation_config');

						$videoSyncConfig = [
							'enter' => isset($animationConfig['enter']) ? (float)$animationConfig['enter'] : 0,
							'leave' => isset($animationConfig['leave']) ? (float)$animationConfig['leave'] : 0,
						];
						$videoSyncConfigJson = json_encode($videoSyncConfig);
						$videoSyncConfigAttr = htmlspecialchars($videoSyncConfigJson, ENT_QUOTES, 'UTF-8');

						$slideDotVideoSyncConfigs[] = $videoSyncConfigAttr;

						if( have_rows('element') ):
							while( have_rows('element') ): the_row();
								switch (get_row_layout()) :
									case 'flipper-heading':
									?>
										<div class="expertises__flipper-heading container flipper-heading video-sync" data-video-sync="<?= $videoSyncConfigAttr ?>">
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
													<?= get_sub_field('text') ?>
												</div>
											<?php endif; ?>
										</div>

										<?php
										break;
									case 'text-block':
			?>

									<div class="expertises__text video-sync" data-video-sync="<?= $videoSyncConfigAttr ?>">
										<h2 class="expertises__heading"><?= get_sub_field('heading'); ?></h2>

										<div class="expertises__description"><?= get_sub_field('text'); ?></div>

										<?php if( get_sub_field('button') && get_sub_field('button')['url'] ): ?>
										<div class="buttons" data-aos="fade-up" data-aos-delay="<?= $delay += 200 ?>">
											<a class="btn btn-outline-secondary" href="<?= get_sub_field('button')['url'] ?>" target="<?= get_sub_field('button')['target'] ?>">
												<?= get_sub_field('button')['title'] ?>
											</a>
										</div>
										<?php endif ?>
									</div>

			<?php
									break;
								endswitch;
							endwhile;
						endif;
					endwhile;
				endif;
			?>
			</div>

			<div class="expertises__scroll-dots">
			<?php
				foreach ($slideDotVideoSyncConfigs as $slideDotVideoSyncConfig) :
			?>
					<span class="expertises__scroll-dot video-sync" data-video-sync="<?= $slideDotVideoSyncConfig ?>"></span>
			<?php
				endforeach;
			?>
			</div>
		</div>
	</div>

	<div class="expertises__spacer"></div>
</section>
