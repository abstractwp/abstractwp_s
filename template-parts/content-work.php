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
use function WebDevStudios\wd_s\get_work_taxonomies;
?>

<article <?php post_class( 'post-container' ); ?>>
<?php if ( ! is_single() ) : ?>
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
					the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink( get_the_ID() ) ) . '" rel="bookmark">', '</a></h3>' );

					echo '<p>' . esc_html(
						get_trimmed_excerpt(
							[
								'length' => 30,
								'post'   => get_the_ID(),
							]
						)
					) . '</p>';
				?>

				<!-- wp:buttons {"layout":{"type":"flex"}} -->
				<div class="wp-block-buttons is-layout-flex wp-block-buttons-is-layout-flex"><!-- wp:button -->
				<div class="wp-block-button"><a href="<?php echo esc_attr( get_permalink() ); ?>" class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Read more', 'wd_s' ); ?></a></div>
				<!-- /wp:button --></div>
			</div>
		</div>
	</div>

</article><!-- #post-## -->

<?php else : ?>
	<header class="entry-header">
		<?php
			echo '<div class="hero-banner">';
				the_post_thumbnail( 'full' );
		?>
				<div class="hero-meta-box">
				<?php
					echo get_work_taxonomies( get_the_ID() ); // phpcs:ignore.
					the_title( '<h1 class="entry-title">', '</h1>' );
				?>
				</div>
			</div>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

<?php endif; ?>
