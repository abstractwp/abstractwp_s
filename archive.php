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

get_header(); ?>

<main id="main" class="<?php echo esc_attr( main_classes( [] ) ); ?>">

	<?php if ( have_posts() ) : ?>

	<header class="page-header">
		<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
		?>
	</header><!-- .page-header -->

		<?php
		if ( 'resources' === get_post_type() ) {
			echo '<div class="facet-filter container flex items-center">';
				echo '<h3 class="filter-label">' . esc_html__( 'Filter by ', 'wd_s' ) . '</h3>';
				echo do_shortcode( '[facetwp facet="resources_type"]' );
				echo do_shortcode( '[facetwp facet="resources_topic"]' );
				echo do_shortcode( '[facetwp facet="resources_industry"]' );
				echo do_shortcode( '[facetwp facet="categories"]' );
				echo do_shortcode( '[facetwp facet="tags"]' );
			echo '</div>';
			echo '<div class="resources-facets-list facetwp-template">';
		}

			/* Start the Loop */
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			print_numeric_pagination();

		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;

		if ( 'resources' === get_post_type() ) {
			echo '</div>';
		}
		?>

</main><!-- #main -->

<?php get_footer();
?>
