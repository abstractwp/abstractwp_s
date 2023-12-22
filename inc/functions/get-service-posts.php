<?php
/**
 * Returns List posts of service
 *
 * @package wd_s
 */

namespace WebDevStudios\wd_s;

/**
 * Get service posts.
 *
 * @param  mixed $parent_tax_id the parent tax.
 * @return object
 */
function get_service_posts( $parent_tax_id ) {

	$taxonomy = 'service';

	$args = array(
		'post_type'      => 'post',
		'posts_per_page' => -1,
		'tax_query'      => array(
			array(
				'taxonomy' => $taxonomy,
				'field'    => 'id',
				'terms'    => $parent_tax_id,
			),
		),
	);

	$posts = get_posts( $args );

	if ( $posts ) {
		return $posts;
	}
}
