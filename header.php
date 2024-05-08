<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wd_s
 */
// phpcs:ignoreFile
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php
	wp_head();
	use function WebDevStudios\wd_s\print_header_block;
	?>

</head>

<body <?php body_class( 'site-wrapper' ); ?>>

	<?php wp_body_open(); ?>

	<header class="site-header">

		<div class="site-header-content">

			<div class="site-branding">

				<?php the_custom_logo(); ?>

				<?php

				$wd_s_description = get_bloginfo( 'description', 'display' );
				if ( $wd_s_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo esc_html( $wd_s_description ); ?></p>
				<?php endif; ?>

			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation navigation-menu" aria-label="<?php esc_attr_e( 'Main Navigation', 'wd_s' ); ?>">
				<?php
				wp_nav_menu(
					[
						'fallback_cb'    => false,
						'theme_location' => 'primary',
						'menu_id'        => 'primary-menu',
						'menu_class'     => 'menu dropdown container',
						'container'      => false,
					]
				);
				?>
			</nav><!-- #site-navigation-->
		</div><!-- .site-header-content -->
		<?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'mobile' ) ) : ?>
			<button type="button" class="off-canvas-open" aria-expanded="false" aria-label="<?php esc_attr_e( 'Open Menu', 'wd_s' ); ?>"></button>
		<?php endif; ?>
	</header><!-- .site-header-->
