<?php
get_header(); ?>

<div class="site-content container">
	<div id="content" class="row">
		<div class="col-sm-8">
			<div class="content-main" role="main">
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
			</div><!-- /content-main -->
		</div><!-- #col-sm-8 -->
		<div class="col-sm-4">
			<div class="content-sidebar" role="complementary">
				<?php get_sidebar('content'); ?>
			</div>
		</div>
	</div><!-- #content -->
</div><!-- #site-content #container -->

<?php
get_sidebar();
get_footer();
