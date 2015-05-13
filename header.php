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
<script src="<?php bloginfo('template_directory'); ?>/js/vendor/jquery.js"></script>
<?php wp_head(); ?>
<link href='http://fonts.googleapis.com/css?family=Bitter:400,700,400italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/foundation.css" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/theme.css" />
<script src="<?php bloginfo('template_directory'); ?>/js/vendor/modernizr.js"></script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<!--<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'vkf_wiesloch' ); ?></a>-->
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding row">
			<div class="site-logo columns large-4 large-offset-4"><img src="<?php bloginfo('template_directory'); ?>/img/header-logo.png"></div>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'vkf_wiesloch' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
