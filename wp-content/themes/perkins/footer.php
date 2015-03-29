<footer>	
	<?php if (is_active_sidebar('footer-left') || is_active_sidebar('footer-middle') || is_active_sidebar('footer-right')) : ?>	
	<div id="footer-widgets">
		<div class="container">	
			<div class="row">
				<div class="col-md-4">
					<?php dynamic_sidebar('footer-left'); ?>
				</div>
				<div class="col-md-4">
					<?php dynamic_sidebar('footer-middle'); ?>
				</div>
				<div class="col-md-4">
					<?php dynamic_sidebar('footer-right'); ?>
				</div>	
			</div>	
		</div>
	</div>	
	<?php endif; ?>
	<div id="footer-meta">	
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<p>&copy; <?php echo date('Y'); ?> <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></p>
				</div>
				<div class="col-md-6">
					<nav><?php wp_nav_menu(array('theme_location' => 'footer','depth' => 1,'container' => false,'fallback_cb' => false)); ?></nav>
				</div>
			</div>
		</div>
	</div>	
</footer>
<?php wp_footer(); ?>
</body>
</html>