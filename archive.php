<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GT Vision
 */

get_header();

if ( have_posts() ) :

	gt_vision_archive_header();

	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/post/content' );

	endwhile;

	gt_vision_pagination();

else :

	get_template_part( 'template-parts/page/content', 'none' );

endif;

get_footer();
