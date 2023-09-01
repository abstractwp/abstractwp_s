<?php
/**
 * Render duotone svgs.
 *
 * @package    wd_s
 * @subpackage resources
 * @author     Thong Dang
 */

namespace WebDevStudios\wd_s;

/**
 * Render all custom duotone svg.
 */
function render_duotone_svgs() {

	if ( function_exists( 'wp_get_global_styles_svg_filters' ) ) {
		$filters = wp_get_global_styles_svg_filters();
		if ( ! empty( $filters ) ) {
			echo $filters;
		}
	}
}

add_action( 'init', __NAMESPACE__ . '\render_duotone_svgs' );
