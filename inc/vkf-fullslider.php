<?php
if ( ! function_exists( 'vkf_wiesloch_slider' ) ) : //Template Tag Function

function vkf_wiesloch_slider() {
    global $post;  
    $the_query = array(
      'posts_per_page'   => '22',
      'post_type'     => 'homeslider',
      'orderby'          => 'date',
      'order'            => 'DESC',
      //$taxonomy            => $category,
      'suppress_filters' => false,
    );
    $posts = get_posts( $the_query );  
    if(!empty($posts)):
	    $totalposts = count($posts);
	    if ($totalposts != 1): //If more than 1 alider item: display slider
	    ?>
			<div class="jcarousel-wrapper">
			    <div class="jcarousel">
			    	<div class="slides_wrap">
			    		<?php
	   			        
				        foreach( $posts as $post ): setup_postdata( $post );
				        //$excerpt = get_the_excerpt();
				      		?>
				    		<div class="slide">
				    			<?php
				    			if (!empty($linkurl)): ?>
					    			<?php the_post_thumbnail(); ?>
					    			<!--<div class="caption">
					    				<p>Vivamus varius luctus mattis. Duis ut sollicitudin lacus. Rhoncus massa at tincidunt rhoncus.</p>
					    			</div>-->
				    			<?php
				    			else:
				    				the_post_thumbnail();
				    			endif;
				    			?>
				    		</div>
				    		<?php
				        endforeach;
				      ?>
			        </div>	        
			    </div>
			    <div class="jcarousel-pagination"></div>
			</div>
			<?php 
		else: // if only 1 slider item: display single image
			foreach( $posts as $post ): setup_postdata( $post );

		    	the_post_thumbnail();

	        endforeach;
	    endif;
	endif;
	}
endif;
?>
<?php
if ( ! function_exists( 'vkf_wiesloch_slider_style' ) ) : //Template Tag Function
	add_action('wp_head','vkf_wiesloch_slider_style');
	function vkf_wiesloch_slider_style(){ ?>
	<style>

		.jcarousel-wrapper {
		    width: 100%;
		    overflow: hidden;
		    position: relative;

		    margin: auto;
		}

		.jcarousel {
		    position: relative;
		    width: 100%;
		}

		.jcarousel .slides_wrap {
		    width: 20000em;
		    position: relative;
		    margin: 0;
		    padding: 0;
		}

		.jcarousel .slide {
		    float: left;
		    width: auto;   
		    position: relative;
		}

		.jcarousel .slide img {
			width: 100%;
			display: block;
		}

		.jcarousel .slide .caption {
			position: absolute;
			bottom: 50px;
			left: 0;
			width: 100%;
			color: #fff;
			font-size: 20px;
			text-align: center;
		}

		.jcarousel-pagination {
		    text-align: center;
		    position: absolute;
		    bottom: 0;
		    width: 100%;
		    padding-bottom: 8px;
		}

		.jcarousel-pagination span {
		    width: 10px;
		    height: 10px;
		    background-color: #ffffff;
		    opacity: .5;
		    border-radius: 50%;
		    box-sizing: border-box;
		    display: inline-block;
		    margin-right: 5px;
		    cursor: pointer;
		}

		.jcarousel-pagination span:last-child {
		    margin-right: 0;
		}

		.jcarousel-pagination span.active {
		    opacity: 1;
		}
    </style>

	<?php
	}
endif;
	?>
<?php
if ( ! function_exists( 'vkf_wiesloch_slider_script' ) ) : //include Slider files
	add_action('wp_footer','vkf_wiesloch_slider_script');
	function vkf_wiesloch_slider_script(){ ?>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jcarousel.min.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/touchswipe.min.js"></script>
	<?php
	}
endif;
?>
<?php
if ( ! function_exists( 'vkf_wiesloch_jcarousel_slider_script' ) ) : // slider script
	add_action('wp_footer','vkf_wiesloch_jcarousel_slider_script');
	function vkf_wiesloch_jcarousel_slider_script(){ ?>
		<script>

		//width des slider containers holen (gleichzeitig browserwidth)
		var sliderWidth = jQuery('.jcarousel').width();

		(function($) {
			
		    jQuery(function() {
		        jQuery('.jcarousel')
		            .jcarousel({
		               wrap: 'circular'
		            })
			        .jcarouselAutoscroll({
			            interval: 7000,
			            target: '+=1',
			            autostart: true
			        });

				jQuery('.jcarousel-pagination')
					.on('jcarouselpagination:active', 'span', function() {
					    jQuery(this).addClass('active');
					})
					.on('jcarouselpagination:inactive', 'span', function() {
					    jQuery(this).removeClass('active');
					})
					.jcarouselPagination({
					    'perPage' : 1,
					    'item': function(page, carouselItems) {
						        return '<span class="bullet"></span>';
						}
					});
		    });

		    //bei pageload width der einzelnen slide an container width anpassen
		    jQuery('.jcarousel .slide').css('width', sliderWidth );

		})(jQuery);	

		//bei resize width der einzelnen slide an container width anpassen
		jQuery(window).resize(function(event) {

			//neue container width holen
			sliderWidth = jQuery('.jcarousel').width();

			jQuery('.jcarousel .slide').css('width', sliderWidth );
		});


		//
		//swipe aktivieren
		//
	  jQuery(function() {      
	      jQuery(".jcarousel-wrapper").swipe( {
	        swipeLeft:function(event, direction, distance, duration, fingerCount, fingerData) {
	          jQuery('.jcarousel').jcarousel('scroll', '+=1');  
	        },
	        swipeRight:function(event, direction, distance, duration, fingerCount, fingerData) {
	          jQuery('.jcarousel').jcarousel('scroll', '-=1');  
	        },
	        //Default is 75px
	         threshold: 50
	      });
	  });
	</script>
		<?php
	}
endif;

/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
function vkf_wiesloch_homeslider() {

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
		'hierarchical'        => false,
		'description'         => 'Startseiten Bilderslider',
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
		'rewrite'             => false,
		'capability_type'     => 'post',
		'supports'            => array(
			'title', 'thumbnail',
			'excerpt','custom-fields'
			)
	);

	register_post_type( 'homeslider', $args );
}

add_action( 'init', 'vkf_wiesloch_homeslider' );