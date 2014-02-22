<?php
/**
 * The Header for nz theme
 *
 * Display all of the <head> section and everything up till <div id="container">
 *
 * @package nz
 * @since nz 0.1
 */
?><!DOCTYPE html>
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
	<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet">
	<link href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico"
		rel="shortcut icon">
	<?php wp_register_script('custom-script', get_template_directory_uri() .
		'/bootstrap/js/bootstrap.js', array('jquery'));
	//wp_register_script('custom-script', "//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js", array('jquery'));
	wp_enqueue_script('custom-script'); ?>
	<?php wp_head(); ?>
</head>
<body>
<div id="site-header" class="site-header">
	<div class="topbar">
		<div class="container">
			<ul class="toplinks pull-right">
				<li><a href="#">About</a>&nbsp;&nbsp;|&nbsp;&nbsp;</li>
				<li><a href="#">Contact</a>&nbsp;&nbsp;|&nbsp;&nbsp;</li>
				<li><a href="#">Login</a></li>
			</ul>
		</div>
	</div>
	<div class="site-banner">
		<div class="container">
			<h1 class="site-name pull-left"><a href="<?php echo site_url(); ?>"><?php bloginfo('name'); ?></a></h1>
			<?php wp_nav_menu(array('container_class' => 'site-nav pull-right'));?>
			<h1 class="site-title">Works, Blog, Projects</h1>
			<p class="site-description"><?php bloginfo('description'); ?>
				&nbsp;&nbsp;<a href="#">Learn more &raquo;</a>
			</p>
		</div>
	</div><!-- #site-banner -->
	<div class="linkbar">
		<div class="container">
			<div class="position pull-left">
				<ol class="breadcrumb">
					<!--
					<li><a href="<?php echo home_url(); ?>"><?php home_url(); ?>Home</a></li>
					-->
					<li class="active"><?php echo "Home" . wp_title('/', false) ?></li>
				</ol>
			</div>
			<div class="site-search pull-right">
				<form class="searchform" action="<?php site_url(); ?>">
				<input type="text" class="rounded" name="s" id="s" placeholder="Search">
				</form>
			</div>
		</div><!-- #container -->
	</div><!-- #linkbar -->
	<!--<div class="space"></div>-->
	<div class="content-header">
		<div class="container">
			<div class="title pull-left"><h2>The blog</h2></div>
			<div class="motto pull-right">
				<h2>Life Changeds, Friends Don't</h2>
			</div>
		</div>
	</div><!-- #content-header -->
</div><!-- #site-header -->

<div id="site-content" class="site-content container">

<?php
?>
