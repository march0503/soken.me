<?php get_header(); ?>
<div id="content-holder" class="container">
	<div class="row">
		<div class="col-md-8">
			<?php				
				while (have_posts()) : the_post();					
					get_template_part('content', 'page');
					comments_template();				
				endwhile;
			?>		
		</div>
	<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>