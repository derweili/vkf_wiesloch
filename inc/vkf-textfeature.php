<?php
/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
function vkf_wiesloch_register_textfeature() {

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
		'menu_name'           => __( 'Text Feature', 'vkf_wiesloch' ),
	);

	$args = array(
		'labels'                   => $labels,
		'hierarchical'        => true,
		'description'         => 'Feature Slider Home',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-menu',
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => true,
		'has_archive'         => false,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array(
			'title', 'editor','custom-fields'
			)
	);

	register_post_type( 'textfeature', $args );
}

add_action( 'init', 'vkf_wiesloch_register_textfeature' );


if ( ! function_exists( 'vkf_wiesloch_text_slider' ) ) : //Template Tag Function

function vkf_wiesloch_text_slider() {
    global $post;  
    $the_query = array(
      'posts_per_page'   => '22',
      'post_type'     => 'textfeature',
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
			<div class="textslider" id="textslider">
				<div class="row">
					<div class="jcarousel-wrapper-text columns large-8 large-offset-2">
					    <div class="jcarousel-text-slider newsslider">
					    	<div class="slides_wrap">
					    		<?php
			   			        
						        foreach( $posts as $post ): setup_postdata( $post );
						        //$excerpt = get_the_excerpt();
						      		?>
										<article class="slide">
											<h2 class="teasertextheadline"><?php echo get_the_title(); ?></h2>
											<p class="teaertextcopy">
												<?php the_content(); ?>
											</p>
										</article>
						    		<?php
						        endforeach;
						      ?>
							</div>
						</div>
						<a href="#" class="jcarousel-text-control-prev"><img src="<?php bloginfo('template_directory'); ?>/img/prev.png" width="13" /></a>
                		<a href="#" class="jcarousel-text-control-next"><img src="<?php bloginfo('template_directory'); ?>/img/next.png" width="13" /></a>
					    <div class="jcarousel-text-pagination"></div>
					</div>
				</div>
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


if ( ! function_exists( 'vkf_wiesloch_jcarousel_stextslider_script' ) ) : // slider script
	add_action('wp_footer','vkf_wiesloch_jcarousel_stextslider_script');
	function vkf_wiesloch_jcarousel_stextslider_script(){ ?>
		<script>

		//width des slider containers holen (gleichzeitig browserwidth)
		var sliderWidth = jQuery('.jcarousel-text-slider').width();

		var windowsize = jQuery(window).width();

		jQuery(window).resize(function() {
		  windowsize = jQuery(window).width();
		});

		(function($) {
			
		    jQuery(function() {
		        jQuery('.jcarousel-text-slider')
		            .jcarousel({
		               wrap: 'circular'
		            })
			        .jcarouselAutoscroll({
			            interval: 7000,
			            target: '+=1',
			            autostart: true
			        });
		        jQuery('.jcarousel-text-control-prev')
		            .on('jcarouselcontrol:active', function() {
		                jQuery(this).removeClass('inactive');
		            })
		            .on('jcarouselcontrol:inactive', function() {
		                jQuery(this).addClass('inactive');
		            })
		            .jcarouselControl({
		                target: '-=1'
		            });


		        jQuery('.jcarousel-text-control-next')
		            .on('jcarouselcontrol:active', function() {
		                $(this).removeClass('inactive');
		            })
		            .on('jcarouselcontrol:inactive', function() {
		                $(this).addClass('inactive');
		            })
		            .jcarouselControl({
		                target: '+=1'
		            });





				jQuery('.jcarousel-text-slider-pagination')
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
			 jQuery('.jcarousel-text-slider .slide').css('width', sliderWidth );
			
		})(jQuery);	

		//bei resize width der einzelnen slide an container width anpassen
		jQuery(window).resize(function(event) {

			//neue container width holen
			sliderWidth = jQuery('.jcarousel-text-slider').width();

			jQuery('.jcarousel-text-slider .slide').css('width', sliderWidth );
		});


		//
		//swipe aktivieren
		//
	  jQuery(function() {      
	      jQuery(".jcarousel-wrapper-text").swipe( {
	        swipeLeft:function(event, direction, distance, duration, fingerCount, fingerData) {
	          jQuery('.jcarousel-text-slider').jcarousel('scroll', '+=1');  
	        },
	        swipeRight:function(event, direction, distance, duration, fingerCount, fingerData) {
	          jQuery('.jcarousel-text-slider').jcarousel('scroll', '-=1');  
	        },
	        //Default is 75px
	         threshold: 50
	      });
	  });
	</script>
		<?php
	}
endif;


if ( ! function_exists( 'vkf_wiesloch_text_slider_style' ) ) : //Template Tag Function
	add_action('wp_head','vkf_wiesloch_text_slider_style');
	function vkf_wiesloch_text_slider_style(){ ?>
	<style>
		.jcarousel-wrapper-text {
		    /*width: 100%;*/
		    position: relative;

		    margin: auto;
		}
		.jcarousel-wrapper-text > div{
			overflow: hidden;
		}


		.jcarousel-text-slider {
		    position: relative;
		    width: 100%;
		}

		.jcarousel-text-slider .slides_wrap {
		    width: 20000em;
		    position: relative;
		    margin: 0;
		    padding: 0;
		}

		.jcarousel-text-slider .slide {
		    float: left;
		    width: auto;   
		    position: relative;
		}

		.jcarousel-text-slider .slide img {
			width: 100%;
			display: block;
		}

		.jcarousel-text-slider .slide .caption {
			position: absolute;
			bottom: 50px;
			left: 0;
			width: 100%;
			color: #fff;
			font-size: 20px;
			text-align: center;
		}

		.jcarousel-text-slider-pagination {
		    text-align: center;
		    bottom: 0;
		    width: 100%;
		    padding-bottom: 8px;
		    margin-top: 20px;
		}

		.jcarousel-text-slider-pagination span {
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
		.jcarousel-text-control-prev {
		    height: 210px;
		    left: 10px;
		    position: absolute;
		    top: 48%;
		    -moz-transform: translateY(-20%);
		    -webkit-transform: translateY(-20%);
		    -o-transform: translateY(-20%);
		    transform: translateY(-20%);
		    width: 50px;
		}
		.jcarousel-text-control-next {
		    height: 210px;
		    right: 10px;
		    position: absolute;
		    top: 48%;
		    -moz-transform: translateY(-20%);
		    -webkit-transform: translateY(-20%);
		    -o-transform: translateY(-20%);
		    transform: translateY(-20%);
		    width: 50px;
		}
		.jcarousel-wrapper-text .jcarousel-text-control-prev {
		    left: -29px;
		    top: 50%;
		}
		.jcarousel-wrapper-text .jcarousel-text-control-next {
		    right: -60px;
		    top: 50%;
		}

		.jcarousel-text-slider-pagination span:last-child {
		    margin-right: 0;
		}

		.jcarousel-text-slider-pagination span.active {
		    opacity: 1;
		}
    </style>

	<?php
	}
endif;