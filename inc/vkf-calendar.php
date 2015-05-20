<?php
/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
function vkf_wiesloch_calendar_posttype() {

	$labels = array(
		'name'                => __( 'Events', 'vkf_wiesloch' ),
		'singular_name'       => __( 'Event', 'vkf_wiesloch' ),
		'add_new'             => _x( 'Add New Event', 'vkf_wiesloch', 'vkf_wiesloch' ),
		'add_new_item'        => __( 'Add New Event', 'vkf_wiesloch' ),
		'edit_item'           => __( 'Edit Event', 'vkf_wiesloch' ),
		'new_item'            => __( 'New Event', 'vkf_wiesloch' ),
		'view_item'           => __( 'View Event', 'vkf_wiesloch' ),
		'search_items'        => __( 'Search Events', 'vkf_wiesloch' ),
		'not_found'           => __( 'No Events found', 'vkf_wiesloch' ),
		'not_found_in_trash'  => __( 'No Events found in Trash', 'vkf_wiesloch' ),
		'parent_item_colon'   => __( 'Parent Event:', 'vkf_wiesloch' ),
		'menu_name'           => __( 'Calendar', 'vkf_wiesloch' ),
	);

	$args = array(
		'labels'                   => $labels,
		'hierarchical'        => false,
		'description'         => 'Events',
		'taxonomies'          => array(),
		'public'              => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-calendar',
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
			'excerpt',
			)
	);

	register_post_type( 'calendar', $args );
}

add_action( 'init', 'vkf_wiesloch_calendar_posttype' );

function vkf_wiesloch_calendar(){
	global $post;  
    $the_query = array(
      'posts_per_page'   => '22',
      'post_type'     => 'calendar',
      'orderby'          => 'date',
      'order'            => 'DESC',
      //$taxonomy            => $category,
      'suppress_filters' => false,
    );
    $posts = get_posts( $the_query );  
    if(!empty($posts)):
	    $totalposts = count($posts);
	    ?>
		<div class="termine section" id="termine">
			<img src="<?php echo get_theme_mod('calendaricon', get_stylesheet_directory_uri() . '/img/taschenlampe.png'); ?>" class="sectionicon">
			<div class="row">
				<div class="columns large-8 large-offset-2 medium-8 medium-offset-2">
					<h3 class="calendarheadline"><?php echo get_theme_mod('calendar_headline', 'Anstehende Termine'); ?></h3>
		    		<?php
			        foreach( $posts as $post ): setup_postdata( $post );
			        //$excerpt = get_the_excerpt();
			        	?>
			        	<article class="termin">
							<p><strong><?php  the_title(); ?> </strong> <?php echo get_the_excerpt(); ?></p>
						</article>
						<?php
			        endforeach;
			      	?>
				</div>
			</div>
		</div>
	<?php
	endif;
}