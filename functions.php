<?php
/**
 * Kadence Child theme functions.
 * Loads the Git-managed custom CSS after all theme styles.
 */
add_action( 'wp_enqueue_scripts', function () {
    $file = get_stylesheet_directory() . '/style.css';
    wp_enqueue_style(
        'kadence-child',
        get_stylesheet_directory_uri() . '/style.css',
        array(),
        file_exists( $file ) ? filemtime( $file ) : time()
    );
}, 999 );
