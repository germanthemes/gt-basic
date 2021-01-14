<?php
/**
 * Header Widgets
 *
 * @version 1.0
 * @package GT Basic
 */

if ( is_active_sidebar( 'header' ) ) :
	?>

	<div class="header-widgets clearfix">

		<?php dynamic_sidebar( 'header' ); ?>

	</div>

	<?php
endif;
