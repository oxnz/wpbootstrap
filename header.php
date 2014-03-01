<?php
/**
 * The Header for WPBootstrap theme
 *
 * @package WPBootstrap
 * @since WPBootstrap 1.0
 * <!DOCTYPE html>
 */
 ?>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo bloginfo('name');	echo is_front_page() ?
	" | " . get_bloginfo('description') : wp_title('|', true); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400' rel='stylesheet' type='text/css'>
	<link href="<?php echo site_url(); ?>/favicon.png"
		rel="shortcut icon">
	<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet">
	<?php 
		wp_register_script('custom-script', "//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js", array('jquery'));
		wp_enqueue_script('custom-script'); ?>
	<?php wp_head(); ?>
</head>
<body>

<div class="site-header">
<?php
if (is_home() or is_front_page()) :
	get_header('default');
elseif (is_page()) :
	get_header('page');
elseif (is_404()) :
	get_header('404');
else :
	get_header('default');
endif;
?>
</div><!-- #site-header -->

<div class="site-content container">
