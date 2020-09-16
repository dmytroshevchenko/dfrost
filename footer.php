<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap-dfrost
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$container = get_theme_mod('understrap_container_type');
?>

<?php get_template_part('sidebar-templates/sidebar', 'footerfull'); ?>

<footer class="wrapper" id="wrapper-footer">

    <div class="<?php echo esc_attr($container); ?>">

        <div class="social-links" data-aos="fade-down">
            <?php get_template_part('templates/global-templates/social-links'); ?>
        </div>
        <p class="label toAnimate label_fix8">
            The brand companions
        </p>

        <div class="row footer_bottom_row">
            <div class="col-10 offset-1 col-sm-6 offset-sm-0 col-lg-3 order-1 order-sm-2 order-lg-1 subscribe">
                <div class="row">
                    <div class="d-sm-none col-lg-10 col-md-10 col-sm-10" id="footer-subscribe-form">
                        <?php get_template_part('templates/global-templates/subscribe', 'form'); ?>
                    </div>
                </div>

                <a class="d-none d-sm-block m-0" href="#subscribe" data-subscribe-toggle="#footer-subscribe-form">
                    Subscribe to our newsletter
                </a>
            </div>
            <div class="col-lg-6 order-2 order-sm-1 order-lg-2 footer-menu">
                <?php wp_nav_menu(
                    array(
                        'theme_location'  => 'footer',
                        'container_class' => '',
                        'container_id'    => 'footerNavDropdown',
                        'menu_class'      => 'navbar-nav',
                        'fallback_cb'     => '',
                        'menu_id'         => 'footer-menu',
                        'depth'           => 1,
                        'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
                    )
                ); ?>
            </div>
            <div class="col-sm-6 col-lg-3 order-3 copyright">
                <p class="m-0">Copyright <?php echo date('Y') ?> Dfrost</p>
            </div>
        </div>

    </div><!-- container end -->

</footer><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

<script>

window.addEventListener( 'load', function() {
    var box = document.querySelector('.fullscreen-hero video');
    var docHeight = document.documentElement.offsetHeight;
    if ( box ){
        window.addEventListener( 'scroll', function() {
        // normalize scroll position as percentage
        var scrolled = 1 + (5 * window.scrollY / ( docHeight - window.innerHeight )),
        transformValue = 'scale('+scrolled+')';
        box.style.WebkitTransform = transformValue;
        box.style.MozTransform = transformValue;
        box.style.OTransform = transformValue;
        box.style.transform = transformValue;
      }, false);
    }
}, false);

jQuery( document ).ready(function($) {


    Object.defineProperty(HTMLMediaElement.prototype, 'playing', {
        get: function () {
            return !!(this.currentTime > 0 && !this.paused && !this.ended && this.readyState > 2);
        }
    });
    jQuery('body').on('click touchstart', function () {
        //const videoElement = document.getElementById('videoPlayer');
        const videoElement = jQuery('#videoPlayer');
        if ( videoElement.length ){
            if (videoElement.playing) {
                // video is already playing so do nothing
            }
            else {
                // video is not playing
                // so play video now
                videoElement.play();
            }
        }
    });
});
</script>

<style>
main#main {
    max-width: 100%;
    overflow: hidden;
}
.fullscreen-hero {
    overflow: hidden;
    max-height: 100vh;
}
</style>

</html>

