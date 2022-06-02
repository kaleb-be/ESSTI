<footer class="site-footer">
	
	<div class="site-footer__inner container container--narrow">
		
		<div class="group">
			
			<div class="site-footer__col-one">
				<h1 class="school-logo-text school-logo-text--alt-color"><a href="<?php echo site_url() ?>"><strong>ESSTI</strong></a></h1>
				<pre><a class="site-footer__link" href="#">https://etssti.org/</a></pre>
			</div>
			
			<div class="site-footer__col-two-three-group">
				<div class="site-footer__col-two">
					<h3 class="headline headline--small">Explore</h3>
					<nav>
						<!--?php wp_nav_menu( array('theme_location'=>'footerColumn1')); ?-->
						<ul class="nav-list min-list">
							<li <?php if (is_page('about') or wp_get_post_parent_id(0) == 14) echo 'class="current-menu-item"'?>><a href="<?php echo site_url('/about') ?>">About</a></li>
							<li <?php if (get_post_type()=='academics' ) echo 'class="current-menu-item"'; ?>><a href="<?php echo get_post_type_archive_link('academics'); ?>">Academics</a></li>
							<li <?php if (get_post_type()=='event' OR is_page('past-events')) echo 'class="current-menu-item"'; ?>><a href="<?php echo get_post_type_archive_link('event'); ?>">Events</a></li>
<!--							<li><a href="#">Locations</a></li>-->
						</ul>
					</nav>
				</div>
				
				<div class="site-footer__col-three">
					<h3 class="headline headline--small">Learn</h3>
					<nav>
						<ul class="nav-list min-list">
							<li><a href="#">Legal</a></li>
							<li><a href="<?php echo site_url('/privacy-policy') ?>">Privacy</a></li>
							<li><a href="#">Careers</a></li>
						</ul>
					</nav>
				</div>
			</div>
			
			<div class="site-footer__col-four">
				<h3 class="headline headline--small">Connect With Us</h3>
				<nav>
					
					<!--?php wp_nav_menu( array('theme_location'=>'footerColumn2')); ?-->
					<ul class="min-list social-icons-list group">
						<li <?php if (is_page('about') or wp_get_post_parent_id(0) == 14) echo 'class="current-menu-item"'?>><a href="#" class="social-color-facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="#" class="social-color-twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a href="#" class="social-color-youtube"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
						<li><a href="#" class="social-color-linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
						<li><a href="#" class="social-color-instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					</ul>
				</nav>
			</div>
		</div>
	
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
