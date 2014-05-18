<?php
/*
 * Template Name: About Page
 */
get_header('product');
?>

<style type="text/css">
.about-summary {
	padding-top: 40px;
	background-color: #fff;
}
.about-summary #about-summary-wrapper {
	height: 300px;
}

.about-user {
	border-top: 1px solid #eee;
	padding: 50px;
}
.about-user .user-info {
	padding: 10px;
	display: -webkit-box;
	-webkit-box-align: start;
}
.about-user .user-info .photo {
	border-radius: 50%;
	margin: 10px;
	margin-right: 20px;
}
.about-user .user-info h3 {
	margin-top: 0;
	padding-top: 10px;
}
.about-user .activity-info {
	height: 130px;
}
.about-user .activity-info canvas {
	height: 100%;
}
</style>

<div id="about" class="about" role="main">

<section class="about-summary row" id="about-summary">
	<div class="container">
		<h1>Summary</h1>
		<div id="about-summary-wrapper"></div>
	</div>
</section>

<section class="about-user">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="user-info vcard">
					<?php echo get_avatar(0, 100); ?>
					<div class="info">
						<h3>Angelina Jolie</h3>
						<p class="description">Lorem imfdja fdjrea fdjjkfdj fdjaskfdj <br>fjsa fksajfks fjaskjrekrj wkj kvjkjf kasf jasfjkerje refda</p>
						<a href="#" class="btn btn-primary">Approve</a>
						<a href="#" class="btn btn-danger">Reject</a>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="activity-info" id="activity-info"></div>
			</div>
		</div>
	</div>
</section>

<section class="about-comments row" id="about-comments">
<!--
	<h1>Posts</h1>
	<?php $posts_count = wp_count_posts(); ?>
	<ul>
		<li>Published: <?php echo $posts_count->publish; ?></li>
		<li>Future: <?php echo $posts_count->future; ?></li>
		<li>Draft: <?php echo $posts_count->draft; ?></li>
		<li>Auto Draft: <?php echo $posts_count->{'auto-draft'}; ?></li>
		<li>Pending: <?php echo $posts_count->pending; ?></li>
		<li>Private: <?php echo $posts_count->private; ?></li>
		<li>Trash: <?php echo $posts_count->trash; ?></li>
		<li>Inherit: <?php echo $posts_count->inherit; ?></li>
	</ul>
	http://www.solagirl.net/wordpress-site-status.html
-->
</section>

</div><!--.about-->

<?php
get_footer();
?>
<script type="text/javascript">
/*
 * function used to draw arc on about-page
 * intend to extend the ctx ability
 */
function drawArc(x, y, r, p, l) {
	this.lineWidth = 10;
	this.beginPath();
	this.arc(x, y, r, 0, 2*Math.PI);
	this.strokeStyle = "#eee";
	this.stroke();

	this.fillStyle = "#26B4A3";
	console.log(x+':'+ y+ ':' + r+ ':'+p);
	this.font = "lighter 15px Arial";
	var m = this.measureText(l);
	this.fillText(l, x-m.width/2, y+r*0.4);
	this.beginPath();
	this.arc(x, y, r, 0, 2*Math.PI*p);
	this.font = "100 80px Arial";
	l = p.toFixed(2)*100;
	var m = this.measureText(l);
	this.fillText(l, x-r*0.55, y+r*0.15);
	this.font = "100 40px Arial";
	this.fillText('%', x-r*0.55+m.width, y+r*0.15);
	this.strokeStyle = "#afd";
	this.stroke();
}

function setup() {
	var chart = document.getElementById("about-summary-wrapper");
	chart.innerHTML = '<canvas id="about-summary-chart" width="'
		+ chart.offsetWidth + '" height="'
		+ chart.offsetHeight + '">Canvas not supported</canvas>';
	var ctx = document.getElementById("about-summary-chart").getContext('2d');
	ctx.drawArc = drawArc;
	var rad = 100;
	var sep = (chart.offsetWidth - (rad+10) * 8)/3;
	console.log(sep);
	var x = 10 + rad;
	ctx.drawArc(x, 150, rad, 0.73, "New Visitors");
	x += (10 + rad)*2 + sep;
	ctx.drawArc(x, 150, rad, 0.88, "New Posts");
	x += (10 + rad)*2 + sep;
	ctx.drawArc(x, 150, rad, 0.38, "New Comments");
	x += (10 + rad)*2 + sep;
	ctx.drawArc(x, 150, rad, 0.67, "Active Users");
}

setup();

function userinfo() {
	var actinfos = document.getElementsByClassName("activity-info");
	for (var i = 0; i < actinfos.length; ++i) {
		var actinfo = actinfos[i];
		var w = actinfo.offsetWidth;
		var h = actinfo.offsetHeight;
		actinfo.innerHTML = '<canvas id="actinfo-' + i + '" width="'
			+ w + '" height="' + h
			+ '">Canvas not supported</canvas>';
		actinfo = document.getElementById("actinfo-" + i).getContext('2d');
		var fortnight = [42, 32, 28, 22, 22, 23, 34, 6, 21, 2, 2, 3, 18, 30];
		var sep = 8; // px
		var ww = (w/2 - 8*13)/14;
		sep += ww;
		console.log(ww);
		var x = 0;
		var y = 0;
		actinfo.fillStyle = "#5ADDA8";
		actinfo.font = "30px Arial";
		actinfo.fillText("Activity", 80, 20);
		for (var i in fortnight) {
			var hh = h*fortnight[i]/50;
			actinfo.fillRect(x, h-hh, ww, hh);
			x += sep;
		}
		var r = (h-50)/2;
		console.log('rad: ' + r);
		var p = 0.72;
		x += r + 40;
		actinfo.beginPath();
		actinfo.lineWidth = 0.25*ww;
		actinfo.arc(x, h/2+10, r, 0, 2*Math.PI*p);
		txt = p.toFixed(2)*100;
		actinfo.font = "lighter 38px Arial";
		var txtw = actinfo.measureText(txt).width;
		actinfo.fillText(txt, x-txtw/2-10, h/2+25)
		actinfo.font = "25px Arial";
		actinfo.fillText('%', x+txtw/2-10, h/2+25)
		actinfo.strokeStyle = "#E78F30";
		actinfo.stroke();
		// second ring
		p = 0.88;
		x += r + 80;
		actinfo.beginPath();
		actinfo.arc(x, h/2+10, r, 0, 2*Math.PI*p);
		actinfo.strokeStyle = "#afd";
		actinfo.stroke();

		txt = p.toFixed(2)*100;
		actinfo.font = "lighter 38px Arial";
		var txtw = actinfo.measureText(txt).width;
		actinfo.fillText(txt, x-txtw/2-10, h/2+25)
		actinfo.font = "25px Arial";
		actinfo.fillText('%', x+txtw/2-10, h/2+25)
	}
}

userinfo();

</script>
