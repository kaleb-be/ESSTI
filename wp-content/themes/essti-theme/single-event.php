<?php
	
	get_header();
	pageBanner();
	while(have_posts()) {
		the_post(); ?>

		<div class="container container--narrow page-section">
			<div class="metabox metabox--position-up metabox--with-home-link">
				<p>
					<a class="metabox__blog-home-link" href="<?php echo site_url('/events'); ?>">
						<i class="fa fa-home" aria-hidden="true"></i> Events Home</a> <span class="metabox__main">
        <?php the_title(); ?>
        </span></p>
			</div>
			<div class="generic-content"><?php the_content(); ?></div>
			<?php
				$relatedAcademics = get_field('related_academics');
				if ($relatedAcademics) {
					echo '<hr class="section-break">';
					echo '<h2 class="headline headline--medium">Related Academic Center(s)</h2>';
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
