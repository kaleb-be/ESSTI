<?php

	function esstiRegisterSearch() {
		register_rest_route('essti/v1', 'search', array(
				'methods' => WP_REST_Server::READABLE,
			'callback' => 'universitySearchResults'
		));
	}
	
	function universitySearchResults($data) {
		$mainQuery = new WP_Query(array(
				'post_type' => array('page', 'post', 'researcher', 'academics', 'event'),
				's' => sanitize_text_field($data['keyword'])
		));
		
		$results = array(
				'generalInfo'=>array(),
			'researchers'=>array(),
			'events'=>array(),
			'academics'=>array()
		);
		
		while ($mainQuery->have_posts()) {
			$mainQuery->the_post();
			if (get_post_type()=='post' OR get_post_type()=='page') {
				array_push($results['generalInfo'], array(
						'title' => get_the_title(),
						'link' => get_the_permalink(),
						'postType' => get_post_type(),
						'authorName' => get_the_author()
				));
			}
			if (get_post_type()=='researcher') {
				array_push($results['researchers'], array(
						'title' => get_the_title(),
						'link' => get_the_permalink(),
						'image' => get_the_post_thumbnail_url(0, 'researcherLandscape')
				));
			}
			if (get_post_type()=='event') {
				$eventDate = new DateTime(get_field('event_date'));
				$description = null;
				if (has_excerpt()) {
					$description = get_the_excerpt();
				}else{
					$description = wp_trim_words(get_the_content(), 18);
				}
				array_push($results['events'], array(
						'title' => get_the_title(),
						'link' => get_the_permalink(),
						'month' => $eventDate->format('M'),
						'day' =>  $eventDate->format('d'),
						'description' => $description
				));
			}
			if (get_post_type()=='academics') {
				array_push($results['academics'], array(
						'title' => get_the_title(),
						'link' => get_the_permalink(),
						'id' => get_the_id()
				));
			}
			
		}
	
		if ($results['academics']) {
			$academicsMetaQuery = array('relation' => 'OR');
			foreach ($results['academics'] as $item) {
				array_push($academicsMetaQuery, array(
						'key' => 'related_academics',
						'compare' => 'LIKE',
						'value' => '"' . $item['id'] . '"'
				));
			}
			
			$academicsRelationshipQuery = new WP_Query(array(
					'post_type' => array('researcher', 'event'),
					'meta_query' => $academicsMetaQuery
			));
			
			while ($academicsRelationshipQuery->have_posts()) {
				$academicsRelationshipQuery->the_post();
				
				if (get_post_type()=='researcher') {
					array_push($results['researchers'], array(
							'title' => get_the_title(),
							'link' => get_the_permalink(),
							'image' => get_the_post_thumbnail_url(0, 'researcherLandscape')
					));
				}
				
				if (get_post_type()=='event') {
					$eventDate = new DateTime(get_field('event_date'));
					$description = null;
					if (has_excerpt()) {
						$description = get_the_excerpt();
					}else{
						$description = wp_trim_words(get_the_content(), 18);
					}
					array_push($results['events'], array(
							'title' => get_the_title(),
							'link' => get_the_permalink(),
							'month' => $eventDate->format('M'),
							'day' =>  $eventDate->format('d'),
							'description' => $description
					));
				}
			}
			
			$results['researchers'] = array_values(array_unique($results['researchers'], SORT_REGULAR));
			$results['events'] = array_values(array_unique($results['events'], SORT_REGULAR));
		}
		
		return $results;
	}