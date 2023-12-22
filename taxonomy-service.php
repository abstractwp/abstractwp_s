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
	<header class="entry-header">
	<?php
		echo '<div class="hero-banner">';
		$wd_s_tax_img = get_field( 'feature_image', 'service_' . get_queried_object_id() );
		echo wp_get_attachment_image( $wd_s_tax_img, 'full', '', array( 'class' => 'wp-post-image' ) );
	?>
			<div class="hero-meta-box">
			<?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="archive-description">', '</div>' );
			?>
			</div>
		</div>
	</header><!-- .entry-header -->

		<?php
		echo '<div class="wp-block-group has-global-padding"><div class="service-content">';
			the_field( 'content', 'service_' . get_queried_object_id() );
		echo '</div></div>';

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

		$wd_s_tax_works = get_service_posts( get_queried_object_id(), 'work' );

		if ( $wd_s_tax_works ) :
			echo '<div class="wp-block-group posts-group has-global-padding">';
			printf( '<h2 class="section-title">%s</h2>', esc_html__( 'Case studies', 'wd_s' ) );
			echo '<div class="works-list alignwide">';

			/* Start the Loop */
			foreach ( $wd_s_tax_works as $post ) : // phpcs:ignore.
				setup_postdata( $post );

				get_template_part( 'template-parts/content', get_post_type() );

			endforeach;
			echo '</div></div>';
			wp_reset_postdata();
		endif;

		$wd_s_tax_testimonials = get_service_posts( get_queried_object_id(), 'testimonial' );

		if ( $wd_s_tax_testimonials ) :
			echo '<div class="wp-block-group posts-group has-global-padding">';
			printf( '<h2 class="section-title">%s</h2>', esc_html__( 'Testimonials', 'wd_s' ) );
			echo '<div class="works-list alignwide">';

			/* Start the Loop */
			$wd_s_testimonials = [];
			foreach ( $wd_s_tax_testimonials as $wd_s_tax_testimonial ) :
				$wd_s_testimonial            = [];
				$wd_s_testimonial['author']  = $wd_s_tax_testimonial->post_title;
				$wd_s_testimonial['content'] = wp_strip_all_tags( $wd_s_tax_testimonial->post_content );
				$wd_s_testimonial['avatar']  = get_the_post_thumbnail_url( $wd_s_tax_testimonial->ID, [ '64', '64' ] );
				$wd_s_testimonial['rating']  = get_field( 'rating', $wd_s_tax_testimonial->ID );
				$wd_s_testimonials[]         = $wd_s_testimonial;
			endforeach;

			set_query_var( 'testimonials', $wd_s_testimonials );
			get_template_part( 'blocks/testimonials' );
			echo '</div></div>';
		endif;


		$wd_s_tax_posts = get_service_posts( get_queried_object_id() );

		if ( $wd_s_tax_posts ) :
			echo '<div class="wp-block-group posts-group has-global-padding">';
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
