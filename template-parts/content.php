<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wd_s
 */

use function WebDevStudios\wd_s\print_post_date;
use function WebDevStudios\wd_s\print_post_author;
use function WebDevStudios\wd_s\print_entry_footer;
use function WebDevStudios\wd_s\get_trimmed_excerpt

?>

<article <?php post_class( 'post-container' ); ?>>

	<header class="entry-header">
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php print_post_date(); ?>
					<?php print_post_author(); ?>
				</div><!-- .entry-meta -->
				<?php
				the_post_thumbnail( 'full' );
			endif;
		else :
			if ( 'post' === get_post_type() ) :
				if ( has_post_thumbnail() ) :
					the_post_thumbnail( 'blog-thumb' );
				else :
					$wd_s_colors = [ 'primary', 'secondary', 'tertiary', 'contrast' ];
					echo '<div class="placeholder-img pbg-' . $wd_s_colors[ array_rand( $wd_s_colors )] . '"></div>'; // phpcs:ignore.
				endif;
			endif;
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		if ( 'post' === get_post_type() && ! is_single() ) :
			echo esc_html(
				get_trimmed_excerpt(
					[
						'length' => 30,
						'post'   => get_the_ID(),
					]
				)
			);
		else :
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. */
						esc_html__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'wd_s' ),
						[
							'span' => [
								'class' => [],
							],
						]
					),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				)
			);
		endif;

		wp_link_pages(
			[
				'before' => '<div class="page-links">' . esc_attr__( 'Pages:', 'wd_s' ),
				'after'  => '</div>',
			]
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
		print_entry_footer();
		if ( 'post' === get_post_type() && ! is_single() ) :
			?>
			<div class="entry-meta">
				<?php print_post_date(); ?>
				<?php print_post_author(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
