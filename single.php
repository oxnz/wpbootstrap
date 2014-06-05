<?php
get_header();
?>

<div class="site-content container">
	<div id="content" class="row" role="main">
		<div class="col-md-8">
			<div class="blog">
			<?php
			if (have_posts()) :
				while(have_posts()) : the_post();
					get_template_part('content', get_post_format());
					wpbootstrap_post_nav();
					if(comments_open() || get_comments_number()) {
						comments_template();
						}
				endwhile;
			else:
				get_template_part('content', 'none');
			endif;
			?>
			</div><!-- #blog -->
		</div><!-- #col-sm-8 -->
		<div class="col-md-4">
		<!-- <div class="col-sm-4 col-sm-offset-1" -->
			<?php get_sidebar( 'content' ); ?>
			<?php get_sidebar(); ?>
		</div><!-- #col-sm-4 -->
	</div><!-- #content -->
</div><!-- #site-content #container -->

<?php get_footer();
