<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package vkf_wiesloch
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'vkf_wiesloch' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'vkf_wiesloch' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'vkf_wiesloch' ), 'vkf_wiesloch', '<a href="http://julian-weiland.de" rel="designer">Julian Weiland</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script src="<?php bloginfo('template_directory'); ?>/js/foundation.min.js"></script>
<script>
  $(document).foundation();
</script>
</body>
</html>
