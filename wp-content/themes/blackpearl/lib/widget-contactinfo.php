<?php

// Widget class
class PixFlow_ContactInfo_Widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
	 		THEME_SLUG . '_ContactInfo_Widget', // Base ID
			THEME_SLUG . ' - Contact Info Widget', // Name
			array( 'description' => __( 'Displays your contact information', TEXTDOMAIN ) ) // Args
		);
	}
		
	function widget( $args, $instance ) {
		extract( $args );

		// Our variables from the widget settings
		$title      = apply_filters('widget_title', $instance['title'] );
		$intro      = $instance['intro'];
		$phone      = $instance['phone'];
		$cell       = $instance['cell'];
		$email      = $instance['email'];
		$address1   = $instance['address1'];
		$address2   = $instance['address2'];
		$name       = $instance['name'];  


		
		// Before widget (defined by theme functions file)
		echo $before_widget;

		// Display the widget title if one was input
		if ( $title )
			echo $before_title . $title . $after_title;

		if($intro != '')
		{
		?>
			<div class="info"><?php echo $intro; ?></div>
		<?php
		}
		
		if($name != '')
		{
		?>
			<div class="info"><?php echo $name; ?></div>
		<?php
		}
		
		if($phone != '')
		{
		?>
			<div class="info">
			<h5 class="title"><?php _e('Phone:', TEXTDOMAIN); ?></h5>
			<?php echo $phone; ?>
			</div>
		<?php
		}
		
		if($cell != '')
		{
		?>
			<div class="info">
			<h5 class="title"><?php _e('Cell Phone:', TEXTDOMAIN); ?></h5>
			<?php echo $cell; ?>
			</div>
		<?php
		}
		
		if($email != '')
		{
		?>
			<div class="info">
			<h5 class="title"><?php _e('Email:', TEXTDOMAIN); ?></h5>
			<a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
			</div>
		<?php
		}
		
		if($address1 != '' || $address2 != '')
		{
		?>
			<div class="info">
			<h5 class="title"><?php _e('Address:', TEXTDOMAIN); ?></h5>
			<?php 
			echo $address1; 
			 if($address1 != '' && $address2 != '')
				echo '<br/>';
			echo $address2;
			?>
			</div>
		<?php
		}
		

		// After widget (defined by theme functions file)
		echo $after_widget;
	}

		
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		// Strip tags to remove HTML (important for text inputs)
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['intro'] = strip_tags($new_instance['intro']);
		$instance['phone'] = strip_tags($new_instance['phone']);
		$instance['cell']    = strip_tags($new_instance['cell']);
		$instance['email']   = strip_tags($new_instance['email']);
		$instance['address1'] = strip_tags($new_instance['address1']);
		$instance['address2'] = strip_tags($new_instance['address2']);
		$instance['name']    = strip_tags($new_instance['name']);
		
		return $instance;
	}
		 
	function form( $instance ) {

		// Set up some default widget settings
		$defaults = array(
			'title' => 'Contact Info',
			'intro' => '',
			'name' => '',
			'phone' => '',
			'cell'  => '',
			'email' => '',
			'address1' => '',
			'address2' => ''
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', TEXTDOMAIN) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		
		<!-- Intro Text: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'intro' ); ?>"><?php _e('Introduction Text', TEXTDOMAIN) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'intro' ); ?>" name="<?php echo $this->get_field_name( 'intro' ); ?>" value="<?php echo $instance['intro']; ?>" />
		</p>
		
		<!-- Name: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'name' ); ?>"><?php _e('Name', TEXTDOMAIN) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'name' ); ?>" value="<?php echo $instance['name']; ?>" />
		</p>
		
		<!-- Phone: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'phone' ); ?>"><?php _e('Phone', TEXTDOMAIN) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>" value="<?php echo $instance['phone']; ?>" />
		</p>
		
		<!-- Cell Phone: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'cell' ); ?>"><?php _e('Cell Phone', TEXTDOMAIN) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'cell' ); ?>" name="<?php echo $this->get_field_name( 'cell' ); ?>" value="<?php echo $instance['cell']; ?>" />
		</p>
		
		<!-- Email: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e('eMail', TEXTDOMAIN) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" value="<?php echo $instance['email']; ?>" />
		</p>
			
		<!-- Address: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'address1' ); ?>"><?php _e('Address Line 1', TEXTDOMAIN) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'address1' ); ?>" name="<?php echo $this->get_field_name( 'address1' ); ?>" value="<?php echo $instance['address1']; ?>" />
		</p>
		
		<!-- Address 2: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'address2' ); ?>"><?php _e('Address Line 2', TEXTDOMAIN) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'address2' ); ?>" name="<?php echo $this->get_field_name( 'address2' ); ?>" value="<?php echo $instance['address2']; ?>" />
		</p>
		
		<?php
		}
}

// register widget
add_action( 'widgets_init', create_function( '', 'register_widget( "PixFlow_ContactInfo_Widget" );' ) );

?>