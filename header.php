<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @version 1.0
 * @package GT Basic
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>

	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'gt-basic' ); ?></a>

		<?php do_action( 'gt_basic_before_header' ); ?>

		<header id="masthead" class="site-header" role="banner">

			<?php gt_basic_header_image(); ?>

			<div class="header-main">

				<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
				<?php get_template_part( 'template-parts/header/site', 'widgets' ); ?>

			</div><!-- .header-main -->

			<?php get_template_part( 'template-parts/header/site', 'navigation' ); ?>

		</header><!-- #masthead -->

		<?php do_action( 'gt_basic_after_header' ); ?>

		<div id="content" class="site-content">

			<main id="main" class="site-main" role="main">
