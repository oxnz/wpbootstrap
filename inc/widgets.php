<?php

class NZWeather_Widget extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'nzweather',
			'description' => __('A beautiful weather widget'));
		parent::__construct('nzweather', __('NZWeather'), $widget_ops);
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
		<img class="wicon" id="wicon" src="' . $wiconurl . 'na.png">
	</div>
</div>';
	$predcnt = 3; // predict 3 days
	for ($i = 1; $i <= $predcnt; ++$i) {
		$predict .= '
<div class="preditem">
	<div class="dayname">' . ((1 == $i) ? 'Tomorrow' : date('l', strtotime('+' . $i . 'days'))) . '</div>
	<div class="temp"><span class="tempnum">29</span>&#176;</div>
	<div class="wicon"><img class="wicon" src="' . $wiconurl . 'na.png"></div>
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
		echo $before_widget . $before_title . $today . $after_title . $predict . $after_widget;
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
	}

	function widget($args, $instance) {
		extract($args);
		foreach (array_keys($this->attrs)as $k) {
			isset($instance[$attr]) ? $attr = $instance[$attr] : false;
		}
		$title = empty($instance['title']) ? $instance['title'] : __('NZProfile');
		$title = apply_filters('widget_title', $title, $instance, $this->id_base);
		$this->css();
		echo $before_widget . $before_title;
?>
<div class="vcard">
<?php
		global $current_user;
		echo get_avatar($current_user->ID, 100);
?>
	<div class="info">
		<div class="name"><?php echo $current_user->display_name; ?></div>
		<div class="email"><?php echo $current_user->user_email; ?></div>
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
	width: 100%;
	height: 100%;
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
