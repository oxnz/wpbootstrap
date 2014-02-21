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
<li><h3 class="title"><a href="<?php the_permalink(); ?>" title="Continue reading: <?php the_title(); ?>"><?php the_title(); ?></a></h3></li>
<li><h3 class="author">Posted by: <?php the_author_link(); ?> On <?php the_date(); ?></h3></li>
<li class="content">
<br>
<?php the_content('continue reading &raquo;'); ?>
</li>
<li><h3 class="metadata">Posted in <?php the_category(', '); ?>&nbsp;&nbsp; | &nbsp;
<a href="<?php comments_link(); ?>"><span class="glyphicon glyphicon-comment"></span>&nbsp;<?php comments_number('no comments', 'one comment', '% comments'); ?>&nbsp;&raquo;</a></h3></li>
</ul>
</div><!-- #post -->
<br>
<?php
	endwhile;
else:
	_e('Sorry, there is no post now.');
endif;
?>
<br>
</div><!-- #blog -->
	</div><!-- #span8 -->
	<div class="col-sm-4">
<!-- <div class="col-sm-4 col-sm-offset-1" -->
	<?php get_sidebar(); ?>
	</div><!-- #span4 -->
</div><!-- #content -->

<?php
get_footer();
?>
