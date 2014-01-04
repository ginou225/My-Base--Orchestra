<?php

/****************************************
Hybrid Core
*****************************************/
/* Load the class file. */
require_once( trailingslashit( get_template_directory() ) . 'hybrid/hybrid.php' );

/* Call the class. */
new Hybrid();

/****************************************
Theme Setup
*****************************************/

require_once( get_template_directory() . '/lib/init.php' );
require_once( get_template_directory() . '/lib/theme-helpers.php' );
require_once( get_template_directory() . '/lib/theme-functions.php' );
require_once( get_template_directory() . '/lib/theme-comments.php' );
require_once( get_template_directory() . '/lib/meta/custom-meta-boxes.php' ); //humanmade.com
require_once( get_template_directory() . '/lib/post_format_ui/cf-post-formats.php' ); //Wp Post Format

/****************************************
Redux Framework Theme Options
*****************************************/

require_once( dirname( __FILE__ ) . '/lib//ReduxFramework/ReduxCore/framework.php' );
require_once( dirname( __FILE__ ) . '/lib/ReduxFramework/main-config.php' );


/****************************************
Require Plugins
*****************************************/

require_once( get_template_directory() . '/lib/class-tgm-plugin-activation.php' );
require_once( get_template_directory() . '/lib/theme-require-plugins.php' );

add_action( 'tgmpa_register', 'mb_register_required_plugins' );


/****************************************
Misc Theme Functions
*****************************************/

/**
 * Define custom post type capabilities for use with Members
 */
function mb_add_post_type_caps() {
	// mb_add_capabilities( 'portfolio' );
}

/**
 * Filter Yoast SEO Metabox Priority
 */
add_filter( 'wpseo_metabox_prio', 'mb_filter_yoast_seo_metabox' );
function mb_filter_yoast_seo_metabox() {
	return 'low';
}
