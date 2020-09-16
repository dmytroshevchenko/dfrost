<?php
// phpcs:ignoreFile
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
//show_admin_bar(false);
function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function add_theme_style( $name, $file, $dependencies = [] ) {
    $version = base_convert( filemtime( get_stylesheet_directory() . $file ), 10, 36 );
    wp_enqueue_style(
        $name,
        get_stylesheet_directory_uri() . $file,
        $dependencies,
        $version
    );
}

function add_theme_script( $name, $file = null, $dependencies = [] ) {
    if ( null === $file ) {
        wp_enqueue_script( $name );
        return;
    }
    $version = base_convert( filemtime( get_stylesheet_directory() . $file ), 10, 36 );
    wp_enqueue_script(
        $name,
        get_stylesheet_directory_uri() . $file,
        $dependencies,
        $version,
        true
    );
}

function theme_enqueue_styles() {
    add_theme_style( 'child-understrap-styles', '/assets/css/child-theme.min.css' );
    add_theme_style( 'slick-styles', '/assets/sass/theme/extra/slick.css' );
 	add_theme_style( 'style-css', '/style.css' );

    add_theme_script( 'jquery' );
    //add_theme_script( 'child-understrap-scripts', '/js/child-theme.min.js' );
    //add_theme_script( 'owl-carousel', '/js/owl.carousel.min.js' );
    wp_enqueue_script( 'marquee', 'http://cdn.jsdelivr.net/npm/jquery.marquee@1.5.0/jquery.marquee.min.js' );
    add_theme_script( 'slick', '/assets/js/slick.min.js' );
    add_theme_script( 'aos', '/assets/js/aos.js' );
    add_theme_script( 'masonry', '/assets/js/masonry.min.js' );
//    add_theme_script( 'magnify-mobile', '/assets/js/jquery.magnify-mobile.js' );
//    add_theme_script( 'magnify', '/assets/js/jquery.magnify.js' );
//    add_theme_script( 'glass-zoom', '/assets/js/glass-zoom.js' );
    //add_theme_script( 'bootstrap', '/js/bootstrap.min.js', [ 'jquery' ] );
    //add_theme_script( 'gsap', '/src/gsap/minified/gsap.min.js', [ 'jquery' ] );
    add_theme_script(
        'main-theme',
        '/assets/js/bundle/bundle.js',
        [ 'jquery' ]
    );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    add_theme_script( 'command-js', '/assets/js/command.js' );
}

function enqueue_gutenberg_styles()
{
    add_theme_style( 'child-understrap-gutenberg', '/assets/css/admin.min.css' );
}

add_action( 'enqueue_block_editor_assets', 'enqueue_gutenberg_styles');


function add_сategory_gutenberg_blocks($categories, $post)
{
    $categories = array_merge(
        [
            [
                'slug'  => 'dfrost_blocks',
                'title' => __('Dfrost blocks', 'understrap-dfrost'),
                'icon'  => 'wordpress',
            ],
        ],
        $categories
    );
    return $categories;
}

add_filter('block_categories', 'add_сategory_gutenberg_blocks', 10, 2);

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-dfrost', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );

function theme_editor_styles() {
    add_editor_style( 'editor-styles.css' );
}
add_theme_support( 'editor-styles' );
add_action( 'admin_init', 'theme_editor_styles' );

function smartwp_remove_wp_block_library_css() {
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
}
// add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css' );

function the_post_thumb($size = 'full') {
    if (function_exists('has_post_video') && has_post_video(get_the_ID())) {
        echo get_the_post_video(get_the_ID(), $size);
        return true;
    }
    $thumb_id = get_post_thumbnail_id(get_the_ID());
    $thumb_url = wp_get_attachment_image_src($thumb_id, $size, true);
    if (empty($thumb_url)) {
        return false;
    }
    echo '<figure><img src="' . $thumb_url[0] . '" alt="' . get_the_title() . '" /></figure>';
    return true;
}




function custom_excerpt_length( $length ) {
    return 23;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function change_excerpt( $text ){
    $pos = strrpos( $text, '[');
    if ($pos === false){
        return $text;
    }
    return rtrim (substr($text, 0, $pos) );
}
add_filter('get_the_excerpt', 'change_excerpt');


add_filter( 'post_type_link', 'stories_file_link', 10, 4 );
function stories_file_link( $post_link, $post, $leavename, $sample ){
    if( $post->post_type == 'story' ){
        if( get_field('download_only', $post->ID) ){
            $post_link = get_field('file', $post);
        }
    }
    return $post_link;
}

add_action('wp_footer', 'stories_close_button');
function stories_close_button() {
    $queried_object = get_queried_object();

    $parent_link = '';
    if( $queried_object->post_type == 'story' ){
        $parent_link = '/stories';
    } else if( $queried_object->post_type == 'work' ){
        $parent_link = '/works';
    }
    if ( $parent_link ){ ?>
        <div class="close_page_button close_page_button_vfix">
            <a href="<?= $parent_link; ?>">
                <div class="icon-black_close_button"></div>
            </a>
        </div>
    <?php }

}




@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );


require_once locate_template( 'inc/acf_reg_blocks.php' );
require_once locate_template( 'inc/post_types.php' );
require_once locate_template( 'inc/post_taxonomies.php' );
require_once locate_template( 'inc/ajax_loads.php' );
require_once locate_template( 'inc/send.php' );
require_once locate_template( 'templates/global-templates/single_templates_functions.php' );


// add_filter( 'render_block', 'wrap_classic_block', 10, 2 );
// function wrap_classic_block( $block_content, $block ) {
//   if ( null === $block['blockName'] && ! empty( $block_content ) && ! ctype_space( $block_content ) ) {
//     $block_content = '<section class="citation">' . $block_content . '</section>';
//   }
//   return $block_content;
// }


if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
	));


}
