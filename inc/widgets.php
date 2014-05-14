<?php

class Follow_Me_Widget extends WP_Widget {
	private $formats = array('aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery');
	private $format_strings;
	function __construct() {
		parent::__construct('follow_me', __('Follow Me', 'wpbootstrap'), array(
			'classname' => 'follow-me',
			'description' => __('Use this widget to list commenly used social network links to be followed by others', 'wpbootstrap'),
		));
		$this->title = 'Follow Me';
	}

	function widget($args, $instance) {
		$format = $instance['format'];
		$title = apply_filters('widget_title', empty($instance['title']) ? $this->format_strings[$format] : $instance['title'], $instance, $this->id_base);
		$title = apply_filters('widget_title', $instance['title']);
		$twitter = apply_filters('widget_title',$instance['twitter']);
		$facebook = apply_filters('widget_title', $instance['facebook']);
		$gplus = apply_filters('widget_title', $instance['gplus']);

		echo $args['before_widget'];
		if (! empty($title))
			echo $args['before_title'] . $title . $args['after_title'];
		else
			echo $args['before_title'] . 'Follow Me' . $args['after_title'];

		?>
		<ul>
			<li>
				<a href="<?php echo $twitter; ?>" target="_blank"><img src="http://xinyi.sourceforge.net/wp-content/uploads/2014/02/t.png"></a></li>
			<li><a href="<?php echo $facebook; ?>" target="_blank"><img src="http://xinyi.sourceforge.net/wp-content/uploads/2014/02/f.png"></a></li>
			<li>
				<a href="<?php echo $gplus; ?>" target="_blank">
				<img src="http://xinyi.sourceforge.net/wp-content/uploads/2014/02/g.png"></a></li>
		</ul>
		<?php echo $args['after_widget']; ?>
<?php
	}

	function update($new_instance, $instance) {
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['twitter'] = $new_instance['twitter'];
		$instance['gplus'] = $new_instance['gplus'];
		$instance['facebook'] = $new_instance['facebook'];
		return $instance;
	}

	function form($instance) {
		if (isset($instance['title'])) {
			$title = $instance['title'];
		} else {
			$title = __('Follow Me', 'text_domain');
			$title = __('Follow Me', 'follow_me');
		}
		if (isset($instance['twitter'])) {
			$twitter = $instance['twitter'];
		}
		if (isset($instance['facebook'])) {
			$facebook = $instance['facebook'];
		}
		if (isset($instance['gplus'])) {
			$gplus = $instance['gplus'];
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo esc_attr($twitter); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('gplus'); ?>"><?php _e('Google Plus:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('gplus'); ?>" name="<?php echo $this->get_field_name('gplus'); ?>" type="text" value="<?php echo esc_attr($gplus); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo esc_attr($facebook); ?>" />
		</p>
<?php
	}
}

/*
	                     <div class="g-person" data-width="295" data-href="//plus.google.com/112691032821919860318" data-rel="author"></div>

						 <!-- Place this tag after the last widget tag. -->
						 <script type="text/javascript">
		  (function() {
			      var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
				      po.src = 'https://apis.google.com/js/platform.js';
				      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
					    })();
		</script>
 */


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
	<img class="wicon" id="wicon" src="' . $wiconurl . 'na.png">
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
	display: box;
	-webkit-box-pack: justify;
	-moz-box-pack: justify;
	box-pack: justify;
}

.nzweather .today .info {
	-webkit-box-flex: 1;
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
	display: -webkit-box;
	-webkit-box-pack: justify;
	-webkit-box-align: center;
	font-size: 140%;
}

.nzweather .preditem > .dayname {
	-webkit-box-flex: 1;
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
