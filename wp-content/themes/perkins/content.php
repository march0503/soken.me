<?php if (is_single()) : ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php the_post_thumbnail('featured'); ?>			
		<div id="post-content">			
			<?php the_title('<h1 id="post-title">', '</h1>'); ?>
			<p id="post-meta">
				<span><i class="fa fa-calendar"></i> <?php the_time(get_option('date_format')); ?></span> 
				<span><i class="fa fa-user"></i> <?php the_author(); ?></span>
				<span><i class="fa fa-comments"></i> <?php comments_number('0 Comments', '1 Comment', '% Comments'); ?></span>
			</p> 			
			<?php the_content() ?>			
			<?php wp_link_pages('before=<div id="post-pager">&after=</div>'); ?>		
			<?php
			$perkins_post_tags = get_the_tags();
			if ($perkins_post_tags) :					
				echo '<div id="post-tags">';
			    foreach($perkins_post_tags as $perkins_tag) {
			    	echo '<a href="' . get_tag_link($perkins_tag->term_id ) . '">#' . $perkins_tag->name.'</a>'; 
			  	}
			  	echo '</div>';					  	
			endif;
			?>							
		</div>		
		<div id="post-footer" class="clearfix">				
			<?php previous_post_link('<div id="post-nav-prev"><p><i class="fa fa-arrow-circle-left"></i> Previous Post</span></p>%link</div>'); ?> 	
			<?php next_post_link('<div id="post-nav-next"><p>Next Post <i class="fa fa-arrow-circle-right"></i></p>%link</div>'); ?>			
		</div>	
	</article>	
<?php else : ?>
	<?php global $perkins_count; ?>
	<?php if ($perkins_count == 1): ?>
		<div id="teaser-top-holder">
	<?php endif; ?>		
	<?php if ($perkins_count == 1 || $perkins_count == 2): ?>
		<div class="col-xs-6 top-<?php echo $perkins_count; ?>">
			<div <?php post_class(); ?>>
				<div class="teaser-top">
					<?php if (has_post_thumbnail()) : ?>
						<?php the_post_thumbnail('teaser-md'); ?>
					<?php else : ?>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/placeholder.gif" />
					<?php endif; ?>		
					<p class="teaser-date"><?php the_time(get_option('date_format')); ?></p>	
					<?php the_title('<h3 class="teaser-title"><a href="' . esc_url( get_permalink()) . '">', '</a></h3>'); ?>
					<div class="teaser-text">
						<?php the_excerpt(); ?>	
					</div>			
				</div>
			</div>
		</div>
	<?php else : ?>			
		<div class="teaser col-md-12">
			<div <?php post_class(); ?>>
			<?php if (has_post_thumbnail()) : ?>
				<div class="col-xs-4"><?php the_post_thumbnail('teaser-md'); ?></div>
				<div class="col-xs-8">					
			<?php else : ?>
				<div class="col-sm-12">	
			<?php endif; ?>							
				<p class="teaser-date"><?php the_time(get_option('date_format')); ?></p>	
				<?php the_title('<h3 class="teaser-title"><a href="' . esc_url( get_permalink()) . '">', '</a></h3>'); ?>
				<?php the_excerpt(); ?>	
				</div>				
			</div>		
		</div>
	<?php endif; ?>
	<?php if ($perkins_count == 2): ?>
	</div>
<?php endif; ?>
<?php endif; ?>