<?php
/**
 * Hook the theme's scaffolding template parts into the scaffolding template.
 *
 * @package wd_s
 */

namespace WebDevStudios\wd_s;

/**
 * Register resource cpt.
 */
function cptui_register_my_cpts_resource() {

	/**
	 * Post Type: Resources.
	 */

	$labels = [
		'name'                     => esc_html__( 'Resources', 'wd_s' ),
		'singular_name'            => esc_html__( 'Resource', 'wd_s' ),
		'menu_name'                => esc_html__( 'Resources', 'wd_s' ),
		'all_items'                => esc_html__( 'All resources', 'wd_s' ),
		'add_new'                  => esc_html__( 'Add new resource', 'wd_s' ),
		'add_new_item'             => esc_html__( 'Add new resource', 'wd_s' ),
		'edit_item'                => esc_html__( 'Edit resource', 'wd_s' ),
		'new_item'                 => esc_html__( 'New resource', 'wd_s' ),
		'view_item'                => esc_html__( 'View resource', 'wd_s' ),
		'view_items'               => esc_html__( 'View resources', 'wd_s' ),
		'search_items'             => esc_html__( 'Search resources', 'wd_s' ),
		'not_found'                => esc_html__( 'No resources found', 'wd_s' ),
		'not_found_in_trash'       => esc_html__( 'No resources found in Trash', 'wd_s' ),
		'parent'                   => esc_html__( 'Parent resource', 'wd_s' ),
		'featured_image'           => esc_html__( 'Feature image for resource', 'wd_s' ),
		'set_featured_image'       => esc_html__( 'Set feature image for this resource', 'wd_s' ),
		'remove_featured_image'    => esc_html__( 'Remove feature image for this resource', 'wd_s' ),
		'use_featured_image'       => esc_html__( 'Use as feature image for this resource', 'wd_s' ),
		'archives'                 => esc_html__( 'Resources archive', 'wd_s' ),
		'insert_into_item'         => esc_html__( 'Insert into resource', 'wd_s' ),
		'uploaded_to_this_item'    => esc_html__( 'Uploaded to this resource', 'wd_s' ),
		'filter_items_list'        => esc_html__( 'Filter Resources List', 'wd_s' ),
		'items_list_navigation'    => esc_html__( 'Resources list navigation', 'wd_s' ),
		'items_list'               => esc_html__( 'Resources list', 'wd_s' ),
		'attributes'               => esc_html__( 'Resource attributes', 'wd_s' ),
		'name_admin_bar'           => esc_html__( 'New resource', 'wd_s' ),
		'item_published'           => esc_html__( 'Resource published', 'wd_s' ),
		'item_published_privately' => esc_html__( 'Resource published privately', 'wd_s' ),
		'item_reverted_to_draft'   => esc_html__( 'Resource reverted to draft', 'wd_s' ),
		'item_scheduled'           => esc_html__( 'Resource scheduled', 'wd_s' ),
		'item_updated'             => esc_html__( 'Resource updated', 'wd_s' ),
		'parent_item_colon'        => esc_html__( 'Parent resource', 'wd_s' ),
	];

	$args = [
		'label'                 => esc_html__( 'Resources', 'wd_s' ),
		'labels'                => $labels,
		'description'           => '',
		'public'                => true,
		'publicly_queryable'    => true,
		'show_ui'               => true,
		'show_in_rest'          => true,
		'rest_base'             => '',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'rest_namespace'        => 'wp/v2',
		'has_archive'           => true,
		'show_in_menu'          => true,
		'show_in_nav_menus'     => true,
		'delete_with_user'      => false,
		'exclude_from_search'   => false,
		'capability_type'       => 'post',
		'map_meta_cap'          => true,
		'hierarchical'          => false,
		'can_export'            => true,
		'rewrite'               => [
			'slug'       => 'resources',
			'with_front' => true,
		],
		'query_var'             => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-excerpt-view',
		'supports'              => [ 'title', 'editor', 'thumbnail' ],
		'taxonomies'            => [ 'category', 'post_tag', 'resources_topic', 'resources_industry', 'resources_type' ],
		'show_in_graphql'       => false,
	];

	register_post_type( 'resources', $args );
}

add_action( 'init', __NAMESPACE__ . '\cptui_register_my_cpts_resource' );

/**
 * Resource type taxonomy.
 */
function cptui_register_my_taxes_resources_type() {

	/**
	 * Taxonomy: Types.
	 */

	$labels = [
		'name'          => esc_html__( 'Types', 'wd_s' ),
		'singular_name' => esc_html__( 'Type', 'wd_s' ),
	];

	$args = [
		'label'                 => esc_html__( 'Types', 'wd_s' ),
		'labels'                => $labels,
		'public'                => true,
		'publicly_queryable'    => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_nav_menus'     => true,
		'query_var'             => true,
		'rewrite'               => [
			'slug'       => 'type',
			'with_front' => false,
		],
		'show_admin_column'     => false,
		'show_in_rest'          => true,
		'show_tagcloud'         => false,
		'rest_base'             => 'resources-type',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
		'rest_namespace'        => 'wp/v2',
		'show_in_quick_edit'    => false,
		'sort'                  => false,
		'show_in_graphql'       => false,
	];
	register_taxonomy( 'resources-type', [ 'resources' ], $args );
}
add_action( 'init', __NAMESPACE__ . '\cptui_register_my_taxes_resources_type' );

/**
 * Resource topic taxonomy.
 */
function cptui_register_my_taxes_resources_topic() {

	/**
	 * Taxonomy: Topic.
	 */

	$labels = [
		'name'          => esc_html__( 'Topics', 'wd_s' ),
		'singular_name' => esc_html__( 'Topic', 'wd_s' ),
	];

	$args = [
		'label'                 => esc_html__( 'Topic', 'wd_s' ),
		'labels'                => $labels,
		'public'                => true,
		'publicly_queryable'    => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_nav_menus'     => true,
		'query_var'             => true,
		'rewrite'               => [
			'slug'       => 'topic',
			'with_front' => false,
		],
		'show_admin_column'     => false,
		'show_in_rest'          => true,
		'show_tagcloud'         => false,
		'rest_base'             => 'resources-topic',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
		'rest_namespace'        => 'wp/v2',
		'show_in_quick_edit'    => false,
		'sort'                  => false,
		'show_in_graphql'       => false,
	];
	register_taxonomy( 'resources-topic', [ 'resources' ], $args );
}
add_action( 'init', __NAMESPACE__ . '\cptui_register_my_taxes_resources_topic' );

/**
 * Resource industry taxonomy.
 */
function cptui_register_my_taxes_resources_industry() {

	/**
	 * Taxonomy: Industry.
	 */

	$labels = [
		'name'          => esc_html__( 'Industries', 'wd_s' ),
		'singular_name' => esc_html__( 'Industry', 'wd_s' ),
	];

	$args = [
		'label'                 => esc_html__( 'industry', 'wd_s' ),
		'labels'                => $labels,
		'public'                => true,
		'publicly_queryable'    => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_nav_menus'     => true,
		'query_var'             => true,
		'rewrite'               => [
			'slug'       => 'industry',
			'with_front' => false,
		],
		'show_admin_column'     => false,
		'show_in_rest'          => true,
		'show_tagcloud'         => false,
		'rest_base'             => 'resources-industry',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
		'rest_namespace'        => 'wp/v2',
		'show_in_quick_edit'    => false,
		'sort'                  => false,
		'show_in_graphql'       => false,
	];
	register_taxonomy( 'resources-industry', [ 'resources' ], $args );
}
add_action( 'init', __NAMESPACE__ . '\cptui_register_my_taxes_resources_industry' );
