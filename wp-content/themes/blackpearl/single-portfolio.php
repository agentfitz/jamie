<?php get_header(); ?>

	<!--Intro-->
	<div id="wrap_intro" class="wrap portfolio" >	
		<div class="container">
			<div class="intro">
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
				<h1><?php echo $pageTitle; ?></h1>
				<h3 class="meta"><?php echo $pageDesc; ?></h3>
			</div>
		</div>
	</div>
	
		<!--Content-->
	<div id="wrap_main" class="wrap" >
		<div class="top_left"></div>
		<div id="main" class="container">

			<!--Portfolio Single-->
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
			<div id="post-<?php the_ID(); ?>" class="row portfolio portfolio_single">
				<div  class="span9 portfolio_image">
					<h2><?php the_title(); ?></h2>
					<div class="separator"></div>
					<?php
					$vType = get_post_meta(get_the_ID(), 'video_server', true);
					$vID   = get_post_meta(get_the_ID(), 'video_id', true);
					
					if($vID != '')
					{
					?>
					<div class="post_video">
					<?php
					if($vType == '' || $vType == '1')
					{
					?>
						<iframe width="560" height="315" src="http://www.youtube.com/embed/<?php echo $vID; ?>" frameborder="0" allowfullscreen></iframe>
				<?php
					}
					else
					{?>
						<iframe src="http://player.vimeo.com/video/<?php echo $vID; ?>?color=f0e400" width="500" height="281" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
					<?php
					}
					?>
					</div>
				<?php
					}?>
					
					<div class="touch-slider">
						<?php
						for($i=1; $i <= 10; $i++)
							PortfolioSlide('portfolio_image_'.$i);
						?>
					</div>
				</div>
				<div class="span3 content">
					<div class="navigator">
						<a href="<?php echo get_permalink(get_adjacent_post(false,'',false)); ?>" class="icon previous"></a>
						<!--<a href="portfolio_artistic.html" class="icon return_back"></a>-->
						<a href="<?php echo get_permalink(get_adjacent_post(false,'',true)); ?>" class="icon next"></a>
					</div>	
					<div class="clearfix"></div>
					<div class="post_content">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
				
			<?php endwhile; ?> 
			
			<?php else: ?>
				<div id="post-0" >
					<p><?php _e("Sorry, but you are looking for something that isn't here.", TEXTDOMAIN) ?></p>
				</div>
			<?php endif; ?>
			
			<?php
				$related = get_related_posts_by_taxonomy(get_the_ID(), 'skill-type', intval(opt('portfolio_related_posts')) );
				
				if($related->have_posts())
				{
				?>
				<!-- jCarousel -->
				<div  class="related_project"> 
					<div class="title">
						<h2>
							<?php _e('Related Projects', TEXTDOMAIN); ?>
						</h2>
						<div class="separator"></div>
					</div>	
					<ul id="mycarousel" class="jcarousel">
				<?php
					while ($related->have_posts()) { $related->the_post();
						$terms	= get_the_terms( get_the_ID(), 'skill-type' );
						?>
						<li>							
							<!-- Item 1 -->
							<div class="item">
								<a href="<?php the_permalink(); ?>" class="item_image">
									<?php 
									if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) 
										the_post_thumbnail('portfolio-related'); 
									?>
								</a>
								<a href="<?php the_permalink(); ?>" class="item_meta item_hover">	
									<span class="description"><?php the_title(); ?></span>
									<div class="separator"></div>
									<span class="category"><?php PrintTerms($terms, ', '); ?></span>
								</a>
							</div>
						</li>
					<?php
					}
				?>
					</ul>
				</div>
				<?php
				}//End if
				
				wp_reset_query();
			?>
			
		</div>
	</div>
<?php get_footer(); ?>