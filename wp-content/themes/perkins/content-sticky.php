<div class="row">
	<div class="col-md-4">	
		<?php the_title('<h2 class="teaser-title"><a href="' . esc_url( get_permalink()) . '">', '</a></h2>'); ?>
		<?php if (has_post_thumbnail()) : ?>
			<?php the_excerpt(); ?>
		<?php endif; ?>	
	</div>
	<div class="col-md-8">	
		<?php if (has_post_thumbnail()) : ?>
			<?php the_post_thumbnail('teaser-lg'); ?>
		<?php else : ?>
			<?php the_excerpt(); ?>
		<?php endif; ?>	
	</div>
</div>