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
<div class="site-nav">
	<div class="container">
		<div class="site-name"><a href="<?php echo site_url(); ?>">
			<?php bloginfo('name'); ?>
			<!--
			<img class="img-circle" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png"></img>
			-->
		</a></div><!-- #site-name -->
		<?php wp_nav_menu(array('container_class' => 'nav-menu'));?>
		<span class="justify"></span>
	</div><!-- #container -->
</div><!-- #site-nav -->
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
