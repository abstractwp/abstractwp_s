<?php
/**
 * Registers custom block pattern categories for the WD_S theme.
 *
 * @package wd_s
 */

namespace WebDevStudios\wd_s;

/**
 * Registers custom block pattern categories for the WD_S theme.
 */
function register_custom_block_pattern_category() {

	register_block_pattern_category(
		'wds-patterns',
		[
			'label' => __( 'WDS Patterns', 'wd_s' ),
		]
	);

	register_block_pattern_category(
		'wds-content',
		[
			'label' => __( 'Content', 'wd_s' ),
		]
	);

	register_block_pattern_category(
		'wds-features',
		[
			'label' => __( 'Features', 'wd_s' ),
		]
	);

	register_block_pattern_category(
		'wds-cta',
		[
			'label' => __( 'CTA', 'wd_s' ),
		]
	);

	register_block_pattern_category(
		'wds-pricing',
		[
			'label' => __( 'Pricing', 'wd_s' ),
		]
	);

	register_block_pattern_category(
		'wds-testimonial',
		[
			'label' => __( 'Testimonials', 'wd_s' ),
		]
	);

	// Remove default patterns.
	remove_theme_support( 'core-block-patterns' );
}
add_action( 'init', __NAMESPACE__ . '\register_custom_block_pattern_category', 9 );
