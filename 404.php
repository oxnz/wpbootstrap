<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WPBootstrap
 * @subpackage WPBootstrap
 * @since WPBootstrap 1.0
 */

get_header(); ?>

<style type="text/css">
.pnf {
}
.pnf h3 {
	font-weight: normal;
}
.pnf .title .fa {
	vertical-align: middle;
}
.pnf code {
	display: inline-block;
}
</style>

<div class="pnf panel panel-danger">
	<div class="panel-heading">
		<h3 class="title">
<i class="fa fa-exclamation-circle fa-2x"></i>
Error 404: Not Found
		</h3>
	</div>
	<div class="panel-body">
		<h3>Error Description:</h3>
Uncaught Expcetion 'Not Found' encountered while request page: '<?php echo $_SERVER['REQUEST_URI']; ?>'
		<h3>StackTrace:</h3>
		<code>
'Not Found': (code 404)
	at Site.Service.getContent("<?php echo $_SERVER['REQUEST_URI']; ?>")
	at Site.Service.writeResponse
		</code>
	</div>
</div>

<?php get_footer(); ?>
