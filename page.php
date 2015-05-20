<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package vkf_wiesloch
 */

get_header(); ?>
<div id="content" class="site-content ">
	<div class="row">
		<div class="columns large-12" style="text-align:center;margin-top:2rem;margin-bottom:4rem;">
			<img src="<?php bloginfo('template_directory'); ?>/img/news-section-icon.png">
		</div>
		<div id="primary" class="content-area columns large-7 large-offset-1 end">
			<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php //the_post_navigation(); ?>

			<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div>
<?php get_footer(); ?>