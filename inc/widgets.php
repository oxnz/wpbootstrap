<?php

class NZPlayer_Widget extends WP_Widget {
	function __construct() {
		parent::__construct('nzplayer', __('NZPlayer', 'wpbootstrap'), array(
			'classname' => 'nzplayer',
			'description' => __('A beautiful player widget', 'wpbootstrap'),
		));
		$this->title = __('NZPlayer', 'wpbootstrap');
	}

	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ?
			__('NZPlayer', 'wpbootstrap') : $instance['title'], $instance,
				$this->id_base);
		echo $before_widget . $before_title;
		?>
<div class="center">
		<?php echo $title; ?>
<br> <br> <br>
		<span class="fa fa-backward fa-lg"></span>
&nbsp; &nbsp; &nbsp;
		<span class="fa fa-play-circle-o fa-lg"></span>
&nbsp; &nbsp; &nbsp;
		<span class="fa fa-forward fa-lg"></span>
</div>
		<?php echo $after_title; ?>
		<div class="body">indicator
			<div class="progress progress-striped active">
<div class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
    <span class="sr-only">45% Complete</span>
  </div>
			</div>
		</div>
		<?php
		echo $after_widget;
	}

	function update($new_instance, $instance) {
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}

	function form($instance) {
		$instance = wp_parse_args((array)$instance, array('title' => ''));
		$title = esc_attr($instance['title']);
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
		<p>
		<?php
	}
}

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
?>
