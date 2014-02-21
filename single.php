<?php
get_header();
?>

<div id="content" class="row" role="main">
	<div class="col-sm-8">

<div class="blog">
<?php
if (have_posts()):
	while(have_posts()):
		the_post();
?>
	<div class="post well">
		<ul>
		<li><h3 class="title"><?php the_title(); ?></h3></li>
		<li><h3 class="author">
		<span class="glyphicon glyphicon-user"></span>&nbsp;
		<?php the_author_link(); ?> &nbsp;&nbsp; | &nbsp;&nbsp;
		<span class="glyphicon glyphicon-tags"></span>&nbsp;
		<?php the_category(', '); ?> &nbsp;&nbsp; | &nbsp;&nbsp;
		<span class="glyphicon glyphicon-calendar"></span>&nbsp;
		<?php the_date(); ?> &nbsp;&nbsp; | &nbsp;&nbsp;
		<span class="glyphicon glyphicon-comment"></span>
		<?php comments_number(); ?></h3></li>
		<li class="content">
		<br>
		<?php the_content('continue reading &raquo;'); ?>
		</li>
		<li><?php comments_template(); ?></li>
		</ul>
	</div><!-- #post -->
<?php
endwhile;
else:
	_e('Sorry, there is no post now.');
endif;
?>
</div><!-- #blog -->
	</div><!-- #span8 -->
	<div class="col-sm-4">
<!-- <div class="col-sm-4 col-sm-offset-1" -->
	<?php get_sidebar(); ?>
	</div><!-- #span4 -->
</div><!-- #content -->

<br><br>
<?php
get_footer();
?>
