<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0" />
	
	<title><?php bloginfo('name'); wp_title(' - ', true, 'left'); ?></title>
	
	<?php if(opt('favicon') != ""){ ?>
	<link rel="shortcut icon" href="<?php eopt('favicon'); ?>"  />
	<?php } ?>
	
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<!--[if lt IE 9]><script src="<?php echo THEME_JS_URI ?>/html5shiv.js"></script><![endif]-->
	
	<!-- Theme Hook -->
	<?php wp_head(); ?>
	<!-- Custom CSS -->
	<?php if(opt('custom_css') != '' || 
			 opt('links_color') != '' || 
			 opt('links_hover_color') != '' || 
			 opt('selection_color') != '' ){?>
	<style type="text/css">
	
	<?php 
	
	if(opt('links_color') != '')
	{
	?>
	a{ color:<?php eopt('links_color'); ?>; }
	<?php
	}
	
	if(opt('links_hover_color') != '')
	{
	?>
	a:hover{ color:<?php eopt('links_hover_color'); ?>; }
	<?php
	}

	if(opt('selection_color') != '')
	{
	?>
	::selection { background: <?php eopt('selection_color'); ?> /* Safari */ }
	::-moz-selection { background: <?php eopt('selection_color'); ?> /* Firefox */ }
	<?php
	}

	echo stripslashes(opt('custom_css')); 
	?>
	</style>
	<?php } ?>
</head>
<body <?php body_class(); ?>>

	<?php theme_before_header(); ?>

	<!--Header-->
	<div class="wrap" id="wrap_header">
		<div class="container">
			<header class="clearfix">
				<?php $logo = opt('logo') == "" ? THEME_IMAGES_URI . "/logo.png" : opt('logo'); ?>
				
				<a href="<?php echo home_url(); ?>" class="logo">
					<img src="<?php echo $logo; ?>" alt="Logo" />
				</a>
				
				<div class="navigation visible-desktop">
				<?php wp_nav_menu(array(
					'container' =>'',
					'menu_class' => '',
					'theme_location' => 'primary-nav',
					'walker' => new Custom_Nav_Walker()
				)); ?>
				</div>
				
				<div class="mobile-navigation visible-phone visible-tablet">
					<a href="#"></a>
					<?php wp_nav_menu(array(
					'container' =>'',
					'menu_class' => '',
					'theme_location' => 'primary-nav',
					'walker' => new Custom_Nav_Walker()
					)); ?>
				</div>

			</header>
		</div>
	</div>
	<!--End Header-->