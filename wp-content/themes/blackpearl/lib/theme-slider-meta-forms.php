<?php 
	function SelectTag($name, $options, 
					   $class = '', 
					   $selectAttrs='', 
					   $optionsAttrs = array())
	{
		global $post;
		$selected = get_post_meta( $post->ID, $name, true );
	?>
	<div class="clear-after <?php echo $class; ?>">
		<div class="select">
			<div></div>
			<select name="<?php echo $name; ?>" <?php echo $selectAttrs; ?>>
				<?php
				foreach($options as $value => $text)
				{
					$selectedAttr = $value == $selected ? 'selected="selected"' : '';
					$attrs = array_key_exists($value, $optionsAttrs) ? $optionsAttrs[$value] : '';
				?>
					<option value="<?php echo esc_attr($value); ?>" <?php echo $selectedAttr . ' ' . $attrs; ?>><?php  echo $text; ?></option>
				<?php
				}
				?>
			</select>
		</div>
	</div>
	<?php
	}
	
	function TextInput($name, $placeholder, $class = '')
	{
		global $post;
	?>
	<div class="text-input <?php echo $class; ?>">
		<input type="text" name="<?php echo $name; ?>" value="<?php echo esc_attr( get_post_meta( $post->ID, $name, true ) ); ?>" placeholder="<?php echo $placeholder; ?>" />
	</div>
	<?php
	}
	
	function ImageInput($name, $placeholder, $class = '')
	{
		global $post;
	?>
		<div class="upload-field clear-after <?php echo $class; ?>" data-title="<?php _e('Upload Image', TEXTDOMAIN) ?>" data-referer="px-portfolio-image" >
			<input type="text" name="<?php echo $name; ?>" value="<?php echo esc_attr( get_post_meta( $post->ID, $name, true ) ); ?>" placeholder="<?php echo $placeholder; ?>"  />
			<a href="#" class="upload-button"></a>
		</div>
	<?php
	}
	
	function ColorInput($name, $placeholder = '', $class='')
	{
		global $post;
		?>
		<div class="clear-after  <?php echo $class; ?>">
			<input name="<?php echo $name; ?>" type="text" value="<?php echo esc_attr( get_post_meta( $post->ID, $name, true ) ); ?>" class="colorinput" placeholder="<?php echo $placeholder; ?>" />
		</div>
		<?php
	}
?>

<?php wp_nonce_field( 'theme-post-meta-form', THEME_NAME_SEO . '_post_nonce' ); ?>

<div id="px-container" class="post-meta">
	<div id="px-main">
	
		<!-- Config section -->
		<div id="slideObject_section" class="section">
			<div class="section-head">
				<div class="section-tooltip"><?php _e('Here you can select between slide image or a video from YouTube/Vimeo or none of them.', TEXTDOMAIN); ?></div>
				<div class="label"><?php _e('Slide Image/Video', TEXTDOMAIN); ?></div>
			</div>
			
			<?php SelectTag("slide_object_type", 
				  array( '1' => 'None', '2' => 'Image', '3' => 'Video' ), 
				  'field-spacer field-selector', 
				  'data-fields=".slide-image,.slide-video"',
				  array('2' => 'data-show=".slide-image"', 
						'3' => 'data-show=".slide-video"')); ?>
			
			<?php ImageInput('slide_image', 'Slide Image', 'slide-image'); ?>

			<div class="slide-video">
				<?php SelectTag('video_server', array( '1' => 'YouTube', '2' => 'Vimeo' ), 'field-spacer' ); ?>
				<?php TextInput('video_id', 'Video ID'); ?>
			</div>
			
		</div>
	
		<!-- Config section -->
		<div class="section">
			<div class="section-head">
				<div class="section-tooltip"><?php _e('Title Color, Default color is themes text color', TEXTDOMAIN); ?></div>
				<div class="label"><?php _e('Title Color', TEXTDOMAIN); ?></div>
			</div>

			<?php ColorInput('title_color'); ?>
		</div>
	
		<!-- Config section -->
		<div class="section">
			<div class="section-head">
				<div class="section-tooltip"><?php _e('Text Color, Default color is themes text color', TEXTDOMAIN); ?></div>
				<div class="label"><?php _e('Text Color', TEXTDOMAIN); ?></div>
			</div>

			<?php ColorInput('text_color'); ?>
		</div>
	
		<!-- Config section -->
		<div id="background_section" class="section">
			<div class="section-head">
				<div class="section-tooltip"><?php _e('Slide Background, Could be image or color, default value shows slider default background.', TEXTDOMAIN); ?></div>
				<div class="label"><?php _e('Slide Background', TEXTDOMAIN); ?></div>
			</div>
			
			<?php SelectTag("background_type", 
				  array( '1' => 'No Background', '2' => 'Image', '3' => 'Solid Color' ), 
				  'field-spacer field-selector', 
				  'data-fields=".background-image,.background-color"',
				  array('2' => 'data-show=".background-image"', 
						'3' => 'data-show=".background-color"')); ?>
			
			<?php ImageInput('background_image', 'Background Image', 'background-image'); ?>

			<?php ColorInput('background_color', '', 'background-color'); ?>
			
		</div>
		
		<!-- Config section -->
		<div id="link_section" class="section">
			<div class="section-head">
				<div class="section-tooltip"><?php _e('Link to other pages (optional), if text is empty, no buttons will be shown', TEXTDOMAIN); ?></div>
				<div class="label"><?php _e('Link Button', TEXTDOMAIN); ?></div>
			</div>

			<?php TextInput('btn_text', 'Button Text', 'field-spacer'); ?>

			<?php TextInput('btn_url', 'Button Url', 'field-spacer'); ?>
			
			<?php ColorInput('btn_bg_color', 'Button Color'); ?>
			
			<?php ColorInput('btn_color', 'Button Text Color'); ?>

			<?php ColorInput('btn_press_color', 'Button Press Text Color'); ?>
			
			<?php ColorInput('btn_press_bg_color', 'Button Press Background Color'); ?>
		</div>
	</div>
</div>
