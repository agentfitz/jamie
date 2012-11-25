<?php

// Widget class
class PixFlow_Recent_Works_Widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
	 		THEME_SLUG . '_Recent_Works_Widget', // Base ID
			THEME_SLUG . ' - Recent Works Widget', // Name
			array( 'description' => __( 'Displays your recent items in portfolio', TEXTDOMAIN ) ) // Args
		);
	}
	
	function widget( $args, $instance ) {
		extract( $args );

		// Our variables from the widget settings
		$title      = apply_filters('widget_title', $instance['title'] );
		$postcount  = intval($instance['count']);

		// Before widget (defined by theme functions file)
		echo $before_widget;

		// Display the widget title if one was input
		if ( $title )
			echo $before_title . $title . $after_title;

		$query = new WP_Query();
		$query->query('post_type=portfolio&posts_per_page=' . $postcount);
		
		if( $query-> have_posts()) {
		?>
		<div class="item_list">
			<?php while ($query->have_posts()) { $query->the_post();  ?>
				<div class="item clearfix">
					<div class="image">
						<a href="<?php the_permalink(); ?>">
							<?php if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) 
							the_post_thumbnail('thumb-portfolio-widget'); 
							?>
							<span class="item_button"></span>
						</a>
					</div>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</div>
			<?php }  ?>
		</div>
		<?php
		}//If have posts
		
		wp_reset_query();
		
		// After widget (defined by theme functions file)
		echo $after_widget;
	}

		
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		// Strip tags to remove HTML (important for text inputs)
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['count'] = strip_tags( $new_instance['count'] );

		if(intval($instance['count']) > 10)
			$instance['count'] = 10;

		if(intval($instance['count']) < 1)
			$instance['count'] = 1;
		
		return $instance;
	}
		 
	function form( $instance ) {

		// Set up some default widget settings
		$defaults = array(
			'title' => 'My Recent Works',
			'count' => '3'
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', TEXTDOMAIN) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<!-- Post Count: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e('Number Of Recent Works:', TEXTDOMAIN) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" value="<?php echo $instance['count']; ?>" />
		</p>

		<?php
		}
}

// register widget
add_action( 'widgets_init', create_function( '', 'register_widget( "PixFlow_Recent_Works_Widget" );' ) );

?>