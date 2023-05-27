<?php
/**
 * Rewrite url for throughts category.
 *
 * @package    wd_s
 * @subpackage throughts
 * @author     Thong Dang
 */

namespace WebDevStudios\wd_s;

/**
 * Remove base category slug on throughts category.
 */
function remove_category_base() {
	$category_slug = 'throughts';

	$category = get_category_by_slug( $category_slug );

	if ( $category ) {
		add_rewrite_rule(
			'^' . $category_slug . '/?$',
			'index.php?category_name=' . $category_slug,
			'top'
		);
	}
}
add_action( 'init', __NAMESPACE__ . '\remove_category_base' );
