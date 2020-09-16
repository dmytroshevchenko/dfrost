<?php
$post_object = get_field('name-sliders');
if ($post_object) : ?>
<section class="box-sliders aos-init" data-aos="fade-up" id="block_number_<?= $GLOBALS["block_number"] ?>">
  <div class="box-slide-image box-slide-image_fix14">
    <?php
    foreach( $post_object as $post ):

        $counter = 0;
        foreach (get_field('slider', $post->ID) as $value) : ?>
      <div class="item <?php echo $value["color"] ?>">
        <div class="bg" style="background-image: url('<?php echo $value["banner"]["sizes"]["1536x1536"]; ?>');"></div>
        <div class="container">
          <div class="content">
            <?php echo $value["title-banner"]; ?>
            <?php if ( $value["title-blockquote"] ) : ?>
            <blockquote><?php echo $value["title-blockquote"]; ?></blockquote>
            <?php endif; ?>
            <?php if ( $value["btn"] ) : ?>
            <a href="<?php echo $value["btn"]; ?>">SHOW ME</a>
            <!--<a href="http://www.dfrost.dev.vi-arise.com/work/city-comfort/">SHOW ME</a>-->
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php
        if ($counter++ == 2) break;
        endforeach;

    endforeach;

    ?>
  </div>
</section>
<?php endif; ?>
