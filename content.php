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

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post well">
		<?php
		if (is_single()) :
			the_title('<h3 class="title">', '</h3>');
		else :
			the_title('<h3 class="title"><a href="' .esc_url(get_permalink()) . '"rel="bookmark">', '</a></h3>');
		endif;
		?>
		<ul class="top-info">
			<li>
			<span class="glyphicon glyphicon-user"></span>
			<?php the_author(); ?>
			</li>
			<li>
			<?php echo '<i class="fa fa-calendar"></i> '.get_the_date();
				//the_date('F j, Y', '<i class="fa fa-calendar"></i> '); ?>
			</li>
			<li><?php the_modified_date('F j, Y', '<span class="glyphicon glyphicon-edit"></span> '); ?></li>
			<li><?php the_tags('<i class="fa fa-tags"></i> ', ' • '); ?>
			</li>
			<li><?php edit_post_link('edit', '<span class="glyphicon glyphicon-edit"></span> '); ?></li>
		</ul><!-- #info -->
		<div class="content">
			<?php the_content('continue reading &raquo;'); ?>
		</div>
		<ul class="bottom-info">
			<li>Posted in
			<?php the_category(' • '); ?>
			</li>
			<li>|</li>
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
		</ul>
	</div><!-- #post #well -->
</article><!-- #post-## -->
