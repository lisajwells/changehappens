<?php
/**
 * Custom template tags for this theme.
 *
 * @package Change Happens
 */


if ( ! function_exists( 'hello_world_header_meta' ) ) :
/**
 * Display post header meta.
 */
function hello_world_header_meta() {
	// Hide for pages on Search.
	if ( 'post' != get_post_type() ) {
		return;
	}
	?>
	<div class="entry-header-meta">
		<span class="posted-on">
			<?php printf( '<a href="%1$s" rel="bookmark"><time class="entry-date published" datetime="%2$s">%3$s</time></a>',
				esc_url( get_permalink() ),
				esc_attr( get_the_date( 'c' ) ),
				esc_html( get_the_date() )
			); ?>
		</span>
		<?php if ( get_theme_mod( 'hello_world_show_author' ) ) : ?>
		<span class="byline"><span class="entry-meta-sep"> / </span>
			<span class="author vcard">
				<?php printf( '<a class="url fn n" href="%1$s">%2$s</a>',
					esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
					esc_html( get_the_author() )
				); ?>
			</span>
		</span>
		<?php endif; ?>
		<?php if ( ! post_password_required() && '0' != get_comments_number() ) : ?>
		<span class="comments-link"><span class="entry-meta-sep"> / </span> <?php comments_popup_link( __( 'Leave a comment', 'hello-world' ), __( '1 Comment', 'hello-world' ), __( '% Comments', 'hello-world' ) ); ?></span>
		<?php endif; ?>
	</div><!-- .entry-header-meta -->
	<?php
}
endif;
