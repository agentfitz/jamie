<?php 

	function SelectTag($name, $options, $optionsAttrs = array())
	{
		global $post;
		$selected = get_post_meta( $post->ID, $name, true );
	?>
		<select name="<?php echo $name; ?>">
			<?php
			foreach($options as $value => $text)
			{
				$selectedAttr = $value == $selected ? 'selected="selected"' : '';
				$attrs = array_key_exists($value, $optionsAttrs) ? $optionsAttrs[$value] : '';
			?>
				<option value="<?php echo $value ?>" <?php echo $selectedAttr . ' ' . $attrs; ?>><?php echo $text; ?></option>
			<?php
			}
			?>
		</select>
	<?php
	}
	
	function TextInput($name, $placeholder)
	{
		global $post;
	?>
		<input type="text" name="<?php echo $name; ?>" value="<?php echo esc_attr( get_post_meta( $post->ID, $name, true ) ); ?>" placeholder="<?php echo $placeholder; ?>" />
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
?>

<?php wp_nonce_field( 'theme-post-meta-form', THEME_NAME_SEO . '_post_nonce' ); ?>

<div id="px-container" class="post-meta">
	<div id="px-main">
	
		<!-- Config section -->
		<div id="intro_section" class="section">
			<div class="section-head">
				<div class="section-tooltip"><?php _e('Introduce Text (Under the page header), default option shows current post title', TEXTDOMAIN); ?></div>
				<div class="label"><?php _e('Page Introduce', TEXTDOMAIN); ?></div>
			</div>
			<div class="select field-spacer">
				<div></div>
				<?php SelectTag("intro_type", 
					  array( '1' => 'Post Title', '2' => 'Custom Title', '3' => 'Custom Title &amp; Description' )); ?>
			</div>
			
			<div class="text-input field-spacer">
				<?php TextInput('intro_title', 'Title'); ?>
			</div>
			
			<div class="text-input">
				<?php TextInput('intro_desc', 'Description'); ?>
			</div>
		</div>

		<!-- Config section -->
		<div id="image_section" class="section">
			<div class="section-head">
				<div class="section-tooltip"><?php _e('Upload images to be shown in portfolio detail page, you can clear the fields to delete images', TEXTDOMAIN); ?></div>
				<div class="label"><?php _e('Portfolio Images', TEXTDOMAIN); ?></div>
			</div>
			
			<?php ImageInput('portfolio_image_1', 'Image 1', 'field-spacer'); ?>
			
			<?php ImageInput('portfolio_image_2', 'Image 2', 'field-spacer'); ?>
			
			<?php ImageInput('portfolio_image_3', 'Image 3', 'field-spacer'); ?>
			
			<?php ImageInput('portfolio_image_4', 'Image 4', 'field-spacer'); ?>
			
			<?php ImageInput('portfolio_image_5', 'Image 5', 'field-spacer'); ?>
			
			<?php ImageInput('portfolio_image_6', 'Image 6', 'field-spacer'); ?>
			
			<?php ImageInput('portfolio_image_7', 'Image 7', 'field-spacer'); ?>
			
			<?php ImageInput('portfolio_image_8', 'Image 8', 'field-spacer'); ?>
			
			<?php ImageInput('portfolio_image_9', 'Image 9', 'field-spacer'); ?>
			
			<?php ImageInput('portfolio_image_10', 'Image 10'); ?>
		</div>
		
		<!-- Config section -->
		<div id="type_section" class="section">
			<div class="section-head">
				<div class="section-tooltip"><?php _e('These settings enable you to embed videos into your portfolio pages.', TEXTDOMAIN); ?></div>
				<div class="label"><?php _e('Video Settings', TEXTDOMAIN); ?></div>
			</div>

			<div class="select field-spacer">
				<div></div>
				<?php SelectTag('video_server', 
					  array( '1' => 'YouTube', '2' => 'Vimeo' ) ); ?>
			</div>
			
			<div class="text-input">
				<?php TextInput('video_id', 'Video ID'); ?>
			</div>
			
			
		</div>
	</div>
</div>
