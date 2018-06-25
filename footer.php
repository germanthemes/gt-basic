<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @version 1.0
 * @package GT Basic
 */

?>

		</main><!-- #main -->
	</div><!-- #content -->

	<?php do_action( 'gt_basic_before_footer' ); ?>

	<footer id="colophon" class="site-footer">

		<div id="footer-line" class="site-info">
			<?php gt_basic_footer_text(); ?>
		</div><!-- .site-info -->

	</footer><!-- #colophon -->

	<?php do_action( 'gt_basic_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
