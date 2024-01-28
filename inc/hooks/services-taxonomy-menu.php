<?php
/**
 * Update admin menu item for service taxonomi.
 *
 * @package wd_s
 */

namespace WebDevStudios\wd_s;

/**
 * Add services taxonomy as parent menu.
 */
function move_services_taxonomy_menu() {
	add_menu_page( esc_html( 'Services' ), esc_html( 'Services' ), 'manage_options', 'edit-tags.php?taxonomy=service', '', 'dashicons-category', 5 );
}
add_action( 'admin_menu', __NAMESPACE__ . '\move_services_taxonomy_menu' );

/**
 * Highlight services taxonomy menu.
 *
 * @param  string $parent_file set as main parent.
 */
function highlight_taxonomy_parent_menu( $parent_file ) {
	if ( 'service' === get_current_screen()->taxonomy ) {
		$parent_file = 'edit-tags.php?taxonomy=service';
	}

	return $parent_file;
}
add_action( 'parent_file', __NAMESPACE__ . '\highlight_taxonomy_parent_menu' );
