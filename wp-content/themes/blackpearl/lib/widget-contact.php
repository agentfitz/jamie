<?php

// Widget class
class PixFlow_Contact_Widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
	 		THEME_SLUG . '_Contact_Widget', // Base ID
			THEME_SLUG . ' - Contact Form', // Name
			array( 'description' => __( 'Displays an email contact form', TEXTDOMAIN ) ) // Args
		);
	}
		
	function widget( $args, $instance ) {
		extract( $args );

		// Our variables from the widget settings
		$title      = apply_filters('widget_title', $instance['title'] );
		
		// Before widget (defined by theme functions file)
		echo $before_widget;

		// Display the widget title if one was input
		if ( $title )
			echo $before_title . $title . $after_title;

		?>
		<div id="respond_wrap">
			<div id="respond">
				 <form id="comment_form" method="post" action="<?php echo admin_url( 'admin-ajax.php' ); ?>" class="contact">
					 <fieldset>
						<input type="hidden" name="action" value="contact_form" />
						<div class="text_input">
							<input tabindex="1" type="text" name="name" value="" placeholder="<?php _e('Your Name', TEXTDOMAIN);?>" />
							<span class="nameError hidden"></span>
						</div>
						<div class="text_input">
							<input tabindex="2" type="text" name="email" value="" placeholder="<?php _e('Email Address', TEXTDOMAIN);?>" />
							<span class="emailError hidden"></span>
						</div>
						<div class="textarea_input">
							<textarea tabindex="3" rows="6" cols="58" name="comment" placeholder="<?php _e('Your Message', TEXTDOMAIN);?>"></textarea>
							<span class="commentError hidden"></span>
						</div>

						<div class="btn button_tailed">
							<input type="submit" value="" />
							<div class="text"><?php _e('Send', TEXTDOMAIN);?></div>
							<span></span>
						</div>
						<div class="loader hidden"></div>
						<div class="AjaxError hidden"><?php _e('An error has been occurred while sending message.', TEXTDOMAIN);?></div>
						<div class="AjaxSuccess hidden"><?php _e('Your message has been sent successfully.', TEXTDOMAIN);?></div>
					</fieldset>
				</form>
			</div>
		</div>
		<?php

		// After widget (defined by theme functions file)
		echo $after_widget;
	}

		
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		// Strip tags to remove HTML (important for text inputs)
		$instance['title']     = strip_tags( $new_instance['title'] );

		return $instance;
	}
		 
	function form( $instance ) {

		// Set up some default widget settings
		$defaults = array(
			'title' => 'Contact Us'
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', TEXTDOMAIN) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
			
		<?php
		}
}

// register widget
add_action( 'widgets_init', create_function( '', 'register_widget( "PixFlow_Contact_Widget" );' ) );

?>