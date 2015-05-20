<?php 
/* 
* Template Name: Home 
*/ 
get_header();
?>
<header id="masthead" class="site-header parallax-container" data-natural-height="900" data-natural-width="1400" data-image-src="<?php echo get_theme_mod('headerimage', get_stylesheet_directory_uri().'/img/header-bg.jpg'); ?>" data-bleed="10" data-position="top" data-parallax="scroll"  role="banner">
	<div class="site-branding row" >
		<div class="site-logo columns large-12" style="text-align:center"><img class="homelogo" src="<?php echo get_theme_mod('headerlogo', get_stylesheet_directory_uri().'/img/header-logo.png'); ?>" /></div>
	</div><!-- .site-branding -->
	<div class="pusher">
	</div>

	<?php
		if ( function_exists( 'vkf_wiesloch_text_slider' ) ) { //Boxes
			vkf_wiesloch_text_slider();
		};
	?>
</header><!-- #masthead -->
<div id="content" class="site-content">
<div class="row start">
		<?php
			if ( function_exists( 'vkf_wiesloch_boxes' ) ) { //Boxes
				vkf_wiesloch_boxes();
			};
		?>
</div>

<?php
	if ( function_exists( 'vkf_wiesloch_calendar' ) ) { //Termine
		vkf_wiesloch_calendar();
	}
?>

<div class="imageslider">
	<?php
		if (function_exists( 'vkf_wiesloch_slider' )) { //Bilderslider
			vkf_wiesloch_slider();
		}
	?>
</div>

<div class="checkliste" id="checkliste"> <!-- Checkliste -->
	<img class="sectionicon" src="<?php echo get_theme_mod('checklisticon', get_stylesheet_directory_uri() . '/img/checkliste-section-icon.png'); ?>">
	<div class="row">
		<div class="columns large-8 large-offset-2 medium-8 medium-offset-2">
			<h3 class="chacklisthead"><?php echo get_theme_mod('checklist_headline', 'Checkliste'); ?></h3>
			<h4 class="chacklistsubhead"><?php echo get_theme_mod('checklist_subhead', 'Ich packe meinen Koffer und nehme mit…'); ?></h4>
		</div>
	</div>
	<div class="row">
		<div class="columns medium-10 medium-offset-1">
			<img class="checklisteicons" src="<?php bloginfo('template_directory'); ?>/img/checkliste-icons.png">
		</div>
	</div>
	<?php
		if ( function_exists( 'vkf_wiesloch_checklist' ) ) {
			vkf_wiesloch_checklist();
		};
	?>
	<div class="row download">
		<a class="downloadbutton" href="<?php echo get_theme_mod('checklist_download', get_stylesheet_directory_uri() . '/img/checkliste.pdf'); ?>" target="_blank">Download als PDF</a>
	</div>
</div>
<div class="alert">
	<div class="row">
		<div class="columns large-1 medium-1 small-3 large-offset-1"><img src="<?php bloginfo('template_directory'); ?>/img/alert-icon.png"></div>
		<div class="columns large-8 medium-8 small-9 end">
			<?php
				$post_id = get_theme_mod('alert_post', '566');
				$queried_post = get_post($post_id);
				$title = $queried_post->post_title;
				//echo $title;
				echo $queried_post->post_content;
			 ?>
		</div>
	</div>
</div>

<?php
	if (function_exists( 'vkf_wiesloch_news_slider' )) {
		vkf_wiesloch_news_slider();
	}
?>
<?php
	if (function_exists( 'vkf_wiesloch_teamer' )) {
		vkf_wiesloch_teamer();
	}
?>

<?php get_footer(); ?>