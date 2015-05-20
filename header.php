<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package vkf_wiesloch
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!--<script src="<?php bloginfo('template_directory'); ?>/js/vendor/jquery.js"></script>-->
<link rel="shortcut icon" href="<?php echo get_theme_mod('teamer_headline', get_stylesheet_directory_uri() . '/img/favicon.png'); ?>" type="image/png" />
<link rel="icon" href="<?php echo get_theme_mod('teamer_headline', get_stylesheet_directory_uri() . '/img/favicon.png'); ?>" type="image/png" />
<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<!--<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'vkf_wiesloch' ); ?></a>-->
<?php 
if ( !wp_is_mobile() ):
 ?>
<div class="contain-to-grid sticky"><!-- Add sticky class to make manu "sticky". -->
	<nav class="top-bar" data-topbar role="navigation">
	  <ul class="title-area">
	    <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
	  </ul>

	  <section class="top-bar-section">
	    <!-- Right Nav Section -->
	    <!--<ul class="right">
	      <li class="active"><a href="#">Right Button Active</a></li>
	      <li class="has-dropdown">
	        <a href="#">Right Button with Dropdown</a>
	        <ul class="dropdown">
	          <li><a href="#">First link in dropdown</a></li>
	        </ul>
	      </li>
	    </ul>-->

	    <!-- Left Nav Section -->
	    <?php
		$options = array(
		  'theme_location' => 'main_nav',
		  'container' => false,
		  'depth' => 5,
		  'items_wrap' => '<ul id="%1$s" class="left %2$s">%3$s</ul>',
		  'walker' => new vkf_wiesloch_walker_nav_menu()
		);
		wp_nav_menu($options); ?>
	  </section>
	</nav>
</div>
<?php endif; ?>

