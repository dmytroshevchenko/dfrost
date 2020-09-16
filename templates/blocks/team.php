<?php
$args = [
    'post_type'    => 'team',
    'posts_per_page' => 16,
    'orderby'        => 'rand'
];

$the_query = new WP_Query( $args );
if ($the_query->have_posts() ) :

?>



<section class="all_team_members d-flex align-items-center" id="block_number_<?= $GLOBALS["block_number"] ?>" data-aos="fade-up">
    <div class="container">

        <div class="masonry_grid_mob_slider">
            <?php
                $number = 1;
                while ( $the_query->have_posts() ) :
                    $the_query->the_post();

	                $bg_image_ratio = 1;
	                $bg_image = get_the_post_thumbnail_url();
	                if ($bg_image !== false) {
		                $bg_image_size = getimagesize($bg_image);
		                $bg_image_ratio = round($bg_image_size[0]/$bg_image_size[1], 1);
                    }

            ?>
            <div class="grid-item one-team_member one-team_member_item one-team_member_item_fix1" data-number="<?= $number ?>" data-ratio="<?= $bg_image_ratio ?>">
                <div class="one-team_member-image" style="background-image:url('<?php echo get_the_post_thumbnail_url(); ?>')"></div>
                <div class="team_member-content">
                    <div class="team_member-title">
                        <div class="team_member-title-title">
                            <?= get_the_title() ?>
                        </div>
                        <div class="team_member-cat">
                            <?php the_field('position', get_the_ID()); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ( $number == get_field('banner_position') ){ ?>
            <div class="grid-item one-team_member">
                <div class="one-team_member-image" style="background-image:url('<?php echo get_field('banner')['url']; ?>')"></div>
            </div>
            <?php } ?>

            <?php
                    $number++;
                endwhile;
            ?>
        </div>


    </div>
</section>

<script>
    const team_array = [];
        <?php


    $full_args = [
        'post_type' => 'team',
        'posts_per_page' => -1,
        'order' => 'ASC'
    ];

    $full_query = new WP_Query( $full_args );
    foreach($full_query->posts as $post){ ?>
        team_array.push({
            'image_url' : '<?= get_the_post_thumbnail_url($post->ID); ?>',
            'name' : '<?= $post->post_title; ?>',
            'position' : '<?php the_field('position', $post->ID); ?>'
        });
    <?php } ?>
    window.team_array = team_array
</script>


<?php endif; ?>
