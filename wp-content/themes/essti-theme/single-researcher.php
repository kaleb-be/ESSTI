<?php
	
	get_header();
	
	while(have_posts()) {
		the_post();
		pageBanner();
		?>
		
		<div class="container container--narrow page-section">
			
			<div class="generic-content">
				<div class="row group">
					<div class="one-third">
						<?php the_post_thumbnail('researcherPortrait');?>
					</div>
					<div class="two-third">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
			<?php
				$relatedAcademics = get_field('related_academics');
				if ($relatedAcademics) {
					echo '<hr class="section-break">';
					echo '<h2 class="headline headline--medium">Works in:</h2>';
					echo '<ul class="link-list min-list">';
					
					foreach ($relatedAcademics as $academic) {
						?>
						<li><a href="<?php echo get_the_permalink($academic) ?>"><?php echo get_the_title($academic) ?></a></li>
					<?php }
					echo '<ul>';
				}
				wp_reset_postdata();
			?>
		</div>
	
	<?php }
	get_footer();
?>
