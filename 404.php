<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WPBootstrap
 * @subpackage WPBootstrap
 * @since WPBootstrap 1.0
 */

get_header(); ?>


<center>
<div class="wanted">
	<div class="title">Wanted</div>
	<div class="status">dynamic or static</div>
	<div class="photo">
		<img src="<?php echo get_template_directory_uri(); ?>/img/avatar.png">
	</div>
	<div class="name">&diams; <?php echo end(explode('/', $_SERVER['REQUEST_URI'])); ?> &diams;</div>
	<div class="description">
"Oops, I screwed up and you discovered my fatal flaw. Well, we're not all perfect, but we try.  Can you try this again or maybe visit our <a title="Our Site" href="http://example.com/index.php">Home Page</a> to start fresh.  We'll do better next time."
	</div>
	<div class="reward">&int; 300, 000, 000 REWARD</div>
	<div class="depart"><?php echo bloginfo('name'); ?></div>
</div><!-- #wanted -->
</center>

<?php get_footer(); ?>
