<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php 
			/* luu custom field va bien */
			$link = get_post_meta($post-ID, 'format_link_url', true);
			$link_description = get_post_meta($post->ID, 'format_link_description', true);

			/* hien thi tieu de co link tro toi link gan trong custom field */
			if(is_single()) {
				printf('<h1 class="entry_title"><a href="%1$s" target="blank">%2$s</a></h1>', $link, get_the_title());
			} else {
				printf('<h2 class="entry_title"><a href="%1$s" target="blank">%2$s</a></h2>', $link, get_the_title());
			}
		?>
		
	</header><!-- /header -->
	<div class="entry-content">
		<?php
			printf('<a href="%1$s" target="blank">%2$s</a>', $link, $link_description);
		?>
		<?php (is_single() ? theme_entry_tag(): ''); ?>
	</div>
</article>