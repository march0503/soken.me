<?php get_header(); ?>	
<div id="main-holder" class="container">	
	<div id="teaser-holder" class="row">
		<div class="col-md-8">		
			<?php if (have_posts()) : ?>		
				<h1 id="archive-title"><?php printf( __('Search Results - %s', 'perkins'), get_search_query()); ?></h1>
				<?php											
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
