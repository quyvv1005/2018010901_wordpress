<?php get_header(); ?>

<div id="main-wrapper">
	<div class="container">
		<div class="row">
			<?php $layout_style = get_theme_structure(); ?>
		</div>
	</div>
</div>
<div class="content">
	<section id="main-content">
		<?php if (have_posts()) : while(have_posts()) : the_post(); ?>
			<?php get_template_part('content', get_post_format()); ?>
		<?php endwhile; ?>
		<?php theme_pagination(); ?>
	  <?php else: ?>
	  	<?php get_template_part('content', 'none'); ?>
	  <?php endif; ?>
	</section>
	<section id="sidebar">
		<?php get_sidebar(); ?>
	</section>
</div>
<?php get_footer(); ?>