<?php
	function esstiHeaderURL () {
		return esc_url(site_url('/'));
	}
	
	function esstiLoginTitle() {
		return get_bloginfo('name');
	}