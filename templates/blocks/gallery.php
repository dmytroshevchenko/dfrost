<?php
$container = get_theme_mod('understrap_container_type');

$gallery = get_field('gallery');
if ( $gallery ) :
?>
<section class="latest-works" id="block_number_<?= $GLOBALS["block_number"] ?>" >
    <div class="<?= $container ?>">
        <div class="works-grid gallery">
            <?php foreach( $gallery as $image ){ ?>
            <div class="work" data-aos="fade-up">
                <div class="work-image">
                    <div class="work-image-image" style="background-image:url('<?= $image['url']; ?>')"></div>
                </div>
            </div>


            <?php } ?>
        </div>
    </div>
</section>
<?php endif; ?>