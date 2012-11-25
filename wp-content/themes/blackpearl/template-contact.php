<?php
/*
Template Name: Contact
*/
?>

<?php
	$titleType    = get_post_meta(get_the_ID(), 'intro_type', true);
	$pageTitle    = '';
	$pageDesc     = '';
	
	if($titleType == '' || $titleType == '1')
	{
		$pageTitle = get_the_title();
	}
	else if($titleType == '2')
	{
		$pageTitle    = get_post_meta(get_the_ID(), 'intro_title', true);
	}
	else//3
	{
		$pageTitle    = get_post_meta(get_the_ID(), 'intro_title', true);
		$pageDesc     = get_post_meta(get_the_ID(), 'intro_desc', true);
	}	

	
?>

<?php get_header(); ?>

	<div class="wrap">
		
		<div class="contact_page">
			<div class="page_intro">
				<h1><?php echo $pageTitle; ?></h1>
				<span class="meta"><?php echo $pageDesc; ?></span>
			</div>
			<?php if(opt('contact_address') != ''){ ?>
			<div class="title_box icon_pin"><?php _e('Address', TEXTDOMAIN);?></div>
			<div class="info"><?php eopt('contact_address'); ?></div>
			<?php } ?>
			<?php if(opt('contact_contact_info') != ''){ ?>
			<div class="title_box icon_phone"><?php _e('Contact Info', TEXTDOMAIN);?></div>
			<div class="info"><?php echo nl2br(opt('contact_contact_info')); ?></div>
			<?php } ?>
			<div class="title_box icon_note"><?php _e('Write to us', TEXTDOMAIN);?></div>
			<!--Message Form-->
			<?php if(opt('contact_mailto') != ''){ ?>
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
								<textarea tabindex="3" rows="10" cols="58" name="comment" placeholder="<?php _e('Your Message', TEXTDOMAIN);?>"></textarea>
								<span class="commentError hidden"></span>
							</div>

							<div class="btn button_tailed">
								<input type="submit" value="" />
								<span class="text"><?php _e('Send', TEXTDOMAIN);?></span>
								<span class="tail"></span>
							</div>
							<div class="loader hidden"></div>
							<div class="AjaxError hidden"><?php _e('An error has been occurred while sending message.', TEXTDOMAIN);?></div>
							<div class="AjaxSuccess hidden"><?php _e('Your message has been sent successfully.', TEXTDOMAIN);?></div>
						</fieldset>
					</form>
				</div>
			</div>
			<?php } ?>
			<!--Message Form End-->
		</div>
		
	</div>

	<script type="text/javascript">
	var gmapSettings = {markers: [{ address: '<?php eopt('contact_map_address'); ?>'}],
						controls:false,
						maptype: 'TERRAIN',
						zoom: <?php eopt('contact_map_zoom'); ?>,
						icon:
							{
								image:              "<?php echo THEME_IMAGES_URI ?>/gmap_pin.png",
								shadow:             "<?php echo THEME_IMAGES_URI ?>/gmap_pin_shadow.png",
								iconsize:           [81, 99],
								shadowsize:         [37, 34],
								iconanchor:         [61, 99],
								shadowanchor:       [0, 15]
							}};
	</script>
	
	<script type='text/javascript' src="http://maps.googleapis.com/maps/api/js?key=<?php eopt('maps_api_key'); ?>&sensor=true"></script>
	
<?php define('NOFOOTER', true); ?>

<?php get_footer(); ?>