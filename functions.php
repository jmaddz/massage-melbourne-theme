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

/**
 * Sharp responsive logo (replaces retired mu-plugin mm-image-sizes.php).
 * Matches Kadence Logo Max Width: 271 desktop / 180 tablet / 120 mobile.
 */
add_filter( 'wp_get_attachment_image_attributes', function ( $attr, $attachment, $size ) {
    if ( ! empty( $attr['class'] ) && strpos( $attr['class'], 'custom-logo' ) !== false ) {
        $sizes           = '(max-width: 767px) 120px, (max-width: 1024px) 180px, 271px';
        $attr['sizes']   = $sizes;
        $attr['data-sizes'] = $sizes;  // keep lazyload scripts in sync
        $attr['loading'] = 'eager';    // logo is above the fold (LCP)
    }
    return $attr;
}, 10, 3 );
