<?php
/**
 * The template for displaying archive pages.
 *
 * @package    wd_s
 * @subpackage theme
 * @author     Thong Dang
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

use function WebDevStudios\wd_s\print_numeric_pagination;
use function WebDevStudios\wd_s\main_classes;

get_header(); ?>

<main id="main" class="<?php echo esc_attr( main_classes( [] ) ); ?>">
	<?php if ( have_posts() ) : ?>
	<div class="container throughts-container">
		<?php
			/* Start the Loop */
		$wd_s_i = 0;
		while ( have_posts() ) :
			the_post();

			if ( 0 === $wd_s_i ) {
				echo '<div class="throughts-left">';
				set_query_var( 'is_first_throught', true );
			} else {
				set_query_var( 'is_first_throught', false );
			}

			get_template_part( 'template-parts/content-throughts' );

			if ( 0 === $wd_s_i ) {
				echo '</div><div class="throughts-right">';
			}

			$wd_s_i ++;
			endwhile;
			echo '</div>';

			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
			print_numeric_pagination();

			?>
	</div>
</main><!-- #main -->

<?php get_footer();
?>
