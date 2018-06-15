<?php
/**
 * Main Navigation
 *
 * @package GT Vision
 */
?>


<?php if ( has_nav_menu( 'primary' ) ) : ?>

	<div class="primary-navigation">

		<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'gt-vision' ); ?>">
			<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
				<?php
				echo gt_vision_get_svg( 'menu' );
				echo gt_vision_get_svg( 'close' );
				esc_html_e( 'Menu', 'gt-vision' );
				?>
			</button>

			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
				)
			);
			?>
		</nav><!-- #site-navigation -->

	</div><!-- .primary-navigation -->

<?php endif; ?>
