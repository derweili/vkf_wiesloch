<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package vkf_wiesloch
 */

if ( ! is_active_sidebar( 'sidebarfooter' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebarfooter' ); ?>
</div><!-- #secondary -->
