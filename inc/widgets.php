<?php

class Follow_Me_Widget extends WP_Widget {
	private $formats = array('aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery');
	private $format_strings;
	function __construct() {
		parent::__construct('follow_me', __('Follow Me', 'wpbootstrap'), array(
			'classname' => 'follow-me',
			'description' => __('Use this widget to list commenly used social network links to be followed by others', 'wpbootstrap'),
		));
		$this->format_strings = array(
			'aside' => __('Asides', 'wpbootstrap'),
			'link' => __('Links', 'wpbootstrap'),
		);
	}

	public function widget($args, $instance) {
		$format = $instance['format'];
		$title = apply_filters('widget_title', empty($instance['title']) ? $this->format_strings[$format] : $instance['title'], $instance, $this->id_base);

		echo $args['before_widget'];
		if (! empty($title))
			echo $args['before_title'] . $title . $args['after_title'];
		?>
		<ul>
			<li><a href="#"><img src="http://xinyi.sourceforge.net/wp-content/uploads/2014/02/t.png"></a></li>
			<li><a href="#"><img src="http://xinyi.sourceforge.net/wp-content/uploads/2014/02/f.png"></a></li>
			<li>
				<a href="https://plus.google.com/112691032821919860318" target="blank">
				<img src="http://xinyi.sourceforge.net/wp-content/uploads/2014/02/g.png"></a></li>
		</ul>
		<?php echo $args['after_widget']; ?>
<?php
	}

	function update($new_instance, $instance) {
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}

	function form($instance) {
		if (isset($instance['title'])) {
			$title = $instance['title'];
		} else {
			$title = __('Follow Me', 'follow_me');
		}
?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
<?php
	}
}

?>
