<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @version 1.0
 * @package GT Basic
 */

get_header();

if ( have_posts() ) :

	gt_basic_archive_header();

	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/post/content' );

	endwhile;

	gt_basic_pagination();

else :

	get_template_part( 'template-parts/page/content', 'none' );

endif;

get_footer();
