<?php

// retrieves the attachment ID from the file URL
function get_image_id($image_url) {
	global $wpdb;
	$prefix = $wpdb->prefix;
	$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM " . $prefix . "posts" . " WHERE guid='" . $image_url . "';"));
	
	if(count($attachment))
		return $attachment[0];
	else
		return -1;
}

function PortfolioSlide($imageName)
{
	$meta = get_post_meta(get_the_ID(), $imageName, true);
	
	if($meta == '') return false;
	
	?>
	<div class="slide">
		<img src="<?php echo $meta; ?>" alt="<?php the_title(); ?>">
	</div>
	<?php
	
	return true;
}

function theme_before_header()
{
	// initialize hook
	do_action('theme_before_header');
}

function get_related_posts_by_taxonomy($postId, $taxonomy, $maxPosts = 9)
{
	$terms   = wp_get_object_terms($postId, $taxonomy);

	if (!count($terms))
		return new WP_Query();
		
	$termsSlug = array();
	
	foreach($terms as $term)
		$termsSlug[] = $term->slug;

	$args=array(
	  'post__not_in' => array($postId),
	  'post_type' => get_post_type($postId),
	  'showposts'=>$maxPosts,
	  'tax_query' => array(
		array(
				'taxonomy' => $taxonomy,
				'field' => 'slug',
				'terms' => $termsSlug
			)
		)
	);
	
	return new WP_Query($args);
}

//Return theme option
function opt($option, $default = ''){
	$opt = get_option(OPTIONS_KEY);
	
	if(!isset($opt[$option]))
		return $default;
		
	return $opt[$option];
}

//Echo theme option
function eopt($option, $default = ''){
	echo opt($option, $default);
}

function PrintTerms($terms, $separatorString)
{
	$termIndex = 1;
	if($terms) 
	foreach ($terms as $term) 
	{ 
		echo $term->name; 
		
		if(count($terms) > $termIndex) 
			echo $separatorString; 

		$termIndex++;
	}
}

function format_attr($name, $val)
{
	return $name . '="'. $val . '" ';
}

function format_std_attrs(array $params)
{
	$attrs =  '';
	$keys = array_keys($params);
	
	foreach ($keys as $key)
	{
		if($key != 'id' && $key != 'class' && 
		   $key != 'style' && $key != 'src' && 
		   $key != 'href' && $key != 'alt' && 
		   $key != 'type')
		   continue;

		$attrs .= format_attr($key, $params[$key]);
	}
	
	return $attrs;
}

//Returns a html image tag string
function img(array $params){

	if(!isset($params['file']))
		throw new Exception('file parameter is missing.');
	
	$params['src'] = THEME_IMAGES_URI . '/' . $params['file'];
	
	$tag = '<img ' . format_std_attrs($params) . '/>';
	
	echo $tag;
}

//Returns a html script tag string
function js(array $params){
	echo get_js($params);
}

function get_js(array $params){
	
	if(!isset($params['file']))
		throw new Exception('file parameter is missing.');
	
	$params['type'] = 'text/javascript';
	$params['src'] = THEME_JS_URI . '/' . $params['file'];
	
	return '<script ' . format_std_attrs($params) . '></script>';
}

?>