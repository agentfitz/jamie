<?php
/*
Template Name: About
*/
?>

<?php
	function bg_image()
	{?>
	<div class="page-background">
		<?php 
		if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) 
			the_post_thumbnail('full'); 
		?>
	</div>
	<?php
	}
	
	add_action('theme_before_header', 'bg_image');
?>

<?php get_header(); ?>

<?php
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

	<div class="wrap" id="wrap_main">
		<div class="main-head"><div></div></div>
		<div class="container">
			<div id="main">
			
				<div class="heading">
					<h1><?php echo $pageTitle; ?></h1>
					<p><?php if (have_posts())  while (have_posts()) { the_post();
						the_content();
					} ?></p>
                </div>
				
				<?php 
					$query = new WP_Query();
					$query->query('post_type=team&posts_per_page=-1');
					
					if($query->have_posts())
					{
                ?>
				<!-- jCarousel -->
				<div class="our_team">
                    <span class="head"><?php _e('Our Team', TEXTDOMAIN); ?></span>
					<ul id="mycarousel" class="jcarousel">
					<?php
						while ($query->have_posts()) { $query->the_post(); 
						$terms     = get_the_terms( get_the_ID(), 'job-title' );
					?>
						<li>							
							<!-- Item 1 -->
							<div class="item">
								<a href="#" class="item_image">
								<?php if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) 
									the_post_thumbnail('team-member'); 
								?>
									<span class="frame_overlay"></span>
								</a>
								<a href="#" class="item_meta item_hover">	
									<span class="description"><?php the_title(); ?></span>
									<div class="separator"></div>
									<span class="category"><?php PrintTerms($terms, ', '); ?></span>
								</a>
							</div>
						</li>
					<?php 
						} //End while
					
						wp_reset_query();
					}//End if
					?>
					</ul>
                </div>
				<!-- Our Team End -->
				
				<?php 
				$count = 1;
				$args = 'post_type=special-intro&posts_per_page=-1';
				$query = new WP_Query();
				$query->query($args);
				
				if($query->have_posts())
				{
                ?>
				
				<!-- Intro Box -->
				<div class="agency">
					<div class="special_intro">
						<div class="row">
							<div  class="span4">
								<div class="titles clearfix">
									<ul>
									<?php
									while ($query->have_posts()) { $query->the_post(); 
									?>
										<li><a href="#" <?php if($count==1) echo 'class="selected"';?>><?php the_title(); ?><div class="circle"><?php echo $count++; ?></div></a></li>
									<?php 
									}
									wp_reset_query();
									?>
									</ul>
									<div class="line">&nbsp;</div>
								</div>
							</div>
							<div class="span8 descriptions">
								<div>
							<?php
							$query = new WP_Query();
							$query->query($args);
							while ($query->have_posts()) { $query->the_post(); 
							?>
								<div class="description">
									<?php the_content(); ?>
								</div>
							<?php
							}
							?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php 

					wp_reset_query();
				}//End if
				?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>