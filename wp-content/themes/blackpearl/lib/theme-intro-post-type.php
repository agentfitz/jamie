<?php

class SpecialIntro
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
			'name' => __( 'Special Intro', TEXTDOMAIN),
			'singular_name' => __( 'Special Intro', TEXTDOMAIN ),
			'add_new' => __('Add New', TEXTDOMAIN),
			'add_new_item' => __('Add New Item', TEXTDOMAIN),
			'edit_item' => __('Edit Item', TEXTDOMAIN),
			'new_item' => __('New Item', TEXTDOMAIN),
			'view_item' => __('View Item', TEXTDOMAIN),
			'search_items' => __('Search Item', TEXTDOMAIN),
			'not_found' =>  __('No Items found', TEXTDOMAIN),
			'not_found_in_trash' => __('No Items found in Trash', TEXTDOMAIN), 
			'parent_item_colon' => ''
		  );
	
		$args = array(
			'labels' =>  $labels,
			'public' => true,
			'capability_type' => 'post',
			'has_archive' => true,
			'hierarchical' => false,
			'rewrite' => array('slug' => __( 'special-intro', TEXTDOMAIN )),
			'supports' => array('title',
				'editor',
				'thumbnail'
			)
		);
	 
		register_post_type( 'special-intro', $args );
	}
	

}

new SpecialIntro();

?>