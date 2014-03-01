<div class="page-header">
	<div class="page-nav container">
		<a href="<?php echo site_url(); ?>"><?php echo bloginfo('name'); ?></a>
		<?php wp_nav_menu(array('container_class' => 'nav-menu')); ?>
		<div class="site-search">
			<form class="searchform" action="<?php echo site_url(); ?>">
				<input class="search-input rounded" type="text" name="s" id="s" placeholder="Search">
			</form>
		</div>
		<span class="justify"></span>
	</div><!-- #page-nav -->
</div>
