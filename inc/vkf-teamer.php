<?php

/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
function vkf_wiesloch_register_teamer() {

	$labels = array(
		'name'                => __( 'Teamer', 'vkf_wiesloch' ),
		'singular_name'       => __( 'Teamer', 'vkf_wiesloch' ),
		'add_new'             => _x( 'Add New Teamer', 'vkf_wiesloch', 'vkf_wiesloch' ),
		'add_new_item'        => __( 'Add New Teamer', 'vkf_wiesloch' ),
		'edit_item'           => __( 'Edit Teamer', 'vkf_wiesloch' ),
		'new_item'            => __( 'New Teamer', 'vkf_wiesloch' ),
		'view_item'           => __( 'View Teamer', 'vkf_wiesloch' ),
		'search_items'        => __( 'Search Teamer', 'vkf_wiesloch' ),
		'not_found'           => __( 'No Teamer found', 'vkf_wiesloch' ),
		'not_found_in_trash'  => __( 'No Teamer found in Trash', 'vkf_wiesloch' ),
		'parent_item_colon'   => __( 'Parent Teamer:', 'vkf_wiesloch' ),
		'menu_name'           => __( 'Teamer', 'vkf_wiesloch' ),
	);

	$args = array(
		'labels'                   => $labels,
		'hierarchical'        => false,
		'description'         => 'Teamer',
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
			'title', 'thumbnail',
			'excerpt','custom-fields',
			'revisions'
			)
	);

	register_post_type( 'teamer', $args );
}

add_action( 'init', 'vkf_wiesloch_register_teamer' );

/**
 * Create a taxonomy
 *
 * @uses  Inserts new taxonomy object into the list
 * @uses  Adds query vars
 *
 * @param string  Name of taxonomy object
 * @param array|string  Name of the object type for the taxonomy object.
 * @param array|string  Taxonomy arguments
 * @return null|WP_Error WP_Error if errors, otherwise null.
 */
function vkf_wiesloch_register_teamer_job() {

	$labels = array(
		'name'					=> _x( 'Jobs', 'Taxonomy plural name', 'vkf_wiesloch' ),
		'singular_name'			=> _x( 'Job', 'Taxonomy singular name', 'vkf_wiesloch' ),
		'search_items'			=> __( 'Search Jobs', 'vkf_wiesloch' ),
		'popular_items'			=> __( 'Popular Jobs', 'vkf_wiesloch' ),
		'all_items'				=> __( 'All Jobs', 'vkf_wiesloch' ),
		'parent_item'			=> __( 'Parent Job', 'vkf_wiesloch' ),
		'parent_item_colon'		=> __( 'Parent Job', 'vkf_wiesloch' ),
		'edit_item'				=> __( 'Edit Job', 'vkf_wiesloch' ),
		'update_item'			=> __( 'Update Job', 'vkf_wiesloch' ),
		'add_new_item'			=> __( 'Add New Job', 'vkf_wiesloch' ),
		'new_item_name'			=> __( 'New Job Name', 'vkf_wiesloch' ),
		'add_or_remove_items'	=> __( 'Add or remove Jobs', 'vkf_wiesloch' ),
		'choose_from_most_used'	=> __( 'Choose from most used vkf_wiesloch', 'vkf_wiesloch' ),
		'menu_name'				=> __( 'Job', 'vkf_wiesloch' ),
	);

	$args = array(
		'labels'            => $labels,
		'public'            => false,
		'show_in_nav_menus' => true,
		'show_admin_column' => false,
		'hierarchical'      => true,
		'show_tagcloud'     => true,
		'show_ui'           => true,
		'query_var'         => true,
		'rewrite'           => true,
		'query_var'         => true,
		'capabilities'      => array(),
	);

	register_taxonomy( 'job', array( 'teamer' ), $args );
}

add_action( 'init', 'vkf_wiesloch_register_teamer_job' );

function vkf_wiesloch_teamer(){
	global $post;  
    $the_query = array(
      'posts_per_page'   => '220',
      'post_type'     => 'teamer',
      'orderby'          => 'rand',
      'order'            => 'DESC',
      'suppress_filters' => false,
    );
    $posts = get_posts( $the_query );  
    if(!empty($posts)):
	    $totalposts = count($posts);
	    ?>

<div class="team">
	<img src="<?php bloginfo('template_directory'); ?>/img/teamer-section-icon.png" class="sectionicon"/>
	<h3>Team</h3>
	<div class="row">
		<div class="columns large-10 large-offset-1 end">
			<div class="row">

	    		<?php
	    		$totalposts = count($posts);
	    		$postcount = 1;
		        foreach( $posts as $post ): setup_postdata( $post );
		        //$excerpt = get_the_excerpt();
		        	?>
					<div class="columns large-4 medium-6 teamer <?php if ($totalposts == $postcount) {echo 'end';} ?>">
						<div class="row">
							<div class="columns large-4 medium-4 small-4">
								<div class="imgcontainer">
									<?php if ( has_post_thumbnail() ): ?>
										<?php the_post_thumbnail('thumbnail'); ?>
									<?php else: ?>
										<div class="placeholder" style="height: 107px; width: 107px; background: #787878"></div>
									<?php endif; ?>
								</div>
							</div>
							<div class="columns large-8 medium-8 small-8">
								<h4><?php echo get_the_title(); ?></h4>
								<h5><?php echo get_the_excerpt() ?></h5>
								<h5>
									<?php
									//Returns Array of Term Names for "my_taxonomy"
										$term_list = wp_get_post_terms($post->ID, 'job', array("fields" => "names"));
										$jobcount = 1;
										foreach ($term_list as $job) {
											if($jobcount == count($term_list)){
												echo $job;
											}
											else{
												echo $job . ', ';
											}
										}
									?>
								</h5>
							</div>

						</div>
					</div>
				<?php
				$postcount ++;
		        endforeach;
		      	?>
			</div>
		</div>
	</div>
</div>
	<?php
	endif;
}