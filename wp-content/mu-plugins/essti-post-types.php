<?php
	
	function essti_post_types (): void
	{
		//    Post Type:- Locations
//		register_post_type('location', array(
//				'show_in_rest'=> true,
//				'supports'=>array('title', 'editor', 'excerpt'),
//				'rewrite'=> array('slug'=>'locations'),
//				'has_archive'=>true,
//				'public'=> true,
//				'labels'=> array(
//						'name'=>'Locations',
//						'add_new_item'=>'Add New Location',
//						'edit_item'=>'Edit Location',
//						'all_item'=>'All Locations',
//						'singular_event'=>'Location'
//				),
//				'menu_icon'=> 'dashicons-location-alt'
//		));
//
		//		Post Type:- Event
		register_post_type('event', array(
			'show_in_rest'=> true,
			'capability_type'=> 'event',
			'map_meta_cap'=> true,
			'supports'=>array('title', 'editor', 'excerpt'),
			'rewrite'=> array('slug'=>'events'),
			'has_archive'=>true,
			'public'=> true,
			'labels'=> array(
				'name'=>'Events',
				'add_new_item'=>'Add New Event',
				'edit_item'=>'Edit Event',
				'all_item'=>'All Events',
				'singular_event'=>'Event'
			),
			'menu_icon'=> 'dashicons-calendar'
		));
//		Post Type:- Academics
		register_post_type('academics', array(
			'show_in_rest'=> true,
			'capability_type'=> 'academics',
			'map_meta_cap'=> true,
			'supports'=>array('title', 'excerpt'),
			'rewrite'=> array('slug'=>'academics'),
			'has_archive'=>true,
			'public'=> true,
			'labels'=> array(
				'name'=>'Academics',
				'add_new_item'=>'Add New Academic Center',
				'edit_item'=>'Edit Academic Center',
				'all_item'=>'All Academics',
				'singular_academics'=>'Academic Center'
			),
			'menu_icon'=> 'dashicons-building'
		));
//		Post Type:- Researcher
		register_post_type('researcher', array(
				'show_in_rest'=> true,
				'capability_type'=> 'researcher',
				'map_meta_cap'=> true,
				'supports'=>array('title', 'editor', 'thumbnail'),
				'rewrite'=> array('slug'=>'researchers'),
				'public'=> true,
				'labels'=> array(
						'name'=>'Researchers',
						'add_new_item'=>'Add New Researcher',
						'edit_item'=>'Edit Researcher',
						'all_item'=>'All Researchers',
						'singular_researcher'=>'Researcher'
				),
				'menu_icon'=> 'dashicons-welcome-learn-more'
		));

// Post Type:- Publications
		register_post_type('publication', array(
				'show_in_rest'=> true,
				'capability_type'=> 'publication',
				'map_meta_cap'=> true,
				'supports'=>array('title', 'editor', 'thumbnail'),
				'rewrite'=> array('slug'=>'publications'),
				'public'=> false,
				'show_ui'=> true,
				'labels'=> array(
						'name'=>'Publications',
						'add_new_item'=>'Add New Publication',
						'edit_item'=>'Edit Publication',
						'all_item'=>'All Publications',
						'singular_publication'=>'Publication'
				),
				'menu_icon'=> 'dashicons-book'
		));
		
	}
	
	
	
	add_action( 'init', 'essti_post_types');