<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>
<div class="wrap">	
	<!-- Slider -->		
	<?php
if(opt('home_slider'))
{
	$query = new WP_Query();
	$query->query('post_type=slider&posts_per_page=-1');

    if($query->have_posts())
    {
		$cnt = 1;
	?>
    
	<div class="awesome-slider">
        <?php 
			$playerCnt = 0;
		    while ($query->have_posts()) { $query->the_post();  
            $bgType   = get_post_meta(get_the_ID(), 'background_type', true);
            $bgImg    = get_post_meta(get_the_ID(), 'background_image', true);
            $bgClr    = get_post_meta(get_the_ID(), 'background_color', true);
            $titleClr = get_post_meta(get_the_ID(), 'title_color', true);
			$textClr  = get_post_meta(get_the_ID(), 'text_color', true);
			
			$btnText  = get_post_meta(get_the_ID(), 'btn_text', true);
			$btnUrl   = get_post_meta(get_the_ID(), 'btn_url', true);
			
			$btnColor   = get_post_meta(get_the_ID(), 'btn_color', true);
			$btnBgColor = get_post_meta(get_the_ID(), 'btn_bg_color', true);
			
			$btnPress   = get_post_meta(get_the_ID(), 'btn_press_color', true);
			$btnPressBg = get_post_meta(get_the_ID(), 'btn_press_bg_color', true);
        ?>
		<div class="slide">
            <?php if($bgType == '2'){ ?>
			    <div class="slide-bg"><img src="<?php echo $bgImg; ?>" alt="<?php the_title(); ?>" /></div>
            <?php 
            }
            else if($bgType == '3')
            {?>
                <div class="slide-bg" style="background:<?php echo $bgClr; ?>"></div>
            <?php
            }
            ?>
			<div class="slide-item">
            <?php 
				$objType = get_post_meta(get_the_ID(), 'slide_object_type', true);
				$slideImg = get_post_meta(get_the_ID(), 'slide_image', true); 
				$slideVidServer = get_post_meta(get_the_ID(), 'video_server', true); 
				$slideVidId = get_post_meta(get_the_ID(), 'video_id', true); 
				
				if($objType == '2' && strlen($slideImg) > 0)
				{
					$imgId = get_image_id($slideImg);
					$imgW  = '';
					$imgH  = '';
					
					//Get image size
					if($imgId > -1){
						$src = wp_get_attachment_image_src($imgId, 'full');
						$imgW = 'width="' . $src[1] . '"';
						$imgH = 'height="' . $src[2] . '"';
					}
				?>
					<img src="<?php echo $slideImg; ?>" alt="<?php the_title(); ?>" <?php echo $imgW . ' ' . $imgH; ?> />
				<?php
					
				}
				else if($objType == '3' && strlen($slideVidId) > 0)
				{
					//YouTube
					if($slideVidServer == '1')
					{
					?>
						<iframe id="slide-player<?php echo $playerCnt; ?>" width="500" height="280" src="http://www.youtube.com/embed/<?php echo $slideVidId; ?>?enablejsapi=1" frameborder="0" allowfullscreen></iframe>
					<?php
					}
					else//Vimeo
					{
					?>
						<iframe id="slide-player<?php echo $playerCnt; ?>" src="http://player.vimeo.com/video/<?php echo $slideVidId; ?>?api=1&player_id=slide-player<?php echo $playerCnt; ?>" width="500" height="280" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
					<?php
					}
					$playerCnt++;
				}
			?>
			&nbsp;
			</div>
			<div class="slide-meta">
                <div class="meta">
				
				<?php 
					$titleStyle = strlen($titleClr) > 0 ? 'style="color:' . $titleClr . '"' : '';
					$textStyle  = strlen($textClr) > 0 ? 'style="color:' . $textClr . '"' : '';
				?>
                    <div class="title" <?php echo $titleStyle; ?>><?php the_title(); ?></div>
					<div class="content" <?php echo $textStyle; ?>><?php the_content(); ?></div>
					<?php
					if(strlen($btnText) > 0){ 
						$btnClass = '';
						if(strlen($btnColor) || strlen($btnBgColor) || strlen($btnPress) || strlen($btnPressBg))
						{
							$btnClass = "btn$cnt";
						?>
						<style type="text/css">
							<?php if(strlen($btnColor) || strlen($btnBgColor)){ ?>
							
							.awesome-slider .<?php echo $btnClass; ?>{
								<?php if(strlen($btnColor)) echo "color:$btnColor;"; ?>
								<?php if(strlen($btnBgColor)) echo "background-color:$btnBgColor;"; ?>
							}
							
							<?php } ?>
							
							<?php if(strlen($btnPress) || strlen($btnPressBg)){ ?>
							
							.awesome-slider .<?php echo $btnClass; ?>:active{
								<?php if(strlen($btnPress)) echo "color:$btnPress;"; ?>
								<?php if(strlen($btnPressBg)) echo "border-color:$btnPressBg;"; ?>
							}
							
							<?php }//Jeez thats messy, i know... xD ?>
						</style>
						<?php
						}//If any style settings is present 
					?>
					<a class="link_button <?php echo $btnClass; ?>" href="<?php echo $btnUrl; ?>"><?php echo $btnText; ?></a>
					<?php
					}
					?>
                </div>
            </div>
		</div>
        <?php
		$cnt++;
        }//End while
        ?>
	</div>

    <?php 
    }
    wp_reset_query(); 
}//if home_slider
?>
    
	<div id="wrap_main">
		<div class="top_left"></div>
		<div id="main">
		<?php 
		if(opt('home_portfolio_slider'))
		{ 
		?>
			<div class="container">
			
			<?php
				$query = new WP_Query();
				$query->query('post_type=portfolio&posts_per_page=3');
				
				if($query->have_posts())
				{
					$cnt = 0;
			?>
				<div class="row">
					<?php while ($query->have_posts()) { $query->the_post(); 
						$terms	= get_the_terms( get_the_ID(), 'skill-type' );
						$cnt++;
						$cls = '';
						
						if($cnt > 1) $cls = 'hidden-phone';
					?>
					
					
					<div class="span4">
						<div class="touch-slider portfolio-slider <?php echo $cls; ?>">
							<!--Item-->
							<?php
							$pcnt = 0;
							for($i=1; $i <= 10; $i++)
							{
								$pcnt = PortfolioSlide('portfolio_image_'.$i) ? ++$pcnt : $pcnt;

								if($pcnt == 3)
									break;
							}
							?>
							<a href="<?php the_permalink(); ?>" class="item_meta item_hover">
								<div class="meta_bg"></div>
								<span class="description"><?php the_title(); ?></span>
								<div class="separator"></div>
								<span class="category"><?php PrintTerms($terms, ', '); ?></span>
							</a>
						</div>
					</div>
					
					<?php } ?>
				</div>
				<?php 
				}
				wp_reset_query();
		}//if home_portfolio_slider
				?>
				<!-- Touch Sliders End -->	

				<?php 
				
			if(opt('home_special_intro'))
			{
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
				}//End if
				wp_reset_query();
				
			//if home_special_intro
			}
			?>
	
			</div>	
	
			<!-- Slogan -->
			<?php if(opt('home_slogan_text') != ""){ ?>
			<div class="home_slogan">
				<span class="quote_slogan_start"></span> 
				<?php eopt('home_slogan_text'); ?>
				<span class="quote_slogan_end"></span>
			</div>
			<?php } ?>
			<!-- Slogan End -->
			<!-- Recent Posts -->
			<?php 
		if(opt('home_recent_posts'))
		{
			$lastposts = get_posts( 'numberposts=3' );
			
			if(count($lastposts))
			{
			?>

			<div class="container">
				<div class="row latest_blog_post">
				
				<?php foreach($lastposts as $post) { setup_postdata($post); 
					$postType     = get_post_meta(get_the_ID(), 'content_type', true);
					$hasMedia     = false;
					$vType        = get_post_meta(get_the_ID(), 'video_server', true);
					$vID   		  = get_post_meta(get_the_ID(), 'video_id', true);
						
					if($postType == '1' && function_exists('has_post_thumbnail') && has_post_thumbnail())
						$hasMedia = true;
					else if($postType == '2')
						$hasMedia = true;
					
					$boxClass = $hasMedia ? '' : 'no-media';
				?>

					<div class="span4 box <?php echo $boxClass; ?>">
						<a href="<?php the_permalink(); ?>">
							<div class="meta">
								 <?php the_time('d'); ?>
								<span><?php the_time('M'); ?></span>
							</div>
							<?php if($postType == '1'){ ?>
							<div class="image">
								<?php if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) 
											the_post_thumbnail('recent-posts'); 
								?>
							</div>
							<?php 
							}
							elseif($postType == '2')
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
							}
							?>
						</a>
						<h2>
							<a class="title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h2>
						<div class="separator"></div>
						<p>
						<?php 
						$content = get_the_content();

						if(strlen($content) <= 200)
							echo $content;
						else
						{
							$matches = array();
							preg_match('/^.{0,200}(?:.*?)\b/iu', strip_tags($content), $matches);
							echo $matches[0] . '...';
						}
						?>
						</p>
					</div>
				<?php } ?>
				
				</div>
			</div>
			
			<?php 
			}//If recent posts 
		}
		?>
		
		</div>
	</div>
</div>


<?php get_footer(); ?>