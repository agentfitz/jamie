<?php

/*-----------------------------------------------------------------------------------*/
/*	Configure WP2.9+ Thumbnails
/*-----------------------------------------------------------------------------------*/

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 770, 313, true );
	add_image_size( 'thumb-portfolio', 270 );
	//add_image_size( 'portfolio-single', 870 );
	add_image_size( 'portfolio-related', 270, 285, true );
	add_image_size( 'team-member', 370, 680, true );
	add_image_size( 'recent-posts', 370, 160, true );
	add_image_size( 'thumb-portfolio-widget', 150, 110, true );
}

/*-----------------------------------------------------------------------------------*/
/*	RSS Feeds
/*-----------------------------------------------------------------------------------*/

add_theme_support( 'automatic-feed-links' );

?>