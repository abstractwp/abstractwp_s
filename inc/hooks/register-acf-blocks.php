<?php
/**
 * Register custom blocks.
 *
 * @package wd_s
 */

namespace WebDevStudios\wd_s;

add_action( 'acf/init', __NAMESPACE__ . '\register_acf_blocks' );

/**
 * Register Custom Blocks
 */
function register_acf_blocks() {
	// check function exists.
	if ( function_exists( 'acf_register_block_type' ) ) {

		// register testimonials slider block.
		acf_register_block_type(
			array(
				'name'            => 'testimonials-slider-block',
				'title'           => __( 'Testimonials block', 'wd_s' ),
				'description'     => __( 'Single or slider of testimonials', 'wd_s' ),
				'render_template' => 'blocks/testimonials.php',
				'category'        => 'wds-blocks-category',
				'icon'            => 'testimonial',
				'keywords'        => array( 'testimonials', 'slider' ),
				'supports'        => array(
					'align' => false,
				),
				'enqueue_assets'  => function () {
					wp_enqueue_script( 'slick-script', get_template_directory_uri() . '/assets/js/lib/slick.min.js', array( 'jquery' ), '1.8.1', true );
					wp_enqueue_script( 'testimonials-script', get_template_directory_uri() . '/assets/js/lib/testimonials-slider.js', array( 'jquery', 'slick-script' ), '1.0', true );
				},
			)
		);
	}
}
