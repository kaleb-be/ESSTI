<?php get_header(); ?>

<div class="page-banner">
	<div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/EORC-Satellite.jpg') ?>);"></div>
	<div class="page-banner__content container t-center c-white">
		<h1 class="headline headline--large">Welcome!</h1>
		<h2 class="headline headline--medium">Here at ESSTI, we exploit multidimensional uses of space science and technologies</h2>
		<h3 class="headline headline--small">Do you want to know more about us</h3>
		<a href="#" class="btn btn--large btn--blue">Learn More</a>
	</div>
</div>


<div class="full-width-split group">
	<div class="full-width-split__one">
		<div class="full-width-split__inner">
			<h2 class="headline headline--small-plus t-center">Upcoming Events</h2>
			
			<?php
				$today = date('Ymd');
				$upcomingEvents = new WP_Query(array(
						'posts_per_page'=>2,
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
								)
						)
				));
				while ($upcomingEvents->have_posts()){
					$upcomingEvents->the_post();
					get_template_part('template-parts/content', 'event');
				}
				wp_reset_postdata();
			?>
			
			<p class="t-center no-margin"><a href="<?php echo get_post_type_archive_link('event'); ?>" class="btn btn--blue">View All Events</a></p>
		</div>
	</div>
	<div class="full-width-split__two">
		<div class="full-width-split__inner">
			<h2 class="headline headline--small-plus t-center">From Our Blogs</h2>
			<?php
				$new_posts = new WP_Query(array('posts_per_page'=> 2));
				while ($new_posts->have_posts()){
					$new_posts->the_post();?>
					<div class="event-summary">
						<a class="event-summary__date event-summary__date--beige t-center" href="<?php the_permalink(); ?>">
							<span class="event-summary__month"><?php the_time('M'); ?></span>
							<span class="event-summary__day"><?php the_time('d'); ?></span>
						</a>
						<div class="event-summary__content">
							<h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
							<p><?php if (has_excerpt()) {
									echo get_the_excerpt();
								}else{
									echo wp_trim_words(get_the_content(), 18);
								}?>
								<a href="<?php the_permalink(); ?>" class="nu gray">Read more</a></p>
						</div>
					</div>
					<?php
				}
				wp_reset_postdata();
			?>
			
			<p class="t-center no-margin"><a href="<?php echo esc_url(site_url('/blog')); ?>" class="btn btn--yellow">View All Blog Posts</a></p>
		</div>
	</div>
</div>

<div class="hero-slider">
	<div data-glide-el="track" class="glide__track">
		<div class="glide__slides">
			<div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/bus.jpg'); ?>);">
				<div class="hero-slider__interior container">
					<div class="hero-slider__overlay">
						<h2 class="headline headline--medium t-center">Free Transportation</h2>
						<p class="t-center">All Employees have free unlimited bus fare.</p>
						<p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
					</div>
				</div>
			</div>
			<div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/shuttle launch.jpg'); ?>);">
				<div class="hero-slider__interior container">
					<div class="hero-slider__overlay">
						<h2 class="headline headline--medium t-center">Build the future</h2>
						<p class="t-center">Through our comprehensive programs we allow researchers to delve deeper into the secrets of the universe and make discoveries that push the development of our country</p>
						<p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
					</div>
				</div>
			</div>
			<div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/education.jpg'); ?>);">
				<div class="hero-slider__interior container">
					<div class="hero-slider__overlay">
						<h2 class="headline headline--medium t-center">Quality Education</h2>
						<p class="t-center">We encourage the youth in their pursuit of knowledge</p>
						<p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
					</div>
				</div>
			</div>
		</div>
		<div class="slider__bullets glide__bullets" data-glide-el="controls[nav]">
		</div>
	</div>
</div>

<?php get_footer();?>
