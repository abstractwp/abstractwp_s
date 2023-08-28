<?php
/**
 * Custom Blocks.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wd_s
 */

namespace WebDevStudios\wd_s;

add_action( 'acf/init', __NAMESPACE__ . '\collectivewp_register_blocks' );

/**
 * Register Custom Blocks
 */
function collectivewp_register_blocks() {
	// check function exists.
	if ( function_exists( 'acf_register_block_type' ) ) {

		// register testimonials slider block.
		acf_register_block_type(
			array(
				'name'            => 'testimonials-slider-block',
				'title'           => __( 'CollectiveWP - Testimonials slider', 'wd_s' ),
				'description'     => __( 'CollectiveWP - A slider of testimonials', 'wd_s' ),
				'render_template' => 'template-parts/blocks/testimonials-slider.php',
				'category'        => 'collectivewp-blocks',
				'icon'            => 'embed-generic',
				'keywords'        => array( 'testimonials', 'slider', 'collectivewp' ),
				'supports'        => array(
					'align' => false,
				),
				'enqueue_assets'  => function() {
					wp_enqueue_style( 'slick-style', get_template_directory_uri() . '/inc/blocks/styles/slick.css', '', '1.8.1' );

					wp_enqueue_script( 'slick-script', get_template_directory_uri() . '/inc/blocks/scripts/slick.min.js', array( 'jquery' ), '1.8.1', true );
					wp_enqueue_script( 'testimonials-script', get_template_directory_uri() . '/inc/blocks/scripts/testimonials-slider.js', array( 'jquery', 'slick-script' ), '1.0', true );
				},
			)
		);
	}
}

/**
 * Register block category.
 *
 * @param array  $categories the current list of categories.
 * @param object $post the post data.
 */
function collective_block_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug'  => 'collectivewp-blocks',
				'title' => __( 'CollectiveWP Blocks', 'wd_s' ),
			),
		)
	);
}
add_filter( 'block_categories', 'collective_block_category', 10, 2 );
