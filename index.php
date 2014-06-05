<?php
get_header(); ?>

<div class="site-content container">
	<div id="content" class="row" role="main">
		<div class="col-sm-8">
			<div class="blog">
			<?php
			if (have_posts()) :
				while(have_posts()) : the_post();
					get_template_part('content', get_post_format());
				endwhile;
				wpbootstrap_paging_nav();
			else:
				get_template_part('content', 'none');
			endif;
			?>
			</div><!-- #blog -->
		</div><!-- #col-sm-8 -->
		<!-- <div class="col-sm-4 col-sm-offset-1" -->
		<div class="col-sm-4">
			<?php get_sidebar('content'); ?>
		</div><!-- #col-sm-4 -->
	</div><!-- #content -->
</div><!-- #site-content #container -->

<?php
get_sidebar();
get_footer();
