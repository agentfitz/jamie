<?php

class Team
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
			'name' => __( 'Team', TEXTDOMAIN),
			'singular_name' => __( 'Team', TEXTDOMAIN ),
			'add_new' => __('Add New Member', TEXTDOMAIN),
			'add_new_item' => __('Add New Member', TEXTDOMAIN),
			'edit_item' => __('Edit Member', TEXTDOMAIN),
			'new_item' => __('New Member', TEXTDOMAIN),
			'view_item' => __('View Member', TEXTDOMAIN),
			'search_items' => __('Search Member', TEXTDOMAIN),
			'not_found' =>  __('No members found', TEXTDOMAIN),
			'not_found_in_trash' => __('No members found in Trash', TEXTDOMAIN), 
			'parent_item_colon' => ''
		  );
	
		$args = array(
			'labels' =>  $labels,
			'public' => true,
			'capability_type' => 'post',
			'has_archive' => true,
			'hierarchical' => false,
			'rewrite' => array('slug' => __( 'team', TEXTDOMAIN )),
			'supports' => array('title',
				'editor',
				'thumbnail'
			)
		);
	 
		register_post_type( 'team', $args );
	}
	
	function RegisterTaxonomy()
	{
		register_taxonomy('job-title', array("team"), 
		array("hierarchical" => true, 
			  "label" => __( "Job Titles", TEXTDOMAIN ), 
			  "singular_label" => __( "Job Title",  TEXTDOMAIN ), 
			  "rewrite" => array('slug' => 'job-title', 'hierarchical' => true))
			  );
	}
}

new Team();

?>