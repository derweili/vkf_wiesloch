<?php

/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
function vkf_wiesloch_register_checklist() {

	$labels = array(
		'name'                => __( 'Items', 'vkf_wiesloch' ),
		'singular_name'       => __( 'Item', 'vkf_wiesloch' ),
		'add_new'             => _x( 'Add New Item', 'vkf_wiesloch', 'vkf_wiesloch' ),
		'add_new_item'        => __( 'Add New Item', 'vkf_wiesloch' ),
		'edit_item'           => __( 'Edit Item', 'vkf_wiesloch' ),
		'new_item'            => __( 'New Item', 'vkf_wiesloch' ),
		'view_item'           => __( 'View Item', 'vkf_wiesloch' ),
		'search_items'        => __( 'Search Items', 'vkf_wiesloch' ),
		'not_found'           => __( 'No Items found', 'vkf_wiesloch' ),
		'not_found_in_trash'  => __( 'No Items found in Trash', 'vkf_wiesloch' ),
		'parent_item_colon'   => __( 'Parent Item:', 'vkf_wiesloch' ),
		'menu_name'           => __( 'Items', 'vkf_wiesloch' ),
	);

	$args = array(
		'labels'                   => $labels,
		'hierarchical'        => false,
		'description'         => 'Items for Checklist',
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
			'title',
			'excerpt'
			)
	);

	register_post_type( 'checklist', $args );
}

add_action( 'init', 'vkf_wiesloch_register_checklist' );

function vkf_wiesloch_checklist(){
	global $post;  
    $the_query = array(
      'posts_per_page'   => '220',
      'post_type'     => 'checklist',
      'orderby'          => 'date',
      'order'            => 'DESC',
      //$taxonomy            => $category,
      'suppress_filters' => false,
    );
    $posts = get_posts( $the_query );  
    if(!empty($posts)):
	    $totalposts = count($posts);
	    ?>
		<div class="row">
			<div class="columns medium-8 medium-offset-2">
	    		<?php
	    		$totalposts = count($posts);
	    		$postcount = 1;
		        foreach( $posts as $post ): setup_postdata( $post );
		        //$excerpt = get_the_excerpt();
		        	?>
						<input type="checkbox" name="check-<?php the_ID(); ?>" value="check-value-<?php the_ID(); ?>" id="check-<?php the_ID(); ?>"><label <?php if( has_excerpt() ): ?>data-tooltip aria-haspopup="true" title="<?php the_excerpt(); ?>"<?php endif; ?> for="check-<?php the_ID(); ?>"><?php  the_title(); ?><?php if ($postcount != $totalposts){echo ','; }; ?></label>
					<?php
					$postcount ++;
		        endforeach;
		      	?>
			</div>
		</div>
	<?php
	endif;
}