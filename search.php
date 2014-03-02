<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WPBootstrap
 * @since WPBootstrap v1.4b
 */

get_header(); ?>
<div id="content" class="row" role="main">
	<div class="col-sm-8">
		<div class="blog">
			<?php if (have_posts()) : ?>
			<header class="page-header">
				<h1 class="page-title"><?php printf(__('Search Results for: %s', 'wpbootstrap'), get_search_query()); ?></h1>
			</header>
			<?php
				while (have_posts()) : the_post();
					get_template_part('content', get_post_format());
				endwhile;
				wpbootstrap_paging_nav();
			else :
				get_template_part('content', 'none');
			endif;
			?>
		</div><!-- #blog -->
	</div><!-- #col-sm-8 -->
	<div class="col-sm-4">
		<?php get_sidebar(); ?>
	</div><!-- #col-sm-4 -->
</div><!-- #content -->
<?php get_footer(); ?>
