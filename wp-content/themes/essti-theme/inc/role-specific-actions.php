<?php
//	Subscriber Specific
	function removeAdminBar () {
		$currentUser = wp_get_current_user();
		if (count($currentUser->roles) == 1  AND $currentUser->roles[0] == 'subscriber') {
			show_admin_bar(false);
		}
	}