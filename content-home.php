<?php
$commentsfunc = function() {
?>
<div class="panel panel-default">
	<div class="panel-heading">Status</div>
	<div class="panel-body comments-body" data-spy="scroll" data-offset="0"
		data-target="#comments-nav">
		<ul class="nav nav-tabs">
			  <li><a href="#">Profile</a></li>
			  <li class="active"><a href="#">Home</a></li>
			  <li><a href="#">Messages</a></li>
		</ul>
		<ul class="comments-list">
<?php
	$comments = get_comments(array(
		'status' => 'approve',
		'number' => 5,
	));
	foreach ($comments as $c) {
		printf('<li><a href="%s" title="%s">%s author: %s %s %s</a></li>',
			$c->comment_author_url, $c->comment_author, $c->comment_author,
			$c->comment_date,
			$c->comment_author_IP, get_comment_excerpt($c->comment_ID)
		);
	}
?>
		</ul>
	</div>
	<div class="panel-footer">Comments</div>
</div>
<?php
};

$xcommentsfunc = function() {
?>
<div class="panel panel-default">
	<div class="panel-heading"><h2>Recent Comments</h2></div>
	<div class="list-group">
		<a href="#" class="list-group-item active">
			<h4 class="list-group-item-heading">List group item heading</h4>
			<p><?php lipsum(true); ?></p>
		</a>
		<a href="#" class="list-group-item">
			<h4 class="list-group-item-heading">List group item heading</h4>
			<p><?php lipsum(true); ?></p>
		</a>
	</div>
	<div class="panel-footer">Comments</div>
</div>
<?php
};

$statusfunc = function() {
	$posts = wp_get_recent_posts(array(
		'numberposts'	=> 5,
	));
?>
<div class="status panel panel-default">
	<div class="panel-heading"><h2>Status</h2></div>
	<div class="panel-body">
		<p><?php lipsum(true); ?></p>
	</div>
	<ul class="list-group">
<?php
	foreach ($posts as $post) {
?>
		<li class="list-group-item">
			<span class="badge"><?php echo rand(1, 40); ?> views</span>
<?php
		echo '<a href="' . get_permalink($post['ID']) . '" title="'
			. esc_attr($post['post_title']) . '">' . $post['post_title']
			. '</a>';
?>
		</li>
<?php
	}
?>
	</ul>
	<div class="panel-footer">EOSTATUS <?php echo count($posts); ?></div>
</div>
<?php
};

$linksfunc = function() {
?>
<div class="links panel panel-default">
	<div class="panel-heading"><h2>Links</h2></div>
	<table class="table">
		<thead>
			<tr><th>Links</th><th>Links</th></tr>
		</thead>
		<tbody>
			<tr><td>Links</td><td>Links</td></tr>
			<tr><td>Links</td><td>Links</td></tr>
			<tr><td>Links</td><td>Links</td></tr>
		</tbody>
	</table>
	<div class="panel-footer">Made by oxnz with
		<font color="red"><i class="fa fa-heart"></i></font>
	</div>
</div>
<?php
};

/*
 * call the functions and generate the content
 */

$commentsfunc();
$statusfunc();
$linksfunc();
?>
