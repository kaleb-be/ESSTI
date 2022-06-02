<?php
	if (!is_user_logged_in()){
		wp_redirect(esc_url(site_url('/')));
		exit;
	}
	get_header();
	pageBanner(array(
			'photo' => 'https://images.unsplash.com/photo-1502078534399-8190479363f5?crop=entropy&cs=tinysrgb&fm=jpg&ixlib=rb-1.2.1&q=80&raw_url=true&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1173'
	));
	
	while(have_posts()) {
		the_post(); ?>
		
		
		<div class="container container--narrow page-section">
		
			<ul class="min-list link-list" id="publications">
			<?php
				$publications = new WP_Query(array(
						'post_type' => 'publication',
//				    'author' => get_current_user_id(),
						'posts_per_page' => -1
				));
				
				while ($publications->have_posts()) {
						$publications->the_post();
						$publication = get_field('upload_document');
						$file_link_id = get_field('file_id')?>
							<li>
								<input type="text" value="<?php echo esc_attr(get_the_title()); ?>" class="note-title-field">
								<a href="<?php echo $publication['url']; ?>"
								   download="<?php echo $publication['title']; ?>" 
								   class="btn download-publication text-black" role="button" aria-disabled="true">
									<i class="fa fa-download pe-2" aria-hidden="true"></i>Download
								</a>
								<a href="https://drive.google.com/file/d/<?php echo $file_link_id ?>/view?usp=sharing"
								   class="btn view-publication text-primary" target="_blank" role="button" aria-disabled="true">
									<i class="fa fa-file pe-2" aria-hidden="true"></i>View
								</a>
								<textarea name="" id="" cols="30" rows="10" class="note-body-field"><?php echo esc_attr(wp_strip_all_tags(get_the_content())); ?></textarea>
								
							</li>
						<?php
					}
			?>
			</ul>
		
		</div>
	
	<?php }
	
	get_footer();?>
