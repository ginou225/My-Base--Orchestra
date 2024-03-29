<?php

/**
 * Register the required plugins for this theme.
 */
function mb_register_required_plugins() {

	$plugins = array(
		// Post Type Addons
		array(
			'name' 				=> 'Pods - Custom Content Types and Fields',
			'slug' 				=> 'pods',
			'required' 			=> false,
			'force_activation'	=> false
		),

		array(
			'name' 				=> 'Advanced Custom Fields',
			'slug' 				=> 'advanced-custom-fields',
			'required' 			=> false,
			'force_activation'	=> false
		),

		// Shop and Events
		array(
			'name' 				=> 'Event Organiser',
			'slug' 				=> 'event-organiser',
			'required' 			=> false,
			'force_activation'	=> false
		),

		array(
			'name' 				=> 'Jigoshop',
			'slug' 				=> 'jigoshop',
			'required' 			=> false,
			'force_activation'	=> false
		),

		// SEO
		array(
			'name' 				=> 'Google Analytics for WordPress',
			'slug' 				=> 'google-analytics-for-wordpress',
			'required' 			=> false,
			'force_activation'	=> false
		),

		array(
			'name' 				=> 'WordPress SEO by Yoast',
			'slug' 				=> 'wordpress-seo',
			'required' 			=> false,
			'force_activation'	=> false
		),

		// Helpers
		array(
			'name' 				=> 'PostType Order',
			'slug' 				=> 'post-types-order',
			'required' 			=> false,
			'force_activation'	=> false
		), 

		array(
			'name' 				=> 'Wordpress Post Type Archive Link',
			'slug' 				=> 'post-type-archive-links',
			'required' 			=> false,
			'force_activation'	=> false
		), 

		array(
			'name' 				=> 'Foundation shortcodes',
			'slug' 				=> 'easy-foundation-shortcodes',
			'required' 			=> false,
			'force_activation'	=> false
		),

		array(
			'name' 				=> 'Mobble',
			'slug' 				=> 'mobble',
			'required' 			=> false,
			'force_activation'	=> false
		),


		// Pre-packaged with a theme
        array(
            'name'          	=> 'Wp Visual Composer',
            'slug'          	=> 'js_composer',
            'source'        	=> get_stylesheet_directory() . '/lib/plugins/js_composer.zip',
            'required'      	=> false, 
            'force_activation'  => false, 
            'external_url'      => '',
        ),

        array(
            'name'          	=> 'Templatura',
            'slug'          	=> 'templatura',
            'source'        	=> get_stylesheet_directory() . '/lib/plugins/templatura.zip',
            'required'      	=> false, 
            'force_activation'  => false, 
            'external_url'      => '',
        ),

	);

	// Change this to your theme text domain, used for internationalising strings
	$theme_text_domain = 'mbplugins';

	/**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'tgmpa' ),
            'menu_title'                      => __( 'Install Plugins', 'tgmpa' ),
            'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'tgmpa' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'tgmpa' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'tgmpa' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}