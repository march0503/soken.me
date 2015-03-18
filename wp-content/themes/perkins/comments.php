<?php if (post_password_required()) { return; } ?>
<div id="comments">
	<?php if (have_comments()) : ?>
		<h3 id="comments-title"><?php _e('Comments', 'perkins'); ?></h3>		
		<ol class="comment-list">
			<?php wp_list_comments(array('type' => 'comment', 'callback' => 'perkins_comment')); ?>
		</ol>
		<div class="page-links"><?php paginate_comments_links(); ?></div> 
		<?php if (!comments_open()) : ?>
			<p class="no-comments"><?php _e('Comments are closed.', 'perkins'); ?></p>
		<?php endif; ?>
	<?php endif; ?>	
	<?php 
		$perkins_fields = array(	
			'comment_notes_before' => '<p class="comment-notes">' . __('Your email address will not be published / Required fields are marked *', 'perkins') . '</p>',		
			'fields' => apply_filters( 'comment_form_default_fields', array(		
				'author' => '<label for="author">Name*</label><input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" />',			
				'email' => '<label for="email">Email*</label><input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" />',
				'url' => '<label for="url">Website</label><input id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url'] ) . '" />')
			),
		);	
		comment_form($perkins_fields); 
	?>	
</div>