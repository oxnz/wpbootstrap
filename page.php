<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<?php
/*
<h1>
<?php
	if ( is_front_page() )
		get_template_part('content', 'index');
	else if ( is_front_page() )
		echo "front";
	else if ( is_home() )
		echo "is_home";
	else
		echo "other";
?>
</h1>
*/
?>
<?php
	// Start the Loop.
	while ( have_posts() ) : the_post();
		// Include the page content template.
		get_template_part( 'content', 'page' );
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) {
			//comments_template();
		}
	endwhile;
?>

<?php get_footer(); ?>
