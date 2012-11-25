<?php

class Slider
{
	function __construct()
	{
		add_action( 'init', array(&$this, 'WPInit') );
	}
	
	function WPInit()
	{
		$this->CreatePostType();
	}
	
	function CreatePostType() 
	{
		$labels = array(
			'name' => __( 'Slider', TEXTDOMAIN),
			'singular_name' => __( 'Slide', TEXTDOMAIN ),
			'add_new' => __('Add New Slide', TEXTDOMAIN),
			'add_new_item' => __('Add New Slide', TEXTDOMAIN),
			'edit_item' => __('Edit Slide', TEXTDOMAIN),
			'new_item' => __('New Slide', TEXTDOMAIN),
			'view_item' => __('View Slide', TEXTDOMAIN),
			'search_items' => __('Search Slides', TEXTDOMAIN),
			'not_found' =>  __('No Slides found', TEXTDOMAIN),
			'not_found_in_trash' => __('No Slides found in Trash', TEXTDOMAIN), 
			'parent_item_colon' => ''
		  );
	
		$args = array(
			'labels' =>  $labels,
			'public' => true,
			'capability_type' => 'post',
			'has_archive' => true,
			'hierarchical' => false,
			'menu_icon' => THEME_IMAGES_URI . '/slider_icon.png',
			'rewrite' => array('slug' => __( 'slide', TEXTDOMAIN )),
			'supports' => array('title','editor')
		);
	
		register_post_type( 'slider', $args );
	}

}

new Slider();

?>