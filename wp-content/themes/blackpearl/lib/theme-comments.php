<?php

// load comment scripts only on single pages
function single_scripts() {
	if(is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) 
		wp_enqueue_script( 'comment-reply' ); // loads the javascript required for threaded comments 
}

add_action('wp_print_scripts', 'single_scripts');

?>