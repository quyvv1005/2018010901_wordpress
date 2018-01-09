<?php 
/*
Template: contact 
*/
?>

<?php get_header(); ?>
<div class="content">
	<section id="main-content">
		<div class="contact-info">
			<h4>Dia chi lien lac</h4>
			<p>dia chi</p>
			<p>sdt:</p>
		</div>
		<div class="contact-form">
			<?php echo do_shortcode('[contact-form-7 id="27" title="Contact form 1"]'); ?>
		</div>
	</section>
	<section id="sidebar">
		<?php get_sidebar(); ?>
	</section>
</div>
<?php get_footer(); ?>