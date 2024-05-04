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
	<script type="text/javascript" src="//use.typekit.net/ik/07KOpb2yYZdgiqi09afCgEg82wBhG-U9CqjgPKObrUJfeG32fFHN4UJLFRbh52jhWDmy5emqjD4yZc9uFemcjDsKFDJaFRy8FU7ZMPG0jWmXiAu0OWiydeUyjh9lZhmCdKoDSWmyScmDSeBRZPoRdhXCjWmXiAu0OWiydeUyjh9lZhmCdKoDSWmyScmDSeBRZPoRdhXCdeNRjAUGdaFXOYZ8ZhiTZAuzdKoRdkUaiaS0jWmXiAu0OWiydeUyjh9lZhmCdKoDSWmyScmDSeBRZPoRdhXCiaiaO1Z8ZhiTZAuzdKoRdkJwSY4zpe8ljPu0daZyJ6iR-eB0ieBCJylyZeNkdKuDdANzie6ljhN0Zem0ShmqOWFyd1wKecUzOW48SkXUwKuKdhUqOABCifuzjAlCjAoqH6qJtKGbMg62JMJ7fbKzMsMMeMb6MKG4fHXgIMMjgKMfH6qJK3IbMg6YJMJ7f6R0hbIbMs62JMJ7f6KXh6IbMs6eJMJ7f6RChbIbMs6FJMJ7f6Rlh6IbMs6bJMJ7f6KXh3IbMy6IJMJ7f6KpabIbMU6IJMHbMZEX0F9B.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

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

			<?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'mobile' ) ) : ?>
				<button type="button" class="off-canvas-open" aria-expanded="false" aria-label="<?php esc_attr_e( 'Open Menu', 'wd_s' ); ?>"></button>
			<?php endif; ?>

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
	</header><!-- .site-header-->
