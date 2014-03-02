<?php
/**
 * The template used for displaying page content
 *
 * @package WPBootstrap
 * @since WPBootstrap v1.3b
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		//the_title('<header class="page-header"><h1 class="page-title">', '</h1></header><!-- .page-header -->');
		//edit_post_link(__('Edit', 'wpbootstrap'), '<span class="edit-link">', '</span>');
		the_content();
		wp_link_pages(array(
			'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'wpbootstrap') . '</span>',
			'after' => '</div>',
			'link_before' => '<span>',
			'link_after' => '</span>',
		));
	?>
</article><!-- #post-## -->
