<?php
/**
 * The Header for WPBootstrap theme
 *
 * @package WPBootstrap
 * @since WPBootstrap 1.0
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
	<meta name="description" content="Errpro 作者为oxnz,是一个关注 IT 动态,软件开发,数据库,Cocoa,iOS,Linux,Mysql,Unix,线程,进程,C++,Lua,Python,Perl,Php,Shell,等的博客,同时发布了 NZPlayer,WPBootstrap 两款软件" />
	<meta name="keywords" content="Errpro,排序,正则表达式,程序员,算法,软件开发,数据库,软件工程,Ajax,Algorithm,Android,Bash,C++,Coding,CSS,Cocoa,Database,Debug,Game,Go,Google,gcc,HTML,iOS,ie,Java,Javascript,jQuery,js,Linux,Mac,Mysql,Oracle,Perl,Php,Programming,language,Python,Ruby,SQL,Ubuntu,vim,web,Unix,线程,进程,Lua,Python,Shell,oxnz,NZPlayer,WPBootstrap" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<link href="<?php echo esc_url(site_url('/favicon.png')); ?>"
		rel="shortcut icon">
	<?php wp_head(); ?>
</head>
<body>

<header class="site-header">
	<div class="glob-nav">
		<div class="container">
			<ul>
				<li><a data-toggle="modal" data-target="#about" href="#">About</a></li>
				<li> | </li>
				<li><a href="#">Contact</a></li>
				<li> | </li>
				<?php if (is_user_logged_in()) : ?>
				<li class="user">
				<?php $current_user = wp_get_current_user(); ?>
					<a href="<?php echo get_edit_user_link(); ?>">Hi, <?php echo $current_user->display_name; ?></a>
					<div class="user-pane">
						<div class="pane-body">
							<div class="avatar">
								<?php echo get_avatar($current_user->id, 100); ?>
							</div>
							<ul class="profile">
								<li><?php echo $current_user->display_name; ?></li>
								<li><?php echo $current_user->user_email; ?></li>
								<li>
									<a href="<?php echo esc_url(admin_url()); ?>">Dashboard</a> --
									<a href="<?php echo esc_url(get_edit_user_link()); ?>">Account</a>
								</li>
								<li><a class="view" href="<?php echo get_edit_user_link(); ?>">View Profile</a></li>
							</ul>
						</div><!-- .pane-body -->
						<div class="pane-footer">
							<a href="<?php echo esc_url(admin_url()); ?>">Site Admin</a>
							<a href="<?php echo esc_url(wp_logout_url(site_url($_SERVER['REQUEST_URI']))); ?>">Log out</a>
						</div><!-- .pane-footer -->
					</div><!-- .user-pane -->
				<?php else : ?>
				<li>
					<a href="<?php echo esc_url(wp_login_url(site_url($_SERVER['REQUEST_URI']))); ?>">Login</a>
				<?php endif; ?>
				</li>
			</ul>
		</div><!-- #container -->
	</div><!-- #glob-nav -->

	<nav class="site-nav navbar" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="fa fa-navicon fa-lg"></span>
				</button>
				<a class="navbar-brand site-name" href="<?php echo esc_url(site_url()); ?>"><?php bloginfo('name'); ?></a>
			</div>

			<div class="collapse navbar-collapse" id="navbar-collapse">
<?php
wp_nav_menu(array('container_class'	=> 'collapse navbar-collapse',
	'container'	=> '',
	'menu_class'	=> 'nav navbar-nav navbar-right',
	'walker'		=> new NZ_Walker_Nav_Menu,
));
?>
			</div><!--/.navbar-collapse-->
		</div><!-- #container-fluid -->
	</nav><!-- #site-nav -->

<?php //if (is_home() or is_front_page()) : ?>
	<div class="site-banner" role="banner">
		<div class="container">
			<h1 class="site-title">Works, Blog, Projects and More ...</h1>
			<p class="site-description"><?php bloginfo('description'); ?>
		</div>
	</div><!-- #site-banner -->
<?php //endif; ?>
	<div class="site-info">
		<div class="container">
			<div class="info-inner">
			<div class="position">
				<ol class="breadcrumb">
					<li class="active"><a href="<?php echo esc_url(site_url()); ?>" title="Back to home page" data-toggle="tooltip"><i class="fa fa-home fa-lg"></i> Home</a></li>
					<?php if (is_home() || is_front_page()) : ?>
					<?php elseif (is_404()) : ?>
					<li>404</li>
					<?php elseif (is_single()) : ?>
					<li><?php the_category(' &gt; '); ?></li>
					<?php else : ?>
					<li><?php wp_title(''); ?></li>
					<?php endif; ?>
				</ol>
			</div><!-- position -->
			<div class="site-search">
				<form class="searchform" action="<?php echo esc_url(site_url()); ?>">
				<input class="search-input rounded" type="text" name="s" id="s" placeholder="Search">
				</form>
			</div>
		</div><!-- #container -->
		</div><!-- #info-inner -->
	</div><!-- #site-info -->
</header><!-- #site-header -->
