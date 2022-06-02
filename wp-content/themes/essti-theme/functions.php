<?php
	require get_theme_file_path('/inc/page-banner.php');
	
	require get_theme_file_path('/inc/search-route.php');
	add_action( 'rest_api_init', 'esstiRegisterSearch');
	
	require get_theme_file_path('/inc/custom-rest.php');
	add_action('rest_api_init', 'essti_custom_rest');
	
	require get_theme_file_path('/inc/site-files.php');
	add_action( 'wp_enqueue_scripts', 'essti_files');
	add_action('login_enqueue_scripts', 'esstiLoginCSS');
	
	require get_theme_file_path('/inc/site-features.php');
	add_action( 'after_setup_theme', 'essti_features' );
	add_action('admin_init', 'redirect_subscriber');
	
	require get_theme_file_path('/inc/site-adjust-queries.php');
	add_action('pre_get_posts', 'essti_adjust_queries');
	
	
	
	
	
	require get_theme_file_path('/inc/role-specific-actions.php');
	add_action('wp_loaded', 'removeAdminBar');
	
	require get_theme_file_path('/inc/site-filters.php');
//Customize login screen
	add_filter('login_headerurl', 'esstiHeaderURL');
	add_filter('login_headertitle', 'esstiLoginTitle');
	//	add_filter('acf/fields/google/api');
	
	
	add_filter( 'ai1wm_exclude_themes_from_export',
			function ( $exclude_filters ) {
				$exclude_filters[] = 'twentytwentytwo';
				$exclude_filters[] = 'essti-theme/node_modules';
				return $exclude_filters;
			} );