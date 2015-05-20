<?php
/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
function vkf_wiesloch_register_boxes() {

	$labels = array(
		'name'                => __( 'Boxes', 'vkf_wiesloch' ),
		'singular_name'       => __( 'Box', 'vkf_wiesloch' ),
		'add_new'             => _x( 'Add New Box', 'vkf_wiesloch', 'vkf_wiesloch' ),
		'add_new_item'        => __( 'Add New Box', 'vkf_wiesloch' ),
		'edit_item'           => __( 'Edit Box', 'vkf_wiesloch' ),
		'new_item'            => __( 'New Box', 'vkf_wiesloch' ),
		'view_item'           => __( 'View Box', 'vkf_wiesloch' ),
		'search_items'        => __( 'Search Boxes', 'vkf_wiesloch' ),
		'not_found'           => __( 'No Boxes found', 'vkf_wiesloch' ),
		'not_found_in_trash'  => __( 'No Boxes found in Trash', 'vkf_wiesloch' ),
		'parent_item_colon'   => __( 'Parent Box:', 'vkf_wiesloch' ),
		'menu_name'           => __( 'Boxes', 'vkf_wiesloch' ),
	);

	$args = array(
		'labels'                   => $labels,
		'hierarchical'        => false,
		'description'         => 'Boxes',
		'taxonomies'          => array(),
		'public'              => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-screenoptions',
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => true,
		'has_archive'         => false,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array(
			'title', 'thumbnail',
			'excerpt','custom-fields',
			'revisions'
			)
	);

	register_post_type( 'vkf_boxes', $args );
}

add_action( 'init', 'vkf_wiesloch_register_boxes' );

function vkf_wiesloch_boxes(){
	global $post;  
    $the_query = array(
      'posts_per_page'   => '220',
      'post_type'     => 'vkf_boxes',
      'orderby'          => 'date',
      'order'            => 'DESC',
      //$taxonomy            => $category,
      'suppress_filters' => false,
    );
    $posts = get_posts( $the_query );  
    if(!empty($posts)):
	    $totalposts = count($posts);
		$postcount = 1;
	    ?>
	    		<?php
	    		$totalposts = count($posts);
	    		$postcount = 1;
		        foreach( $posts as $post ): setup_postdata( $post );
		        //$excerpt = get_the_excerpt();
		        	?>
					<div class="columns large-4 medium-4 start-box <?php if ($totalposts == $postcount) {echo 'end';} ?>">
						<?php the_post_thumbnail(); ?>
						<h3><?php echo get_the_title(); ?> </h3>
						<p><?php echo get_the_excerpt() ?></p>
					</div>
				<?php
				$postcount ++;
		        endforeach;
		      	?>
	<?php
	endif;
}