<?php
/**
 * The template for displaying all single posts.
 *
 * @package vkf_wiesloch
 */

get_header(); ?>
<div id="content" class="site-content ">
	<div class="row">
		<div class="columns large-12" style="text-align:center;margin-top:2rem;margin-bottom:4rem;">
			<img src="<?php bloginfo('template_directory'); ?>/img/news-section-icon.png">
		</div>
		<div id="primary" class="content-area columns large-7 large-offset-1">
			<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'single' ); ?>

				<?php //the_post_navigation(); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) : ?>
						<div class="row">
							<div class="columns large-10 medium-10 end">
								<?php
									comments_template();
								?>
							</div>
						</div>
						<?php
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->
		<div class="columns large-3 end">
		<?php get_sidebar(); ?>
		</div>
	</div>
<?php get_footer(); ?>
