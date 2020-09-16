<?php

add_action('acf/init', 'my_acf_init');

function my_acf_init() {
	
	if( function_exists('acf_register_block') ) {
		// register blocks
		acf_register_block(array(
			'name'              => 'main-video',
			'title'             => __('Main video'),
			'description'       => __('Main video'),
			'render_callback'   => 'custom_block_render_callback',
			'category'          => 'dfrost',
			'icon'              => 'editor-contract',
			'keywords'          => array( 'home' ),
		));

		acf_register_block(array(
			'name'              => 'quote',
			'title'             => __('Quote'),
			'description'       => __('Quote. paste html'),
			'render_callback'   => 'custom_block_render_callback',
			'category'          => 'dfrost',
			'icon'              => 'editor-contract',
			'keywords'          => array( 'quote' ),
		));

		acf_register_block(array(
			'name'              => 'works',
			'title'             => __('Last works'),
			'description'       => __('Last works'),
			'render_callback'   => 'custom_block_render_callback',
			'category'          => 'dfrost',
			'icon'              => 'editor-contract',
			'keywords'          => array( 'works' ),
		));

		acf_register_block(array(
			'name'              => 'text-with-bg',
			'title'             => __('Info with Background'),
			'description'       => __('Info with Background'),
			'render_callback'   => 'custom_block_render_callback',
			'category'          => 'dfrost',
			'icon'              => 'editor-contract',
			'keywords'          => array( 'info', 'text_with_bg' ),
		));

		acf_register_block(array(
			'name'              => 'stories',
			'title'             => __('Stories'),
			'description'       => __('Stories'),
			'render_callback'   => 'custom_block_render_callback',
			'category'          => 'dfrost',
			'icon'              => 'editor-contract',
			'keywords'          => array( 'stories' ),
		));

		acf_register_block(array(
			'name'              => 'subscribe',
			'title'             => __('Subscribe'),
			'description'       => __('Subscribe'),
			'render_callback'   => 'custom_block_render_callback',
			'category'          => 'dfrost',
			'icon'              => 'editor-contract',
			'keywords'          => array( 'subscribe' ),
		));

		acf_register_block(array(
			'name'              => 'brands',
			'title'             => __('Brands'),
			'description'       => __('Brands'),
			'render_callback'   => 'custom_block_render_callback',
			'category'          => 'dfrost',
			'icon'              => 'editor-contract',
			'keywords'          => array( 'brands' ),
		));

		acf_register_block(array(
			'name'              => 'contact-us',
			'title'             => __('Contact us'),
			'description'       => __('Contact us'),
			'render_callback'   => 'custom_block_render_callback',
			'category'          => 'dfrost',
			'icon'              => 'editor-contract',
			'keywords'          => array( 'contact us' ),
		));

		acf_register_block(array(
			'name'              => 'scrolltop',
			'title'             => __('Scroll top'),
			'description'       => __('Scroll top'),
			'render_callback'   => 'custom_block_render_callback',
			'category'          => 'dfrost',
			'icon'              => 'editor-contract',
			'keywords'          => array( 'scrolltop' ),
		));

		acf_register_block(array(
			'name'              => 'all-stories',
			'title'             => __('All stories'),
			'description'       => __('All stories'),
			'render_callback'   => 'custom_block_render_callback',
			'category'          => 'dfrost',
			'icon'              => 'editor-contract',
			'keywords'          => array( 'all-stories' ),
		));

		acf_register_block(array(
			'name'              => 'all-works',
			'title'             => __('All works'),
			'description'       => __('All works'),
			'render_callback'   => 'custom_block_render_callback',
			'category'          => 'dfrost',
			'icon'              => 'editor-contract',
			'keywords'          => array( 'all-works' ),
		));

		acf_register_block(array(
			'name'              => 'team',
			'title'             => __('Team'),
			'description'       => __('Team'),
			'render_callback'   => 'custom_block_render_callback',
			'category'          => 'dfrost',
			'icon'              => 'editor-contract',
			'keywords'          => array( 'team' ),
		));

		acf_register_block(array(
			'name'              => 'vacancies',
			'title'             => __('Vacancies'),
			'description'       => __('Vacancies'),
			'render_callback'   => 'custom_block_render_callback',
			'category'          => 'dfrost',
			'icon'              => 'editor-contract',
			'keywords'          => array( 'vacancies' ),
		));

		acf_register_block(array(
			'name'              => 'thin-text',
			'title'             => __('Thin text'),
			'description'       => __('Thin text'),
			'render_callback'   => 'custom_block_render_callback',
			'category'          => 'dfrost',
			'icon'              => 'editor-contract',
			'keywords'          => array( 'Thin text' ),
		));

		acf_register_block(array(
			'name'              => 'wide-slider',
			'title'             => __('Wide slider'),
			'description'       => __('Wide slider'),
			'render_callback'   => 'custom_block_render_callback',
			'category'          => 'dfrost',
			'icon'              => 'editor-contract',
			'keywords'          => array( 'Wide slider' ),
		));

		acf_register_block(array(
			'name'              => 'small-contacts',
			'title'             => __('Small contacts'),
			'description'       => __('Small contacts'),
			'render_callback'   => 'custom_block_render_callback',
			'category'          => 'dfrost',
			'icon'              => 'editor-contract',
			'keywords'          => array( 'Small contacts' ),
		));

		acf_register_block(array(
			'name'              => 'gallery',
			'title'             => __('Gallery'),
			'description'       => __('Gallery'),
			'render_callback'   => 'custom_block_render_callback',
			'category'          => 'dfrost',
			'icon'              => 'editor-contract',
			'keywords'          => array( 'Gallery' ),
		));

		acf_register_block(array(
			'name'              => 'two-col-gallery',
			'title'             => __('Two col gallery'),
			'description'       => __('Two col gallery'),
			'render_callback'   => 'custom_block_render_callback',
			'category'          => 'dfrost',
			'icon'              => 'editor-contract',
			'keywords'          => array( 'Two col gallery' ),
		));

		acf_register_block(array(
			'name'              => 'press',
			'title'             => __('Press'),
			'description'       => __('Press'),
			'render_callback'   => 'custom_block_render_callback',
			'category'          => 'dfrost',
			'icon'              => 'editor-contract',
			'keywords'          => array( 'Press' ),
		));

		acf_register_block(array(
			'name'              => 'expertise',
			'title'             => __('Expertise'),
			'description'       => __('Expertise'),
			'render_callback'   => 'custom_block_render_callback',
			'category'          => 'dfrost',
			'icon'              => 'editor-contract',
			'keywords'          => array( 'Expertise' ),
		));

		acf_register_block(array(
			'name'              => 'big-image',
			'title'             => __('Big image'),
			'description'       => __('Big image'),
			'render_callback'   => 'custom_block_render_callback',
			'category'          => 'dfrost',
			'icon'              => 'editor-contract',
			'keywords'          => array( 'Big image' ),
		));
        
        acf_register_block(array(
			'name'              => 'box-slide-image',
			'title'             => __('slide image'),
			'description'       => __('slide image'),
			'render_callback'   => 'custom_block_render_callback',
			'category'          => 'dfrost',
			'icon'              => 'editor-contract',
			'keywords'          => array( 'Slide image' ),
		));

		acf_register_block(array(
			'name'              => 'big-counts',
			'title'             => __('Big counts'),
			'description'       => __('Big counts'),
			'render_callback'   => 'custom_block_render_callback',
			'category'          => 'dfrost',
			'icon'              => 'editor-contract',
			'keywords'          => array( 'Big counts' ),
		));

		acf_register_block(array(
			'name'              => 'fixed-background',
			'title'             => __('Fixed background'),
			'description'       => __('Fixed background'),
			'render_callback'   => 'custom_block_render_callback',
			'category'          => 'dfrost',
			'icon'              => 'editor-contract',
			'keywords'          => array( 'Fixed background' ),
		));

		acf_register_block(array(
			'name'              => 'contacts-page',
			'title'             => __('Contacts page'),
			'description'       => __('Contacts page'),
			'render_callback'   => 'custom_block_render_callback',
			'category'          => 'dfrost',
			'icon'              => 'editor-contract',
			'keywords'          => array( 'Contacts page' ),
		));

		acf_register_block(array(
			'name'              => 'map',
			'title'             => __('Map'),
			'description'       => __('Map'),
			'render_callback'   => 'custom_block_render_callback',
			'category'          => 'dfrost',
			'icon'              => 'editor-contract',
			'keywords'          => array( 'Map' ),
		));

		acf_register_block(array(
			'name'              => 'text',
			'title'             => __('Text'),
			'description'       => __('Text'),
			'render_callback'   => 'custom_block_render_callback',
			'category'          => 'dfrost',
			'icon'              => 'editor-contract',
			'keywords'          => array( 'Text' ),
		));

		acf_register_block(array(
			'name'              => 'share-button',
			'title'             => __('Share button'),
			'description'       => __('Share button'),
			'render_callback'   => 'custom_block_render_callback',
			'category'          => 'dfrost',
			'icon'              => 'editor-contract',
			'keywords'          => array( 'Share button' ),
		));

		acf_register_block(array(
			'name'              => 'scroll-next-button',
			'title'             => __('Scroll next button'),
			'description'       => __('Scroll next button'),
			'render_callback'   => 'custom_block_render_callback',
			'category'          => 'dfrost',
			'icon'              => 'editor-contract',
			'keywords'          => array( 'Scroll next button' ),
		));

		acf_register_block(array(
			'name'              => 'heading-section',
			'title'             => __('Heading Section'),
			'description'       => __('Heading Section'),
			'render_callback'   => 'custom_block_render_callback',
			'category'          => 'dfrost',
			'icon'              => 'editor-contract',
			'keywords'          => array( 'Heading', 'Section' ),
		));

		acf_register_block(array(
			'name'              => 'press-downloads',
			'title'             => __('Press downloads'),
			'description'       => __('Press downloads'),
			'render_callback'   => 'custom_block_render_callback',
			'category'          => 'dfrost',
			'icon'              => 'editor-contract',
			'keywords'          => array( 'Press downloads' ),
		));




		
	}
}

function custom_block_render_callback( $block ) {
	$slug = str_replace( 'acf/', '', $block['name'] );

	if( file_exists( STYLESHEETPATH . "/templates/blocks/{$slug}.php" ) ) {
		$GLOBALS["block_number"]++;
		include( STYLESHEETPATH . "/templates/blocks/{$slug}.php" );
	}
}




function dfrost_block_categories( $categories, $post ) {

    return array_merge(
        array(
            array(
                'slug' => 'dfrost',
                'title' => __( 'DFrost' ),
                'icon'  => 'wordpress',
            ),
        ),
        $categories
    );
}
add_filter( 'block_categories', 'dfrost_block_categories', 3, 2 );