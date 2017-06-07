<?php
/**
 */
?>

<?php if ( 'magazine' == get_theme_mod( 'hello_world_content' ) ) : ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-magazine">
		<?php if ( has_post_thumbnail() ): ?>
			<div class="post-thumbnail">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'hello-world-post-magazine-thumbnail' ); ?></a>
			</div>
		<?php endif; ?><!-- if has thumbnail -->
		<div class="post-magazine-content">
			<header class="entry-header">
					<?php hello_world_header_meta(); ?>
					<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			</header><!-- .entry-header -->
			<div class="entry-summary">
				<?php echo hello_world_shorten_text( get_the_excerpt(), 200 ); ?>
			</div><!-- .entry-summary -->
		</div>
	</div>
</article><!-- #post-## -->

<?php else : ?>

	<?php if ( is_sticky() ): ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post-sticky">
				<header class="entry-header">
					<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
					<?php if ( has_post_thumbnail() ): ?>
						<div class="post-thumbnail">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
						</div>
					<?php endif; ?><!-- if has thumbnail -->
				</header><!-- .entry-header -->
				<div class="entry-content">
					<?php the_content(); ?>
					<a href="#"><div id="burst-cta">
						<div id="burst-text">
							<p>Let's Talk!</p>
							<p>Click Here</p>
							<p>For a free<br>Mini-Session</p>
						</div>
					</div></a>
				</div><!-- .entry-summary -->
			</div>
		</article><!-- #post-## -->

	<?php else : ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post-normal">
				<header class="entry-header">
					<?php hello_world_header_meta(); ?>
					<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
					<?php if ( has_post_thumbnail() ): ?>
						<div class="post-thumbnail">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
						</div>
					<?php endif; ?><!-- if has thumbnail -->
				</header><!-- .entry-header -->
				<?php if ( ! get_post_format() && ( 'summary' == get_theme_mod( 'hello_world_content' ) || is_search() ) ) : ?>
					<div class="entry-summary">
						<?php the_excerpt(); ?>
						<p><a href="<?php the_permalink(); ?>" rel="bookmark"><?php _e( '<span class="continue-reading">Continue reading &rarr;</span>', 'hello-world' ); ?></a></p>
					</div><!-- .entry-summary -->
				<?php else : ?>
					<div class="entry-content">
						<?php the_content( __( '<span class="continue-reading">Continue reading &rarr;</span>', 'hello-world' ) ); ?>
						<?php wp_link_pages( array(	'before' => '<div class="page-links">' . __( 'Pages:', 'hello-world' ), 'after'  => '</div>', 'pagelink' => '<span class="page-numbers">%</span>',  ) ); ?>
					</div><!-- .entry-content -->
				<?php endif; ?><!-- if summary or search -->
			</div>
		</article><!-- #post-## -->

	<?php endif; ?><!-- if it's sticky -->

<?php endif; ?><!-- if magazine or else -->
