<?php
/**
 * Rewrite url for service taxnonomy.
 *
 * @package    wd_s
 * @subpackage service
 * @author     Thong Dang
 */

namespace WebDevStudios\wd_s;

/**
 * Remove base category slug on services category.
 */
function rewrite_service_category_url() {
	$category_slug = 'service_category';

	// Rewrite rule for service_category taxonomy.
	add_rewrite_rule(
		'^services/([^/]+)/?$',
		'index.php?' . $category_slug . '=$matches[1]',
		'top'
	);
}
add_action( 'init', __NAMESPACE__ . '\rewrite_service_category_url' );
