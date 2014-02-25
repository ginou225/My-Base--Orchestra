<?php
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_cmb_';

	// SideBar Fields *************************************************************

	$sidebar = array(

		array( 
			'id'   => $prefix . 'sidebar',  
			'name' => 'Select Side Bar', 
			'type' => 'select',
			'options' => array(
				'default' => 'Default',
		        'shop'    => 'Products',
		        'event'   => 'Events',
		        //'ctas'    => 'Calls to Action'
		    ),
		),
	
	);

	$meta_boxes[] = array(
		'title' => 'Sidebar',
		'pages' => array('page', 'post'),
		'context'    => 'side',
		'priority'   => 'high',
		'fields' => $sidebar
	);

	// Slider Fields **************************************************************
	$slider = array(

		array( 
			'id'   => $prefix . 'slide_cta_name',  
			'name' => 'Call to Action Name', 
			'type' => 'text', 
		),
		array( 
			'id'   => $prefix . 'slide_cta',  
			'name' => 'Call to Action Link', 
			'type' => 'text_url', 
		),
		array( 
			'id'   => $prefix . 'contact_cta',  
			'name' => 'Show Contact Button', 
			'type' => 'checkbox', 
		),

	
	);

	$meta_boxes[] = array(
		'title' => 'Slider Options',
		'pages' => array('slide'),
		'context'    => 'normal',
		'priority'   => 'high',
		'fields' => $slider
	);


	return $meta_boxes;

}
add_filter( 'cmb_meta_boxes', 'cmb_metaboxes' );
