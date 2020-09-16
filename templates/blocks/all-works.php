<?php
$args = [
    'post_type'    => 'work',
    'posts_per_page' => get_field('number_of_posts'),
    'order'        => 'ASC'
];

$the_query = new WP_Query( $args );
if ($the_query->have_posts() ) :

$cats = get_terms( [
    'taxonomy' => 'work_cat',
    'hide_empty' => false,
] );

$clients = get_terms( [
    'taxonomy' => 'work_client',
    'hide_empty' => false,
] );

?>
<section class="all_works d-flex align-items-center" id="block_number_<?= $GLOBALS["block_number"] ?>">
    <div class="container">

        <div class="title_cats title_cats_fix10">
            <div class="one_title_cat load_all ajax_load_cat selected" data-term_id="all"><?php echo __('Featured', 'understrap-dfrost'); ?></div>
            <div class="one_title_cat open_cats work_cat_button"><?php echo __('By category', 'understrap-dfrost'); ?></div>
            <div class="one_title_cat open_clients work_client_button"><?php echo __('By client', 'understrap-dfrost'); ?></div>
        </div>

        <div class="selected_title_cats"></div>

        <div class="cats_list cats_list_fix11">
            <div class="close_button"><span class="icon-times-circle"></span></div>
            <?php foreach( $cats as $cat ){ ?>
                <div class="one_cat ajax_load_cat" data-taxonomy="work_cat" data-term_id="<?php echo $cat->term_id; ?>"><?php echo $cat->name; ?></div>
            <?php } ?>
        </div>

        <div class="clients_list clients_list_fix11">
            <div class="close_button"><span class="icon-times-circle"></span></div>
            <?php foreach( $clients as $client ){ ?>
                <div class="one_cat ajax_load_cat" data-taxonomy="work_client" data-term_id="<?php echo $client->term_id; ?>"><?php echo $client->name; ?></div>
            <?php } ?>
        </div>
        <div class="masonry_grid">
            <?php while ( $the_query->have_posts() ) : $the_query->the_post();
            echo one_work_template(get_the_ID());
            endwhile; ?>
        </div>
        <div class="latest-works-btn text-center">
            <a class="btn btn-outline-dark ajax_load_more" step="0" data-post_type="work"  href="#"><?php echo __('More cases', 'understrap-dfrost'); ?></a>
        </div>
    </div>
</section>

<?php endif; ?>
