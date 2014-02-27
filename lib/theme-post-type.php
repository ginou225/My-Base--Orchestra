<?php
/**
 * Theme Custom Post Types
 */

/********************************************
* Slides *
********************************************/
add_action( 'init', 'register_cpt_slide' );

function register_cpt_slide() {

    $labels = array( 
        'name' => _x( 'Slides', 'slide' ),
        'singular_name' => _x( 'Slide', 'slide' ),
        'add_new' => _x( 'Add New', 'slide' ),
        'add_new_item' => _x( 'Add New Slide', 'slide' ),
        'edit_item' => _x( 'Edit Slide', 'slide' ),
        'new_item' => _x( 'New Slide', 'slide' ),
        'view_item' => _x( 'View Slide', 'slide' ),
        'search_items' => _x( 'Search Slides', 'slide' ),
        'not_found' => _x( 'No slides found', 'slide' ),
        'not_found_in_trash' => _x( 'No slides found in Trash', 'slide' ),
        'parent_item_colon' => _x( 'Parent Slide:', 'slide' ),
        'menu_name' => _x( 'Slides', 'slide' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        
        'supports' => array( 'title', 'excerpt', 'thumbnail', 'page-attributes' ),
        'taxonomies' => array( 'category' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon'=> 'dashicons-images-alt2',
        'menu_position' => 10,
        
        'show_in_nav_menus' => false,
        'publicly_queryable' => false,
        'exclude_from_search' => true,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'slide', $args );
}


add_action( 'init', 'register_taxonomy_slider_categories' );

function register_taxonomy_slider_categories() {

    $labels = array( 
        'name' => _x( 'Slider Categories', 'slider categories' ),
        'singular_name' => _x( 'Slider Category', 'slider categories' ),
        'search_items' => _x( 'Search Slider Categories', 'slider categories' ),
        'popular_items' => _x( 'Popular Slider Categories', 'slider categories' ),
        'all_items' => _x( 'All Slider Categories', 'slider categories' ),
        'parent_item' => _x( 'Parent Slider Category', 'slider categories' ),
        'parent_item_colon' => _x( 'Parent Slider Category:', 'slider categories' ),
        'edit_item' => _x( 'Edit Slider Category', 'slider categories' ),
        'update_item' => _x( 'Update Slider Category', 'slider categories' ),
        'add_new_item' => _x( 'Add New Slider Category', 'slider categories' ),
        'new_item_name' => _x( 'New Slider Category', 'slider categories' ),
        'separate_items_with_commas' => _x( 'Separate slider categories with commas', 'slider categories' ),
        'add_or_remove_items' => _x( 'Add or remove slider categories', 'slider categories' ),
        'choose_from_most_used' => _x( 'Choose from the most used slider categories', 'slider categories' ),
        'menu_name' => _x( 'Slider Categories', 'slider categories' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => false,
        'show_ui' => true,
        'show_tagcloud' => false,
        'show_admin_column' => false,
        'hierarchical' => true,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'slider categories', array('slide'), $args );
}

// Sidekicks
add_action( 'init', 'register_cpt_sidekick' );

function register_cpt_sidekick() {

    $labels = array( 
        'name' => _x( 'Sidekicks', 'sidekick' ),
        'singular_name' => _x( 'Sidekick', 'sidekick' ),
        'add_new' => _x( 'Add New', 'sidekick' ),
        'add_new_item' => _x( 'Add New Sidekick', 'sidekick' ),
        'edit_item' => _x( 'Edit Sidekick', 'sidekick' ),
        'new_item' => _x( 'New Sidekick', 'sidekick' ),
        'view_item' => _x( 'View Sidekick', 'sidekick' ),
        'search_items' => _x( 'Search Sidekicks', 'sidekick' ),
        'not_found' => _x( 'No sidekicks found', 'sidekick' ),
        'not_found_in_trash' => _x( 'No sidekicks found in Trash', 'sidekick' ),
        'parent_item_colon' => _x( 'Parent Sidekick:', 'sidekick' ),
        'menu_name' => _x( 'Sidekicks', 'sidekick' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        
        'supports' => array( 'title', 'excerpt', 'thumbnail', 'page-attributes' ),
        
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-screenoptions',
        'menu_position' => 15,
        
        
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'page'
    );

    register_post_type( 'sidekick', $args );
}

function register_taxonomy_sidekick_types() {

    $labels = array( 
        'name' => _x( 'Sidekick Types', 'sidekick_types' ),
        'singular_name' => _x( 'Sidekick Type', 'sidekick_types' ),
        'search_items' => _x( 'Search Sidekick Types', 'sidekick_types' ),
        'popular_items' => _x( 'Popular Sidekick Types', 'sidekick_types' ),
        'all_items' => _x( 'All Sidekick Types', 'sidekick_types' ),
        'parent_item' => _x( 'Parent Sidekick Type', 'sidekick_types' ),
        'parent_item_colon' => _x( 'Parent Sidekick Type:', 'sidekick_types' ),
        'edit_item' => _x( 'Edit Sidekick Type', 'sidekick_types' ),
        'update_item' => _x( 'Update Sidekick Type', 'sidekick_types' ),
        'add_new_item' => _x( 'Add New Sidekick Type', 'sidekick_types' ),
        'new_item_name' => _x( 'New Sidekick Type', 'sidekick_types' ),
        'separate_items_with_commas' => _x( 'Separate sidekick types with commas', 'sidekick_types' ),
        'add_or_remove_items' => _x( 'Add or remove sidekick types', 'sidekick_types' ),
        'choose_from_most_used' => _x( 'Choose from the most used sidekick types', 'sidekick_types' ),
        'menu_name' => _x( 'Sidekick Types', 'sidekick_types' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => false,
        'show_ui' => true,
        'show_tagcloud' => false,
        'show_admin_column' => false,
        'hierarchical' => true,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'sidekick_types', array('sidekick'), $args );
}
?>