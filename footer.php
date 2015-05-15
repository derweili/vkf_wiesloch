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

	<footer id="colophon" class="site-footer">
	<img class="sectionicon" src="<?php bloginfo('template_directory'); ?>/img/kontakt-section-icon.png">
		<h3>Kontakt und Anmeldung</h3>
		<div class="row">
			<div class="columns large-4 large-offset-2">
				<h4>Leitung</h4>
				<p>Claudia Kahnt <br />
					Email: <a href="mailto:claudia.kahnt@arcor.de">claudia.kahnt@arcor.de</a>
				</p>
				<h4>Leitung</h4>
				<p>Jan-Peter Oppenheimer<br />
					Email: <a href="mailto:jp.oppenheimer@gmail.com">jp.oppenheimer@gmail.com</a><br />
					M +49 174 45 33 382
				</p>
			</div>
			<div class="columns large-4 end">
				<?php echo do_shortcode('[contact-form-7 id="245" title="Kontaktformular 1"]'); ?>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script src="<?php bloginfo('template_directory'); ?>/js/foundation.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/foundation/foundation.topbar.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/foundation/foundation.clearing.js"></script>
<script src="http://pixelcog.github.io/parallax.js/js/parallax.min.js"></script>
<script>
  jQuery(document).foundation();
</script>
<script>

  
jQuery(document).ready(function(){
	jQuery('a[href^="#"]').on('click',function (e) {
	    e.preventDefault();

	    var target = this.hash;
	    var $target = jQuery(target);
      
      	var myOff =  $target.offset().top -141;

	    jQuery('html, body').stop().animate({
	        'scrollTop': myOff
	    }, 900, 'swing', function () {

	    });
	});
}); 
  
// then on window load scroll to the called anchor (that will trigger the window scroll 
// so your upper menu can appear again)
jQuery(window).load(function() {
  if (window.location.hash){ 
    	var target = window.location.hash;
    	var $target = jQuery(target);
    
    	var myOff = $target.offset().top -141
    
	    jQuery('html, body').stop().animate({
	        'scrollTop': myOff
	    }, 900, 'swing', function () {

	    });
 }
});
</script>

</body>
</html>
