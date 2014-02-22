<?php

class Follow_Me_Widget extends WP_Widget {
	private $formats = array('aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery');
	private $format_strings;
	function __construct() {
		parent::__construct('follow_me', __('Follow Me', 'wpbootstrap'), array(
			'classname' => 'follow_me',
			'description' => __('Use this widget to list commenly used social network links to be followed by others', 'wpbootstrap'),
		));
		$this->format_strings = array(
			'aside' => __('Asides', 'wpbootstrap'),
			'link' => __('Links', 'wpbootstrap'),
		);
	}

	public function widget($args, $instance) {
		$format = $instance['format'];
		$number = empty($instance['number']) ? 2 : absint($instance['number']);
		$title = apply_filters('widget_title', empty($instance['title']) ? $this->format_strings[$format] : $instance['title'], $instance, $this->id_base);

		echo $args['before_widget'];
		?>
		<h1 class="widget-title" <?php echo esc_attr($format); ?>">
		<a class="entry-format" href="<?php echo esc_url(get_post_format_link($format)); ?>"><?php echo $title; ?></a>
</div>
<?php
	}

	function update($new_instance, $instance) {
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}

	function form($instance) {
?>
<div class="follow-me-admin">
	<p>follow-me-admin</p>
</div>
<?php
	}
}

?>
