<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package vkf_wiesloch
 */

get_header(); ?>
<div id="content" class="site-content ">
	<div class="row" style="margin-bottom:150px;">
		<div class="columns large-12" style="text-align:center;margin-top:2rem;margin-bottom:4rem;">
			<img src="<?php bloginfo('template_directory'); ?>/img/news-section-icon.png">
			
		</div>
		<div id="primary" class="content-area columns large-10 large-offset-1 end">
			<main id="main" class="site-main" role="main" style="text-align:center">
				<header class="page-header" > 
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'vkf_wiesloch' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'vkf_wiesloch' ); ?></p>

					<?php //get_search_form(); ?>

				</div><!-- .page-content -->

			</main><!-- #main -->
		</div><!-- #primary -->
	</div>

<?php get_footer(); ?>
