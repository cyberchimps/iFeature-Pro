<?php

add_action('widgets_init', 'ifeature_tabbed_widget');

function ifeature_tabbed_widget() {
	register_widget('iFeature_Tabbed_Widget');
}

class iFeature_Tabbed_Widget extends WP_Widget {
	function __construct() {
		$widget_options = array(
			'classname' => 'ifeature_tabbed_widget',
			'description' => __('iFeature: A tabbed widget that display popular posts, recent posts, comments and tags.', 'ifeature')
		);

		$control_options = array(
			'width' => 300,
			'height' => 350,
			'id_base' => 'ifeature_tabbed_widget'
		);

		parent::__construct(
			'ifeature_tabbed_widget',
			__('iFeature Tabbed Widget', 'ifeature'),
			$widget_options,
			$control_options
		);
	}

	function widget($args, $instance) {
		global $wpdb;

		$title = apply_filters('widget_title', $instance['title']);

		$tab1 = $instance['tab1'];
		$tab2 = $instance['tab2'];
		$tab3 = $instance['tab3'];
		$tab4 = $instance['tab4'];

		echo $args['before_widget'];

		if($title) {
			echo $args['before_title'];
			echo $title;
			echo $args['after_title'];
		}
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);

		$instance['tab1'] = $new_instance['tab1'];
		$instance['tab2'] = $new_instance['tab2'];
		$instance['tab3'] = $new_instance['tab3'];
		$instance['tab4'] = $new_instance['tab4'];
		
		return $instance;
	}

	function form($instance) {
		$defaults = array(
			'title' => '',
			'tab1' => 'Popular',
			'tab2' => 'Recent',
			'tab3' => 'Comments',
			'tab4' => 'Tags'
		);

		$instance = wp_parse_args((array) $instance, $defaults);
		?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:') ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'tab1' ); ?>"><?php _e('Popular Title:') ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'tab1' ); ?>" name="<?php echo $this->get_field_name( 'tab1' ); ?>" value="<?php echo $instance['tab1']; ?>" />
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'tab2' ); ?>"><?php _e('Recent Title:') ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'tab2' ); ?>" name="<?php echo $this->get_field_name( 'tab2' ); ?>" value="<?php echo $instance['tab2']; ?>" />
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'tab3' ); ?>"><?php _e('Comment Title:') ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'tab3' ); ?>" name="<?php echo $this->get_field_name( 'tab3' ); ?>" value="<?php echo $instance['tab3']; ?>" />
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'tab4' ); ?>"><?php _e('Tag Title:') ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'tab4' ); ?>" name="<?php echo $this->get_field_name( 'tab4' ); ?>" value="<?php echo $instance['tab4']; ?>" />
			</p>
		<?php
	}
}
