<?php
/**
 * Template part for displaying service.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wd_s
 */

$wd_s_tax = get_query_var( 'wd_s_tax' );
?>

<article <?php post_class( 'post-container' ); ?>>

	<header class="entry-header">
	<?php
		$wd_s_tax_img = get_field( 'feature_image', 'service_' . $wd_s_tax->term_id );
		echo wp_get_attachment_image( $wd_s_tax_img, [ '582, 304' ], '', array( 'class' => 'wp-post-image' ) );
		printf( '<h2 class="entry-title"><a href="%s" rel="bookmark">%s</a></h2>', esc_url( get_term_link( $wd_s_tax->term_id, 'service' ) ), esc_html( $wd_s_tax->name ) );
	?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			echo $wd_s_tax->description; // phpcs:ignore.
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<!-- wp:buttons -->
		<div class="wp-block-buttons"><!-- wp:button -->
		<div class="wp-block-button"><a href="<?php echo esc_attr( get_term_link( $wd_s_tax->term_id, 'service' ) ); ?>" class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Read more', 'wd_s' ); ?></a></div>
		<!-- /wp:button -->
		<!-- /wp:buttons -->
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

