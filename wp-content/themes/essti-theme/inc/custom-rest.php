<?php
	function essti_custom_rest (){
		register_rest_field('post', 'authorName', array(
				'get_callback' => function() {return get_the_author();}
		));
		
	}