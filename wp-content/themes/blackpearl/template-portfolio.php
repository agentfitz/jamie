<?php
/*
Template Name: Portfolio
*/
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

	<!--Intro-->
	<div id="wrap_intro" class="wrap portfolio" >	
		<div class="container">
			<div class="intro">
				<h1><?php echo $pageTitle; ?></h1>
				<h3 class="meta"><?php echo $pageDesc; ?></h3>
				
				<ul id="filters" class="subnavigation">
					<li><a class="current" data-filter="*" href="#"><?php _e('View All', TEXTDOMAIN); ?></a></li>
					<?php wp_list_categories(array('title_li' => '', 'taxonomy' => 'skill-type', 'walker' => new Portfolio_Walker())); ?>
				</ul>
			</div>
		</div>
	</div>
	<!--Content-->
	<div id="wrap_main" class="wrap portfolio" >
		<div class="top_left"></div>
		<div id="main" class="container">
		
		<?php
		$galleryClass = ''; 
		if(opt('portfolio_list_layout') == 2) $galleryClass='gallery_fix';
		
		if(opt('portfolio_layout_controls'))
		{
			$artbtnCls = opt('portfolio_list_layout') == 1 ? 'current' : '';
			$fixbtnCls = opt('portfolio_list_layout') == 2 ? 'current' : '';
		?>
			<div id="portfolio_styles">
				<a id="gallery_artistic" href="#" class="<?php echo $artbtnCls; ?>"></a>
				<a id="gallery_fix" href="#" class="<?php echo $fixbtnCls; ?>"></a>
			</div>
			<div class="clearfix"></div>
		<?php
		} ?>
			
			<div id="gallery" class="gallery isotope <?php echo $galleryClass; ?>">
				<?php 
					$count = 1;
					$query = new WP_Query();
					$query->query('post_type=portfolio&posts_per_page=-1');
					
					while ($query->have_posts()) { $query->the_post(); 
						$terms     = get_the_terms( get_the_ID(), 'skill-type' );
						$thumbFull = '';
						$thumb     = '';
						
						if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) 
						{
							$thumbFull = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
							$thumbFull = $thumbFull[0];
							$thumb     = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumb-portfolio');
						}
						
                ?>
				<div class="item isotope-item <?php if($terms) { foreach ($terms as $term) { echo 'term-'.$term->term_id.' '; } } ?>" data-id="item-<?php echo $count; ?>">

					<a style="height:<?php echo $thumb[2]; ?>px" class="item_image item_image_wrap" href="<?php echo $thumbFull; ?>" title="<?php the_title(); ?>">
						<?php if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) 
							the_post_thumbnail('thumb-portfolio'); 
						?>
						<span class="frame_overlay"></span>
					</a>

					<a href="<?php the_permalink(); ?>" class="item_meta item_hover">	
						<span class="description"><?php the_title(); ?></span>
						<div class="separator"></div>
						<span class="category"><?php PrintTerms($terms, ', '); ?></span>
					</a>
				</div>
				<?php 
					$count++;
				} wp_reset_query(); 
				
				?>
			</div>
			
		</div>
	</div>
	
<?php get_footer(); ?>