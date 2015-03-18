<?php get_header(); ?>	
<div id="main-holder" class="container">	
	<div id="teaser-holder" class="row">
		<div class="col-md-8">		
			<?php if (have_posts()) : ?>		
				<h1 id="archive-title"><?php printf( __('Tag - %s', 'perkins'), single_tag_title('', false)); ?></h1>
				<?php					
				$perkins_term_description = term_description();
				if (!empty($perkins_term_description)) :
					printf('<div class="taxonomy-description">%s</div>', $perkins_term_description);
				endif;							
				while (have_posts()) : the_post();					
					get_template_part('content', get_post_format());
				endwhile;
				else :					
					get_template_part('content', 'none');
				endif;
			?>
			<?php perkins_pagination(); ?>
		</div>
		<?php get_sidebar(); ?> 
	</div>	
</div>
<?php get_footer(); ?>