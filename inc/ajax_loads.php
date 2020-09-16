<?php



add_action('wp_ajax_ajax_load_items' , 'ajax_load_items');
add_action('wp_ajax_nopriv_ajax_load_items','ajax_load_items');
function ajax_load_items(){

	$post_type = $_POST['post_type'];
	$taxonomies = $_POST['taxonomy'];
	$term_ids = $_POST['term_id'];
	$load = $_POST['load'];

	if ( $load == 'term' ){
		$offset = 0;
	} else {
		$offset = $_POST['loaded_number'];
	}
	$numberposts = 9;

	$args = array(
		'posts_per_page' => -1,
		'numberposts' => -1,
		'post_type' => $post_type,
	);


	$tax_query = array();
	foreach($taxonomies as $key => $taxonomy){
		$term_id = $term_ids[$key];
		if( $taxonomy && $term_id ){
			$tax_query[] = array(
				'taxonomy' => $taxonomy,
				'field'    => 'id',
				'terms'    => $term_id
			);
		}
	}
	if( !empty( $tax_query ) ){
		$args['tax_query'] = $tax_query;
	}

	$all_posts = get_posts( $args );
	$args['posts_per_page'] = $numberposts;
	$args['numberposts'] = $numberposts;
	$args['offset'] = $offset;

	$posts = get_posts( $args );

	$html = '';
	foreach( $posts as $post ){
		if( $post_type == 'work' ){
			$html .= one_work_template($post->ID);
		} else if( $post_type == 'story' ){
			$html .= one_story_template($post->ID);
		}
	}

	if( count($all_posts) - $offset > $numberposts ){
		$hide_button = false;
	} else{
		$hide_button = true;
	}


	wp_send_json_success( array(
		'success' => 1,
		'post' => $_POST,
		'html' => $html,
		'hide_button' => $hide_button,
	) );


}





?>