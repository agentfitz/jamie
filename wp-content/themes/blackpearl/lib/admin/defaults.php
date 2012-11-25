<?php
function Get_Default_Options()
{
	return array(
		//General
		'logo' => '',
		'favicon' => '',
		'responsive_layout' => 1,
		'sidebar_position' => 2,
		'custom_sidebars' => '',
		//Home Page
		'home_special_intro' => 1,
		'home_portfolio_slider' => 1,
		'home_slogan_text' => 'We Design Unique And Beautiful Websites That Fits Every Category',
		'home_recent_posts' => 1,
		'home_slider' => 1,
		'home_slider_delay' => 5000,
		'home_slider_item_in_speed' => 500,
		'home_slider_item_out_speed' => 1500,
		'home_slider_bg_speed' => 700,
		//Blog Page
		'blog_sidebar_position' => 2,
		'blog_intro_text' => '',
		'blog_intro_desc' => '',
		'blog_load_more' => 1,
		//Portfolio Page
		'portfolio_list_layout' => 1,
		'portfolio_layout_controls' => 1,
		'portfolio_related_posts' => 6,
		//Footer
		'footer' => 1,
		'footer_social_networks' => 1,
		'footer_widgets' => 3,
		'footer_copyright' => 'Copyright 2012 PixFlow. All Rights Reserved',
		//Footer Socials
		'social_facebook_address' => '',
		'social_twitter_address' => '',
		'social_dribbble_address' => '',
		'social_vimeo_address' => '',
		'social_youtube_address' => '',
		'social_googleplus_address' => '',
		'social_digg_address' => '',
		'social_tumblr_address' => '',
		'social_linkedin_address' => '',
		'social_forrst_address' => '',
		'social_sharethis_address' => '',
		'rss_feed_address' => get_bloginfo('rss2_url'),
		'social_quora_address' => '',
		'social_lastfm_address' => '',
		'social_flickr_address' => '',
		'social_myspace_address' => '',
		//Contact Page
		'maps_api_key' => '',
		'contact_map_address' => '',
		'contact_map_zoom' => 9,
		'contact_address' => '',
		'contact_contact_info' => '',
		//SMTP Mail settings
		'contact_mail_user' => '',
		'contact_mail_pass' => '',
		'contact_mail_host' => '',
		'contact_mail_port' => 25,
		'contact_mail_sec' => '',
		'contact_mail_auth' => 1,
		'contact_mailto' => '',
		'contact_email_subject' => 'Mail sent from Black Pearl theme',
		'contact_email_template' => 'From: [Name] < [Sender] >
---------------------------------
[Message]',
		//Skin Managment
		'theme_skin' => 0,//Dark
		'theme_skin_color' => 'red',
		'links_color' => '',
		'links_hover_color' => '',
		'selection_color' => '',
		//Advanced Options
		'custom_javascript' => '',
		'custom_css' => '',
		);
}
?>