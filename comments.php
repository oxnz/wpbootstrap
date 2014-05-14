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

<div id="comments" class="comments-area well">
	<?php if ( have_comments() ) : ?>
	<h2 class="comments-title page-header">
		<?php
			printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'wpbootstrap' ),
				number_format_i18n( get_comments_number() ), get_the_title() );
		?>
	</h2>
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<ul class="pager">
		<li class="previous"><?php previous_comments_link(__( '&larr; Older Comments')); ?></li>
		<li class="next"><?php next_comments_link(__( 'Newer Comments &rarr;')); ?></li>
	</ul>
	<?php endif; // Check for comment navigation. ?>
	<ol class="comment-list">
		<?php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
				'avatar_size'=> 34,
			) );
		?>
	</ol><!-- .comment-list -->


	<?php if ( ! comments_open() ) : ?>
	<p class="no-comments"><?php _e('Comments are closed.'); ?></p>
	<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php comment_form(array(
		'title_reply' => __('Leave a reply'),
		'title_reply_to' => ('Leave %s a reply'),
		'comment_field' =>  '<p class="comment-form-comment">' .
		'<textarea class="form-control" id="comment" name="comment" rows="6" aria-required="true"></textarea></p>',
		'label_submit' => __('Submit Comment'),
	)); ?>
	<?php //comment_form(); ?>
</div><!-- #comments -->
