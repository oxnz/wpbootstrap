<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WPBootstrap
 * @subpackage WPBootstrap
 * @since WPBootstrap 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area panel panel-default">
	<?php if ( have_comments() ) : ?>
	<div class="panel-heading">
		<h2 class="comments-title"><i class="fa fa-comments-o"></i>
		<?php
			printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'wpbootstrap' ),
				number_format_i18n( get_comments_number() ), get_the_title() );
		?>
		</h2>
	</div>
	<div class="panel-body">
	<ol class="comment-list">
		<?php
			wp_list_comments( array(
				'style'		=> 'ol',
				'avatar_size'=> 80,
				'reply_text'=> '<i class="fa fa-reply"></i> Reply',
				'callback'	 => function($comment, $args, $depth) {
					if ('div' == $args['style']) {
						$tag = 'div';
						$add_below = 'comment';
					} else {
						$tag = 'li';
						$add_below = 'div-comment';
					}
?>
	<<?php echo $tag; ?> <?php comment_class(empty($args['has_children']) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">

<?php if ('div' != $args['style']) : ?>
<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
<?php endif; ?>

<div class="comment-author vcard">
<?php if (0 != $args['avatar_size']) echo get_avatar($comment, $args['avatar_size']); ?>
</div>

<?php if ('0' == $comment->comment_approved) : ?>
<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.'); ?></em>
<?php endif; ?>

<div class="comment-quote">
	<div class="comment-header">
		<span><?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()); ?></span>
		<span class="meta"><a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)); ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time()); ?></a><?php edit_comment_link(__('(Edit)'), ' ', ''); ?></span>
	</div>
	<div class="comment-content">
		<?php comment_text(); ?>
	</div>
	<ol class="comment-footer">
		<li><?php comment_reply_link(array_merge($args, array(
			'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?></li>
		<li><a href="#"><i class="fa fa-share"></i> Share</a></li>
		<li><a href="#"><i class="fa fa-heart"></i> Like</a></li>
		<li><a href="#"><i class="fa fa-flag"></i> Report</a></li>
	</ol><!--/comment-footer-->
</div>
<?php if ('div' != $args['style']) : ?>
</div>
<?php endif; ?>
<?php
				}
			) );
		?>
	</ol><!-- .comment-list -->

	<?php if ( ! comments_open() ) : ?>
	<p class="no-comments"><?php _e('Comments are closed.'); ?></p>
	<?php endif; ?>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	</div>
	<div class="panel-footer comments-pager">
	<ul class="pager">
		<li class="previous"><?php previous_comments_link(__( '&larr; Older Comments')); ?></li>
		<li class="next"><?php next_comments_link(__( 'Newer Comments &rarr;')); ?></li>
	</ul>
	<?php endif; // Check for comment navigation. ?>

	</div><!--/panel-body-->
	<?php endif; // have_comments() ?>

	<div class="panel-body">
	<?php comment_form(array(
		'title_reply' => __('Leave a reply'),
		'title_reply_to' => ('Leave %s a reply'),
		'comment_field' =>  '<p class="comment-form-comment">' .
		'<textarea class="form-control" id="comment" name="comment" rows="6" aria-required="true"></textarea></p>',
		'label_submit' => __('Submit Comment'),
	)); ?>
	</div><!--/panel-body-->
</div><!-- #comments -->
