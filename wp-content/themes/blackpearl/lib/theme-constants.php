<?php if(function_exists('wp_get_theme')){	$theme = wp_get_theme();		define('THEME_NAME',	$theme->Name);	define('THEME_NAME_SEO', strtolower(str_replace(" ", "_", THEME_NAME)));	define('THEME_AUTHOR',	$theme->Author);	define('THEME_VERSION',	$theme->Version);	define('OPTIONS_KEY', "theme_". THEME_NAME_SEO ."_options");}else{	$theme_data = get_theme_data(TEMPLATEPATH . '/style.css');	define('THEME_NAME',	$theme_data['Title']);	define('THEME_NAME_SEO', strtolower(str_replace(" ", "_", THEME_NAME)));	define('THEME_AUTHOR',	$theme_data['Author']);	define('THEME_VERSION',	$theme_data['Version']);	define('OPTIONS_KEY', "theme_". THEME_NAME_SEO ."_options");}?>