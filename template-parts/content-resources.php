<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wd_s
 */

use function WebDevStudios\wd_s\print_resources_type;
use function WebDevStudios\wd_s\print_entry_footer;
use function WebDevStudios\wd_s\get_trimmed_excerpt;

?>

<article <?php post_class( 'post-container' ); ?>>
	<header class="entry-header">
		<?php
		if ( is_single() ) :
			the_post_thumbnail( 'full' );
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_post_thumbnail( 'resource-thumb' );
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>
		<div class="entry-meta">
			<?php print_resources_type( get_the_ID() ); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		if ( is_single() ) :
			the_content();
		else :
			echo esc_html(
				get_trimmed_excerpt(
					array(
						'post'   => get_the_ID(),
						'length' => 25,
					)
				)
			);
		endif;
		?>
		<?php
		wp_link_pages(
			[
				'before' => '<div class="page-links">' . esc_attr__( 'Pages:', 'wd_s' ),
				'after'  => '</div>',
			]
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php print_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
