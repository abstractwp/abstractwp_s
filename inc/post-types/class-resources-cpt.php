<?php
/**
 * Hook the theme's scaffolding template parts into the scaffolding template.
 *
 * @package wd_s
 */

namespace WebDevStudios\wd_s;

function cptui_register_my_cpts_resource() {

	/**
	 * Post Type: Resources.
	 */

	$labels = [
		"name" => esc_html__( "Resources", "wd_s" ),
		"singular_name" => esc_html__( "Resource", "wd_s" ),
	];

	$args = [
		"label" => esc_html__( "Resources", "wd_s" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => true,
		"rewrite" => [ "slug" => "resources", "with_front" => true ],
		"query_var" => true,
		"menu_position" => 5,
		"menu_icon" => "dashicons-excerpt-view",
		"supports" => [ "title", "editor", "thumbnail" ],
		"taxonomies" => [ "category", "post_tag" ],
		"show_in_graphql" => false,
	];

	register_post_type( "resource", $args );
}

add_action( 'init', __NAMESPACE__ . '\cptui_register_my_cpts_resource' );
