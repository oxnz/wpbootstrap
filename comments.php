<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
	<h3 class="comments-title">Comments</h3>
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

<?php comment_form(array('label-submit' => 'Send',
	'comment_notes_before' => false,
	'comment_field' =>  '<p class="comment-form-comment">' .
	'<textarea id="comment" name="comment" cols="20" rows="6" aria-required="true"></textarea></p>',
	'comment_notes_after' => false,
	'label_submit' => __('Submit Comment'),
	/*
	'fields' => apply_filters( 'comment_form_default_fields', array(
	'<p class="comment-form-author">' .
'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
'" size="30"' . $aria_req . ' />' .
'<label for="author">' . __( 'Name', 'domainreference' ) . '</label> ' .
( $req ? '<span class="required">*</span>' : '' ) .
'</p>',
'email' =>
'<p class="comment-form-email">' .
'<label for="email">' . __( 'Email', 'domainreference' ) . '</label> ' .
( $req ? '<span class="required">*</span>' : '' ) .
'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
'" size="30"' . $aria_req . ' /></p>',
'url' =>
'<p class="comment-form-url">' .
'<label for="url">' .
__( 'Website', 'domainreference' ) . '</label>' .
'<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
'" size="30" /></p>'
)),
	 */

)); ?>
	<?php //comment_form(); ?>

</div><!-- #comments -->
