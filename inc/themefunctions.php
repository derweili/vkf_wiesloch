<?php
function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


function vkf_wiesloch_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'vkf_wiesloch_editor_styles' );


//Register Scripts
function vkf_wiesloch_register_scripts() {
    /*Header Script*/
    wp_register_script( 'modernizr', get_template_directory_uri() . '/js/vendor/modernizr.js', array( 'jquery' ), 1.0);
   // wp_register_script( 'jcarousel', get_template_directory_uri() . '/js/jcarousel.min.js', array( 'jquery' ), 1.0, true);
   // wp_register_script( 'touchswipe', get_template_directory_uri() . '/js/touchswipe.min.js', array( 'jquery' ), 1.0, true);
   wp_register_script( 'foundation', get_template_directory_uri() . '/js/foundation.min.js', array( 'jquery' ), 1.0, true);
   wp_register_script( 'foundation-topbar', get_template_directory_uri() . '/js/foundation/foundation.topbar.js', array( 'jquery', 'foundation' ), 1.0, true);
   wp_register_script( 'foundation-clearing', get_template_directory_uri() . '/js/foundation/foundation.clearing.js', array( 'jquery', 'foundation' ), 1.0, true);
 
    wp_register_style( 'foundation', get_template_directory_uri() . '/css/foundation.css', array(), 1.0, 'screen' );
    wp_register_style( 'Bitter', 'http://fonts.googleapis.com/css?family=Bitter:400,700,400italic&subset=latin,latin-ext', array(), 1.0, 'screen' );
    wp_register_style( 'theme-css', get_template_directory_uri() . '/theme.css', array('foundation'), 1.0, 'screen' );
}
 
add_action( 'wp_enqueue_scripts', 'vkf_wiesloch_register_scripts' );
function vkf_wiesloch_enqueue_scripts() {
    wp_enqueue_script( "jquery" );
    wp_enqueue_script( 'modernizr' );
   // wp_enqueue_script( 'jcarousel' );
    //wp_enqueue_script( 'touchswipe' );
    wp_enqueue_script( 'foundation' );
    wp_enqueue_script( 'foundation-topbar' );
    wp_enqueue_script( 'foundation-clearing' );
    wp_enqueue_style( 'foundation' );
    wp_enqueue_style( 'theme-css' );
    wp_enqueue_style( 'Bitter' );
}
 
add_action( 'wp_enqueue_scripts', 'vkf_wiesloch_enqueue_scripts' );