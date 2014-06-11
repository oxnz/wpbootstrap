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
	<header class="post-header panel-heading"><h1 class="title">
<?php
$icon = '<i class="fa ';
if ( in_category( 'Linux' ) )
	$icon .= 'fa-linux';
elseif ( in_category( 'Debug' ) )
	$icon .= 'fa-bug';
elseif ( in_category( 'Cloud' ) )
	$icon .= 'fa-cloud';
elseif ( in_category( 'Algorithm' ) )
	$icon .= 'fa-signal';
elseif ( in_category( 'OS X' ) )
	$icon .= 'fa-apple';
elseif ( in_category( 'Database' ) )
	$icon .= 'fa-database';
else
	$icon .= 'fa-bullseye';
$icon .= '"></i> ';
//echo $icon;
?>
<?php
the_title('<a href="' .esc_url(get_permalink()) . '" rel="bookmark">', '</a>');
?>
	</h1></header><!--/post-header-->
	<ul class="post-meta top-info">
		<li><i class="fa fa-user"></i> <?php the_author_link(); ?></li>
		<li><?php echo '<i class="fa fa-calendar-o"></i> '.get_the_date(); ?></li>
		<li><?php the_modified_date('F j, Y', '<i class="fa fa-clock-o"></i> '); ?></li>
		<li><?php the_tags('<i class="fa fa-tags"></i> ', ' • '); ?></li>
		<li><?php edit_post_link('edit', '<i class="fa fa-edit"></i> '); ?></li>
	</ul><!-- #info -->
	<div class="content panel-body">
<?php
if ( has_post_thumbnail() ) {
	the_post_thumbnail('post-thumbnail', array(
		'class' => 'img-thumbnail pull-left',
	));
}

if ( is_search() ) // Only display Excerpts for Search
	the_excerpt();
else
	the_content('<span class="btn btn-default btn-sm">continue reading &raquo;</span>');

?>
	</div>
	<footer class="post-footer panel-footer">
		<ul class="bottom-info">
			<li><i class="fa fa-th-large"></i>
				Posted in <?php the_category(' &bull; '); ?></li>
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
			<li><i class="fa fa-share-alt"></i> <?php echo rand(0, 100); ?> Shares</li>
			<li><i class="fa fa-heart"></i> <?php echo rand(0, 100); ?> Likes</li>
		</ul>
	</footer><!--panel-footer-->
</article><!-- #post-## -->
