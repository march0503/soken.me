<?php get_header(); ?>	

<?php get_template_part('eyechatch');?>

<div id="main-holder" class="container">
	<?php
	global $perkins_count;
	$perkins_count = 1;
	$perkins_sticky = get_option('sticky_posts');
	if (!empty($perkins_sticky)) :
		$perkins_args = array('post__in' => $perkins_sticky);
		$perkins_query = new WP_Query($perkins_args);
		?>
		<div class="sticky">
			<?php
				while ($perkins_query->have_posts()) :
				$perkins_query->the_post();
				get_template_part('content-sticky');
				$perkins_count++;
				endwhile;
			?>
		</div>
		<?php
		wp_reset_postdata();
	endif;
	?>	
	<div id="teaser-holder" class="row">
		<div class="col-md-8">
			<?php
				global $perkins_count;
				$perkins_count = 1;
				$perkins_ppp = get_option('posts_per_page');
				$perkins_paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$perkins_args = array('post__not_in' => get_option('sticky_posts'), 'posts_per_page' => $perkins_ppp, 'pagination' => true, 'paged' => $perkins_paged);
				$perkins_query = new WP_Query($perkins_args);
				while ($perkins_query->have_posts()) :
					//var_dump($perkins_query);
					$perkins_query->the_post();
					get_template_part('content', get_post_format());
					$perkins_count++;
				endwhile;
				wp_reset_postdata();
			?>
			<?php perkins_pagination(); ?>
		</div>
		<?php get_sidebar(); ?> 
	</div>	
</div>
<?php get_footer(); ?>