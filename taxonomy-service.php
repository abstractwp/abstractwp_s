<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wd_s
 */

use function WebDevStudios\wd_s\main_classes;
use function WebDevStudios\wd_s\get_service_taxonomies;
use function WebDevStudios\wd_s\get_service_posts;

get_header(); ?>

<main id="main" class="<?php echo esc_attr( main_classes( [] ) ); ?>">

	<header class="page-header is-layout-constrained">
		<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
		?>
	</header><!-- .page-header -->

		<?php
		// Show list of sub taxonomies.
		$wd_s_service_sub_taxs = get_service_taxonomies( get_queried_object_id() );

		if ( ! empty( $wd_s_service_sub_taxs ) ) :
			echo '<div class="wp-block-group alignfull has-neutral-100-background-color has-background has-global-padding is-layout-constrained"><div class="wp-block-group sub-taxonomies alignwide">';
			foreach ( $wd_s_service_sub_taxs as $wd_s_service_sub_tax ) {
				set_query_var( 'wd_s_tax', $wd_s_service_sub_tax );
				get_template_part( 'template-parts/content-tax-service' );
			}
			echo '</div></div>';
		endif;

		$wd_s_tax_posts = get_service_posts( get_queried_object_id() );

		if ( $wd_s_tax_posts ) :
			echo '<div class="wp-block-group posts-group">';
			printf( '<h2 class="section-title">%s</h2>', esc_html__( 'Articles', 'wd_s' ) );
			echo '<div class="posts-list">';

			/* Start the Loop */
			foreach ( $wd_s_tax_posts as $post ) : // phpcs:ignore.
				setup_postdata( $post );

				get_template_part( 'template-parts/content', get_post_type() );

			endforeach;
			echo '</div></div>';
			wp_reset_postdata();
		endif;
		?>

</main><!-- #main -->

<?php get_footer();
?>
