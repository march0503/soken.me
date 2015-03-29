<?php
/*
Template Name: aboutus
*/
?>
<?php get_header(); ?>
<div id="content-holder" class="container" style="text-align: center;">
			<?php				
				while (have_posts()) : the_post();					
					get_template_part('content', 'page');
					comments_template();				
				endwhile;
			?>
</div>
<?php get_footer(); ?>