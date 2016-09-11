<?php
/*
Plugin Name: Roughneck Fitness Slider
Plugin URI: 
Description: Creates a slideshow for the homepage. 
Author: Chris Davies
Author URI:
Version: 1.0
Text Domain: services
*/

/*
|--------------------------------------------------------------------------
| SLIDER POST TYPE - SETUP
|--------------------------------------------------------------------------
*/

function rnf_slider_post_type()
{

	// SET UI LABELS FOR CPT
	$labels = array(
		'name'                => _x( 'Slider', 'Post Type General Name', 'slider' ),
		'singular_name'       => _x( 'Slide', 'Post Type Singular Name', 'slider' ),
		'menu_name'           => __( 'Slides', 'slider' ),
		'all_items'           => __( 'All Slides', 'slider' ),
		'view_item'           => __( 'View Slide', 'slider' ),
		'add_new_item'        => __( 'Add New Slide', 'slider' ),
		'add_new'             => __( 'Add New', 'slider' ),
		'edit_item'           => __( 'Edit Slide', 'slider' ),
		'update_item'         => __( 'Update Slide', 'slider' ),
		'search_items'        => __( 'Search Slides', 'slider' ),
		'not_found'           => __( 'Not Found', 'slider' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'slider' ),
	);
	
	// SET OTHER OPTIONS FOR CPT	
	$args = array(
		'label'               => __( 'Slider', 'slider' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail' ), // Features this CPT supports in Post Editor
		'taxonomies'          => array( 'genres' ),	// You can associate this CPT with a taxonomy or custom taxonomy.
		'hierarchical'        => false, // A hierarchical CPT is like Pages and can have Parent and child items. A non-hierarchical CPT is like Posts.
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 20,
		'menu_icon'			  => 'dashicons-book',
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'rewrite' => array( 'slug' => 'slider' ),
	);
	
	// REGISTER THE CPT
	register_post_type( 'slider', $args );

}

function rnf_slider_rewrite_flush() {
    // First, we "add" the custom post type via the above written function.
    // Note: "add" is written with quotes, as CPTs don't get added to the DB,
    // They are only referenced in the post_type column with a post entry, 
    // when you add a post of this CPT.
    rnf_slider_post_type();

    // ATTENTION: This is *only* done during plugin activation hook in this example!
    // You should *NEVER EVER* do this on every page load!!
    flush_rewrite_rules();
}

register_activation_hook( __FILE__, 'rnf_slider_rewrite_flush' );

add_action( 'init', 'rnf_slider_post_type', 0 );

/*
|--------------------------------------------------------------------------
| PLUGIN FUNCTIONS
|--------------------------------------------------------------------------
*/


?>