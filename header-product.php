<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7 ]> <html class="ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>

	<!-- Meta -->
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="googlebot" content="index,follow">

	<!-- Title -->
	<title><?php echo bloginfo('name'); echo is_front_page() ?
	' | ' . get_bloginfo('description') : wp_title('|', true); ?></title>

	<!-- Templates core CSS -->
	<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet">
	<link href="<?php echo get_template_directory_uri(); ?>/product.css" rel="stylesheet">

	<!-- Favicons -->
	<link href="images/favicon/favicon.png" rel="shortcut icon">
	<link href="images/favicon/apple-touch-icon-57-precomposed.png" rel="apple-touch-icon">
	<link href="images/favicon/apple-touch-icon-72-precomposed.png" rel="apple-touch-icon" sizes="72x72">
	<link href="images/favicon/apple-touch-icon-144-precomposed.png" rel="apple-touch-icon" sizes="114x114">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

<?php 
wp_register_script('custom-script', "//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js", array('jquery'));
wp_enqueue_script('custom-script'); ?>
<?php wp_head(); ?>
</head>
<body id="top">
<div id="product" class="product">
<nav class="topnav navbar navbar-inverse" role="navigation">
  <div class="container-fluid">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand site-title" href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
	</div>
	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse" id="navbar-collapse">
<?php
wp_nav_menu(array('container_class'	=> 'collapse navbar-collapse',
	'container'	=> '',
	'menu_class'	=> 'nav navbar-nav',
	'walker'		=> new NZ_Walker_Nav_Menu,
));
?>
	<!--/.wp_nav_menu-->
	<form class="navbar-form navbar-right searchform" role="search" action="<?php echo site_url(); ?>">
	  <div class="form-group">
		<input type="text" class="search-input form-control" name="s" id="s" placeholder="Search">
	  </div>
	</form>
	<ul class="nav navbar-nav navbar-right" style="display: none">
		<li><a href="#">Link</a></li>
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
			<ul class="dropdown-menu">
				<li><a href="#">Action</a></li>
				<li><a href="#">Another Action</a></li>
				<li class="divider"></li>
				<li><a href="#">Separated Action</a></li>
			</ul>
		</li>
	</ul>
	</div><!--/.navbar-collapse-->
  </div><!--/.container-fluid-->
</nav>
