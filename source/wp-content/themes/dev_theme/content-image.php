<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php theme_thumbnail('large'); ?>
		<?php theme_entry_header(); ?>
		<?php 
			/* dem so luong attachment co trong post */
			$attachments = get_children(array('post_parent' => $post->ID));
			$attachment_number = count($attachments);
			printf(__('This image post contains %1$s photos', 'whq'), $attachment_number); 
		?>
		
	</header><!-- /header -->
	<div class="entry-content">
		<?php theme_entry_content(); ?>
		<?php
			if (is_single()) :
				theme_entry_tag();
			endif; 
		?>
	</div>
</article>