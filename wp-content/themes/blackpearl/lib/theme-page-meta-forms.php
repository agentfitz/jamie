<?php 

	function SelectTag($name, $options)
	{
		global $post;
		$selected = get_post_meta( $post->ID, $name, true );
	?>
		<select name="<?php echo $name; ?>">
			<?php
			foreach($options as $value => $text)
			{
				$selectedAttr = $value == $selected ? 'selected="selected"' : '';
			?>
				<option value="<?php echo $value ?>" <?php echo $selectedAttr; ?>><?php echo $text; ?></option>
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
					  array( '1' => 'Page Title', '2' => 'Custom Title', '3' => 'Custom Title &amp; Description' )); ?>
			</div>
			
			<div class="text-input field-spacer">
				<?php TextInput('intro_title', 'Title'); ?>
			</div>
			
			<div class="text-input">
				<?php TextInput('intro_desc', 'Description'); ?>
			</div>
		</div>
		
		<!-- Sidebar section -->
		<div id="intro_section" class="section">
			<div class="section-head">
				<div class="section-tooltip"><?php _e('Select a custom sidebar for your page that is defined in theme\'s option panel. You could use default page sidebar as well.', TEXTDOMAIN); ?></div>
				<div class="label"><?php _e('Sidebar', TEXTDOMAIN); ?></div>
			</div>
			<div class="select field-spacer">
				<div></div>
				<?php 
				$sidebars = array('' => 'Default Sidebar');
				if(opt('custom_sidebars') != '')
				{
					$arr = explode(',', opt('custom_sidebars'));
					
					foreach($arr as $bar)
						$sidebars[$bar] = str_replace('%666', ',', $bar);
				}
				
				SelectTag("sidebar", $sidebars); ?>
			</div>

		</div>
		
	</div>
</div>
