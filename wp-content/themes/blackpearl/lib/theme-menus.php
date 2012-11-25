<?php

function register_menu() {
	register_nav_menu( 'primary-nav', __( 'Primary Navigation', TEXTDOMAIN ) );
}

add_action( 'init', 'register_menu' );

?>