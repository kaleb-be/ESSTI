<?php
	get_header();
	pageBanner(array(
		'title' => 'All Events',
		'subtitle' => 'See what events will be hosted by ESSTI'
));
?>

	<div class="container container--narrow page-section">
		<?php
			while (have_posts()){
				the_post();
				get_template_part('template-parts/content', 'event');
				wp_reset_postdata();
			}
			echo paginate_links();
		
		?>
		<hr class="section-break">
		<p>Look back on concluded events: <a href="<?php echo site_url('/past-events')?>">Past Events</a></p>
	</div>
<?php
	get_footer();
?>