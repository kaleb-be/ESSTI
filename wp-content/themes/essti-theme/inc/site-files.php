<?php
	function essti_files(){
//		Scripts
		wp_enqueue_script( 'essti-main-js',get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
		wp_localize_script('essti-main-js', 'esstiData' ,array('root_url' => get_site_url()));
		wp_enqueue_script('bootstrap_js_popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js', array('jquery'), NULL, true );
		wp_enqueue_script( 'bootstrap_js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js', array('jquery'), NULL, true );
//		Styles
		wp_enqueue_style( 'bootstrap_css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css');
		wp_enqueue_style( 'custom-google-fonts','//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
		wp_enqueue_style( 'font-awesome','//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
		wp_enqueue_style( 'essti_main_style',get_theme_file_uri('/build/style-index.css'));
		wp_enqueue_style( 'essti_extra_style',get_theme_file_uri('/build/index.css'));
		
	}
	
	function esstiLoginCSS () {
		wp_enqueue_style( 'custom-google-fonts','//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
		wp_enqueue_style( 'font-awesome','//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
		wp_enqueue_style( 'essti_main_style',get_theme_file_uri('/build/style-index.css'));
		wp_enqueue_style( 'essti_extra_style',get_theme_file_uri('/build/index.css'));
		
	}