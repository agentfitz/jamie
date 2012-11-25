<?php get_header(); ?>

	<!--Intro-->
	<div id="wrap_intro" class="wrap" >	
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
				<!--Blog-->
				<div class="span9 blog">
				<?php if (have_posts()) : while (have_posts()) : the_post(); 
					$postType = get_post_meta(get_the_ID(), 'content_type', true);
					
					$post_icon_class      = 'post_icon_image';
					
					if($postType == '2')
						$post_icon_class = 'post_icon_video';
					elseif($postType == '3')
						$post_icon_class = 'post_icon_document';
				?>
				
				<!-- Post -->
				<div id="post-<?php the_ID(); ?>" class="<?php echo implode(' ', get_post_class('row')); ?>" >
					
					<div class="post_meta span1 visible-desktop">
						<div class="post_icon <?php echo $post_icon_class; ?>"></div>
						<span class="post_date">
							<?php the_time('d'); ?>
							<span><?php the_time('M'); ?></span>
						</span>
						<span class="label"><?php _e('Author', TEXTDOMAIN) ?>:</span>
						<span class="info"><?php the_author_posts_link(); ?></span>
						<span class="label"><?php _e('Comments:', TEXTDOMAIN) ?></span>
						<span class="info"><?php comments_popup_link(__('0', TEXTDOMAIN), __('1 Comment', TEXTDOMAIN), __('% Comments', TEXTDOMAIN)); ?></span>
						<span class="label"><?php _e('In', TEXTDOMAIN) ?>:</span>
						<span class="info"><?php the_category(', ') ?></span>
						<?php if(has_tag()){ ?>
						<span class="label"><?php _e('Tags', TEXTDOMAIN) ?>:</span>
						<span class="info"><?php the_tags(''); ?></span>
						<?php } ?>
						<span class="info"><?php edit_post_link( __('edit', TEXTDOMAIN), '<span class="edit-post">[', ']</span>' ); ?></span>
						
					</div>
					
					<div Class="blog_post span8">
						
						<?php
						
						
						if($postType == '' || $postType == '1')
						{
							//Post thumbnail
							if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
							<div class="post_image">
							<?php the_post_thumbnail(); /* post thumbnail settings configured in functions.php */ ?>
							</div>
							<?php } 
						}
						elseif($postType == '2')
						{
							$vType = get_post_meta(get_the_ID(), 'video_server', true);
							$vID = get_post_meta(get_the_ID(), 'video_id', true);
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
						
							<div class="title">
								<h2><?php the_title(); ?></h2>
								<div class="separator"></div>
							</div>

							<div class="clearfix">
								<div class="post_meta hidden-desktop left">
									<span class="label"><?php _e('Author', TEXTDOMAIN) ?>:</span>
									<span class="info"><?php the_author_posts_link(); ?></span>
									<span class="label"><?php _e('In', TEXTDOMAIN) ?>:</span>
									<span class="info"><?php the_category(', ') ?></span>
									<span class="label"><?php _e('Comments:', TEXTDOMAIN) ?></span>
									<span class="info"><?php comments_popup_link(__('No Comments', TEXTDOMAIN), __('1 Comment', TEXTDOMAIN), __('% Comments', TEXTDOMAIN)); ?></span>
								</div>
								<div class="post_meta visible-phone visible-tablet right">
									<div class="post_icon  <?php echo $post_icon_class; ?>"></div>
									<div class="post_date">
										<?php the_time('d'); ?>
										<span><?php the_time('M'); ?></span>
									</div>
								</div>
							</div>
							<?php the_content(); ?>
							<div class="pagelink">
								<?php wp_link_pages(); ?>
							</div>
					</div>

				</div>				
				
				<?php endwhile; ?> 
				
				<div class="row">
					<div class="span1 visible-desktop">&nbsp;</div>
					<div class="blog_comments span8">
					<?php comments_template('', true); ?>
					</div>
				</div>
				<?php else: ?>
					<div id="post-0" >
						<p><?php _e("Sorry, but you are looking for something that isn't here.", TEXTDOMAIN) ?></p>
					</div>
				<?php endif; ?>
				</div>
				<!--Sidebar-->
				<?php get_sidebar(); ?>

			</div>
			
			<?php if (have_posts()) : ?>

			<!--Single Page Navigation-->
			<div class="page-navigation clearfix">
				<div class="nav-next"><?php next_posts_link(__('&larr; Older Entries', TEXTDOMAIN)) ?></div>
				<div class="nav-previous"><?php previous_posts_link(__('Newer Entries &rarr;', TEXTDOMAIN)) ?></div>
			</div>
			
			<?php endif; ?>
			
		</div>
	</div>
	
<?php get_footer(); ?>