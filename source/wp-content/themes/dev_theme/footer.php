		<?php if ( is_active_sidebar( 'bottom-a' ) || is_active_sidebar( 'bottom-b' ) || is_active_sidebar( 'bottom-c' ) || is_active_sidebar( 'bottom-d' )) : ?>
			<!-- Bottom Wapper -->
			<div id="bottom-wapper">

				<?php if ( is_active_sidebar( 'bottom-a' ) ) : ?>
					<div class="bottom-a-wapper">
						<div class="container">
							<div class="row">
								<?php dynamic_sidebar( 'bottom-a' ); ?>
							</div>
						</div>
					</div>
				<?php endif; ?>

				<?php if ( is_active_sidebar( 'bottom-b' ) ) : ?>
					<div class="bottom-b-wapper">
						<div class="container">
							<div class="row">
								<?php dynamic_sidebar( 'bottom-b' ); ?>
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div>
			
		</div>
		<!-- /Bottom Wapper -->
	<?php endif; ?>

	<!-- Footer Wapper -->		
	<div id="footer-wapper">
		<div class="container">
			<div class="row">
				<div class="footer-left">
					<div class="copyright">
						© <?php bloginfo( 'sitename' ); ?> <?php echo date('Y'); ?>. <?php _e('All rights reserved.', 'alvatheme'); ?>
					</div>
				</div>

				<div class="footer-right">
					<?php if ( is_active_sidebar( 'footer' ) ) : ?>
						<?php dynamic_sidebar( 'footer' ); ?>
					<?php endif; ?>
					<a class="btn-top" title="Top"> </a> 
				</div>
			</div>
		</div>
	</div>
	<!-- /Footer Wapper -->
</div>
<!-- /Page-wapper -->

<?php wp_footer(); ?>
</script>
</body>
</html>