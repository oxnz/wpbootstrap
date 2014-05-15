<?php get_header(); ?>

</div><!-- .container -->
<div class="portfolio">
	<div class="header">
		<h2 class="title container">Explore my portfolio by project type</h2>
	</div>
	<div class="content container">
		<div class="view view-slide">
			<img src="<?php echo get_template_directory_uri(); ?>/img/dcc.png">
			<div class="mask">
				<h2 class="title">This is the title</h2>
				<p class="intro">avatar of the rocket since; which is usedaded at early time, used in this blog and other resources as avatar.</p>
				<a href="#" class="more">Learn More &raquo;</a>
			</div>
		</div><!-- .cover -->
		<div class="view view-slide">
			<img src="<?php echo get_template_directory_uri(); ?>/img/fs.png">
			<div class="mask">
				<h2 class="title">This is the title</h2>
				<p class="intro">avatar of the rocket since; which is usedaded at early time, used in this blog and other resources as avatar.</p>
				<a href="#" class="more">Learn More &raquo;</a>
			</div>
		</div><!-- .cover -->
		<div class="view view-slide">
			<img src="<?php echo get_template_directory_uri(); ?>/img/wpb.png">
			<div class="mask">
				<h2 class="title">This is the title</h2>
				<p class="intro">avatar of the rocket since; which is usedaded at early time, used in this blog and other resources as avatar.</p>
				<a href="#" class="more">Learn More &raquo;</a>
			</div>
		</div><!-- .cover -->
	</div><!-- .content -->
	<div class="footer">
		<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png">
		<h3>I am a design firm with a passion to make life beautiful</h3>
		<a href="#">See More Works &raquo;</a>
	</div>
</div><!-- .portfolio -->
<div id="chart" class="chart"></div>
<script type="text/javascript">

var chart = document.getElementById("chart");
chart.innerHTML='<canvas id="chart-canvas" width="400" height="300">Not supported</canvas>';
var chart = document.getElementById("chart-canvas");
var ctx = chart.getContext("2d");
function drawCircle(ctx) {
	ctx.fillStyle="#77d1f6";
	ctx.strokeStyle = "#77d0f0";
	ctx.beginPath();
	ctx.moveTo(200, 150);
	ctx.arc(200, 150, 150, 5, Math.PI*2, false);
	ctx.fill();
	ctx.stroke();
	ctx.fillStyle="#381";
	ctx.moveTo(200, 150);
	ctx.arc(200, 150, 140, 0, Math.PI*2, false);
	ctx.fill();
	ctx.stroke();
}
drawCircle(ctx);
</script>

<div class="container">
<?php get_footer(); ?>
