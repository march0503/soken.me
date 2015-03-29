<div id="eyechatch-holder" class="row"> <!-- teaser-holder , eyechatch-holder -->
<div class="container">
<?php
	global $perkins_count;
	$perkins_count = 1;
	$perkins_ppp = get_option('posts_per_page');
	$perkins_paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$perkins_args = array('post__not_in' => get_option('sticky_posts'), 'posts_per_page' => $perkins_ppp, 'pagination' => true, 'paged' => $perkins_paged);
	$perkins_query = new WP_Query($perkins_args);
	while ($perkins_query->have_posts()) :
		$perkins_query->the_post();

		//get_template_part('content', get_post_format());
		if ($perkins_count == 1 || $perkins_count == 2 || $perkins_count == 3 ):
			echo '<div class="col-xs-6 top-'."{$perkins_count}".'">';
			echo "<div ";
			post_class();
			echo '>';
			
			echo '<div class="eyechatch-top">';
			if (has_post_thumbnail()) :
				the_post_thumbnail('teaser-md');
			else :
				echo '<img src="';
				echo get_stylesheet_directory_uri();
				echo '/assets/img/placeholder.gif">';
			endif;
			
			echo '<p class="eyechatch-date">';
			echo the_time(get_option('date_format'));
			echo '</p>';
			
			the_title('<h3 class="eyechatch-title"><a href="' . esc_url( get_permalink()) . '">', '</a></h3>');
			
			echo '<div class="eyechatch-text">';
				the_excerpt();
			echo '</div>';

			echo '</div>'; // post_calss

			echo "</div>"; //eyechatch-top
			echo "</div>"; //col-xs-6 top-x
		endif;
		$perkins_count++;
	endwhile;
	wp_reset_postdata();
?>
</div> <!--container-->
</div> <!--eyechatch-holder-->
