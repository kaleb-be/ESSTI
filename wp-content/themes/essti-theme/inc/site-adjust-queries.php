<?php
	
	function essti_adjust_queries ($queries){
		if (!is_admin() AND is_post_type_archive('academics') AND $queries->is_main_query()){
			$queries->set('orderby', 'title');
			$queries->set('order', 'ASC');
			$queries->set('posts_per_page', -1);
		}
		if (!is_admin() AND is_post_type_archive('event') AND $queries->is_main_query()) {
			$today =date('Ymd');
			$queries->set('meta_key', 'event_date');
			$queries->set('orderby', 'meta_value_num');
			$queries->set('order','ASC');
			$queries->set('meta_query', array(
					array(
							'key'=>'event_date',
							'compare'=>'>=',
							'value'=> $today,
							'type'=>'numeric'
					)
			));
		}
		
	}