<?php
/**
 * Returns List of sub taxonomies
 *
 * @package wd_s
 */

namespace WebDevStudios\wd_s;

/**
 * Get service taxonomies.
 *
 * @param  mixed $post_id the post id.
 * @return array
 */
function get_work_taxonomies( $post_id ) {

	$taxonomy = 'service';

	$terms = wp_get_post_terms( $post_id, $taxonomy );

	$terms_html = '';
	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
		$terms_arr = array();

		foreach ( $terms as $term ) {
			$terms_arr[] = '<a href="' . get_term_link( $term ) . '">' . esc_html( $term->name ) . '</a>';
		}

		$terms_html = implode( ', ', $terms_arr );
	}

	return $terms_html;
}
