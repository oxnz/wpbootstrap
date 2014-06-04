<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search
 *
 * @package WPBootstrap
 * @since WPBootstrap 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('panel panel-default'); ?>>
	<div class="panel-heading">
<?php
		if (is_single()) :
			the_title('<h3 class="title">', '</h3>');
		else :
			the_title('<h3 class="title"><a href="' .esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>');
		endif;
?>
	</div><!--/panel-heading-->
<?php
if ( has_post_thumbnail() ) {
	the_post_thumbnail();
}
?>
	<ul class="top-info">
		<li><i class="fa fa-user"></i> <?php the_author_link(); ?></li>
		<li><?php echo '<i class="fa fa-calendar-o"></i> '.get_the_date(); ?></li>
		<li><?php the_modified_date('F j, Y', '<i class="fa fa-history"></i> '); ?></li>
		<li><?php the_tags('<i class="fa fa-tags"></i> ', ' • '); ?></li>
		<li><?php edit_post_link('edit', '<i class="fa fa-edit"></i> '); ?></li>
	</ul><!-- #info -->
	<div class="content panel-body">
		<?php the_content('continue reading &raquo;'); ?>
	</div>
	<div class="panel-footer">
		<ul class="bottom-info">
			<li>Posted in <?php the_category(' • '); ?></li>
			<li>|</li>
			<li>
			<?php if (get_comments_number() > 0) : ?>
			<a href="<?php comments_link(); ?>">
				<i class="fa fa-comments"></i>
				<?php comments_number(); ?>
			</a>
			<?php else : ?>
				<i class="fa fa-comment"></i>
				<?php comments_number(); ?>
			<?php endif; ?>
			</li>
		</ul>
	</div><!--panel-footer-->
</article><!-- #post-## -->
