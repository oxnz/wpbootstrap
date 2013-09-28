<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="banner" class="carousel slide">
		<ol class="carousel-indicators">
			<li data-target="#banner" data-slide-to="0" class="active"></li>
			<li data-target="#banner" data-slide-to="1"></li>
			<li data-target="#banner" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="item active">
				<img src="<?php echo get_template_directory_uri(); ?>/img/banner/0.png" alt=""></img>
				<div class="carousel-caption">
					<h4>First Thumbnail label</h4>
					<p>Cars justo dios, daphics ac facilises in</p>
				</div>
			</div>
			<div class="item">
				<img src="<?php echo get_template_directory_uri(); ?>/img/banner/1.png" alt=""></img>
				<div class="carousel-caption">
					<h4>Second thumbnail label</h4>
					<p>test test est</p>
				</div>
			</div>
			<div class="item">
				<img src="<?php echo get_template_directory_uri(); ?>/img/banner/2.png" alt=""></img>
				<div class="carousel-caption">
					<h4>Second thumbnail label</h4>
					<p>test test est</p><br />
					<a href="#" class="btn btn-primary">Learn more &raquo;</a>
				</div>
			</div>
		</div>
		<a class="carousel-control left" href="#banner" data-slide="prev">&lsaquo;</a>
		<a class="carousel-control right" href="#banner" data-slide="next">&rsaquo;</a>
	</div>

	
<div class="container">
	<div class="row">
		<div class="span4">
			<img class="img-circle" data-src="x.png">
			<h2>Heading</h2>
			<p>Donec id elit non mi pora gravida</p>
			<p><a class="btn" href="#">View details &raquo;</a></p>
		</div>
		<div class="span4">
			<h2>Heading</h2>
			<p>Donec id elit non mi pora gravida</p>
			<p><a class="btn" href="#">View details &raquo;</a></p>
		</div>
		<div class="span4">
			<h2>Heading</h2>
			<p>Donec id elit non mi pora gravida</p>
			<p><a class="btn" href="#">View details &raquo;</a></p>
		</div>
	</div>
</div>


<?php #get_sidebar(); ?>
<?php get_footer(); ?>
