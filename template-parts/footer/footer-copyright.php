<?php
/**
 * Footer Copyright
 *
 * @version 1.0
 * @package GT Basic
 */


// Check if there are footer copyright widgets.
if ( is_active_sidebar( 'footer-copyright' ) ) :
	?>

	<div id="footer-copyright" class="footer-copyright footer-main widget-area">

		<?php dynamic_sidebar( 'footer-copyright' ); ?>

	</div><!-- .footer-copyright -->

	<?php
endif;
