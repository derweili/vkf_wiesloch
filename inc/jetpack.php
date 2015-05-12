<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package vkf_wiesloch
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function vkf_wiesloch_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'vkf_wiesloch_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function vkf_wiesloch_jetpack_setup
add_action( 'after_setup_theme', 'vkf_wiesloch_jetpack_setup' );

function vkf_wiesloch_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function vkf_wiesloch_infinite_scroll_render