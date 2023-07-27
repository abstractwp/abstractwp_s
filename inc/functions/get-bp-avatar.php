<?php
/**
 *  Return buddypress avatar.
 *
 * @package wd_s
 */

namespace WebDevStudios\wd_s;

/**
 * Return buddypress avatar.
 *
 * @param int $user_id the current user id.
 * @author Thong Dang
 */
function get_bp_avatar( $user_id ) {
	$upload_dir = wp_upload_dir();
	$dir        = $upload_dir['basedir'] . '/avatars/' . $user_id;
	$files      = scandir( $dir );
	$results    = array();

	foreach ( $files as $file ) {
		if ( '.' !== $file && '..' !== $file ) {
			if ( is_file( $dir . '/' . $file ) ) {
				if ( stristr( $file, 'bpfull' ) ) {
					$results[] = $file;
				}
			}
		}
	}
	if ( count( $results ) ) {

		return array(
			'html'     => '<img src="' . site_url( '/wp-content/uploads/avatars/' . $user_id . '/' . $results[0] ) . '" alt="avatar">',
			'is_found' => true,
		);
	}

}
