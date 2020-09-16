<?php


$stories_html = '';


if( !get_field('custom_stories') ){

    $args = [
        'post_type'    => 'story',
        'posts_per_page' => get_field('number_of_posts'),
        'order'        => 'ASC'
    ];

    $the_query = new WP_Query( $args );
    if ($the_query->have_posts() ) :
    while ( $the_query->have_posts() ) : $the_query->the_post();
        $stories_html .= '<div class="story" onclick="location.href=`'.get_permalink().'`">
                            <figure>
                                <div class="story-image" style="background-image: url('.get_the_post_thumbnail_url().')"></div>
                            </figure>
                            <div class="story-header d-flex justify-content-between align-items-start">
                                <div class="story-title">'.get_the_title().'
                                </div>
                                <div class="story-type">'.wp_get_post_terms( get_the_ID(), 'story_cat', array('fields' => 'names') )[0].'
                                </div>
                            </div>
                        </div>';
    endwhile;
    endif;
} else{
    $stories = get_field('stories');
    foreach($stories as $story){

        if( $story['link_or_file'] == 'link' ){
            $story_link =  $story['link'];
        } else{
            $story_link =  $story['file']['url'];
        }



        $stories_html .= '<div class="story" onclick="location.href=`'.$story_link.'`">
                            <figure>
                                <div class="story-image" style="background-image: url('.$story['image']['url'].')"></div>
                            </figure>
                            <div class="story-header d-flex justify-content-between align-items-start">
                                <div class="story-title">'.$story['title'].'
                                </div>
                                <div class="story-type">'.$story['right_text'].'
                                </div>
                            </div>
                        </div>';
    }
}

?>
<section class="stories d-flex align-items-center" id="block_number_<?= $GLOBALS["block_number"] ?>">
        <?php if ( !get_field('full_screen') ){ ?>
        <div class="container">
            <div class="stories-header">
                <h2 class="heading">
                    <span class="toAnimate line line-1">
                        <?php the_field('line_1') ?>
                    </span>
                    <span class="toAnimate line line-2 line-2_fix15">
                        <?php the_field('line_2') ?>
                    </span>
                </h2>
            </div>
            <div class="stories-footer">
                <p class="description toAnimate">
                    <?php the_field('text'); ?>
                </p>
                <?php if ( get_field('btn_text') ) : ?>
                <div class="stories-btn">
                    <a class="btn btn-primary" href="<?php the_field('btn_link'); ?>">
                        <?php the_field('btn_text'); ?>
                    </a>
                </div>
                <?php endif; ?>
            </div>

            <div class="stories-carousel">
                <div class="owl-carousel">
                    <?= $stories_html; ?>
                </div>
            </div>

        </div>

        <?php } else{ ?>
        <div class="container-fluid">
            <div class="stories-carousel">
                <div class="owl-carousel single">
                    <?= $stories_html; ?>
                </div>
            </div>
        </div>
    <?php } ?>
</section>
