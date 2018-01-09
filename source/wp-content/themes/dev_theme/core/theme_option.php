<?php
	define('OPTION_FRAMEWORK_DIRECTORY', THEME_URI . '/libs/optionsframework/');
	require_once THEME_PATH . '/libs/optionsframework/options-framework.php';

	/*LOADS the option panel */
	$optionsfile = locate_template('options.php');
	load_template($optionsfile);

	add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

	function optionsframework_custom_scripts() { ?>
	<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery('#example_showhidden').click(function() {
			jQuery('#section-example_text_hiden').fadeToggle(400);
		});
		if(jQuery('#example_showhidden:checked').val() !== undefined) {
			jQuery('#section-example_text_hidden').show();
		}
	});
	</script>
	<?php 
	} 
