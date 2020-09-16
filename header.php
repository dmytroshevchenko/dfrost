<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="/wp-content/themes/understrap-dfrost/assets/img/favicon.jpeg" type="image/x-icon">
    <link rel="icon" href="/wp-content/themes/understrap-dfrost/assets/img/favicon.jpeg" type="image/x-icon">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
    <meta name="format-detection" content="telephone=no">

    <meta property="og:image" content="<?php the_post_thumbnail_url() ?>" />
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

    <!-- ******************* The Navbar Area ******************* -->
    <div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

        <a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

        <nav class="navbar navbar-expand-xxl navbar-dark bg-primary" id="navbar">

        <?php if ( 'container' == $container ) : ?>
            <div class="container">
        <?php endif; ?>

                <div class="row">

                    <div class="menu-toggler col-3 col-md-4">
                        <button class="hamburger hamburger--elastic" type="button" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>" >
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>

                    <div class="site-logo col-6 col-md-4">
                        <!-- Your site title as branding in the menu -->
                        <?php if ( ! has_custom_logo() ) { ?>

                            <?php if ( is_front_page() && is_home() ) : ?>

                                <h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

                            <?php else : ?>

                                <a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>

                            <?php endif; ?>


                        <?php } else {

                            //the_custom_logo();

                            echo '<a class="navbar-brand custom-logo-link" rel="home" href="' . esc_url(home_url( '/' )) .
                                '" title="' . esc_attr(get_bloginfo('name', 'display')) . '" itemprop="url">' .
                                '<img width="114" height="34" src="/wp-content/themes/understrap-dfrost/assets/img/logo.svg" class="img-fluid">' .
                                '</a>';

                        } ?><!-- end custom logo -->
                    </div>

                    <div class="extra-menu col-3 col-md-4">
                        <div class="social-links d-none d-xl-inline-block mr-lg-4">
                            <?php get_template_part('templates/global-templates/social-links'); ?>
                        </div>
                        <div class="lang-nav">
                            <a class="btn btn-primary" href="/">EN</a>
                        </div>
                    </div>
                </div>

            <?php if ( 'container' == $container ) : ?>
            </div><!-- .container -->
            <?php endif; ?>

        </nav><!-- .site-navigation -->

        <!-- primary navigation -->
        <div id="headerNavDropdown" class="primary-nav">

            <!-- The WordPress Menu goes here -->
            <?php wp_nav_menu(
                array(
                    'theme_location'  => 'primary',
                    // 'container_class' => '',
                    // 'container_id'    => '',
                    'menu_class'      => 'navbar-nav',
                    'fallback_cb'     => '',
                    'menu_id'         => 'main-menu',
                    'depth'           => 2,
                    'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
                )
            ); ?>

            <!-- The WordPress Menu goes here -->
            <?php wp_nav_menu(
                array(
                    'theme_location'  => 'subprimary',
                    // 'container_class' => '',
                    // 'container_id'    => '',
                    'menu_class'      => 'navbar-nav',
                    'fallback_cb'     => '',
                    'menu_id'         => 'submain-menu',
                    'depth'           => 2,
                    'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
                )
            ); ?>

        </div>

    </div><!-- #wrapper-navbar end -->
