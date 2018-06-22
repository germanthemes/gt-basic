<?php
/**
 * The template for displaying single posts
 *
 * @version 1.0
 * @package GT Basic
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="post-header entry-header">

		<?php gt_basic_post_image_single(); ?>

		<?php the_title( '<h1 class="post-title entry-title">', '</h1>' ); ?>

		<?php gt_basic_entry_meta(); ?>

	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php the_content(); ?>

	</div><!-- .entry-content -->

</article>
