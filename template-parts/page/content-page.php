<?php
/**
 * The template used for displaying page content in page.php
 *
 * @version 1.0
 * @package GT Basic
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php the_post_thumbnail(); ?>

	<header class="page-header entry-header">

		<?php the_title( '<h1 class="page-title entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php the_content(); ?>

	</div><!-- .entry-content -->

</article>
