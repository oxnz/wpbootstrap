<?php

function register_site_menu() {
	register_nav_menus(
		array('header-menu' => __('Header Menu'), 'extra-menu' => __('Extra Menu'))
	);
}

add_action('init', 'register_site_menu');
//remove_filter('the_content', 'wpautop');
//remove_filter('the_excerpt', 'wpautop');
//remove_filter('the_content', 'wptexturize');
//remove_filter('the_excerpt', 'wptexturize');
//remove_filter('comment_text', 'wptexturize');
//remove_filter('the_title', 'wptexturize');

if (function_exists('register_sidebar'))
	register_sidebar(array(
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));

?>
