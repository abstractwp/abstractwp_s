<?php
/**
 * Display the customizer body scripts.
 *
 * @package wd_s
 */

namespace WebDevStudios\wd_s;

/**
 * Display the customizer body scripts.
 *
 * @author Thong Dang
 *
 * @return string Body scripts.
 */
function print_customizer_body_scripts() {
	// Check for body scripts.
	$scripts = get_theme_mod( 'wd_s_body_scripts' );

	// None? Bail...
	if ( ! $scripts ) {
		return false;
	}

	// Otherwise, echo the scripts!
	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- XSS OK.
	echo get_post_content( $scripts );
}

add_action( 'wp_body_open', __NAMESPACE__ . '\print_customizer_body_scripts', 999 );
