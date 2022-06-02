<?php
	function essti_features(){
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_image_size('researcherLandscape', 400, 260, true);
		add_image_size('researcherPortrait', 480, 650 , true);
		add_image_size('pageBanner', 1500, 350 , true);

//    register_nav_menu( 'headerMenu', 'Header Navigation Menu' );
//    register_nav_menu( 'footerColumn1', 'Footer Column 1' );
//    register_nav_menu( 'footerColumn2', 'Footer Column 2' );
	}
	
	//Redirect Subscriber role to homepage
	function redirect_subscriber () {
		$currentUser = wp_get_current_user();
		if (count($currentUser->roles) == 1  AND $currentUser->roles[0] == 'subscriber') {
			wp_redirect(site_url('/'));
			exit;
		}
	}