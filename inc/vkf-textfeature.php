<?php
/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
function vkf_wiesloch_text_feature() {

	$labels = array(
		'name'                => __( 'Features', 'vkf_wiesloch' ),
		'singular_name'       => __( 'Feature', 'vkf_wiesloch' ),
		'add_new'             => _x( 'Add New Feature', 'vkf_wiesloch', 'vkf_wiesloch' ),
		'add_new_item'        => __( 'Add New Feature', 'vkf_wiesloch' ),
		'edit_item'           => __( 'Edit Feature', 'vkf_wiesloch' ),
		'new_item'            => __( 'New Feature', 'vkf_wiesloch' ),
		'view_item'           => __( 'View Feature', 'vkf_wiesloch' ),
		'search_items'        => __( 'Search Features', 'vkf_wiesloch' ),
		'not_found'           => __( 'No Features found', 'vkf_wiesloch' ),
		'not_found_in_trash'  => __( 'No Features found in Trash', 'vkf_wiesloch' ),
		'parent_item_colon'   => __( 'Parent Feature:', 'vkf_wiesloch' ),
		'menu_name'           => __( 'Features', 'vkf_wiesloch' ),
	);

	$args = array(
		'labels'                   => $labels,
		'hierarchical'        => true,
		'description'         => 'Feature Slider Home',
		'taxonomies'          => array(),
		'public'              => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => null,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => true,
		'has_archive'         => false,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array(
			'title', 'editor'
			)
	);

	register_post_type( 'textfeature', $args );
}

add_action( 'init', 'vkf_wiesloch_text_feature' );
