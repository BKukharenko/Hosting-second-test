<?php
add_action( 'init', 'hostings_post_type_register' );
/**
 * Register a partner post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function hostings_post_type_register() {
	$labels = array(
		'name'               => _x( 'Hostings', 'post type general name', 'understrap' ),
		'singular_name'      => _x( 'Hosting', 'post type singular name', 'understrap' ),
		'menu_name'          => _x( 'Hostings', 'admin menu', 'understrap' ),
		'name_admin_bar'     => _x( 'Hostings', 'add new on admin bar', 'understrap' ),
		'add_new'            => _x( 'Add new Hosting', 'hosting', 'understrap' ),
		'add_new_item'       => __( 'Add new Hosting', 'understrap' ),
		'new_item'           => __( 'New Hosting', 'understrap' ),
		'edit_item'          => __( 'Edit Hosting', 'understrap' ),
		'view_item'          => __( 'View hosting', 'understrap' ),
		'all_items'          => __( 'All hostings', 'understrap' ),
		'search_items'       => __( 'Search Hosings', 'understrap' ),
		'parent_item_colon'  => __( 'Parent Hostings:', 'understrap' ),
		'not_found'          => __( 'No hostings found', 'understrap' ),
		'not_found_in_trash' => __( 'No hostings found in Trash', 'understrap' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Here you can see a list of hosting plans and add new plan or edit one of the already existed', 'understrap' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'hostings' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'page-attributes')
	);

	register_post_type( 'hostings', $args );
}

