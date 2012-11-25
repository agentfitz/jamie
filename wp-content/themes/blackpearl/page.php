<?php 
	get_header(); 

	$titleType    = get_post_meta(get_the_ID(), 'intro_type', true);
	$pageTitle    = '';
	$pageDesc     = '';
	
	if($titleType == '' || $titleType == '1')
	{
		$pageTitle = get_the_title();
	}
	else if($titleType == '2')
	{
		$pageTitle    = get_post_meta(get_the_ID(), 'intro_title', true);
	}
	else//3
	{
		$pageTitle    = get_post_meta(get_the_ID(), 'intro_title', true);
		$pageDesc     = get_post_meta(get_the_ID(), 'intro_desc', true);
	}				
?>
	<!--Intro-->
	<div id="wrap_intro" class="wrap" >	
		<div class="container">
			<div class="intro">
				<h1><?php echo $pageTitle; ?></h1>
				<h3><?php echo $pageDesc; ?></h3>
			</div>
		</div>
	</div>
	<!--Content-->
	<div id="wrap_main" class="wrap" >
		<div class="top_left"></div>
		<div id="main" class="container">
			<!--Content Row-->
			<div class="row">
				<?php 
					$pageClass = 'span9';
					
					if(opt('sidebar_position') == 0)
						$pageClass = 'span12';
					if(opt('sidebar_position') == 1)
						$pageClass .= ' blog_right';	
				?>
				<div class="<?php echo $pageClass; ?>">
				
				<?php 
				if (have_posts()) { while (have_posts()) { the_post(); 
				?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
						<?php the_content(); ?>
					</div>
				<?php
					}//While have_posts
				}//If have_posts
				?>
				
					<!--Comments-->
					<?php comments_template('', true); ?>
				</div>
				
				<!--Sidebar-->
				<?php 
				if(opt('sidebar_position') != 0)
					get_sidebar(); 
				?>
				
			</div>
		</div>
	</div>
	
	
<?php get_footer(); ?>