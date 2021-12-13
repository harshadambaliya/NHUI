<?php

    function wp_bootstrap_starter_link() {
        
        wp_enqueue_style( 'slick-css', get_stylesheet_directory_uri() . '/assets/css/slick.css', 50);

        wp_enqueue_script( 'slick-js', get_stylesheet_directory_uri() . '/assets/js/slick.min.js');
        wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/assets/js/custom.js');

    }
    add_action( 'wp_enqueue_scripts', 'wp_bootstrap_starter_link',15 );


?>