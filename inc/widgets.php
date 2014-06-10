<?php

class NZWeather_Widget extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'nzweather',
			'description' => __('A beautiful weather widget'));
		parent::__construct('nzweather', __('NZWeather'), $widget_ops);

		if ( is_active_widget(false, false, $this->id_base) )
			add_action( 'wp_head', array($this, 'css') );
	}

	function widget($args, $instance) {
		extract($args);
		$title = empty($instance['title']) ? $instance['title'] : __('NZWeather');
		$title = apply_filters('widget_title', $title, $instance, $this->id_base);
		$location = (!empty($instance['location'])) ? $instance['location'] : __('Livepool, UK');
		$wiconurl = get_stylesheet_directory_uri() . '/img/weather-icons/';
		$today = '
<div class="today">
	<div class="info">
		<div class="temp"><span id="tempnum">29</span>&#176;</div>
		<div class="loc">' . $location . '</div>
	</div>
	<div class="wicon-wrapper">
		<img class="wicon" id="wicon" alt="weather" src="' . $wiconurl . 'na.png">
	</div>
</div>';
	$predcnt = 3; // predict 3 days
	for ($i = 1; $i <= $predcnt; ++$i) {
		$predict .= '
<div class="preditem">
	<div class="dayname">' . ((1 == $i) ? 'Tomorrow' : date('l', strtotime('+' . $i . 'days'))) . '</div>
	<div class="temp"><span class="tempnum">29</span>&#176;</div>
	<div class="wicon"><img class="wicon" alt="weather" src="' . $wiconurl . 'na.png"></div>
</div>';
	}
?>
<script type="text/javascript">
jQuery(document).ready(function ($) {
	function gettemp(temp, precision) {
		return (temp-273.15).toFixed(precision);
	}

	function getwicon(weather) {
		var baseurl = "<?php echo $wiconurl; ?>";
		switch (weather) {
		case "Rain":
			return baseurl + "rain.png";
		case "Clouds":
			return baseurl + "cloud.png";
		case "Clear":
			return baseurl + "clear.png";
		case "Mist":
		case "Haze":
			return baseurl + "haze.png";
		default:
			console.log("no appropriate icon for weather: " + weather);
			return baseurl + "na.png";
		}
	}
	/*
	 * thank you for http://api.openweathermap.org
	 */
	$.getJSON( // today
		url = "http://api.openweathermap.org/data/2.5/weather",
		data = { q: "<?php echo $location; ?>" },
		success = function(result, stat, xhr) {
			$('.today span#tempnum')[0].textContent = gettemp(result.main.temp, 0);
			$('.today img.wicon')[0].src = getwicon(result.weather[0].main);
		}
	);
	$.getJSON( // forcast
		url = "http://api.openweathermap.org/data/2.5/forecast/daily",
		data = {
			q:		"<?php echo $location; ?>",
			cnt:	"<?php echo $predcnt; ?>",
			mode:	"json"
		},
		success = function(result, stat, xhr) {
			var temps = $(".preditem .tempnum");
			var wicons = $(".preditem img.wicon");
			for (var i = 0; i < temps.length; ++i) {
				temps[i].textContent = gettemp(result.list[i].temp.eve, 0);
				wicons[i].src = getwicon(result.list[i].weather[0].main);
			}
	});
});
</script>
<?php
		echo $before_widget . $before_title . $today . $after_title . $predict . $after_widget;
	}
	function css() {
?>
<style type="text/css">
.nzweather .today {
	width: 100%;

	display: -webkit-box;
	display: -moz-box;
	display: -ms-flexbox;
	display: box;

	-webkit-box-pack: justify;
	-moz-box-pack: justify;
	-ms-flex-pack: justify;
	box-pack: justify;
}

.nzweather .today .wicon-wrapper {
	text-align: right;

	-webkit-box-flex: 1;
	-moz-box-flex: 1;
	-ms-flex: 1;
	box-flex: 1;
}

.nzweather .today .info .temp {
	font-size: 500%;
}

.nzweather .today .info .loc {
	padding-top: 40px;
}

.nzweather .today .wicon {
	padding-top: 20px;
	width: 128px;
}

.nzweather .preditem {
	width: 100%;
	font-size: 140%;

	display: -webkit-box;
	display: -moz-box;
	display: -ms-flexbox;
	display: box;

	-webkit-box-pack: justify;
	-moz-box-pack: justify;
	-ms-flex-pack: justify;
	box-pack: justify;

	-webkit-box-align: center;
	-moz-box-align: center;
	-ms-flex-align: center;
	box-align: center;
}

.nzweather .preditem > .dayname {
	-webkit-box-flex: 1;
	-moz-box-flex: 1;
	-ms-flex: 1;
	box-flex: 1;
}

.nzweather .preditem > .temp {
	padding-right: 30px;
}

.nzweather .preditem > .wicon img {
	width: 40px;
}

</style>
<?php
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['location'] = $new_instance['location'];
		return $instance;
	}

	function form($instance) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : ' ';
		$location = isset($instance['location']) ?
			esc_attr($instance['location']) : 'Livepool, UK';
?>
<p>
	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name = "<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id('location'); ?>"><?php _e('Location:'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('location'); ?>" name = "<?php echo $this->get_field_name('location'); ?>" type="text" value="<?php echo $location; ?>" />
</p>
<?php
	}
}

class NZProfile_Widget extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'nzprofile',
			'description' => __('A beautiful profile widget'));
		parent::__construct('nzprofile', __('NZProfile'), $widget_ops);
		$this->attrs = array('title'	=> 'Title',
			'twitter'	=> 'Twitter',
			'facebook'	=> 'Facebook',
			'weibo'		=> 'Weibo',
			'gplus'		=> 'Google Plus'
		);

		if ( is_active_widget(false, false, $this->id_base) )
			add_action( 'wp_head', array($this, 'css') );
	}

	function widget($args, $instance) {
		extract($args);
		foreach (array_keys($this->attrs)as $k) {
			isset($instance[$attr]) ? $attr = $instance[$attr] : false;
		}
		$title = empty($instance['title']) ? $instance['title'] : __('NZProfile');
		$title = apply_filters('widget_title', $title, $instance, $this->id_base);
		echo $before_widget . $before_title;
?>
<div class="vcard">
<?php
		global $current_user;
		echo get_avatar($current_user->ID, 100);
?>
	<div class="info">
<?php if (is_user_logged_in()) : ?>
		<div class="name"><?php echo $current_user->display_name; ?></div>
		<div class="email"><?php echo $current_user->user_email; ?></div>
<?php else : ?>
		<div class="name">Hi, Guest</div>
<?php endif; ?>
	</div>
</div><!--.vcard-->
<?php
		echo $after_title;
?>
<div class="social">
<?php
		foreach ($this->attrs as $k => $n) {
			$lnk = $instance[$k];
			if ( empty($lnk) || 'title' == $k ) {
				continue;
			} else {
?>
	<div class="social-link"><a href="<?php echo $lnk; ?>"><?php echo $n; ?></a>
		<div>12</div>
	</div>
<?php
			}
		}
?>
</div><!--.social-->
<?php
		echo $after_widget;
	}

	function css() {
?>
<style type="text/css">
.nzprofile .vcard {
	padding: 20px;

	display: -webkit-box;
	display: -moz-box;
	display: -ms-flexbox;
	display: box;

	-webkit-box-pack: justify;
	-moz-box-pack: justify;
	-ws-flex-pack: justify;
	box-pack: justify;

	-webkit-box-align: center;
	-moz-box-align: center;
	-ws-flex-align: center;
	box-align: center;
}

.nzprofile .vcard .avatar {
	border-radius: 50%;
	border: none;
	width: 100px;
	height: 100px;
}

.nzprofile .vcard .info {
	text-align: center;

	-webkit-box-flex: 1;
	-moz-box-flex: 1;
	-ms-flex: 1;
	box-flex: 1;
}

.nzprofile .vcard .info .name {
	font-size: 140%;
}

.nzprofile .vcard .info .email {
	word-wrap: break-word;
}

.nzprofile .widget-body {
	padding: 0;
}

.nzprofile .social {
	width: 100%;

	display: -webkit-box;
	display: -moz-box;
	display: -ms-flexbox;
	display: box;

	-webkit-box-pack: justify;
	-moz-box-pack: justify;
	-ws-flex-pack: justify;
	box-pack: justify;

	-webkit-box-align: center;
	-moz-box-align: center;
	-ws-flex-align: center;
	box-align: center;
}

.nzprofile .social .social-link {
	-webkit-box-flex: 1;
	-moz-box-flex: 1;
	-ms-flex: 1;
	box-flex: 1;

	padding: 5px 0;
	border-right: 1px solid #eee;
	text-align: center;
}

.nzprofile .social .social-link:last-child {
	border: none;
}
</style>
<?php
	} // end of func css

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		foreach (array_keys($this->attrs) as $k) {
			isset($new_instance[$k]) ? $instance[$k] = $new_instance[$k] : 0;
		}
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}

	function form($instance) {
		extract($instance);
		foreach ($this->attrs as $k => $n) {
			isset($instance[$k]) ? $v = esc_attr($instance[$k]) : 0;
?>
<p>
	<label for="<?php echo $this->get_field_id($k); ?>"><?php _e($n . ':'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id($k); ?>" name="<?php echo $this->get_field_name($k); ?>" type="text" value="<?php echo esc_attr($v); ?>" />
</p>
<?php
		}
	}
}

class NZRecentPostsWidget extends WP_Widget_Recent_Posts {
	function __construct() {
		parent::__construct('nzrecent-posts', __('Recent Posts'), null);
		$this->id_base = 'nzrecent-posts';
		$this->name = 'NZRecent Posts';
		$this->option_name = 'nzrecent_posts_widget';
		$this->alt_option_name = 'nzrecent posts widget';
		$this->widget_options = array(
			'classname' => 'nzrecent_posts_widget',
			'description' => __('A beautiful recent posts widget'));
		$this->control_options = array('id_base' => 'nzrecent-posts');
		$this->id = true;
		if ( is_active_widget(false, false, $this->id_base) )
			add_action( 'wp_head', array($this, 'css') );
	}

	function widget($args, $instance) {
		$cache = array();
		if ( ! $this->is_preview() ) {
			$cache = wp_cache_get('nzrecent_posts_widget', 'widget');
		}

		if ( ! is_array( $cache ) ) {
			$cache = array();
		}

		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		if ( isset( $cache[ $args['widget_id']] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

		ob_start();
		extract($args);

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] :
			__( 'NZRecent Posts' );
		$title = apply_filters( 'widget_title', $title, $instance,
			$this->id_base );
		$number = ( ! empty( $instance['number'] ) ) ? absint(
			$instance['number'] ) : 5;
		if ( ! $number )
			$number = 5;
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date']
			: false;
		$r = new WP_Query( apply_filters( 'widget_posts_args', array(
			'posts_per_page' => $number,
			'no_found_rows' => true,
			'post_status' => 'publish',
			'ignore_sticky_posts' => true
		) ) );
		if ($r->have_posts()) :
			echo $before_widget;
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}
		else echo '<div class="panel-body">';
		// here are the contents before posts list
		echo '<a class="btn btn-default btn-xs" href="'
			. esc_url(home_url('/blog/')) . '">view more</a>';
?>
		</div><!--/panel-body-->
		<ul class="list-group">
<?php
			while ( $r->have_posts() ) : $r->the_post();
?>
			<li class="list-group-item">
			<a class="text-overflow" href="<?php the_permalink(); ?>">
<?php
			get_the_title() ? the_title() : the_ID(); ?></a>
				by
				<?php the_author_posts_link(); ?>
<?php
				if ( $show_date ) :
					echo '<span class="post-date badge">' .  get_the_date()
					. '</span>';
				endif;
?>
			</li>
<?php
			endwhile; ?>
		</ul>
		<div class="panel-footer hide">
<?php
		echo $after_widget;

		wp_reset_postdata();

		endif;

		if ( ! $this->is_preview() ) {
			$cache[ $args['widget_id'] ] = ob_get_flush();
			wp_cache_set( 'nzrecent_posts_widget', $cache, 'widget' );
		} else {
			ob_end_flush();
		}
	}

	function css() {
		if ( ! current_theme_supports( 'widgets' ) )
			return;
?>
<style type="text/css">
.nzrecent_posts_widget ul li span,
.nzrecent_posts_widget ul.list-group > li.list-group-item > span.badge {
background-color: #428bca;
}
</style>
<?php
	}
}

class NZRecentCommentsWidget extends WP_Widget_Recent_Comments {
	function __construct() {
		parent::__construct();
		$this->id_base = 'nzrecent-comments';
		$this->name = 'NZRecent Comments';
		$this->widget_options = array('classname' => 'nzrecent_comments_widget',
			'description' => __( 'Your site&#8217;s most recent comments' ));
		$this->control_options = array( 'id_base' => 'nzrecent-comments' );
		$this->option_name = 'nzrecent-comments_widget';
		$this->alt_option_name = 'nzrecent-comments_widget';

		if ( is_active_widget(false, false, $this->id_base) )
			add_action( 'wp_head', array($this, 'css') );
	}

	function css() {
?>
<style type="text/css">
.nzrecent_comments_widget .nzrecent-comment {
	border-top: 1px solid #eee;
	margin: 0;
	padding: 2px 0;
}

.nzrecent_comments_widget .nzrecent-comment:last-child {
	border-bottom: 1px solid #eee;
}

.nzrecent_comments_widget .nzrecent-comment .vcard,
.nzrecent_comments_widget .nzrecent-comment .vcard .avatar {
	border-radius: 50%;
}

.nzrecent_comments_widget .nzrecent-comment .media-heading,
.nzrecent_comments_widget .nzrecent-comment .comment-excerpt {
	max-width: 100%;
	overflow: hidden;
	white-space: nowrap;
	text-overflow: ellipsis;
}

.nzrecent_comments_widget .nzrecent-comment .comment-meta > small:first-child {
	padding-left: 0;
}

.nzrecent_comments_widget .nzrecent-comment .comment-meta > small {
	padding: 0 4px;
}
</style>
<?php
	}

	function widget( $args, $instance ) {
		global $comments, $comment;

		$cache = array();
		if ( ! $this->is_preview() ) {
			$cache = wp_cache_get('widget_nzrecent_comments', 'widget');
		}
		if ( ! is_array( $cache ) ) {
			$cache = array();
		}

		if ( ! isset( $args['widget_id'] ) )
			$args['widget_id'] = $this->id;
		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

		extract($args, EXTR_SKIP);

		$title = ( ! empty( $instance['title'] ) ) ?
			$instance['title'] : __('NZRecent Comments');
		$title = apply_filters( 'widget_title', $title, $instance,
			$this->id_base );
		$number = ( ! empty ( $instance['number'] ) ) ?
			absint( $instance['number'] ) : 5;
		if ( ! $number ) $number = 5;

		$comments = get_comments( apply_filters( 'widget_comments_args', array(
			'number' => $number,
			'status' => 'approve',
			'post_status' => 'publish'
		) ) );

		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;
		else
			echo '<div class="panel-body">';
		echo '<i class="fa fa-rss"></i> subscribe';
		if ( $comments ) {
			$post_ids = array_unique( wp_list_pluck( $comments,
				'comment_post_ID' ) );
			_prime_post_caches( $post_ids, strpos(
				get_option( 'permalink_structure' ), '%category%' ), false);

			echo '<ul id="nzrecent-comments-widget" class="media-list">';
			foreach ( (array) $comments as $comment ) {
?>
<li class="nzrecent-comment media">
<a class="pull-left img-thumbnail vcard <?php echo (!get_comment_author_url() ? 'disabled' : '"'); ?> href="<?php comment_author_url(); ?>">
<?php
					echo get_avatar(get_comment_author_email(),
						54, '', get_comment_author());
?>
	</a>
	<div class="media-body">
		<h4 class="media-heading text-overflow"><cite class="author"> <?php comment_author_link(); ?></cite>
on <cite><?php echo get_the_title($comment->comment_post_ID); ?></cite>
		</h4>
		<div class="comment-excerpt"><?php comment_excerpt(); ?></div>
		<cite class="comment-meta">
			<small><i class="fa fa-clock-o"></i> <?php comment_date(); ?></small>
			<small><i class="fa fa-share-alt"></i> Share</small>
			<small><i class="fa fa-heart"></i> Like</small>
			<small><i class="fa fa-rss"></i> RSS</small>
		</cite>
	</div>
</li>
<?php
			}
?>
		</ul>
<?php
		} else {
?>
			<a class="disabled btn btn-default btn-xs">no comment yet</a>
<?php
		}

		echo $after_widget;

		if ( ! $this->is_preview() ) {
			$cache[ $args['widget_id'] ] = $output;
			wp_cache_set( 'widget_nzrecent_comments', $cache, 'widget' );
		}
	}
}
