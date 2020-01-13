<?php
//Machines
add_action( 'init', 'widenation_post_init' );
function widenation_post_init() {
	$labels = array(
		'name'               => _x( 'Machines', 'post type general name', 'excavator-template' ),
		'singular_name'      => _x( 'Machine', 'post type singular name', 'excavator-template' ),
		'menu_name'          => _x( 'Machines', 'admin menu', 'excavator-template' ),
		'name_admin_bar'     => _x( 'Machine', 'add new on admin bar', 'excavator-template' ),
		'add_new'            => _x( 'Add New', 'machine', 'excavator-template' ),
		'add_new_item'       => __( 'Add New Machine', 'excavator-template' ),
		'new_item'           => __( 'New Machine', 'excavator-template' ),
		'edit_item'          => __( 'Edit Machine', 'excavator-template' ),
		'view_item'          => __( 'View Machine', 'excavator-template' ),
		'all_items'          => __( 'All Machines', 'excavator-template' ),
		'search_items'       => __( 'Search Machines', 'excavator-template' ),
		'parent_item_colon'  => __( 'Parent Machines:', 'excavator-template' ),
		'not_found'          => __( 'No Machines found.', 'excavator-template' ),
		'not_found_in_trash' => __( 'No Machines found in Trash.', 'excavator-template' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'excavator-template' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'machine' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 6,
		'menu_icon' => 'dashicons-admin-generic',
		'supports'           => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
	);

	register_post_type( 'machine', $args );
}
add_action( 'after_switch_theme', 'flush_rewrite_rules' );
