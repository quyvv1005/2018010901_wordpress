<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php theme_entry_header(); ?>
		
	</header><!-- /header -->
	<div class="entry-content">
		<?php the_content(); ?>

		<?php (is_single() ? theme_entry_tag(): ''); ?>
	</div>
</article>