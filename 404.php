<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

<div class="panel panel-danger">
	<div class="panel-heading">
		<?php _e( 'Not Found', 'wpbootstrap' ); ?>
	</div>
	<div class="panel-body">
		<p>当前请求的页面不存在，不如搜搜看?</p>
		<?php get_search_form(); ?>
	</div>
</div>

		<!--
		<h2><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'wpbootstrap' ); ?></h2>
		<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'wpbootstrap' ); ?></p>
		<h2>不如意事常八九，正如此时404</h2>
		<p>当前请求的页面不存在，不如搜搜看?</p>
		-->
<?php get_footer(); ?>
