<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<header class="page-header">
			<h1 class="page-title"><?php _e( 'Not Found', 'wpbootstrap' ); ?></h1>
		</header>

		<div class="page-wrapper">
			<div class="page-content">
				<h2><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'wpbootstrap' ); ?></h2>
				<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'wpbootstrap' ); ?></p>

				<?php get_search_form(); ?>
			</div><!-- .page-content -->
		</div><!-- .page-wrapper -->
	</div><!-- #primary -->
<br><br>

<?php get_footer(); ?>
