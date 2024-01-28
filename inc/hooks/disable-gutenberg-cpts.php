<?php
/**
 * Disable Gutenberg editor on cpts.
 *
 * @package wd_s
 */

namespace WebDevStudios\wd_s;

/**
 * Disable_gutenberg_cpts
 *
 * @param  bool   $is_enabled flag to enable.
 * @param  string $post_type the post type.
 */
function disable_gutenberg_cpts( $is_enabled, $post_type ) {
	if ( 'testimonial' === $post_type ) {
		return false;
	}
	return $is_enabled;
}

add_filter( 'use_block_editor_for_post_type', __NAMESPACE__ . '\disable_gutenberg_cpts', 10, 2 );
