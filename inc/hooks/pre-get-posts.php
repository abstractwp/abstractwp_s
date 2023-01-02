<?php
/**
 * Update post query hooks.
 *
 * @package wd_s
 */

namespace WebDevStudios\wd_s;

/**
 * Snippet Name: modify resources query on archive page
 * Snippet URL: https://www.wpcustoms.net/snippets/modify-custom-post-type-query-on-archive-page/
 *
 * @param object $query query object.
 */
function resources_archive_query( $query ) {
	if ( $query->is_main_query() && is_post_type_archive( 'resources' ) ) {
		$query->set( 'posts_per_page', 12 );
	}
}

add_action( 'pre_get_posts', __NAMESPACE__ . '\resources_archive_query' );
