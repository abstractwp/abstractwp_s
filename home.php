<?php
/**
 * The blog template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wd_s
 */

use function WebDevStudios\wd_s\print_numeric_pagination;
use function WebDevStudios\wd_s\main_classes;
use function WebDevStudios\wd_s\get_blog_main_classes;

get_header(); ?>

	<main id="main" class="<?php echo esc_attr( main_classes( get_blog_main_classes() ) ); ?>">

		<?php
		if ( have_posts() ) :
			?>
			<header class="entry-header">
				<h1 class="page-title"><?php single_post_title(); ?></h1>
			</header>
			<?php
			if ( is_active_sidebar( 'sidebar-2' ) ) :
				?>
			<div class="content-container">
				<?php
		endif;

		if ( 'post' === get_post_type() ) {
			echo '<div class="facet-filter container flex items-center">';
				echo '<h3 class="filter-label">' . esc_html__( 'Filter by ', 'wd_s' ) . '</h3>';
				echo do_shortcode( '[facetwp sort="true"]' );
				echo do_shortcode( '[facetwp facet="categories"]' );
				echo do_shortcode( '[facetwp facet="tags"]' );
			echo '</div>';
			echo '<div class="posts-facets-list facetwp-template">';
		}

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

		if ( 'post' === get_post_type() ) {
			echo '</div>';
		}

			print_numeric_pagination();

		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;

		if ( is_active_sidebar( 'sidebar-2' ) ) :
			?>
			</div><!-- end blog-container -->
			<?php
			get_sidebar();
		endif;
		?>

	</main><!-- #main -->

<?php get_footer(); ?>
