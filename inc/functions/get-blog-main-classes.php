<?php
/**
 * Returns blog main class
 *
 * @package wd_s
 */

namespace WebDevStudios\wd_s;

/**
 * Returns blog main classes.
 *
 * @author Thong Dang
 *
 * @return array list of classes.
 */
function get_blog_main_classes() {
	$main_class = [];
	if ( is_active_sidebar( 'sidebar-2' ) ) {
		$main_class = [ 'right-sidebar' ];
	}

	return $main_class;
}
