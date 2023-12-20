<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wd_s
 */

use function WebDevStudios\wd_s\get_theme_colors;
use function WebDevStudios\wd_s\get_trimmed_excerpt;
?>

<article <?php post_class( 'post-container' ); ?>>

	<header class="entry-header">
		<?php
		if ( has_post_thumbnail() ) :
			the_post_thumbnail( 'blog-thumb' );
			else :
				$wd_s_colors = get_theme_colors();
				echo '<div class="placeholder-img pbg-' . $wd_s_colors[ array_rand( $wd_s_colors )] . '"></div>'; // phpcs:ignore.
			endif;
			?>
			<div class="entry-meta">
				<?php
				$wd_s_taxonomy = 'service_category';

				$wd_s_terms = get_terms(
					array(
						'taxonomy'   => $wd_s_taxonomy,
						'hide_empty' => false,
					)
				);

				if ( ! empty( $wd_s_terms ) && ! is_wp_error( $wd_s_terms ) ) {
					foreach ( $wd_s_terms as $wd_s_term ) {
						$wd_s_term_url = get_term_link( $wd_s_term->term_id, $wd_s_taxonomy );

						$wd_s_term_url = str_replace( $wd_s_taxonomy, 'services', $wd_s_term_url );
						echo '<a href="' . esc_url( $wd_s_term_url ) . '"><h5>' . esc_html( $wd_s_term->name ) . '</h5></a>';
					}
				}
				?>
			</div><!-- .entry-meta -->
			<?php
			the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
			?>
	</header><!-- .entry-header -->

	<?php
	if ( is_singular( 'service' ) ) {
		echo '<div class="entry-content is-layout-constrained has-global-padding">';
	} else {
		echo '<div class="entry-content">';
	}
	?>


		<?php
		if ( ! is_single() ) :
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
		?>
	</div><!-- .entry-content -->

	<?php if ( ! is_single() ) : ?>
	<footer class="entry-footer">
		<!-- wp:buttons {"layout":{"type":"flex"}} -->
		<div class="wp-block-buttons is-layout-flex wp-block-buttons-is-layout-flex"><!-- wp:button {"backgroundColor":"neutral-100","textColor":"neutral-900","style":{"elements":{"link":{"color":{"text":"var:preset|color|neutral-900"}}}}} -->
		<div class="wp-block-button"><a href="<?php echo esc_attr( get_permalink() ); ?>" class="wp-block-button__link has-neutral-900-color has-neutral-100-background-color has-text-color has-background has-link-color wp-element-button"><?php echo esc_html__( 'Continue reading', 'wd_s' ); ?></a></div>
		<!-- /wp:button --></div>
	</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->

