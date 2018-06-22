<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @version 1.0
 * @package GT Basic
 */

get_header();

while ( have_posts() ) :
	the_post();

	get_template_part( 'template-parts/post/content', 'single' );

endwhile;

get_footer();
