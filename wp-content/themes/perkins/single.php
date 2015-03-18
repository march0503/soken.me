<?php get_header(); ?>
<div id="content-holder" class="container">
	<div class="row">
		<div class="col-md-8">
			<?php 
				if (have_posts()) :				
					while (have_posts()) : the_post();					
						get_template_part('content', get_post_format());
						comments_template();
					endwhile;
				else :
					get_template_part('content', 'none');
				endif; 
			?>	
		</div>
	<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>