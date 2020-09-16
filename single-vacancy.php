<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<section class="single_page" style="background-image:url(<?php the_post_thumbnail_url(); ?>)">
	<div class="container">

		<div class="little_container">

			<div class="close_page_button"><!--close_vacancy_button-->
				<a href="/team">
			        <!--<i class="icon-cancel-circle"></i>-->
                    <div class="icon-black_close_button"></div>
			    </a>
			</div>

			<h1 class="post_title"><?php the_title(); ?></h1>
			<div class="post_content" data-aos="fade-up">
				<?php the_content(); ?>
			</div>


			<form class="contact_form contact_form_fix12" method="post" action="" enctype="multipart/form-data" data-aos="fade-up">

                <div class="inputs">
                    <div class="left_inputs">
                        <div class="contact_form_input_title"><?= __('Name'); ?></div>
                        <div class="contact_form_input_block">
                            <input type="text" name="your_name">
                        </div>
                        <div class="contact_form_input_title"><?= __('E-mail address'); ?></div>
                        <div class="contact_form_input_block">
                            <input type="text" name="email">
                        </div>
                    </div>
                    <div class="right_inputs">
                        <div class="contact_form_input_title"><?= __('DOCUMENTS (MAX. 5MB PER FILE)'); ?></div>
                        <label for="fileInput" id="dropContainer" class="dropContainer">
                            <div class="dropContainer_content">
                                <p><img src="<?= get_stylesheet_directory_uri().'/assets/img/drag_file.png'; ?>"></p>
                                <p><?= __('DRAG & DROP'); ?></p>
                                <p><?= __('YOUR FILES'); ?></p>
                            </div>
                            <input type="file" id="fileInput" name="cv_file" />
                        </label>
                    </div>
                </div>

                <div class="agreement">
                    <input class="agreement-checkbox" id="agreement-checkbox" type="checkbox" name="agreement" />
                    <label for="agreement-checkbox">
											<div class="">
												<?php the_field('agreement-checkbox','option'); ?>
											</div>
										</label>

                    <div class="contact_form_btn_block">
                        <button type="submit" class="btn btn-outline-secondary"><?= __('Apply now') ?></button>
                    </div>

                </div>

	            <input type="hidden" name="form_type" value="vacancy">
	            <input type="hidden" name="form_title" value="Vacancy <?php the_title(); ?>">
			</form>





			<section class="small-contacts" data-aos="fade-up">
				<h2 class="title"><?php the_field('contacts_title'); ?></h2>
				<div class="subtitle"><?php the_field('contacts_subtitle'); ?></div>
				<?php if( get_field('contacts_image') ){ ?>
				    <div class="image" style="background-image:url(<?= get_field('contacts_image')['url']; ?>)"></div>
				<?php } ?>
				<div class="name"><?php the_field('contacts_name'); ?></div>
				<div class="text"><?php the_field('contacts_text'); ?></div>
			</section>




		</div>
	</div>
</section>



<div class="popup_bg popup_contact_bg">
    <div class="popup">
        <div class="close_button close_popup_button">
            <i class="icon-cancel-circle"></i>
        </div>
        <div class="popup_title"><?= __('Thanks for your application.') ?></div>
        <div class="popup_content"><?= __('We will get back to you shortly. Your Brand Companions.') ?></div>
        </div>
    </div>
</div>



<?php endwhile; else : ?>
	<p>ERROR</p>
<?php endif; ?>
<?php get_footer(); ?>
