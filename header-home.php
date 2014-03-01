<?php
if (is_home()) :
	get_header('home');
elseif (is_404()) :
	get_header('404');
else :
	get_header('default');
endif;
?>

<?php if(is_front_page()) : get_header('home'); endif; ?>
<div class="home-header">
	<div class="home-nav continer">
		<a href="<?php echo site_url(); ?>"><?php echo bloginfo('name'); ?></a>
		<?php wp_nav_menu(array('container_class' => 'nav-menu')); ?>
		<div class="site-search">
			<form class="searchform" action="<?php echo site_url(); ?>">
				<input class="search-input rounded" type="text" name="s" id="s" placeholder="Search">
			</form>
			<span class="justify"></span>
		</div>
	</div>
</div>

<div class="alert alert-danger">TODO: home-header template need update</div>
