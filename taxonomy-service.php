<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wd_s
 */

use function WebDevStudios\wd_s\print_numeric_pagination;
use function WebDevStudios\wd_s\main_classes;
use function WebDevStudios\wd_s\get_services_taxonomies;

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
		$wd_s_service_sub_taxs = get_services_taxonomies( get_queried_object_id() );

		if ( ! empty( $wd_s_service_sub_taxs ) ) :
			echo '<div class="wp-block-group alignfull has-neutral-100-background-color has-background has-global-padding is-layout-constrained"><div class="wp-block-group sub-taxonomies alignwide">';
			foreach ( $wd_s_service_sub_taxs as $wd_s_service_sub_tax ) {
				set_query_var( 'wd_s_tax', $wd_s_service_sub_tax );
				get_template_part( 'template-parts/content-tax-service' );
			}
			echo '</div></div>';
		endif;

		?>

</main><!-- #main -->

<?php get_footer();
?>
