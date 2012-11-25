<?php

include_once('post-meta.php');

class SliderPostMeta extends PostMeta
{
	public function __construct() 
	{
		parent::__construct('slider');
	}

	function GetMetaKeys()
	{
		return array('slide_object_type', 'slide_image' => array('type'=>'upload'), 
		'video_server', 'video_id',
		'title_color', 'text_color', 'background_type', 
		'background_image' => array('type'=>'upload'), 
		'background_color', 'btn_text', 'btn_url', 
		'btn_color', 'btn_bg_color', 'btn_press_color', 
		'btn_press_bg_color' );
	}
	
	function RegisterScripts()
	{
		wp_enqueue_script('jquery-easing', THEME_JS_URI  .'/jquery.easing.1.3.js', array('jquery'), '1.3.0');
		
		wp_enqueue_style( 'nouislider', THEME_ADMIN_URI . '/css/nouislider.css', false, '2.1.4', 'screen' );
		wp_enqueue_script('nouislider', THEME_ADMIN_URI  .'/scripts/jquery.nouislider.min.js', array('jquery'), '2.1.4');
		
		wp_enqueue_style( 'colorpicker0', THEME_ADMIN_URI . '/css/colorpicker.css', false, '1.0.0', 'screen' );
		wp_enqueue_script('colorpicker0', THEME_ADMIN_URI  .'/scripts/colorpicker.js', array('jquery'), '1.0.0');
		
		wp_enqueue_style( 'chosen', THEME_ADMIN_URI . '/css/chosen.css', false, '1.0.0', 'screen' );
		wp_enqueue_script('chosen', THEME_ADMIN_URI  .'/scripts/chosen.jquery.min.js', array('jquery'), '1.0.0');
		
		wp_enqueue_style( 'theme-admin', THEME_ADMIN_URI . '/css/style.css', false, '1.0.0', 'screen' );
		wp_enqueue_script('theme-admin', THEME_ADMIN_URI  .'/scripts/admin.js', array('jquery'), '1.0.0');
	}
	
	
	// Add the Meta Box
	function AddMetabox() {
		add_meta_box(
			'slider_meta_box', // $id
			__('Slide Options', TEXTDOMAIN), // $title 
			array(&$this, 'ShowMetabox'), // $callback
			'slider', // $page
			'normal', // $context
			'high'); // $priority
	}
	
	function ShowMetabox()
	{
		$page = include(THEME_LIB . '/theme-slider-meta-forms.php');
	}
}

new SliderPostMeta();
	
?>