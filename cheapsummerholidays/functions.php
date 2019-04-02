<?php

function themebs_enqueue_styles() {

  // wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
  wp_enqueue_style( 'core', get_template_directory_uri() . '/style.css' );

}
add_action( 'wp_enqueue_scripts', 'themebs_enqueue_styles');

// function themebs_enqueue_scripts() {
//   wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/vendor/bootstrap.bundle.min.js', array( 'jquery' ) );
// }
// add_action( 'wp_enqueue_scripts', 'themebs_enqueue_scripts');





// Feature Images
add_theme_support( 'post-thumbnails' );


function ld_custom_excerpt_length( $length ) {
    return 24;
}
add_filter( 'excerpt_length', 'ld_custom_excerpt_length', 999 );


function new_excerpt_more( $more ) {
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more');
