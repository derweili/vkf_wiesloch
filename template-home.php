<?php 
/* 
* Template Name: Home 
*/ 
get_header();
?>
<header id="masthead" class="site-header parallax-container" data-natural-height="900" data-natural-width="1400" data-image-src="<?php $options = get_option('vkf_wiesloch_theme_options'); if( empty( $options['homeheader'] ) ) : ?><?php bloginfo('template_directory'); ?>/img/header-bg.png <?php else: echo $options['homeheader']; endif; ?>" data-bleed="10" data-position="top" data-parallax="scroll"  role="banner">
	<div class="site-branding row" >
		<div class="site-logo columns large-12" style="text-align:center"><img src="<?php bloginfo('template_directory'); ?>/img/header-logo.png" /></div>
	</div><!-- .site-branding -->
	<div class="pusher">
	</div>
	<div class="row" >
		<div class="columns large-8 large-offset-2">
			<h2 class="teasertextheadline">Herzlich willkommen auf der Seite der Väter-Kinder-Freizeit Wiesloch!</h2>
			<p class="teaertextcopy">
				Die VKF oder auch “FAUKAEF” ist ein Ferien-Zeltlager für Kinder im Alter zwischen vier bis zwölf Jahren mit ihren Papas.
			</p>
			<p class="teaertextcopy">
				Gegründet wurde die VKF schon im Jahr 2000 in Wiesloch. 
			</p>
		</div>
	</div>
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
	<img class="sectionicon" src="<?php bloginfo('template_directory'); ?>/img/checkliste-section-icon.png">
	<div class="row">
		<div class="columns large-8 large-offset-2 medium-8 medium-offset-2">
			<h3>Checkliste</h3>
			<h4><?php if( empty( $options['checklistsub'] ) ) : ?>Ich packe meinen Koffer und nehme mit… <?php else: echo $options['checklistsub']; endif; ?></h4>
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
		<a class="downloadbutton" href="<?php if( empty( $options['checklistpdf'] ) ) : ?><?php bloginfo('template_directory'); ?>/img/checkliste.pdf <?php else: echo $options['checklistpdf']; endif; ?>" target="_blank">Download als PDF</a>
	</div>
</div>
<div class="alert">
	<div class="row">
		<div class="columns large-1 medium-1 small-3 large-offset-1"><img src="<?php bloginfo('template_directory'); ?>/img/alert-icon.png"></div>
		<div class="columns large-8 medium-8 small-9 end">
			<p>Verwendet bitte statt eines Koffers besser einen Seesack oder Sporttaschen, da diese unempfindlicher und einfacher zu verstauen sind. Packt die Taschen zusammen mit Euren Kindern. Bitte kennzeichnet Eure Kleider, Taschen und Geschirr, damit alles bei seinem Besitzer bleibt.</p>
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