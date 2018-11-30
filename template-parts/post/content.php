<?php
/**
 * The template for displaying articles in the loop with full content
 *
 * @version 1.0
 * @package GT Basic
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php gt_basic_post_image(); ?>

	<header class="post-header entry-header">

		<?php the_title( sprintf( '<h2 class="post-title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php gt_basic_entry_meta(); ?>

	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php the_content( esc_html__( 'Continue reading', 'gt-basic' ) ); ?>

	</div><!-- .entry-content -->

</article>
