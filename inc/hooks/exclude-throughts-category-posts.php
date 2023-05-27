<?php
/**
 * Remove throughts post from blog archive page.
 *
 * @package    wd_s
 * @subpackage throughts
 * @author     Thong Dang
 */

namespace WebDevStudios\wd_s;

/**
 * Remove throughts post from blog archive page.
 *
 * @param object $query the query args.
 */
function exclude_throughts_category_posts( $query ) {
	if ( $query->is_home() && $query->is_main_query() ) {
		$exclude_category = 'throughts';

		$exclude_category_id = get_cat_ID( $exclude_category );

		if ( $exclude_category_id ) {
			$query->set( 'cat', '-' . $exclude_category_id );
		}
	}
}
add_action( 'pre_get_posts', __NAMESPACE__ . '\exclude_throughts_category_posts' );
