<?php
if ( ! function_exists( 'vkf_wiesloch_news_slider' ) ) : //Template Tag Function

function vkf_wiesloch_news_slider() {
    global $post;  
    $the_query = array(
      'posts_per_page'   => '22',
      //'post_type'     => 'homeslider',
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
			<div class="news" id="news">
				<img src="<?php echo get_theme_mod('news_icon', get_stylesheet_directory_uri() . '/img/news-section-icon.png'); ?>" class="sectionicon"/>
				<h3 class="newshead"><?php echo get_theme_mod('news_headline', 'News und Neuigkeiten'); ?></h3>
				<div class="row">
					<div class="jcarousel-wrapper-news columns large-8 large-offset-2">
					    <div class="jcarousel-news newsslider">
					    	<div class="slides_wrap">
					    		<?php
			   			        
						        foreach( $posts as $post ): setup_postdata( $post );
						        //$excerpt = get_the_excerpt();
						      		?>
										<article class="slide large-6">
											
												<?php the_date('d.m.Y', '<h3 class="entry-title large-6">', '</h3>'); ?>
												<hr />
												<h4><a href="<?php  echo get_permalink(); ?>"><?php the_title(); ?></a></h4>
												<p><a style="color:white" href="<?php  echo get_permalink(); ?>"><?php 
												the_excerpt();
												?></a></p>
											
										</article>
						    		<?php
						        endforeach;
						      ?>
							</div>
						</div>
						<a href="#" class="jcarousel-news-control-prev"><img src="<?php bloginfo('template_directory'); ?>/img/prev.png" width="13" /></a>
                		<a href="#" class="jcarousel-news-control-next"><img src="<?php bloginfo('template_directory'); ?>/img/next.png" width="13" /></a>
					    <div class="jcarousel-news-pagination"></div>
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


if ( ! function_exists( 'vkf_wiesloch_jcarousel_newsslider_script' ) ) : // slider script
	add_action('wp_footer','vkf_wiesloch_jcarousel_newsslider_script');
	function vkf_wiesloch_jcarousel_newsslider_script(){ ?>
		<script>

		//width des slider containers holen (gleichzeitig browserwidth)
		var sliderWidth = jQuery('.jcarousel-news').width();

		var windowsize = jQuery(window).width();

		jQuery(window).resize(function() {
		  windowsize = jQuery(window).width();
		});

		(function($) {
			
		    jQuery(function() {
		        jQuery('.jcarousel-news')
		            .jcarousel({
		               wrap: 'circular'
		            })
			        .jcarouselAutoscroll({
			            interval: 7000,
			            target: '+=1',
			            autostart: true
			        });
		        jQuery('.jcarousel-news-control-prev')
		            .on('jcarouselcontrol:active', function() {
		                jQuery(this).removeClass('inactive');
		            })
		            .on('jcarouselcontrol:inactive', function() {
		                jQuery(this).addClass('inactive');
		            })
		            .jcarouselControl({
		                target: '-=1'
		            });


		        jQuery('.jcarousel-news-control-next')
		            .on('jcarouselcontrol:active', function() {
		                $(this).removeClass('inactive');
		            })
		            .on('jcarouselcontrol:inactive', function() {
		                $(this).addClass('inactive');
		            })
		            .jcarouselControl({
		                target: '+=1'
		            });





				jQuery('.jcarousel-news-pagination')
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
		    if (windowsize > 440) {
			    jQuery('.jcarousel-news .slide').css('width', sliderWidth * 0.48 );
				jQuery('.jcarousel-news .slide').css('margin-right', sliderWidth * 0.04 );
			}
			if (windowsize < 439) {
			    jQuery('.jcarousel-news .slide').css('width', sliderWidth );
			}

		})(jQuery);	

		//bei resize width der einzelnen slide an container width anpassen
		jQuery(window).resize(function(event) {

			//neue container width holen
			sliderWidth = jQuery('.jcarousel-news').width();

		    if (windowsize > 440) {
			    jQuery('.jcarousel-news .slide').css('width', sliderWidth * 0.48 );
				jQuery('.jcarousel-news .slide').css('margin-right', sliderWidth * 0.04 );
			}
			if (windowsize < 439) {
			    jQuery('.jcarousel-news .slide').css('width', sliderWidth );
			}
		});


		//
		//swipe aktivieren
		//
	  jQuery(function() {      
	      jQuery(".jcarousel-wrapper-news").swipe( {
	        swipeLeft:function(event, direction, distance, duration, fingerCount, fingerData) {
	          jQuery('.jcarousel-news').jcarousel('scroll', '+=1');  
	        },
	        swipeRight:function(event, direction, distance, duration, fingerCount, fingerData) {
	          jQuery('.jcarousel-news').jcarousel('scroll', '-=1');  
	        },
	        //Default is 75px
	         threshold: 50
	      });
	  });
	</script>
		<?php
	}
endif;


if ( ! function_exists( 'vkf_wiesloch_news_slider_style' ) ) : //Template Tag Function
	add_action('wp_head','vkf_wiesloch_news_slider_style');
	function vkf_wiesloch_news_slider_style(){ ?>
	<style>

		.jcarousel-wrapper-news {
		    /*width: 100%;*/
		    position: relative;

		    margin: auto;
		}
		.jcarousel-wrapper-news > div{
			overflow: hidden;
		}


		.jcarousel-news {
		    position: relative;
		    width: 100%;
		}

		.jcarousel-news .slides_wrap {
		    width: 20000em;
		    position: relative;
		    margin: 0;
		    padding: 0;
		}

		.jcarousel-news .slide {
		    float: left;
		    width: auto;   
		    position: relative;
		}

		.jcarousel-news .slide img {
			width: 100%;
			display: block;
		}

		.jcarousel-news .slide .caption {
			position: absolute;
			bottom: 50px;
			left: 0;
			width: 100%;
			color: #fff;
			font-size: 20px;
			text-align: center;
		}

		.jcarousel-news-pagination {
		    text-align: center;
		    bottom: 0;
		    width: 100%;
		    padding-bottom: 8px;
		    margin-top: 20px;
		}

		.jcarousel-news-pagination span {
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
		.jcarousel-news-control-prev {
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
		.jcarousel-news-control-next {
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
		.jcarousel-wrapper-news .jcarousel-news-control-prev {
		    left: -29px;
		    top: 56%;
		}
		.jcarousel-wrapper-news .jcarousel-news-control-next {
		    right: -70px;
		    top: 56%;
		}

		.jcarousel-news-pagination span:last-child {
		    margin-right: 0;
		}

		.jcarousel-news-pagination span.active {
		    opacity: 1;
		}
    </style>

	<?php
	}
endif;
