<?php

class Portfolio
{
	function __construct()
	{
		add_action( 'init', array(&$this, 'WPInit') );
	}
	
	function WPInit()
	{
		$this->CreatePostType();
		$this->RegisterTaxonomy();
	}
	
	function CreatePostType() 
	{
		$labels = array(
			'name' => __( 'Portfolio', TEXTDOMAIN),
			'singular_name' => __( 'Portfolio', TEXTDOMAIN ),
			'add_new' => __('Add New', TEXTDOMAIN),
			'add_new_item' => __('Add New Portfolio', TEXTDOMAIN),
			'edit_item' => __('Edit Portfolio', TEXTDOMAIN),
			'new_item' => __('New Portfolio', TEXTDOMAIN),
			'view_item' => __('View Portfolio', TEXTDOMAIN),
			'search_items' => __('Search Portfolio', TEXTDOMAIN),
			'not_found' =>  __('No portfolios found', TEXTDOMAIN),
			'not_found_in_trash' => __('No portfolios found in Trash', TEXTDOMAIN), 
			'parent_item_colon' => ''
		  );
	
		$args = array(
			'labels' =>  $labels,
			'public' => true,
			'capability_type' => 'post',
			'has_archive' => true,
			'hierarchical' => false,
			'menu_icon' => THEME_IMAGES_URI . '/gallery_icon.png',
			'rewrite' => array('slug' => __( 'portfolios', TEXTDOMAIN ), 'with_front' => true),
			'supports' => array('title',
				'editor',
				'thumbnail'
			)
		);

		register_post_type( 'portfolio', $args );
	}
	
	function RegisterTaxonomy()
	{
		register_taxonomy('skill-type', array('portfolio'), 
		array("hierarchical" => true, 
			  "label" => __( "Skill Types", TEXTDOMAIN ), 
			  "singular_label" => __( "Skill Type",  TEXTDOMAIN ), 
			  "rewrite" => false//array('slug' => 'skill-type', 'hierarchical' => true)
			  ));
	}
}

new Portfolio();

?>