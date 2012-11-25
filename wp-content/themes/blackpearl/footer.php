<?php 
function SocialLink($optKey, $text, $class)
{
	if(opt($optKey) != '')
	{?>
	<li class="<?php echo $class; ?>"><a href="<?php eopt($optKey); ?>"><?php echo $text; ?></a></li>
<?php 
	}
}
?>
	
	<?php if( (!defined('NOFOOTER') || !NOFOOTER) && opt('footer')){ ?>
	<footer class="wrap">
		<div id="footer_content">
			<div class="container relative">
				<a id="top_button" href="#top"></a>

					<div class="row widget_area">
						<?php 
							$footerWidgets = opt('footer_widgets');
							if($footerWidgets=='') $footerWidgets = 3;
							$widgetSize = 12 / $footerWidgets;
							for($i = 1; $i <= $footerWidgets; $i++)
							{ ?>
								<div class="span<?php echo $widgetSize ?>">
									<?php 
									/* Widgetised Area */ 
									if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'footer-widget-' . $i ) ){}	?>
								</div>
							<?php	
							}
						?>
					</div>
				
			</div>	
		</div>
		<div id="footer_bottom">
			<div class="bottom_right"></div>
			<div class="container">
				<div class="row">
					<div class="span8">
						<p class="copyright"><?php eopt('footer_copyright'); ?>&nbsp;</p>
					</div>
					<div class="span4">
					<?php if(opt('footer_social_networks'))
					{ ?>
						<ul class="social_icons">
							<?php SocialLink('social_facebook_address', 'Facebook Profile', 'facebook'); ?>
							<?php SocialLink('social_twitter_address', 'Twitter Profile', 'twitter'); ?>
							<?php SocialLink('social_dribbble_address', 'Dribbble Profile', 'dribbble'); ?>
							<?php SocialLink('social_vimeo_address', 'Vimeo Profile', 'vimeo'); ?>
							<?php SocialLink('social_youtube_address', 'YouTube Profile', 'youtube'); ?>
							<?php SocialLink('social_googleplus_address', 'Google+ Profile', 'google'); ?>
							<?php SocialLink('social_digg_address', 'Digg Profile', 'digg'); ?>
							<?php SocialLink('social_tumblr_address', 'Tumblr Profile', 'tumblr'); ?>
							<?php SocialLink('social_linkedin_address', 'Linkedin Profile', 'linkedin'); ?>
							<?php SocialLink('social_forrst_address', 'Forrst Profile', 'forrst'); ?>
							<?php SocialLink('social_sharethis_address', 'Sharethis Profile', 'sharethis'); ?>
							<?php SocialLink('social_quora_address', 'Quora', 'quora'); ?>
							<?php SocialLink('social_lastfm_address', 'last.fm Profile', 'lastfm'); ?>
							<?php SocialLink('social_flickr_address', 'Flickr Profile', 'flickr'); ?>
							<?php SocialLink('social_myspace_address', 'Myspace Profile', 'myspace'); ?>
							<?php SocialLink('rss_feed_address', 'RSS Feed', 'rss'); ?>
						</ul>
					<?php 
					}// if footer_social_networks ?>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<?php } ?>
	<!--Scripts-->
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript">
	if (typeof jQuery == 'undefined')
		document.write(<?php echo json_encode(get_js(array( 'file' => 'jquery-1.7.2.min.js'))) ?>);

	//Custom Script
	<?php eopt('custom_javascript'); ?>
	</script>
	<!--End Scripts-->
	<!-- Theme Hook -->
	<?php wp_footer(); ?>
</body>
</html>