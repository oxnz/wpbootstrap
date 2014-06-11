<?php
?>

<footer id="site-footer" class="site-footer">
	<div class="container">
		<div class="footer-links row">
			<div class="column col-sm-4">
				<h2 class="title">Projects</h2>
				<ul>
					<li><a href="https://github.com/oxnz/pygtk-tutor">pygtk-tutor</a></li>
					<li><a href="https://github.com/oxnz/yaosa">yaosa</a></li>
					<li><a href="https://github.com/oxnz/zdcomp">zdcomp</a></li>
					<li><a href="https://github.com/oxnz/algorithms">algorithms</a></li>
					<li><a href="https://github.com/oxnz/design-patterns">design patterns</a></li>
				</ul>
				<?php get_sidebar( 'footer' ); ?>
			</div>
			<div class="column col-sm-4">
				<h2 class="title">Products</h2>
				<ul>
					<li><a href="https://github.com/oxnz/clang-user-manual">clang-user-manual</a></li>
					<li><a href="https://github.com/oxnz/digital-china-supplicant">Digital China Supplicant</a></li>
					<li><a href="https://github.com/oxnz/wpbootstrap">WPBootstrap</a></li>
					<li><a href="https://github.com/oxnz/oxnzbot">oxnzbot</a></li>
					<li><a href="https://github.com/oxnz/nix-utils">nix-utils</a></li>
					<li><a href="https://github.com/oxnz/NZPlayer">NZPlayer</a></li>
				</ul>
			</div>
			<div class="column col-sm-4 social">
				<h2 class="title">Contact</h2>
				<ul>
					<li>
						<strong>Address:</strong>
						<address>
							<strong>Web Designer &amp; Software Developer</strong><br />
							Luo-jia-shan · Wuchang · Wuhan<br />
							email: yunxinyi{@}gmail.com
						</address>
					</li>
					<li>
						<strong>Follow me:</strong>
						<div class="social-links">
							<a href="https://github.com/oxnz"><i class="fa fa-github-square fa-4x"></i></a>
							<a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS'); ?>"><i class="fa fa-rss-square fa-4x"></i></a>
							<a href="https://twitter.com/yunxinyix"><i class="fa fa-twitter-square fa-4x"></i></a>
							<a href="https://www.facebook.com/yun.xinyi"><i class="fa fa-facebook-square fa-4x"></i></a>
						</div>
					</li>
					<li class="hide">
						<strong>Subscribe</strong>
						<div class="subscribe-form">
							<input type="text">
							<a href="#" class="btn btn-primary">xx</a>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div><!-- #footer-links -->
	</div><!-- #container -->
	<div class="footer-claim">
		<div class="container">
			<div class="copyright">
				<div>&copy; 2011-2014 Oxnz, All Right Reserved. Themed by <a href="https://github.com/oxnz/wpbootstrap" title="WPBootstrap project page">WPBootstrap</a>. 
					<small>Powered by <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'wpbootstrap' ) ); ?>"><i class="fa fa-wordpress"></i></a></small>
				</div>
				<div class="validate-links">
					<a href="http://validator.w3.org/check/referer" title="This page validates as HTML5" target="_blank">Valid HTML<i class="fa fa-html5"></i></a>
|
					<a href="http://jigsaw.w3.org/css-validator/check/referer" title="This page validates as CSS" target="_blank">Valid CSS<i class="fa fa-css3"></i></a>
				</div>
			</div><!-- #copyright -->
			<div>
Except where otherwise noted, content on this site is licensed under a
<a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/">CC BY NC ND</a>.
			</div>
			<div>--EOF--</div>
		</div>
	</div><!-- #container -->
</footer>

	<div class="modal fade" id="about">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">About</h4>
				</div><!-- #modal-header -->
				<div class="modal-body">
					<p>&copy; 2011-2014 Oxnz. All Rights Reserved.</p>
				</div><!-- #modal-body -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default btn-primary" data-dismiss="modal">OK</button>
				</div>
			</div>
		</div>
	</div><!-- #about -->

	<!--
	<canvas id="footerbg">Your browser does not support the HTML5 canvas tag.</canvas>
	-->

<?php wp_footer(); ?>
	<a href="#" title="back to top" id="back-to-top"><i class="fa fa-arrow-circle-o-up fa-3x"></i></a>
</body>
</html>
