<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package wd_s
 */

use function WebDevStudios\wd_s\main_classes;

get_header(); ?>

	<main id="main" class="<?php echo esc_attr( main_classes( [] ) ); ?>">

		<section class="error-404 not-found is-layout-constrained">
			<header class="page-header">
				<h5><?php esc_html_e( '404 error', 'wd_s' ); ?></h5>
				<h2 class="page-title"><?php esc_html_e( "Sorry, this page doesn't exist.", 'wd_s' ); ?></h2>
			</header><!-- .page-header -->

			<div class="page-content">

				<p><?php esc_html_e( "It seems we can't find what you're looking for. Perhaps searching can help.", 'wd_s' ); ?></p>

				<?php get_search_form(); ?>

			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php get_footer(); ?>
