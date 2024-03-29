<?php

if ( ! function_exists( 'mb_setup' ) ):
function mb_setup() {

	/****************************************
	Backend
	*****************************************/

	// Clean up the head
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'wp_shortlink_wp_head');

	// Register menus
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'mbbasetheme' ),
		'footer' => __( 'Footer Menu', 'mbbasetheme' ),
		'mobile' => __( 'Mobile Menu', 'mbbasetheme' ),
	) );

	// Register Widget Areas
	add_action( 'widgets_init', 'mb_widgets_init' );

	// Execute shortcodes in widgets
	// add_filter('widget_text', 'do_shortcode');

	// Add RSS links to head
	add_theme_support( 'automatic-feed-links' );

	// Add Editor Style
	add_editor_style( 
		array(
			'lib/post_format_ui/editor/css/editor-style.css', 
			'lib/post_format_ui/editor/fonts/genericons.css'
		) 
	);

	// Don't update theme
	add_filter( 'http_request_args', 'mb_dont_update_theme', 5, 2 );

	// Prevent File Modifications
	define ( 'DISALLOW_FILE_EDIT', true );

	// Set Content Width
	if ( ! isset( $content_width ) ) $content_width = 900;

	// Enable Post Thumbnails
	add_theme_support( 'post-thumbnails' );

	// Add Image Sizes
	add_image_size( 'post-image-small', 300, 300 ); // Permalink thumb
	// add_image_size( $name, $width = 0, $height = 0, $crop = false );

	// Enable Custom Headers
	// add_theme_support( 'custom-header' );

	// Enable Custom Backgrounds
	// add_theme_support( 'custom-background' );

	// Remove Dashboard Meta Boxes
	add_action('wp_dashboard_setup', 'mb_remove_dashboard_widgets' );

	// Change Admin Menu Order
	add_filter('custom_menu_order', 'mb_custom_menu_order');
	add_filter('menu_order', 'mb_custom_menu_order');

	// Hide Admin Areas that are not used
	add_action( 'admin_menu', 'mb_remove_menu_pages' );

	// Remove default link for images
	add_action('admin_init', 'mb_imagelink_setup', 10);

	// Show Kitchen Sink in WYSIWYG Editor
	add_filter( 'tiny_mce_before_init', 'mb_unhide_kitchensink' );

	// Define custom post type capabilities for use with Members
	add_action( 'admin_init', 'mb_add_post_type_caps' );

	/****************************************
	Hybrid
	*****************************************/

	/* Add theme support for core framework features. */
	//add_theme_support( 'hybrid-core-theme-settings', array( 'about', 'footer' ) );
	add_theme_support( 'hybrid-core-scripts', array( 'drop-downs' ) );
	add_theme_support( 'hybrid-core-drop-downs' );
	add_theme_support( 'hybrid-core-menus' );
	add_theme_support( 'hybrid-core-post-meta-box' );
	add_theme_support( 'hybrid-core-seo' );
	add_theme_support( 'hybrid-core-shortcodes' );
	add_theme_support( 'hybrid-core-sidebars' );
	add_theme_support( 'hybrid-core-template-hierarchy' );
	add_theme_support( 'hybrid-core-widgets' );
	
	/* Add theme support for framework extensions. */
	add_theme_support( 'post-layouts' );
	add_theme_support( 'post-stylesheets' );
	add_theme_support( 'loop-pagination' );
	add_theme_support( 'get-the-image' );
	add_theme_support( 'breadcrumb-trail' );

	/* Add media support of post formats */
	add_theme_support( 'hybrid-core-media-grabber' );


	/****************************************
	Frontend
	*****************************************/

	// Add Post Formats Theme Support
	add_theme_support( 'post-formats', array('video', 'gallery', 'link', 'image', 'quote', 'audio') );

	// Enqueue scripts
	add_action( 'wp_enqueue_scripts', 'mb_scripts' );

	// Remove Query Strings From Static Resources
	add_filter('script_loader_src', 'mb_remove_script_version', 15, 1);
	add_filter('style_loader_src', 'mb_remove_script_version', 15, 1);

	// Remove Read More Jump
	add_filter('the_content_more_link', 'mb_remove_more_jump_link');

}
endif; // mb_setup
add_action('after_setup_theme', 'mb_setup');
