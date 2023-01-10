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
			<div class="content-container">
			<?php

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			print_numeric_pagination();

		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>
		</div><!-- end blog-container -->
		<?php
		if ( is_active_sidebar( 'sidebar-2' ) ) :
			get_sidebar();
		endif;
		?>

	</main><!-- #main -->

<?php get_footer(); ?>
