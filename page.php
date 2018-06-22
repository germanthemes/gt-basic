<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @version 1.0
 * @package GT Basic
 */

get_header();

while ( have_posts() ) :
	the_post();

	get_template_part( 'template-parts/page/content', 'page' );

endwhile;

get_footer();
