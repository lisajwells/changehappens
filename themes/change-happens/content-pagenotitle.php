<?php
/**
 * The template used for displaying page content without the page title.
 *
 * @package Hello World
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!-- <header class="entry-header"> -->
		<!-- <h1 class="entry-title"><?php the_title(); ?></h1> -->
	<!-- </header>.entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array(	'before' => '<div class="page-links">' . __( 'Pages:', 'hello-world' ), 'after'  => '</div>', 'pagelink' => '<span class="page-numbers">%</span>',  ) ); ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
