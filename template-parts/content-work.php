<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wd_s
 */

use function WebDevStudios\wd_s\get_trimmed_excerpt;
use function WebDevStudios\wd_s\get_theme_colors;
?>

<article <?php post_class( 'post-container' ); ?>>

	<div class="wp-block-group">
		<div class="wp-block-columns alignwide is-layout-flex">
			<div class="wp-block-column is-layout-flow">
				<?php
				if ( has_post_thumbnail() ) :
					the_post_thumbnail( 'blog-thumb' );
				else :
					$wd_s_colors = get_theme_colors();
					echo '<div class="placeholder-img pbg-' . $wd_s_colors[ array_rand( $wd_s_colors )] . '"></div>'; // phpcs:ignore.
				endif;
				?>
			</div>
			<div class="wp-block-column is-vertically-aligned-center is-layout-flow">
				<?php
					the_title( '<h3 class="entry-title">', '</h3>' );

					echo esc_html(
						get_trimmed_excerpt(
							[
								'length' => 30,
								'post'   => get_the_ID(),
							]
						)
					);
					?>

				<!-- wp:buttons {"layout":{"type":"flex"}} -->
				<div class="wp-block-buttons is-layout-flex wp-block-buttons-is-layout-flex"><!-- wp:button {"backgroundColor":"neutral-100","textColor":"neutral-900","style":{"elements":{"link":{"color":{"text":"var:preset|color|neutral-900"}}}}} -->
				<div class="wp-block-button"><a href="<?php echo esc_attr( get_permalink() ); ?>" class="wp-block-button__link has-neutral-900-color has-neutral-100-background-color has-text-color has-background has-link-color wp-element-button"><?php echo esc_html__( 'Read more', 'wd_s' ); ?></a></div>
				<!-- /wp:button --></div>
			</div>
		</div>
	</div>

</article><!-- #post-## -->

