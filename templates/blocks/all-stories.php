<?php
$args = [
    'post_type'    => 'story',
    'posts_per_page' => get_field('number_of_posts'),
    'order'        => 'ASC'
];

$the_query = new WP_Query( $args );
if ($the_query->have_posts() ) :

$cats = get_terms( [
    'taxonomy' => 'story_cat',
    'hide_empty' => false,
] );


?>
<section class="all_stories d-flex align-items-center" id="block_number_<?= $GLOBALS["block_number"] ?>">
    <div class="container">

        <div class="title_cats">
            <div class="one_title_cat load_all ajax_load_cat selected" data-term_id="all"><?php echo __('Featured', 'understrap-dfrost'); ?></div>
            <div class="one_title_cat open_cats story_cat_button"><?php echo __('Category', 'understrap-dfrost'); ?></div>
        </div>

        <div class="selected_title_cats"></div>

        <div class="cats_list cats_list_fix11">
            <div class="close_button"><span class="icon-times-circle"></span></div>
            <?php foreach( $cats as $cat ){ ?>
                <div class="one_cat ajax_load_cat" data-taxonomy="story_cat" data-term_id="<?php echo $cat->term_id; ?>"><?php echo $cat->name; ?></div>
            <?php } ?>
        </div>
        <div class="masonry_grid 111"  data-aos="fade-up">
            <?php
                $i = 0;
                while ( $the_query->have_posts() ) :
                    $the_query->the_post();
                    echo one_story_template(get_the_ID());
                endwhile;
            ?>
        </div>
        <div class="latest-works-btn text-center">
            <a class="btn btn-outline-dark ajax_load_more" data-post_type="story" href="#"><?php echo __('More stories', 'understrap-dfrost'); ?></a>
        </div>
    </div>
</section>
<?php endif;
