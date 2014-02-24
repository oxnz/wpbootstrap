<?php
get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); the_content(); ?>
<?php endwhile; else : ?>
	<div class="alert alert-danger">Sorry, this page does not exists.</div>
<? endif; ?>

<?php get_footer(); ?>
