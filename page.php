<?php
get_header();
?>
<div id="content" class="site-content row" role="main">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php the_content(); ?>
<?php endwhile; else: ?>
	<p><?php _e('Sorry, this page does not exists.'); ?></p>
<?php endif; ?>
</div>

<h2>page.php</h2>

<?php
get_footer();
?>
