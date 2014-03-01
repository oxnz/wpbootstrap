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
	<div class="glob-nav">
		<div class="container">
			<div></div>
			<ul>
				<li><a data-toggle="modal" data-target="#about" href="#">About</a></li>
				<li> | </li>
				<li><a data-target="#contact" data-toggle="modal" href="#">Contact</a></li>
				<li> | </li>
				<li class="user">
				<?php if (is_user_logged_in()) :
					$current_user = wp_get_current_user(); ?>
					<a href="<?php echo get_edit_user_link(); ?>">Hi, <?php echo $current_user->display_name; ?></a>
					<div class="user-pane">
						<div class="avatar">
							<?php echo get_avatar($current_user->id, 64); ?>
						</div>
						<ul>
							<li><a href="<?php echo admin_url(); ?>"><?php echo $current_user->display_name; ?></a></li>
							<li><a href="<?php echo get_edit_user_link(); ?>">Profile</a></li>
							<li><a href="<?php echo wp_logout_url(get_permalink()); ?>">Logout</a></li>
						</ul>
						<span class="justify"></span>
					</div>
				<?php else : ?>
					<a href="<?php echo wp_login_url(get_permalink()); ?>">Login</a>
				<?php endif; ?>
				</li>
			</ul>
			<span class="justify"></span>
		</div><!-- #container -->
	</div><!-- #glob-nav -->
	<div class="site-nav container">
		<div class="site-name"><a href="<?php echo site_url(); ?>">
			<?php bloginfo('name'); ?>
		<!--
		<img class="img-circle" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png"></img>
		-->
		</a></div>
		<?php wp_nav_menu(array('container_class' => 'nav-menu'));?>
		<span class="justify"></span>
	</div>
	<div class="site-banner">
		<div class="container">
			<h1 class="site-title">Works, Blog, Projects and More ...</h1>
			<p class="site-description"><?php bloginfo('description'); ?>
		</div>
	</div><!-- #site-banner -->
	<div class="site-info">
		<div class="container">
			<div class="position">
				<ol class="breadcrumb">
					<li class="active"><a href="<?php echo site_url(); ?>" title="Back to home page" rel="tooltip"><span class="glyphicon glyphicon-home"></span> Home</a></li>
					<?php if (is_home() || is_front_page()) : ?>
					<?php elseif (is_404()) : ?>
					<li>Not Found</li>
					<?php elseif (is_single()) : ?>
					<li><?php the_category(' & '); ?></li>
					<?php else : ?>
					<li><?php wp_title(''); ?></li>
					<?php endif; ?>
				</ol>
			</div><!-- position -->
			<div class="site-search">
				<form class="searchform" action="<?php echo site_url(); ?>">
				<input class="search-input rounded" type="text" name="s" id="s" placeholder="Search">
				</form>
			</div>
			<span class="justify"></span>
		</div><!-- #container -->
	</div><!-- #site-info -->
</div><!-- #site-header -->
<div class="site-content container">
