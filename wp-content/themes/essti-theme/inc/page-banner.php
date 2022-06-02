<?php
	function pageBanner ($args = NULL){
		// This is for when a title is already set for the page
		if (!$args['title']){
			$args['title'] = get_the_title();
		}
		if (!$args['subtitle']){
			$args['subtitle'] = get_field('page_banner_subtitle');
		}
		if (!$args['photo']){
			if (get_field('page_banner_bg_img')) {
				$args['photo'] = get_field('page_banner_bg_img')['sizes']['pageBanner'];
			} else  {
				$args['photo'] = get_theme_file_uri('/images/ocean.jpg');
			}
		}
		
		?>
		<div class="page-banner">
			<div class="page-banner__bg-image" style="background-image: url(<?php echo $args['photo']; ?>);">
			</div>
			<div class="page-banner__content container container--narrow">
				<h1 class="page-banner__title"><?php echo $args['title']; ?></h1>
				<div class="page-banner__intro">
					<p><?php echo $args['subtitle']; ?></p>
				</div>
			</div>
		</div>
		
		<?php
	}