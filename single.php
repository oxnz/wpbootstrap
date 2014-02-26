<?php
get_header();
?>

<div id="content" class="row" role="main">
	<div class="col-sm-8">
		<div class="blog">
		<?php if (have_posts()) : while(have_posts()) : the_post(); ?>
			<div class="post well">
				<h3 class="title"><?php the_title(); ?></h3>
				<ul class="top-info">
					<li>
						<span class="glyphicon glyphicon-user"></span>
						<?php the_author(); ?>
					</li>
					<li>
						<span class="glyphicon glyphicon-tags"></span>
						<?php the_category(', '); ?>
					</li>
					<li>
						<?php the_date('F j, Y', '<span class="glyphicon glyphicon-calendar"></span> '); ?>
					</li>
					<li><?php edit_post_link('edit', '<span class="glyphicon glyphicon-edit"></span> '); ?></li>
					<li>
					<?php if (get_comments_number() > 0) : ?>
					<a href="<?php comments_link(); ?>">
						<span class="glyphicon glyphicon-comment"></span>
						<?php comments_number(); ?>
					</a>
					<?php else : ?>
						<span class="glyphicon glyphicon-comment"></span>
						<?php comments_number(); ?>
					<?php endif; ?>
					</li>
				</ul><!-- #info -->
				<div class="content">
					<?php the_content('continue reading &raquo;'); ?>
				</div>
				<?php comments_template(); ?>
			</div><!-- #post #well -->
		<?php
				endwhile;
			else:
				_e('Sorry, there is no post now.');
			endif;
		?>
		</div><!-- #blog -->
	</div><!-- #col-sm-8 -->
	<div class="col-sm-4">
	<!-- <div class="col-sm-4 col-sm-offset-1" -->
		<?php get_sidebar(); ?>
	</div><!-- #col-sm-4 -->
</div><!-- #content -->

	<?php
	get_footer();
	?>
