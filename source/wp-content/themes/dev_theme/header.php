<!DOCTYPE <html>
<!--[if IE 8] <html <?php language_attributes(); ?> class="ie8"><![endif]-->
<!---[if !IE] <html <?php language_attributes(); ?>> <![endif]--> 
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php 
	$favicon = of_get_option('favicon_image', '');
	if(empty($favicon)) {
		$favicon = get_stylesheet_directory_uri().'/favicon.icon';
	} 
	?>
	<link rel="shortcut" href="<?php echo $favicon; ?>">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600|Open+Sans:300,400,600,700|Roboto:300,400,700" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> > <!--them class tuong trung cho moi trang len -->
	<div class="page-wapper">
		<div id="toolbar-wapper"><?php theme_toolbar(); ?></div>
		<div id="header-wapper">
			<div class="container">
				<div class="row">
					<div class="header-area">
						<div class="logo-section"><?php theme_logo(); ?></div>
						<div class="mainmenu-section"><?php theme_menu('primary_menu'); ?></div>
					</div>
				</div>
			</div>
		</div><!-- /header -->
