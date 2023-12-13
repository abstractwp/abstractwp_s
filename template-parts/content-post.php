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
use function WebDevStudios\wd_s\print_similar_posts;
use function WebDevStudios\wd_s\get_trimmed_excerpt;
use function WebDevStudios\wd_s\print_post_taxonomies;
?>

<article <?php post_class( 'post-container' ); ?>>

	<header class="entry-header">
		<?php
		if ( is_single() ) :
			echo '<div class="hero-banner">';
				the_post_thumbnail( 'full' );
			?>
				<div class="hero-meta-box">
				<?php
					print_post_taxonomies(
						[
							'tax_name' => 'category',
							'in_list'  => false,
						]
					);
					the_title( '<h1 class="entry-title">', '</h1>' );
				?>
				</div>
			</div>
			<?php
		else :
			if ( 'post' === get_post_type() ) :
				if ( has_post_thumbnail() ) :
					the_post_thumbnail( 'blog-thumb' );
				else :
					$wd_s_colors = [ 'primary-100', 'primary-200', 'primary-300', 'primary-400', 'secondary-100', 'secondary-200', 'secondary-300', 'secondary-400', 'neutral-100', 'neutral-200', 'neutral-300', 'neutral-400' ];
					echo '<div class="placeholder-img pbg-' . $wd_s_colors[ array_rand( $wd_s_colors )] . '"></div>'; // phpcs:ignore.
				endif;
			endif;
			the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
			?>
			<div class="entry-meta">
				<?php print_post_author(); ?>
				<?php print_post_date( [ 'date_text' => 'on' ] ); ?>
			</div><!-- .entry-meta -->
			<?php
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
		if ( 'post' === get_post_type() && ! is_single() ) :

			?>
			<!-- wp:buttons {"layout":{"type":"flex"}} -->
			<div class="wp-block-buttons is-layout-flex wp-block-buttons-is-layout-flex"><!-- wp:button {"backgroundColor":"neutral-100","textColor":"neutral-900","style":{"elements":{"link":{"color":{"text":"var:preset|color|neutral-900"}}}}} -->
			<div class="wp-block-button"><a href="<?php echo esc_attr( get_permalink() ); ?>" class="wp-block-button__link has-neutral-900-color has-neutral-100-background-color has-text-color has-background has-link-color wp-element-button"><?php echo esc_html__( 'Continue reading', 'wd_s' ); ?></a></div>
			<!-- /wp:button --></div>
			<?php
		else :
			$wd_s_author_desc = get_the_author_meta( 'description' );
			echo '<div class="author-box">' . get_avatar( get_the_author(), 157 ) . '<div><h3>' . esc_html( get_the_author() ) . '</h3>';
			echo '<p>' . esc_html( get_the_author_meta( 'description' ) ) . '</p></div></div>';

		endif
		?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->

