<?php
/*
 * Template Name: Product Page
 */
get_header('product');
?>

<nav class="side-nav" role="navigation">
<?php
foreach (array(
	'intro'		=> 'Introduction',
	'features'	=> 'Features',
	'subscribe' => 'Subscribe',
	'top' => 'back to top',
) as $id => $title) {
	echo '<a href="#' . $id . '" rel="tooltip" title="' . $title . '" data-placement="left"></a>';
}
?>
</nav>

<?php
while ( have_posts() ) : the_post();
// include the page content template
get_template_part('content', 'page');

if (comments_open() || get_comments_number()) {
	comments_template();
}
?>

<section id="subscribe" class="subscribe">
	<div class="container">
		<h2>Subscribe to get delightfully infrequent updates</h2>
		<form class="subscribe-form form-inline" action="#" role="form">
			<div class="form-group">
				<label class="sr-only" for="exampleInputEmail1">Email address</label>
				<input type="text" class="form-controll" placeholder="Enter email address" />
			</div>
			<button type="submit" class="btn btn-success">Subscribe</button>
		</form>
		<section class="subscribe-description">
			<p>Don't worry. We do not spam :)</p>
		</section>
	</div>
</section>

<?php
endwhile;
?>

</div><!--.product-->

<?php
get_sidebar();
get_footer('product');
get_footer();
