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
 * @param  mixed $post_type the type of post. e.g. work, testimonial.
 * @return object
 */
function get_service_posts( $parent_tax_id, $post_type = 'post' ) {

	$taxonomy = 'service';

	$args = array(
		'post_type'      => $post_type,
		'posts_per_page' => -1,
		'tax_query'      => array(
			array(
				'taxonomy'         => $taxonomy,
				'field'            => 'id',
				'terms'            => $parent_tax_id,
				'include_children' => false,
			),
		),
	);

	$posts = get_posts( $args );

	if ( $posts ) {
		return $posts;
	}
}
