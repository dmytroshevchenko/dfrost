<?php




add_action( 'init', 'create_taxonomies' );
function create_taxonomies(){

	register_taxonomy( 'story_cat', [ 'story' ], [ 
		'label'                 => '',
		'labels'                => [
			'name'              => 'Categories',
			'singular_name'     => 'Category',
			'search_items'      => 'Search category',
			'all_items'         => 'All categories',
			'view_item '        => 'View category',
			'parent_item'       => 'Parent category',
			'parent_item_colon' => 'Parent category:',
			'edit_item'         => 'Edit category',
			'update_item'       => 'Update category',
			'add_new_item'      => 'Add New category',
			'new_item_name'     => 'New category name',
			'menu_name'         => 'Story category',
		],
		'public'                => true,
		'hierarchical'          => true,
		'rewrite'               => true,
		'capabilities'          => array(),
		'meta_box_cb'           => null,
		'show_admin_column'     => false,
		'show_in_rest'          => null,
		'rest_base'             => null,
	] );


	register_taxonomy( 'work_cat', [ 'work' ], [ 
		'label'                 => '',
		'labels'                => [
			'name'              => 'Categories',
			'singular_name'     => 'Category',
			'search_items'      => 'Search category',
			'all_items'         => 'All categories',
			'view_item '        => 'View category',
			'parent_item'       => 'Parent category',
			'parent_item_colon' => 'Parent category:',
			'edit_item'         => 'Edit category',
			'update_item'       => 'Update category',
			'add_new_item'      => 'Add New category',
			'new_item_name'     => 'New category name',
			'menu_name'         => 'Work category',
		],
		'public'                => true,
		'hierarchical'          => true,
		'rewrite'               => true,
		'capabilities'          => array(),
		'meta_box_cb'           => null,
		'show_admin_column'     => false,
		'show_in_rest'          => null,
		'rest_base'             => null,
	] );


	register_taxonomy( 'work_client', [ 'work' ], [ 
		'label'                 => '',
		'labels'                => [
			'name'              => 'Clients',
			'singular_name'     => 'Client',
			'search_items'      => 'Search client',
			'all_items'         => 'All clients',
			'view_item '        => 'View client',
			'parent_item'       => 'Parent client',
			'parent_item_colon' => 'Parent client:',
			'edit_item'         => 'Edit client',
			'update_item'       => 'Update client',
			'add_new_item'      => 'Add New client',
			'new_item_name'     => 'New client name',
			'menu_name'         => 'Work clients',
		],
		'public'                => true,
		'hierarchical'          => true,
		'rewrite'               => true,
		'capabilities'          => array(),
		'meta_box_cb'           => null,
		'show_admin_column'     => false,
		'show_in_rest'          => null,
		'rest_base'             => null,
	] );

}


?>