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
use function WebDevStudios\wd_s\get_trimmed_excerpt;
use function WebDevStudios\wd_s\get_theme_colors;
$wd_s_show_feature = get_query_var( 'show_feature', true );
?>

<article <?php post_class( 'post-container' ); ?>>

	<header>
		<?php
		if ( 'post' === get_post_type() && $wd_s_show_feature ) :
			if ( has_post_thumbnail() ) :
				the_post_thumbnail( 'blog-thumb' );
			else :
				$wd_s_colors = get_theme_colors();
				echo '<div class="placeholder-img pbg-' . $wd_s_colors[ array_rand( $wd_s_colors )] . '"></div>'; // phpcs:ignore.
			endif;
		endif;
		the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><h3 class="entry-title">', '</h3></a>' );
		?>
		<div class="entry-meta">
			<?php print_post_author(); ?>
			<?php print_post_date( [ 'date_text' => 'on' ] ); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
	<?php
		echo esc_html(
			get_trimmed_excerpt(
				[
					'length' => 30,
					'post'   => get_the_ID(),
				]
			)
		);
		?>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<!-- wp:buttons {"layout":{"type":"flex"}} -->
		<div class="wp-block-buttons is-layout-flex wp-block-buttons-is-layout-flex"><!-- wp:button {"backgroundColor":"neutral-100","textColor":"neutral-900","style":{"elements":{"link":{"color":{"text":"var:preset|color|neutral-900"}}}}} -->
		<div class="wp-block-button"><a href="<?php echo esc_attr( get_permalink() ); ?>" class="wp-block-button__link has-neutral-900-color has-neutral-100-background-color has-text-color has-background has-link-color wp-element-button"><?php echo esc_html__( 'Continue reading', 'wd_s' ); ?></a></div>
		<!-- /wp:button --></div>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
