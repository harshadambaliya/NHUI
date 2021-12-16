<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php 

    // WordPress 5.2 wp_body_open implementation
    if ( function_exists( 'wp_body_open' ) ) {
        wp_body_open();
    } else {
        do_action( 'wp_body_open' );
    }

?>

<div id="page" class="site">
    <?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
	<header id="mastheader" class="site-header navbar-static-top" role="banner">
        <div class="container">
            <nav class="navbar navbar-expand-xl p-0">
                <div class="navbar-brand">
                    <?php if ( get_theme_mod( 'wp_bootstrap_starter_logo' ) ): ?>
                        <a href="<?php echo esc_url( home_url( '/' )); ?>">
                            <img src="<?php echo esc_url(get_theme_mod( 'wp_bootstrap_starter_logo' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                        </a>
                    <?php else : ?>
                        <a class="site-title" href="<?php echo esc_url( home_url( '/' )); ?>"><?php esc_url(bloginfo('name')); ?></a>
                    <?php endif; ?>

                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <?php
                    wp_nav_menu(array(
                    'theme_location'    => 'primary',
                    'container'       => 'div',
                    'container_id'    => 'main-nav',
                    'container_class' => 'collapse navbar-collapse justify-content-end',
                    'menu_id'         => false,
                    'menu_class'      => 'navbar-nav',
                    'depth'           => 3,
                    'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                    'walker'          => new wp_bootstrap_navwalker()
                    ));
                ?>
                <a href="#" class="cart-header-link">
                    <svg width="29" height="25" viewBox="0 0 29 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.67378 5.04125H27.5434C27.995 5.04125 28.3373 5.43735 28.2644 5.87665L26.5238 16.1967C26.3491 17.241 25.4387 18.0044 24.3681 18.0044H9.13259C8.06202 18.0044 7.15168 17.241 6.97689 16.1967L4.47162 1.32516C4.41335 0.972275 4.10748 0.720215 3.75062 0.720215H0.728271" stroke="white" stroke-width="1.2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16.7503 22.3254C17.9569 22.3254 18.9351 21.3581 18.9351 20.1649C18.9351 18.9717 17.9569 18.0044 16.7503 18.0044C15.5436 18.0044 14.5654 18.9717 14.5654 20.1649C14.5654 21.3581 15.5436 22.3254 16.7503 22.3254Z" stroke="white" stroke-width="1.2" stroke-miterlimit="10"/>
                    </svg>
                    <span class="cart-count">1</span>
                </a>
                <span class="login-account-header-link">
                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.5354 18.8271C4.90771 16.6779 6.32078 14.8841 8.24155 13.9956" stroke="white" stroke-width="1.2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M13.7585 13.9956C14.4609 14.3256 15.1039 14.7741 15.6455 15.3156C16.5847 16.2548 17.2362 17.4648 17.4647 18.8271" stroke="white" stroke-width="1.2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M11 21.1539C16.6079 21.1539 21.1539 16.6079 21.1539 11C21.1539 5.39222 16.6079 0.846191 11 0.846191C5.39222 0.846191 0.846191 5.39222 0.846191 11C0.846191 16.6079 5.39222 21.1539 11 21.1539Z" stroke="white" stroke-width="1.2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M11.0001 14.2067C13.103 14.2067 14.8078 12.5019 14.8078 10.399C14.8078 8.29607 13.103 6.59131 11.0001 6.59131C8.89714 6.59131 7.19238 8.29607 7.19238 10.399C7.19238 12.5019 8.89714 14.2067 11.0001 14.2067Z" stroke="white" stroke-width="1.2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span>
                        <a href="#" class="cart-login-link">Signin</a> / <a href="#" class="cart-login-link">Sign up</a>
                    </span>
                </span>
            </nav>
        </div>
	</header><!-- #masthead -->
	<div class="site-content">
        <?php endif; ?>