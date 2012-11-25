<?php

include_once("twitter_timeline.php");

// Widget class
class PixFlow_Twitter_Widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
	 		THEME_SLUG . '_Twitter_Widget', // Base ID
			THEME_SLUG . ' - Twitter Widget', // Name
			array( 'description' => __( 'Displays your recent tweets', TEXTDOMAIN ) ) // Args
		);
	}
		
	function widget( $args, $instance ) {
		extract( $args );

		// Our variables from the widget settings
		$title      = apply_filters('widget_title', $instance['title'] );
		$id         = $instance['twitterID'];
		$postcount  = $instance['postcount'];
		$followText = $instance['followText'];

		$twitter = new Twitter_Timeline();
		$twitter->SetWorkingDir(THEME_CACHE);
		
		// Before widget (defined by theme functions file)
		echo $before_widget;

		// Display the widget title if one was input
		if ( $title )
			echo $before_title . $title . $after_title;

		?>
		<div class="arrows">
			<a href="#" class="arrow_previous"></a>
			<a href="#" class="arrow_next"></a>
		</div>
		<div class="clearfix"></div>
		<ul class="twitter_update_list">
		<?php
		$twitter->TheTimeline($id, $postcount);
		// Display Recent Tweets
		?>
		</ul>
		<div class="twitter_separator"></div>
		<a href="http://twitter.com/<?php echo $id; ?>" class="join"><?php echo $followText; ?></a>
		<?php

		// After widget (defined by theme functions file)
		echo $after_widget;
	}

		
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		// Strip tags to remove HTML (important for text inputs)
		$instance['title']     = strip_tags( $new_instance['title'] );
		$instance['twitterID'] = strip_tags( $new_instance['twitterID'] );

		// No need to strip tags
		$instance['postcount']   = $new_instance['postcount'];
		$instance['followText'] = $new_instance['followText'];

		return $instance;
	}
		 
	function form( $instance ) {

		// Set up some default widget settings
		$defaults = array(
			'title' => 'Recent Tweets',
			'twitterID' => 'pixflow',
			'postcount' => '6',
			'followText' => 'Follow Us'
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', TEXTDOMAIN) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<!-- Twitter ID: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'twitterID' ); ?>"><?php _e('Twitter ID:', TEXTDOMAIN) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'twitterID' ); ?>" name="<?php echo $this->get_field_name( 'twitterID' ); ?>" value="<?php echo $instance['twitterID']; ?>" />
		</p>
		
		<!-- Post Count: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'postcount' ); ?>"><?php _e('Number Of Tweets:', TEXTDOMAIN) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'postcount' ); ?>" name="<?php echo $this->get_field_name( 'postcount' ); ?>" value="<?php echo $instance['postcount']; ?>" />
		</p>
		
		<!-- Follow Text: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'followText' ); ?>"><?php _e('Follow Text e.g Follow @pixflow', TEXTDOMAIN) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'followText' ); ?>" name="<?php echo $this->get_field_name( 'followText' ); ?>" value="<?php echo $instance['followText']; ?>" />
		</p>
			
		<?php
		}
}

// register widget
add_action( 'widgets_init', create_function( '', 'register_widget( "PixFlow_Twitter_Widget" );' ) );

?>