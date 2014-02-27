<?php get_header(); ?>
<div class="projects well">
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
		<img src="<?php echo get_template_directory_uri(); ?>/screenshot1.png" alt="...">
      <div class="carousel-caption">
			<h3>XXX</h3>
			<p>Hello</p>
			<div class="progress">
				<div class="progress-bar progress-bar-success" style="width: 35%">
					<span class="sr-only">35% Complete (success)</span>
				</div>
				<div class="progress-bar progress-bar-warnings" style="width: 20%">
					<span class="sr-only">20% Complete (warning)</span>
				</div>
			</div>
      </div>
    </div>

    <div class="item">
		<img src="<?php echo get_template_directory_uri(); ?>/screenshot2.png" alt="...">
      <div class="carousel-caption">
			<h3>YXX</h3>
			<p>Yello</p>
      </div>
  </div>

    <div class="item">
		<img src="<?php echo get_template_directory_uri(); ?>/follow-me.png" alt="...">
      <div class="carousel-caption">
			<h3>33X</h3>
			<p>Yello</p>
      </div>
	</div>

</div>
  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>
<br>
<br>
<button title="Reset Pricing" type="button"
        class="btn btn-mini resetPrice"
        data-placement='bottom' rel="tooltip">
    <i class="icon-refresh"></i>
</button>

<a href="#" rel="tooltip" title="A nice tooltip">test</a>
</div><!-- #projects -->

<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#contact">
  Launch demo modal
</button>

<?php get_footer(); ?>
