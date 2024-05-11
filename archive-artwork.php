<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wd_s
 */

use function WebDevStudios\wd_s\main_classes;
get_header(); ?>
<main id="main" class="<?php echo esc_attr( main_classes( [] ) ); ?>">

	<?php if ( have_posts() ) : ?>

	<header class="page-header is-layout-constrained">
		<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
		?>
	</header><!-- .page-header -->

		<?php
		get_template_part( 'template-parts/facet-filter' );

		echo '<div class="container facetwp-template">';
			/* Start the Loop */
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

				endwhile;
		echo '</div>';

		echo do_shortcode( '[facetwp facet="load_more"]' );

		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>

</main><!-- #main -->

<?php get_footer();
?>