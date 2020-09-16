<?php


add_action('init', 'create_post_types');
function create_post_types(){
	register_post_type('story', array(
		'labels'             => array(
			'name'               => 'Stories', // Основное название типа записи
			'singular_name'      => 'Story', // отдельное название записи типа Book
			'add_new'            => 'Add new',
			'add_new_item'       => 'Add new story',
			'edit_item'          => 'Edit story',
			'new_item'           => 'New story',
			'view_item'          => 'View story',
			'search_items'       => 'Search story',
			'not_found'          =>  'Not stories found',
			'not_found_in_trash' => 'Not stories found in trash',
			'parent_item_colon'  => '',
			'menu_name'          => 'Stories'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title','editor','author','thumbnail', 'excerpt'),
		'menu_icon'			 => 'dashicons-book',
		'show_in_rest'		 => true,
		'taxonomies'		 => ['story_cat']
	) );



	register_post_type('person', array(
		'labels'             => array(
			'name'               => 'Persons', // Основное название типа записи
			'singular_name'      => 'Person', // отдельное название записи типа Book
			'add_new'            => 'Add new',
			'add_new_item'       => 'Add new person',
			'edit_item'          => 'Edit person',
			'new_item'           => 'New person',
			'view_item'          => 'View person',
			'search_items'       => 'Search person',
			'not_found'          =>  'Not persons found',
			'not_found_in_trash' => 'Not persons found in trash',
			'parent_item_colon'  => '',
			'menu_name'          => 'Persons'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title','editor','author','thumbnail'),
		'menu_icon'			 => 'dashicons-groups',
		'show_in_rest'		 => true
	) );


	register_post_type('team', array(
		'labels'             => array(
			'name'               => 'Team', // Основное название типа записи
			'singular_name'      => 'Team member', // отдельное название записи типа Book
			'add_new'            => 'Add new',
			'add_new_item'       => 'Add new member',
			'edit_item'          => 'Edit member',
			'new_item'           => 'New member',
			'view_item'          => 'View member',
			'search_items'       => 'Search member',
			'not_found'          =>  'Not members found',
			'not_found_in_trash' => 'Not members found in trash',
			'parent_item_colon'  => '',
			'menu_name'          => 'Team'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title','editor','author','thumbnail'),
		'menu_icon'			 => 'dashicons-groups',
		'show_in_rest'		 => true
	) );
    
    register_post_type('sliders', array(
		'labels'             => array(
			'name'               => 'Sliders', // Основное название типа записи
			'singular_name'      => 'Sliders', // отдельное название записи типа Book
			'add_new'            => 'Add new',
			'add_new_item'       => 'Add new sliders',
			'edit_item'          => 'Edit sliders',
			'new_item'           => 'New sliders',
			'view_item'          => 'View sliders',
			'search_items'       => 'Search sliders',
			'not_found'          =>  'Not sliders found',
			'not_found_in_trash' => 'Not sliders found in trash',
			'parent_item_colon'  => '',
			'menu_name'          => 'Sliders'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title'),
		'menu_icon'			 => 'dashicons-images-alt',
		'show_in_rest'		 => true
	) );


	register_post_type('vacancy', array(
		'labels'             => array(
			'name'               => 'Vacancies', // Основное название типа записи
			'singular_name'      => 'Vacancy', // отдельное название записи типа Book
			'add_new'            => 'Add new',
			'add_new_item'       => 'Add new vacancy',
			'edit_item'          => 'Edit vacancy',
			'new_item'           => 'New vacancy',
			'view_item'          => 'View vacancy',
			'search_items'       => 'Search vacancy',
			'not_found'          =>  'Not vacancies found',
			'not_found_in_trash' => 'Not vacancies found in trash',
			'parent_item_colon'  => '',
			'menu_name'          => 'Vacancies'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title','editor','author','excerpt', 'thumbnail'),
		'menu_icon'			 => 'dashicons-groups',
		'show_in_rest'		 => true
	) );


	register_post_type('work', array(
		'labels'             => array(
			'name'               => 'Works', // Основное название типа записи
			'singular_name'      => 'Work', // отдельное название записи типа Book
			'add_new'            => 'Add new',
			'add_new_item'       => 'Add new work',
			'edit_item'          => 'Edit work',
			'new_item'           => 'New work',
			'view_item'          => 'View work',
			'search_items'       => 'Search work',
			'not_found'          =>  'Not works found',
			'not_found_in_trash' => 'Not works found in trash',
			'parent_item_colon'  => '',
			'menu_name'          => 'Works'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title','editor','author','thumbnail'),
		'menu_icon'			 => 'dashicons-laptop',
		'show_in_rest'		 => true
	) );



	register_post_type('brand', array(
		'labels'             => array(
			'name'               => 'Brands', // Основное название типа записи
			'singular_name'      => 'Brand', // отдельное название записи типа Book
			'add_new'            => 'Add new',
			'add_new_item'       => 'Add new brand',
			'edit_item'          => 'Edit brand',
			'new_item'           => 'New brand',
			'view_item'          => 'View brand',
			'search_items'       => 'Search brand',
			'not_found'          =>  'Not brands found',
			'not_found_in_trash' => 'Not brands found in trash',
			'parent_item_colon'  => '',
			'menu_name'          => 'Brands'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title','editor','author','thumbnail'),
		'menu_icon'			 => 'dashicons-smiley',
		'show_in_rest'		 => true
	) );


}




?>