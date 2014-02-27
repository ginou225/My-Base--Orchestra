<?php
if (!function_exists('redux_init')) :
	function redux_init() {

	$args = array();


	// For use with a tab example below
	$tabs = array();

	ob_start();

	$ct = wp_get_theme();
	$theme_data = $ct;
	$item_name = $theme_data->get('Name'); 
	$tags = $ct->Tags;
	$screenshot = $ct->get_screenshot();
	$class = $screenshot ? 'has-screenshot' : '';

	$customize_title = sprintf( __( 'Customize &#8220;%s&#8221;','redux-framework-demo' ), $ct->display('Name') );

	?>
	<div id="current-theme" class="<?php echo esc_attr( $class ); ?>">
		<?php if ( $screenshot ) : ?>
			<?php if ( current_user_can( 'edit_theme_options' ) ) : ?>
			<a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr( $customize_title ); ?>">
				<img src="<?php echo esc_url( $screenshot ); ?>" alt="<?php esc_attr_e( 'Current theme preview' ); ?>" />
			</a>
			<?php endif; ?>
			<img class="hide-if-customize" src="<?php echo esc_url( $screenshot ); ?>" alt="<?php esc_attr_e( 'Current theme preview' ); ?>" />
		<?php endif; ?>

		<h4>
			<?php echo $ct->display('Name'); ?>
		</h4>

		<div>
			<ul class="theme-info">
				<li><?php printf( __('By %s','redux-framework-demo'), $ct->display('Author') ); ?></li>
				<li><?php printf( __('Version %s','redux-framework-demo'), $ct->display('Version') ); ?></li>
				<li><?php echo '<strong>'.__('Tags', 'redux-framework-demo').':</strong> '; ?><?php printf( $ct->display('Tags') ); ?></li>
			</ul>
			<p class="theme-description"><?php echo $ct->display('Description'); ?></p>
			<?php if ( $ct->parent() ) {
				printf( ' <p class="howto">' . __( 'This <a href="%1$s">child theme</a> requires its parent theme, %2$s.' ) . '</p>',
					__( 'http://codex.wordpress.org/Child_Themes','redux-framework-demo' ),
					$ct->parent()->display( 'Name' ) );
			} ?>
			
		</div>

	</div>

	<?php
	$item_info = ob_get_contents();
	    
	ob_end_clean();

	$sampleHTML = '';
	if( file_exists( dirname(__FILE__).'/info-html.html' )) {
		/** @global WP_Filesystem_Direct $wp_filesystem  */
		global $wp_filesystem;
		if (empty($wp_filesystem)) {
			require_once(ABSPATH .'/wp-admin/includes/file.php');
			WP_Filesystem();
		}  		
		$sampleHTML = $wp_filesystem->get_contents(dirname(__FILE__).'/info-html.html');
	}

	// BEGIN Sample Config

	// Setting dev mode to true allows you to view the class settings/info in the panel.
	// Default: true
	$args['dev_mode'] = true;

	// Set the icon for the dev mode tab.
	// If $args['icon_type'] = 'image', this should be the path to the icon.
	// If $args['icon_type'] = 'iconfont', this should be the icon name.
	// Default: info-sign
	//$args['dev_mode_icon'] = 'info-sign';

	// Set the class for the dev mode tab icon.
	// This is ignored unless $args['icon_type'] = 'iconfont'
	// Default: null
	//$args['dev_mode_icon_class'] = '';

	// Set a custom option name. Don't forget to replace spaces with underscores!
	$args['opt_name'] = 'mb_base';

	// Setting system info to true allows you to view info useful for debugging.
	// Default: false
	//$args['system_info'] = true;


	// Set the icon for the system info tab.
	// If $args['icon_type'] = 'image', this should be the path to the icon.
	// If $args['icon_type'] = 'iconfont', this should be the icon name.
	// Default: info-sign
	//$args['system_info_icon'] = 'info-sign';

	// Set the class for the system info tab icon.
	// This is ignored unless $args['icon_type'] = 'iconfont'
	// Default: null
	//$args['system_info_icon_class'] = 'icon-large';

	$theme = wp_get_theme();

	$args['display_name'] = $theme->get('Name');
	//$args['database'] = "theme_mods_expanded";
	$args['display_version'] = $theme->get('Version');

	// If you want to use Google Webfonts, you MUST define the api key.
	$args['google_api_key'] = 'AIzaSyAX_2L_UzCDPEnAHTG7zhESRVpMPS4ssII';

	// Define the starting tab for the option panel.
	// Default: '0';
	//$args['last_tab'] = '0';

	// Define the option panel stylesheet. Options are 'standard', 'custom', and 'none'
	// If only minor tweaks are needed, set to 'custom' and override the necessary styles through the included custom.css stylesheet.
	// If replacing the stylesheet, set to 'none' and don't forget to enqueue another stylesheet!
	// Default: 'standard'
	//$args['admin_stylesheet'] = 'standard';

	// Setup custom links in the footer for share icons
	$args['share_icons']['twitter'] = array(
	    'link' => 'http://twitter.com/ghost1227',
	    'title' => 'Follow me on Twitter', 
	    'img' => ReduxFramework::$_url . 'assets/img/social/Twitter.png'
	);
	$args['share_icons']['linked_in'] = array(
	    'link' => 'http://www.linkedin.com/profile/view?id=52559281',
	    'title' => 'Find me on LinkedIn', 
	    'img' => ReduxFramework::$_url . 'assets/img/social/LinkedIn.png'
	);

	// Enable the import/export feature.
	// Default: true
	//$args['show_import_export'] = false;

	// Set the icon for the import/export tab.
	// If $args['icon_type'] = 'image', this should be the path to the icon.
	// If $args['icon_type'] = 'iconfont', this should be the icon name.
	// Default: refresh
	//$args['import_icon'] = 'refresh';

	// Set the class for the import/export tab icon.
	// This is ignored unless $args['icon_type'] = 'iconfont'
	// Default: null
	//$args['import_icon_class'] = '';

	/**
	 * Set default icon class for all sections and tabs
	 * @since 3.0.9
	 */
	//$args['default_icon_class'] = '';


	// Set a custom menu icon.
	//$args['menu_icon'] = '';

	// Set a custom title for the options page.
	// Default: Options
	$args['menu_title'] = __('Theme Options', 'redux-framework-demo');

	// Set a custom page title for the options page.
	// Default: Options
	$args['page_title'] = __('Theme Options', 'redux-framework-demo');

	// Set a custom page slug for options page (wp-admin/themes.php?page=***).
	// Default: redux_options
	$args['page_slug'] = 'theme_options';

	$args['default_show'] = true;
	$args['default_mark'] = '*';

	// Set a custom page capability.
	// Default: manage_options
	//$args['page_cap'] = 'manage_options';

	// Set the menu type. Set to "menu" for a top level menu, or "submenu" to add below an existing item.
	// Default: menu
	$args['page_type'] = 'submenu';

	// Set the parent menu.
	// Default: themes.php
	// A list of available parent menus is available at http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
	$args['page_parent'] = 'themes.php';

	// Set a custom page location. This allows you to place your menu where you want in the menu order.
	// Must be unique or it will override other items!
	// Default: null
	//$args['page_position'] = null;

	// Set a custom page icon class (used to override the page icon next to heading)
	//$args['page_icon'] = 'icon-themes';

	// Set the icon type. Set to "iconfont" for Elusive Icon, or "image" for traditional.
	// Redux no longer ships with standard icons!
	// Default: iconfont
	//$args['icon_type'] = 'image';

	// Disable the panel sections showing as submenu items.
	// Default: true
	//$args['allow_sub_menu'] = false;
	    
	// Set ANY custom page help tabs, displayed using the new help tab API. Tabs are shown in order of definition.
	$args['help_tabs'][] = array(
	    'id' => 'redux-opts-1',
	    'title' => __('Theme Information 1', 'redux-framework-demo'),
	    'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo')
	);
	$args['help_tabs'][] = array(
	    'id' => 'redux-opts-2',
	    'title' => __('Theme Information 2', 'redux-framework-demo'),
	    'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo')
	);

	// Set the help sidebar for the options page.                                        
	$args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo');


	// Add HTML before the form.
	if (!isset($args['global_variable']) || $args['global_variable'] !== false ) {
		if (!empty($args['global_variable'])) {
			$v = $args['global_variable'];
		} else {
			$v = str_replace("-", "_", $args['opt_name']);
		}
		$args['intro_text'] = sprintf( __('<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'redux-framework-demo' ), $v );
	} else {
		$args['intro_text'] = __('<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'redux-framework-demo');
	}

	// Add content after the form.
	$args['footer_text'] = __('<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'redux-framework-demo');

	// Set footer/credit line.
	//$args['footer_credit'] = __('<p>This text is displayed in the options panel footer across from the WordPress version (where it normally says \'Thank you for creating with WordPress\'). This field accepts all HTML.</p>', 'redux-framework-demo');


	$sections = array();              

	//Background Patterns Reader
	$sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
	$sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
	$sample_patterns      = array();

	if ( is_dir( $sample_patterns_path ) ) :
		
	  if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) :
	  	$sample_patterns = array();

	    while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

	      if( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
	      	$name = explode(".", $sample_patterns_file);
	      	$name = str_replace('.'.end($name), '', $sample_patterns_file);
	      	$sample_patterns[] = array( 'alt'=>$name,'img' => $sample_patterns_url . $sample_patterns_file );
	      }
	    }
	  endif;
	endif;

	/*********************************************************
		* General Settings *
	**********************************************************/
	$sections[] = array(
		'icon' => 'el-icon-cogs',
		'desc' => __('<p class="description">Welcome to your themes options panel!.</p>', 'redux-framework-demo'),
		'title' => __('General Settings', 'redux-framework-demo'),
		'fields' => array(	
			array(
				'id'=>'favicon',
				'type' => 'media',
				'url'      => true,
				'title' => __('Favicon Upload', 'redux-framework-demo'), 
				'desc' => __('Upload from Desktop or Media Section or you can make one <a href="http://favicon-generator.org/" target="_blank">HERE</a>', 'redux-framework-demo'),
				'default' => '',
			),
			array(
				'id'=>'email_address',
				'type' => 'text',
				'title' => __('Primary Email Address', 'redux-framework-demo'), 
				'desc' => __('Enter Email Address', 'redux-framework-demo'),
				'default' => '',
				'placeholder' => 'anyone@anywhere.com',
				'validate' => 'email',
        		'msg' => 'Enter a valid email address',
			),
			array(
				'id'=>'phone_number',
				'type' => 'text',
				'title' => __('Primary Phone Number', 'redux-framework-demo'), 
				'desc' => __('Enter Phone Number', 'redux-framework-demo'),
				'default' => '',
				'placeholder' => '1-800-123-4567',
				'validate' => 'email',
        		'msg' => 'Enter a valid email address',
			),
			array(
				'id'=>'street_address',
				'type' => 'text',
				'title' => __('Street Address', 'redux-framework-demo'), 
				'desc' => __('Enter Street Address is applicable', 'redux-framework-demo'),
				'default' => '',
				'placeholder' => '123 Random Street',
			),
			array(
				'id'=>'city',
				'type' => 'text',
				'title' => __('City', 'redux-framework-demo'), 
				'desc' => __('Enter City is applicable', 'redux-framework-demo'),
				'default' => '',
				'placeholder' => 'Anywhere',
			),
			array(
				'id'=>'us_state',
				'type' => 'select',
				'title' => __('State', 'redux-framework-demo'), 
				'subtitle' => __('Select your state.', 'redux-framework-demo'),
				'options' => array(
					'AL' => 'Alabama',
					'AK' => 'Alaska',
					'AZ' => 'Arizona',
					'AR' => 'Arkansas',
					'CA' => 'California',
					'CO' => 'Colorado',
					'CT' => 'Connecticut',
					'DE' => 'Delaware',
					'DC' => 'District Of Columbia',
					'FL' => 'Florida',
					'GA' => 'Georgia',
					'HI' => 'Hawaii',
					'ID' => 'Idaho',
					'IL' => 'Illinois',
					'IN' => 'Indiana',
					'IA' => 'Iowa',
					'KS' => 'Kansas',
					'KY' => 'Kentucky',
					'LA' => 'Louisiana',
					'ME' => 'Maine',
					'MD' => 'Maryland',
					'MA' => 'Massachusetts',
					'MI' => 'Michigan',
					'MN' => 'Minnesota',
					'MS' => 'Mississippi',
					'MO' => 'Missouri',
					'MT' => 'Montana',
					'NE' => 'Nebraska',
					'NV' => 'Nevada',
					'NH' => 'New Hampshire',
					'NJ' => 'New Jersey',
					'NM' => 'New Mexico',
					'NY' => 'New York',
					'NC' => 'North Carolina',
					'ND' => 'North Dakota',
					'OH' => 'Ohio',
					'OK' => 'Oklahoma',
					'OR' => 'Oregon',
					'PA' => 'Pennsylvania',
					'RI' => 'Rhode Island',
					'SC' => 'South Carolina',
					'SD' => 'South Dakota',
					'TN' => 'Tennessee',
					'TX' => 'Texas',
					'UT' => 'Utah',
					'VT' => 'Vermont',
					'VA' => 'Virginia',
					'WA' => 'Washington',
					'WV' => 'West Virginia',
					'WI' => 'Wisconsin',
					'WY' => 'Wyoming'
					),
				'default' => 'MA',
			),	
			array(
				'id'=>'zip_code',
				'type' => 'text',
				'title' => __('Zip Code', 'redux-framework-demo'), 
				'desc' => __('Enter Proper Zip Code', 'redux-framework-demo'),
				'default' => '',
				'placeholder' => '12345',
			),
			array(
				'id'=>'newsletter',
				'type' => 'text',
				'title' => __('Newsletter Code', 'redux-framework-demo'), 
				'desc' => __('Enter Newsletter ID', 'redux-framework-demo'),
				'default' => '',
				'placeholder' => '123456789',
			),
			array(
                'id' => 'google_analytics',
                'type' => 'textarea',
                'title' => __('Google Analytics', 'redux-framework-demo'), 
                'sub_desc' => __('Please enter in your google analytics tracking code here.', 'redux-framework-demo'),
                'desc' => __('', 'redux-framework-demo')
            ),					

		),
	);


	/*********************************************************
		* Social Settings *
	**********************************************************/
	$sections[] = array(
		'icon' => 'el-icon-bullhorn',
		'desc' => __('Social networks', 'redux-framework-demo'),
		'title' => __('Social Settings', 'redux-framework-demo'),
		'fields' => array(
			array(
				'id'=>'s_rss',
				'type' => 'switch',
				'title' => __('RSS', 'redux-framework-demo'),
				'subtitle' => __('Turn RSS on or off'),
				'desc' => __('', 'redux-framework-demo'),
				'on' => 'Enabled',
				'off' => 'Disabled',
				),	
			array(
				'id'=>'s_facebook',
				'type' => 'text',
				'title' => __('Facebook', 'redux-framework-demo'),
				'subtitle' => __('www.facebook.com'),
				'desc' => __('', 'redux-framework-demo'),
				'placeholder' => __('http://www.facebook.com/ProfileName'),
				),
			array(
				'id'=>'s_twitter',
				'type' => 'text',
				'title' => __('Twitter', 'redux-framework-demo'),
				'subtitle' => __('www.twitter.com'),
				'desc' => __('', 'redux-framework-demo'),
				'placeholder' => __('https://twitter.com/UserName'),
				),	
			array(
				'id'=>'s_googe_plus',
				'type' => 'text',
				'title' => __('Google+', 'redux-framework-demo'),
				'subtitle' => __('https://plus.google.com/'),
				'desc' => __('', 'redux-framework-demo'),
				'placeholder' => __('https://plus.google.com/UserName'),
				),
			array(
				'id'=>'s_linked_in',
				'type' => 'text',
				'title' => __('Linked In', 'redux-framework-demo'),
				'subtitle' => __('http://linkedin.com/'),
				'desc' => __('', 'redux-framework-demo'),
				'placeholder' => __('http://www.linkedin.com/UserName'),
				),	
			array(
				'id'=>'s_skype',
				'type' => 'text',
				'title' => __('Skype', 'redux-framework-demo'),
				'subtitle' => __('http://www.skype.com/en/'),
				'desc' => __('', 'redux-framework-demo'),
				'placeholder' => __('http://www.skype.com/en/UserName'),
				),
			array(
				'id'=>'s_pintrest',
				'type' => 'text',
				'title' => __('Pintrest', 'redux-framework-demo'),
				'subtitle' => __('https://www.pinterest.com/‎'),
				'desc' => __('', 'redux-framework-demo'),
				'placeholder' => __('https://www.pinterest.com/‎UserName'),
				),
			array(
				'id'=>'s_youtube',
				'type' => 'text',
				'title' => __('YouTube', 'redux-framework-demo'),
				'subtitle' => __('http://www.youtube.com/'),
				'desc' => __('', 'redux-framework-demo'),
				'placeholder' => __('http://www.youtube.com/UserName'),
				),	
			array(
				'id'=>'s_tumbler',
				'type' => 'text',
				'title' => __('Tumbler', 'redux-framework-demo'),
				'subtitle' => __('https://www.tumblr.com/'),
				'desc' => __('', 'redux-framework-demo'),
				'placeholder' => __('https://www.tumblr.com/Name'),
				),
			array(
				'id'=>'s_dribbble',
				'type' => 'text',
				'title' => __('Dribbble', 'redux-framework-demo'),
				'subtitle' => __('http://dribbble.com/'),
				'desc' => __('', 'redux-framework-demo'),
				'placeholder' => __('http://dribbble.com/UserName'),
				),
			array(
				'id'=>'s_instagram',
				'type' => 'text',
				'title' => __('Instagram', 'redux-framework-demo'),
				'subtitle' => __('http://instagram.com/'),
				'desc' => __('', 'redux-framework-demo'),
				'placeholder' => __('http://instagram.com/UserName'),
				),	
			),
		);

	/*********************************************************
		* Home Settings *
	**********************************************************/
	$sections[] = array(
		'title' => __('Home Settings', 'redux-framework-demo'),
		'icon' => 'el-icon-home',
	    //'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
		'fields' => array(
			array(
               'id'=>'recent-posts-block-start',
               'type' => 'section', 
               'title' => __('Recent Posts Section', 'redux-framework-demo'),
               'subtitle'=> __('', 'redux-framework-demo'),                            
              'indent' => true // Indent all options below until the next 'section' option is set.
            ),
            array(
				'id'=>'recent_title',
				'type' => 'text',
				'title' => __('Recent Posts Section Title', 'redux-framework-demo'),
				'placeholder' => 'Enter Recent Posts Title',
				'subtitle' => __(''),
				'desc' => __('Enter the Recent Posts Section Title', 'redux-framework-demo'),
			),
			array(
		        'id' => 'recent_post_editor',
		        'type' => 'editor',
		        'title' => __('Editor Text', 'redux-framework-demo'), 
		        'subtitle' => __('Subtitle text would go here.', 'redux-framework-demo'),
		        'wpautop' => true,
		        'default' => 'Keep this short',
		        'editor_options' => array(
		            'teeny' => true,
		            'textarea_rows' => 5
		        	),
		    ),
			array(
				'id'=>'recent_categories',
				'type' => 'select',
				'data' => 'categories',
				'title' => __('Recent Posts Category', 'redux-framework-demo'), 
				'subtitle' => __('', 'redux-framework-demo'),
				'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
			),
            array(
	            'id'=>'recent-posts-block-end',
	            'type' => 'section', 
	            'indent' => false // Indent all options below until the next 'section' option is set.
            ),
			array(
                 'id'=>'video-posts-block-start',
                 'type' => 'section', 
                 'title' => __('Video Posts Section', 'redux-framework-demo'),
                 'subtitle'=> __('', 'redux-framework-demo'),                            
                 'indent' => true // Indent all options below until the next 'section' option is set.
            ),
            array(
				'id'=>'recent_v_title',
				'type' => 'text',
				'title' => __('Recent Posts Section Title', 'redux-framework-demo'),
				'placeholder' => 'Enter Recent Videos Title',
				'subtitle' => __(''),
				'desc' => __('Enter the Recent Posts Section Title', 'redux-framework-demo'),
			),
			array(
		        'id' => 'recent_v_editor',
		        'type' => 'editor',
		        'title' => __('Editor Text', 'redux-framework-demo'), 
		        'subtitle' => __('Subtitle text would go here.', 'redux-framework-demo'),
		        'wpautop' => true,
		        'default' => 'Keep this short',
		        'editor_options' => array(
		            'teeny' => true,
		            'textarea_rows' => 5
		        	),
		    ),
            array(
	            'id'=>'video-posts-block-end',
	            'type' => 'section', 
	            'indent' => false // Indent all options below until the next 'section' option is set.
            ), 
			array(
				'id'=>'product_title',
				'type' => 'text',
				'title' => __('Product Section Title', 'redux-framework-demo'),
				'subtitle' => __(''),
				'desc' => __('Enter the Product Section Title', 'redux-framework-demo'),
			),
			// array(
			// 	'id'=>'product_categories',
			// 	'type' => 'select',
			// 	'data' => 'categories',
			// 	'args' => array('taxonomy' => array('slide_cat') ),
			// 	'title' => __('Product Select Option', 'redux-framework-demo'), 
			// 	'subtitle' => __('', 'redux-framework-demo'),
			// 	'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
			// ),
			array(
				'id'=>'product_img',
				'type' => 'media',
				'url' => true,
				'title' => __('Product Background Image', 'redux-framework-demo'),
				'subtitle' => __(''),
				'desc' => __('Select an image', 'redux-framework-demo'),
			),
			array(
	            'id'=>'product-block-end',
	            'type' => 'section', 
	            'indent' => false // Indent all options below until the next 'section' option is set.
            ), 	
			array(
		        'id'   =>'divider_1',
		        'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
		        'type' => 'divide'
		    ),	 		
		),
	);

	/*********************************************************
		* Layout Settings *
	**********************************************************/
	$sections[] = array(
		'icon' => 'el-icon-cogs',
		'desc' => __('Layout Settings', 'redux-framework-demo'),
		'title' => __('Layout Settings', 'redux-framework-demo'),
		'fields' => array(
			array(
                'id'=>'site-cta-start',
                'type' => 'section', 
                'title' => __('Site Call to Action', 'redux-framework-demo'),
                'subtitle'=> __('With the "section" field you can create indent option sections.', 'redux-framework-demo'),                            
                'indent' => true // Indent all options below until the next 'section' option is set.
             ), 
			array(
				'id'=>'site-cta-book',
				'type' => 'switch',
				'title' => __('Book Lynn', 'redux-framework-demo'), 
				'subtitle' => __('', 'redux-framework-demo'),
				'desc' => __('Turn this feature on or off', 'redux-framework-demo'),
				'default'  => false,
			),
			array(
				'id'=>'site-cta-schedule',
				'type' => 'switch',
				'title' => __('Schedule an Appointment', 'redux-framework-demo'), 
				'subtitle' => __('', 'redux-framework-demo'),
				'desc' => __('Turn this feature on or off', 'redux-framework-demo'),
				'default'  => true,
			),
			array(
				'id'=>'site-sidekicks',
				'type' => 'switch',
				'title' => __('Site Sidekicks', 'redux-framework-demo'), 
				'subtitle' => __('', 'redux-framework-demo'),
				'desc' => __('Turn this feature on or off', 'redux-framework-demo'),
				'default'  => true,
			),
			array(
                 'id'=>'site-cta-end',
                 'type' => 'section', 
                 'indent' => false // Indent all options below until the next 'section' option is set.
            ),
			array(
				'id'=>'blog_section_title',
				'type' => 'text',
				'title' => __('Blog Title', 'redux-framework-demo'), 
				'subtitle' => __('', 'redux-framework-demo'),
				'placeholder' => __('Enter a Title for the Blog', 'redux-framework-demo')				
			),
			array(
				'id'=>'blog_layout',
				'type' => 'select',
				'title' => __('Blog Layout', 'redux-framework-demo'), 
				'desc' => __('Select the Blog Section Layout', 'redux-framework-demo'),
				'subtitle' => __('<em>For all posts</em>', 'redux-framework-demo'),
				'options' => array(
					'masonry'     => 'Masonry', 
					'big_image'   => 'Big Image',
					'small_image' => 'Small Image',
					'big_ribbon'  => 'Big Ribbon',
					'small_ribbon'=> 'Small Ribbon'
					),
				'default' => 'big_image',
				),
			array(
				'id'=>'archive_layout',
				'type' => 'select',
				'title' => __('Archive Layout', 'redux-framework-demo'), 
				'desc' => __('Select the Archive Section Layout', 'redux-framework-demo'),
				'subtitle' => __('<em>For archived</em>', 'redux-framework-demo'),
				'options' => array(
					'masonry'     => 'Masonry', 
					'big_image'   => 'Big Image',
					'small_image' => 'Small Image',
					'big_ribbon'  => 'Big Ribbon',
					'small_ribbon'=> 'Small Ribbon'
					),
				'default' => 'big_image',
			),
			array(
				'id'=>'category_layout',
				'type' => 'select',
				'title' => __('Category Layout', 'redux-framework-demo'), 
				'desc' => __('Select the Category Section Layout', 'redux-framework-demo'),
				'subtitle' => __('<em>For category archives</em>', 'redux-framework-demo'),
				'options' => array(
					'masonry'     => 'Masonry', 
					'big_image'   => 'Big Image',
					'small_image' => 'Small Image',
					'big_ribbon'  => 'Big Ribbon',
					'small_ribbon'=> 'Small Ribbon'
					),
				'default' => 'big_image',
			),
			array(
				'id'=>'tag_layout',
				'type' => 'select',
				'title' => __('Tag Layout', 'redux-framework-demo'), 
				'desc' => __('Select the Tag Section Layout', 'redux-framework-demo'),
				'subtitle' => __('<em>For tags archives</em>', 'redux-framework-demo'),
				'options' => array(
					'masonry'     => 'Masonry', 
					'big_image'   => 'Big Image',
					'small_image' => 'Small Image',
					'big_ribbon'  => 'Big Ribbon',
					'small_ribbon'=> 'Small Ribbon'
					),
				'default' => 'big_image',
				),				
			),					
		
		);

	/*** divide ***/
	$sections[] = array(
		'type' => 'divide',
	);
					
	/*********************************************************
		* Additional Settings *
	**********************************************************/
	$sections[] = array(
		'icon' => 'el-icon-eye-open',
		'title' => __('Additional Fields', 'redux-framework-demo'),
		'desc' => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'redux-framework-demo'),
		'fields' => array(

			array(
				'id'=>'17',
				'type' => 'date',
				'title' => __('Date Option', 'redux-framework-demo'), 
				'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
				'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo')
				),
			array(
				'id'=>'21',
				'type' => 'divide'
				),					
			array(
				'id'=>'18',
				'type' => 'button_set',
				'title' => __('Button Set Option', 'redux-framework-demo'), 
				'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
				'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
				'options' => array('1' => 'Opt 1','2' => 'Opt 2','3' => 'Opt 3'),//Must provide key => value pairs for radio options
				'default' => '2'
				),
			array(
				'id'=>'23',
				'type' => 'info',
	            'required' => array('18','equals',array('1','2')),	
				'desc' => __('This is the info field, if you want to break sections up.', 'redux-framework-demo')
	        ),
	        array(
	            'id'=>'info_warning',
	            'type'=>'info',
	            'style'=>'warning',
	            'title'=> __( 'This is a title.', 'redux-framework-demo' ),
	            'desc' => __( 'This is an info field with the warning style applied and a header.', 'redux-framework-demo')
	        ),
	        array(
	            'id'=>'info_success',
	            'type'=>'info',
	            'style'=>'success',
	            'icon'=>'el-icon-info-sign',
	            'title'=> __( 'This is a title.', 'redux-framework-demo' ),
	            'desc' => __( 'This is an info field with the success style applied, a header and an icon.', 'redux-framework-demo')
	        ),
			array(
				'id'=>'raw_info',
				'type' => 'info',
				'required' => array('18','equals',array('1','2')),
				'raw_html'=>true,
				'desc' => $sampleHTML,
				),
			array(
				'id'=>"custom_callback",
				'type' => 'callback',
				'title' => __('Custom Field Callback', 'redux-framework-demo'), 
				'subtitle' => __('This is a completely unique field type', 'redux-framework-demo'),
				'desc' => __('This is created with a callback function, so anything goes in this field. Make sure to define the function though.', 'redux-framework-demo'),
				'callback' => 'redux_my_custom_field'
				),
			array(
				'id'=>"group",
				'type' => 'group',//doesn't need to be called for callback fields
				'title' => __('Group - BETA', 'redux-framework-demo'), 
				'subtitle' => __('Group any items together. Experimental. Use at your own risk.', 'redux-framework-demo'),
				'groupname' => __('Group', 'redux-framework-demo'), // Group name
				'subfields' => 
					array(
						array(
							'id'=>'switch-fold',
							'type' => 'switch', 
							'title' => __('testing fold with Group', 'redux-framework-demo'),
							'subtitle'=> __('Look, it\'s on!', 'redux-framework-demo'),
							"default" 		=> 1,
							),	
						array(
	                        'id'=>'text-group',
	                        'type' => 'text',
	                        'title' => __('Text', 'redux-framework-demo'), 
	                        'subtitle' => __('Here you put your subtitle', 'redux-framework-demo'),
	                        'required' => array('switch-fold', '=' , '1'),
							),
						array(
							'id'=>'select-group',
							'type' => 'select',
							'title' => __('Testing select', 'redux-framework-demo'), 
							'subtitle' => __('Select your themes alternative color scheme.', 'redux-framework-demo'),
							'options' => array('default.css'=>'default.css', 'color1.css'=>'color1.css'),
							'default' => 'default.css',
							),
						),
				),			
				
			)

		);   


	global $ReduxFramework;
	$ReduxFramework = new ReduxFramework($sections, $args, $tabs);

	// END Sample Config
	}
	add_action('init', 'redux_init');
endif;

/**
 
 	Custom function for filtering the sections array. Good for child themes to override or add to the sections.
 	Simply include this function in the child themes functions.php file.
 
 	NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
 	so you must use get_template_directory_uri() if you want to use any of the built in icons
 
 **/
if ( !function_exists( 'redux_add_another_section' ) ):
	function redux_add_another_section($sections){
	    //$sections = array();
	    $sections[] = array(
	        'title' => __('Section via hook', 'redux-framework-demo'),
	        'desc' => __('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework-demo'),
			'icon' => 'el-icon-paper-clip',
			    // Leave this as a blank section, no options just some intro text set above.
	        'fields' => array()
	    );

	    return $sections;
	}
	add_filter('redux/options/redux_demo/sections', 'redux_add_another_section');
	// replace redux_demo with your opt_name
endif;
/**

	Filter hook for filtering the args array given by a theme, good for child themes to override or add to the args array.

**/
if ( !function_exists( 'redux_change_framework_args' ) ):
	function redux_change_framework_args($args){
	    //$args['dev_mode'] = true;
	    
	    return $args;
	}
	add_filter('redux/options/redux_demo/args', 'redux_change_framework_args');
	// replace redux_demo with your opt_name
endif;
/**

	Filter hook for filtering the default value of any given field. Very useful in development mode.

**/
if ( !function_exists( 'redux_change_option_defaults' ) ):
	function redux_change_option_defaults($defaults){
	    $defaults['str_replace'] = "Testing filter hook!";
	    
	    return $defaults;
	}
	add_filter('redux/options/redux_demo/defaults', 'redux_change_option_defaults');
	// replace redux_demo with your opt_name
endif;

/** 

	Custom function for the callback referenced above

 */
if ( !function_exists( 'redux_my_custom_field' ) ):
	function redux_my_custom_field($field, $value) {
	    print_r($field);
	    print_r($value);
	}
endif;

/**
 
	Custom function for the callback validation referenced above

**/
if ( !function_exists( 'redux_validate_callback_function' ) ):
	function redux_validate_callback_function($field, $value, $existing_value) {
	    $error = false;
	    $value =  'just testing';
	    /*
	    do your validation
	    
	    if(something) {
	        $value = $value;
	    } elseif(something else) {
	        $error = true;
	        $value = $existing_value;
	        $field['msg'] = 'your custom error message';
	    }
	    */
	    
	    $return['value'] = $value;
	    if($error == true) {
	        $return['error'] = $field;
	    }
	    return $return;
	}
endif;
/**

	This is a test function that will let you see when the compiler hook occurs. 
	It only runs if a field	set with compiler=>true is changed.

**/
if ( !function_exists( 'redux_test_compiler' ) ):
	function redux_test_compiler($options, $css) {
		echo "<h1>The compiler hook has run!";
		//print_r($options); //Option values
		print_r($css); //So you can compile the CSS within your own file to cache
	    $filename = dirname(__FILE__) . '/avada' . '.css';

			    global $wp_filesystem;
			    if( empty( $wp_filesystem ) ) {
			        require_once( ABSPATH .'/wp-admin/includes/file.php' );
			        WP_Filesystem();
			    }

			    if( $wp_filesystem ) {
			        $wp_filesystem->put_contents(
			            $filename,
			            $css,
			            FS_CHMOD_FILE // predefined mode settings for WP files
			        );
			    }

	}
	//add_filter('redux/options/redux_demo/compiler', 'redux_test_compiler', 10, 2);
	// replace redux_demo with your opt_name
endif;


/**

	Remove all things related to the Redux Demo mode.

**/
if ( !function_exists( 'redux_remove_demo_options' ) ):
	function redux_remove_demo_options() {
		
		// Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
		if ( class_exists('ReduxFrameworkPlugin') ) {
			remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_meta_demo_mode_link'), null, 2 );
		}

		// Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
		remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );	

	}
	//add_action( 'redux/plugin/hooks', 'redux_remove_demo_options' );	
endif;
