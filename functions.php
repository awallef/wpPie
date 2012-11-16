<?php
include_once 'lib/Pie/Config/bootstrap.php';

//Posttype Portfolio

add_action( 'init', 'register_cpt_portfolio' );

function register_cpt_portfolio() {

$labels = array(
'name' => _x( 'Portfolio', 'portfolio' ),
'singular_name' => _x( 'Portfolio', 'portfolio' ),
'add_new' => _x( 'Add New', 'portfolio' ),
'add_new_item' => _x( 'Add New Entry', 'portfolio' ),
'edit_item' => _x( 'Edit Portfolio Entry', 'portfolio' ),
'new_item' => _x( 'New Portfolio Entry', 'portfolio' ),
'view_item' => _x( 'View Portfolio', 'portfolio' ),
'search_items' => _x( 'Search Portfolio Entries', 'portfolio' ),
'not_found' => _x( 'No entries found', 'portfolio' ),
'not_found_in_trash' => _x( 'No entries found in Trash', 'portfolio' ),
'parent_item_colon' => _x( 'Parent Portfolio:', 'portfolio' ),
'menu_name' => _x( 'Portfolio', 'portfolio' ),
);

$args = array(
'labels' => $labels,
'hierarchical' => false,
'description' => 'Portfolio post type generated for 3xW.',
'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'custom-fields' ),

'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'menu_position' => 5,

'show_in_nav_menus' => true,
'publicly_queryable' => true,
'exclude_from_search' => false,
'has_archive' => true,
'query_var' => true,
'can_export' => true,
'rewrite' => true,
'capability_type' => 'post'
);

register_post_type( 'portfolio', $args );
}

//Posttype Team Members

add_action( 'init', 'register_cpt_team' );

function register_cpt_team() {

$labels = array(
'name' => _x( 'Member', 'team members' ),
'singular_name' => _x( 'Member', 'team members' ),
'add_new' => _x( 'Add New Member', 'team members' ),
'add_new_item' => _x( 'Add New Member', 'team members' ),
'edit_item' => _x( 'Edit Member', 'team members' ),
'new_item' => _x( 'New Member', 'team members' ),
'view_item' => _x( 'View Members', 'team members' ),
'search_items' => _x( 'Search Member Entries', 'team members' ),
'not_found' => _x( 'No entries found', 'team members' ),
'not_found_in_trash' => _x( 'No entries found in Trash', 'team members' ),
'parent_item_colon' => _x( 'Parent member', 'team members' ),
'menu_name' => _x( 'About Us', 'team members' ),
);

$args = array(
'labels' => $labels,
'hierarchical' => false,
'description' => 'Team Member post type generated for the About Us page.',
'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'custom-fields' ),

'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'menu_position' => 5,

'show_in_nav_menus' => true,
'publicly_queryable' => true,
'exclude_from_search' => false,
'has_archive' => true,
'query_var' => true,
'can_export' => true,
'rewrite' => true,
'capability_type' => 'post'
);

register_post_type( 'teammembers', $args );
}

 		
add_theme_support( 'post-thumbnails' );

add_theme_support( 'menus' );

add_post_type_support('page', 'excerpt');

add_post_type_support('post', 'excerpt');

add_image_size('classic-thumb', 120, 120, true); // Classic crop

add_image_size('news-thumb', 770, 250, true); // Classic crop

add_image_size('featured-thumb', 370, 250, true); // Crop set for thumbnails  in the featured blog posts Area

add_image_size('project-thumb', 370, 170, true); // Crop set for thumbnails  in the featured projects Area

add_image_size('oldpostfeed-thumb', 270, 150, true); // Crop set for thumbnails  in the "older posts" Area

add_image_size( 'fullpost-thumb', 590, 9999, true ); // Unlimited Height Mode

?>