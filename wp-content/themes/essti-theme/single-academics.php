<?php
	
	get_header();
	pageBanner();
	while(have_posts()) {
		the_post(); ?>

		<div class="container container--narrow page-section">
			<div class="metabox metabox--position-up metabox--with-home-link">
				<p>
					<a class="metabox__blog-home-link" href="<?php echo site_url('/academics'); ?>">
						<i class="fa fa-home" aria-hidden="true"></i> Academics</a> <span class="metabox__main">
        <?php the_title(); ?>
        </span></p>
			</div>
			<div class="generic-content"><?php the_field('main_body_content'); ?></div>
			
			<?php
//				Associated Researchers
				$associatedResearchers = new WP_Query(array(
						'posts_per_page'=>-1,
						'post_type'=>'researcher',
						'orderby'=>'title',
						'order'=>'ASC',
						'meta_query'=>array(
								array(
										'key'=>'related_academics',
										'compare'=>'LIKE',
										'value'=> '"' . get_the_ID() . '"'
								)
						)
				));
				
				if ( $associatedResearchers->have_posts()) {
					echo '<hr class="section-break">';
					echo '<h2 class="headline headline--medium">' . get_the_title() . ' Researcher(s)</h2>';
					
					echo '<ul class="professor-cards">';
					while ($associatedResearchers->have_posts()){
						$associatedResearchers->the_post();?>
						<li class="professor-card__list-item">
							<a class="professor-card" href="<?php the_permalink(); ?>">
								<img class="professor-card__image" src="<?php the_post_thumbnail_url('researcherLandscape'); ?>">
								<span class="professor-card__name"><?php the_title(); ?></span>
							</a>
						</li>
						<?php
					}
					echo '</ul>';
				}
				wp_reset_postdata();
				
			
//				Events hosted by this Academic department
				$today = date('Ymd');
				$upcomingEvents = new WP_Query(array(
						'posts_per_page'=>-1,
						'post_type'=>'event',
						'meta_key'=> 'event_date',
						'orderby'=>'meta_value_num',
						'order'=>'ASC',
						'meta_query'=>array(
							array(
								'key'=>'event_date',
								'compare'=>'>=',
								'value'=> $today,
								'type'=>'numeric'
							),
							array(
								'key'=>'related_academics',
								'compare'=>'LIKE',
								'value'=> '"' . get_the_ID() . '"'
							)
						)
				));
				
				if ( $upcomingEvents->have_posts()) {
					echo '<hr class="section-break">';
					echo '<h2 class="headline headline--medium">Upcoming ' . get_the_title() . ' Events</h2>';
					
					while ($upcomingEvents->have_posts()){
						$upcomingEvents->the_post();
						get_template_part('template-parts/content', 'event');
					}
				}
				wp_reset_postdata();
			?>
		</div>
	<?php }
	get_footer();
?>
