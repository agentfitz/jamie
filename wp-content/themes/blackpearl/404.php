<?php
header("HTTP/1.1 404 Not Found");
header("Status: 404 Not Found");
?>

<?php get_header(); ?>
			
	<!--Intro-->
	<div id="wrap_intro" class="wrap" >	
		<div class="container">
			<div class="intro">
				<h1><?php _e('Error 404 - Not Found', TEXTDOMAIN) ?></h1>
				<h3></h3>
			</div>
		</div>
	</div>
	
		<!--Content-->
	<div id="wrap_main" class="wrap" >
		<div class="top_left"></div>
		<div id="main" class="container">
			<!--Content Row-->
			<div class="row">

				<div class="span9">
					<p><?php _e("Sorry, but you are looking for something that isn't here.", TEXTDOMAIN) ?></p>
				</div>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>

<?php get_footer(); ?>