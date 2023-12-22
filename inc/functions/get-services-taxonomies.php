<?php
/**
 * Returns List of sub taxonomies
 *
 * @package wd_s
 */

namespace WebDevStudios\wd_s;

/**
 * Get service sub taxonomies.
 *
 * @param  mixed $parent_tax_id the parent tax.
 * @return array
 */
function get_services_taxonomies( $parent_tax_id ) {

	$taxonomy = 'service';

	// Get the sub-taxonomies.
	$sub_taxonomies = get_terms(
		array(
			'taxonomy'   => $taxonomy,
			'parent'     => $parent_tax_id,
			'hide_empty' => false,
		)
	);

	// Check if sub-taxonomies are found.
	if ( ! empty( $sub_taxonomies ) && ! is_wp_error( $sub_taxonomies ) ) {
		return $sub_taxonomies;
	}
}
