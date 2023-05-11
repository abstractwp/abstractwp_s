<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wd_s
 */

use function WebDevStudios\wd_s\print_copyright_text;
use function WebDevStudios\wd_s\print_social_network_links;
use function WebDevStudios\wd_s\print_mobile_menu;
use function WebDevStudios\wd_s\custom_widget_area_class;

if ( is_active_sidebar( 'sidebar-3' ) && ! is_page_template( 'page-templates/no-footer.php' ) ) {
	?>
	<aside class="footer-widgets widget-area">
			<div class="footer-widgets-wrap<?php echo esc_html( custom_widget_area_class( 'sidebar-3' ) ); ?>">
			<?php dynamic_sidebar( 'sidebar-3' ); ?>
		</div>
	</aside>
	<?php
}
?>

	<footer class="site-footer">

		<nav id="site-footer-navigation" class="footer-navigation navigation-menu" aria-label="<?php esc_attr_e( 'Footer Navigation', 'wd_s' ); ?>">
			<?php
			wp_nav_menu(
				[
					'fallback_cb'    => false,
					'theme_location' => 'footer',
					'menu_id'        => 'footer-menu',
					'menu_class'     => 'menu',
					'container'      => false,
					'depth'          => 1,
				]
			);
			?>
		</nav><!-- #site-navigation-->

		<div class="site-info">
			<?php print_copyright_text(); ?>
			<?php print_social_network_links(); ?>
		</div><!-- .site-info -->

	</footer><!-- .site-footer-->

	<?php print_mobile_menu(); ?>
	<?php wp_footer(); ?>

</body>

</html>
