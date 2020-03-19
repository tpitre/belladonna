<?php

// TEAM POST TYPE
// Register Custom Post Type
function create_team_pt() {
	$labels = array(
		'name'           => _x( 'Team', 'Post Type General Name' ),
		'singular_name'  => _x( 'Team', 'Post Type Singular Name' ),
		'menu_name'      => __( 'Team' ),
		'name_admin_bar' => __( 'Team' ),
		'add_new'        => _x( 'Add New', 'add new' ),
		'add_new_item'   => __( 'Add Team Member' ),
		'edit_item'      => __('Edit Team Member'),
	);
	$args = array(
		'label'                 => __( 'Team' ),
		'description'           => __( 'Belladonna Team Members' ),
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-groups',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
    'has_archive'           => false,
    'rewrite'               => array( 'slug' => 'team' ),
		'exclude_from_search'   => false,
    'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'bd_team', $args );

}
add_action( 'init', 'create_team_pt', 0 );

// PROMO POST TYPE
function post_type_promo() {
	$supports = array(
    'title', // post title
    'editor', // post content
    'author', // post author
    'thumbnail', // featured images
    'excerpt', // post excerpt
    'custom-fields', // custom fields
    'revisions', // post revisions
	);
	$labels = array(
    'name'           => _x('Promos', 'plural'),
    'singular_name'  => _x('Promo', 'singular'),
    'menu_name'      => _x('Promos', 'admin menu'),
    'name_admin_bar' => _x('Promos', 'admin bar'),
    'add_new'        => _x('Add New', 'add new'),
    'add_new_item'   => __('Add New Promo'),
    'new_item'       => __('New Promo'),
    'edit_item'      => __('Edit Promo'),
    'view_item'      => __('View Promo'),
    'all_items'      => __('All Promo'),
    'search_items'   => __('Search Promo'),
    'not_found'      => __('No Promo found.'),
	);
	$args = array(
    'show_in_rest'       => true,
    'supports'           => $supports,
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'query_var'          => true,
    'rewrite'            => array('slug' => 'promo'),
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_icon'          => 'dashicons-tickets-alt'
	);
	register_post_type('promo', $args);
}
add_action('init', 'post_type_promo');

// FOOTER POST TYPE
function post_type_footer() {
	$supports = array(
    'title', // post title
    'author', // post author
    'custom-fields', // custom fields
    'revisions', // post revisions
	);
	$labels = array(
    'name'           => _x('Footer', 'plural'),
    'singular_name'  => _x('Footer', 'singular'),
    'menu_name'      => _x('Footer', 'admin menu'),
    'name_admin_bar' => _x('Footer', 'admin bar'),
    'add_new'        => _x('Add New', 'add new'),
    'add_new_item'   => __('Add New Footer'),
    'new_item'       => __('New Footer'),
    'edit_item'      => __('Edit Footer'),
    'view_item'      => __('View Footer'),
    'all_items'      => __('All Footer'),
    'search_items'   => __('Search Footer'),
    'not_found'      => __('No Footer found.'),
	);
	$args = array(
    'show_in_rest' => true,
    'supports'     => $supports,
    'labels'       => $labels,
    'public'       => true,
    'query_var'    => true,
    'has_archive'  => false,
    'hierarchical' => false,
    'menu_icon'    => 'dashicons-editor-table'
	);
	register_post_type('footer', $args);
}
add_action('init', 'post_type_footer');
