<?php require_once('inputs.php'); ?>

<div id="px-container" class="theme-settings">
	<input type="hidden" name="action" value="theme_save_options" />
	<div id="px-wrap">
		<!--Header-->
		<div id="px-head" class="clear-after">
			<div class="logo">
				<?php admin_img('logo.png', THEME_NAME); ?>
			</div>
			
			<ul class="support">
				<li><a href="http://themeforest.net/item/black-pearl-responsive-wordpress-theme/discussion/3218144"><?php _e('Support', TEXTDOMAIN); ?></a></li>
				<li><div class="separator"></div></li>
				<li><a href="http://demo.sacredpixel.com/blackpearl_manual"><?php _e('Documentation', TEXTDOMAIN); ?></a></li>
			</ul>
		</div>
		<!--End Header-->
		
		<!--Main-->
		<div class="clear-after">
			<div id="px-sidebar">
				<h5 class="heading"><?php _e('Theme Options', TEXTDOMAIN); ?></h5>
				<div id="px-sidebar-accordion">
					<h3><a href="#" class="active"><?php _e('Theme Settings', TEXTDOMAIN); ?></a></h3>
					<div>
						<ul class="px-tab">
							<li><a href="#general-settings" class="active"><?php _e('General', TEXTDOMAIN); ?></a></li>
							<li><a href="#home-settings"><?php _e('Home Page', TEXTDOMAIN); ?></a></li>
							<li><a href="#contact-settings"><?php _e('Contact Page', TEXTDOMAIN); ?></a></li>
							<li><a href="#blog-settings"><?php _e('Blog Page', TEXTDOMAIN); ?></a></li>
							<li><a href="#portfolio-settings"><?php _e('Portfolio Page', TEXTDOMAIN); ?></a></li>
							<li><a href="#footer-settings"><?php _e('Footer', TEXTDOMAIN); ?></a></li>
						</ul>
					</div>
					<h3><a href="#"><?php _e('Skin Managment', TEXTDOMAIN); ?></a></h3>
					<div>						
						<ul class="px-tab">
							<li><a href="#skin-settings"><?php _e('Settings', TEXTDOMAIN); ?></a></li>
						</ul>
					</div>
					<h3><a href="#"><?php _e('Advanced Options', TEXTDOMAIN); ?></a></h3>
					<div>						
						<ul class="px-tab">
							<li><a href="#advanced-settings"><?php _e('Settings', TEXTDOMAIN); ?></a></li>
						</ul>
					</div>
					<h3><a href="#"><?php _e('Demo Content', TEXTDOMAIN); ?></a></h3>
					<div>
						<ul class="px-tab">
							<li><a href="#import-settings"><?php _e('Import Settings', TEXTDOMAIN); ?></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div id="px-main">
				<!--General Settings Panel-->
				<div id="general-settings" class="panel">
					<div class="content-head">
						<h3><?php _e('General Settings', TEXTDOMAIN); ?></h3>
						<a href="#" class="save-button" >
							<div class="tooltip">
								<div><?php _e('SAVE', TEXTDOMAIN); ?></div>
							</div>
							<?php admin_img('save_icon.png', 'Save', 'save-icon'); ?>
							<?php admin_img('loading24.gif', 'Loading', 'loading-icon'); ?>
						</a>
					</div>
					<!-- Favicon Upload -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('You can specify favicon url or upload new icon with upload button.', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Custom Favicon', TEXTDOMAIN); ?></div>
						</div>
						<?php MediaInput('favicon', '', 'Upload Favicon', 'px-settings-favicon'); ?>
					</div>
					<!-- Favicon Upload End -->
					<!-- Custom logo Upload -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('You can specify logo url or upload new logo with upload button.', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Custom Logo', TEXTDOMAIN); ?></div>
						</div>
						
						<?php MediaInput('logo', '', 'Upload Logo', 'px-settings-logo'); ?>
					</div>
					<!-- Custom logo Upload -->
					<!-- Responsive Layout -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('You can enable or disable responsive layout here.', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Responsive Layout', TEXTDOMAIN); ?></div>
						</div>
						
						<?php SwitchInput('responsive_layout', 'Disabled', 'Enabled'); ?>
					</div>
					<!-- Responsive Layout End -->
					<!-- Sidebar Position -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Here you can disable the sidebar or choose the sidebar position in the pages which has sidebar.', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Pages Sidebar Position', TEXTDOMAIN); ?></div>
						</div>
						
						<?php ImageSelect('sidebar_position', array('none'=>0, 'left-side'=>1, 'right-side'=>2), 'page-sidebar'); ?>
					</div>
					<!-- Sidebar Position End -->
					
					<!-- Custom Sidebar -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Here you can add custome sidebar that later can be used in pages. You could also customize sidebar widgets in widgets panel.', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Custom Sidebar', TEXTDOMAIN); ?></div>
						</div>
						
						<?php CSVInput('custom_sidebars', 'Enter a sidebar name'); ?>
					</div>
					<!-- Custom Sidebar End -->
				</div>	
				<!--General Settings Panel End-->
				
				<!--Home Settings Panel-->
				<div id="home-settings" class="panel">
					<div class="content-head">
						<h3><?php _e('Home Page Settings', TEXTDOMAIN); ?></h3>
						<a href="#" class="save-button" >
							<div class="tooltip">
								<div><?php _e('SAVE', TEXTDOMAIN); ?></div>
							</div>
							<?php admin_img('save_icon.png', 'Save', 'save-icon'); ?>
							<?php admin_img('loading24.gif', 'Loading', 'loading-icon'); ?>
						</a>
					</div>
					
					<!-- Portfolio Slider -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Enable or disable portfolio section', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Portfolio Slider', TEXTDOMAIN); ?></div>
						</div>
						
						<?php SwitchInput('home_portfolio_slider', 'Disabled', 'Enabled'); ?>
					</div>
					<!-- Portfolio Slider End -->
					
					<!-- Special Intro -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('You can enable or disable special intro section here.', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Special Intro', TEXTDOMAIN); ?></div>
						</div>
						
						<?php SwitchInput('home_special_intro', 'Disabled', 'Enabled'); ?>
					</div>
					<!-- Special Intro End -->
					
					<!-- Slogan Text -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Enter your slogan here. You can clear the field to hide slogan section.', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Slogan Text', TEXTDOMAIN); ?></div>
						</div>
						
						<?php TextInput('home_slogan_text'); ?>
					</div>
					<!-- Slogan Text End -->
					<!-- Recent Blog Posts -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Enable or disable recent posts section before the footer', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Recent Blog Posts', TEXTDOMAIN); ?></div>
						</div>
						
						<?php SwitchInput('home_recent_posts', 'Disabled', 'Enabled'); ?>
					</div>
					<!-- Recent Blog Posts End -->
					
					<!-- Slider Enabled -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Enable or disable slider', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Slider', TEXTDOMAIN); ?></div>
						</div>
						
						<?php SwitchInput('home_slider', 'Disabled', 'Enabled'); ?>
					</div>
					
					<!-- Slider Delay -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Slide pause time in milliseconds', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Slider Delay', TEXTDOMAIN); ?></div>
						</div>
						
						<?php RangeInput('home_slider_delay', 1000, 20000, 1, ' ms'); ?>
					</div>
					
					<!-- Slider Animate In -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Slide item animate-in speed in milliseconds', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Slide Item Animate-In Speed', TEXTDOMAIN); ?></div>
						</div>
						
						<?php RangeInput('home_slider_item_in_speed', 100, 10000, 1, ' ms'); ?>
					</div>
					
					<!-- Slider Animate Out -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Slide item animate-out speed in milliseconds', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Slide Item Animate-Out Speed', TEXTDOMAIN); ?></div>
						</div>
						
						<?php RangeInput('home_slider_item_out_speed', 100, 10000, 1, ' ms'); ?>
					</div>
					
					<!-- Slider Background Animate -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Slide background fade speed in milliseconds', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Slide Background Fade Speed', TEXTDOMAIN); ?></div>
						</div>
						
						<?php RangeInput('home_slider_bg_speed', 100, 10000, 1, ' ms'); ?>
					</div>
					
					
				</div>
				<!--End Home Settings Panel-->
				
				<!-- Contact Page Settings Panel -->
				<div id="contact-settings" class="panel">
					<div class="content-head">
						<h3><?php _e('Contact Page Settings', TEXTDOMAIN); ?></h3>
						<a href="#" class="save-button" >
							<div class="tooltip">
								<div><?php _e('SAVE', TEXTDOMAIN); ?></div>
							</div>
							<?php admin_img('save_icon.png', 'Save', 'save-icon'); ?>
							<?php admin_img('loading24.gif', 'Loading', 'loading-icon'); ?>
						</a>
					</div>
					
					<!--Map Info-->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Enter your map address and zoom levels. Zoom value can be from 1 to 19 where 19 is the greatest and 1 the smallest.', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Background Map', TEXTDOMAIN); ?></div>
						</div>
						
						<?php TextInput('maps_api_key', 'Google Maps API Key', 'field-spacer'); ?>
						
						<?php TextInput('contact_map_address', 'Address', 'field-spacer'); ?>
						
						<?php 
						for($i=1; $i<=19; $i++){ 
							$zoomArr[$i] = 'Zoom ' . $i;
						} 
						
						SelectTag('contact_map_zoom', $zoomArr );
						?>

					</div>
					
					<!--Address-->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Enter your company address. You can clear the field to hide the address section', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Address', TEXTDOMAIN); ?></div>
						</div>
						
						<?php TextInput('contact_address'); ?>
					</div>
					
					<!--Contact Info-->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Enter your company contact information. You can clear the field to hide the contact information section', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Contact Information', TEXTDOMAIN); ?></div>
						</div>
						
						<?php Textarea('contact_contact_info'); ?>
						
					</div>
					
					<!--Contact Form-->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Enter your SMTP host address here. eg: smtp.domain.com', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Mail Host', TEXTDOMAIN); ?></div>
						</div>
						<?php TextInput('contact_mail_host', 'Mail Host Address'); ?>
					</div>
					
					<!--Contact Form-->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Enter SMTP port number. If not sure, leave it to default. Default port is 25', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('SMTP Port', TEXTDOMAIN); ?></div>
						</div>
						<?php TextInput('contact_mail_port', 'SMTP Port Number'); ?>
					</div>
					
					<!--Contact Form-->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Select SMTP security here (SSL and TLS). Default is none.', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('SMTP Security', TEXTDOMAIN); ?></div>
						</div>
						
						<?php $mailSecOpt = Array('' => 'None', 'ssl'=> 'SSL', 'tls' => 'TLS');
						SelectTag('contact_mail_sec', $mailSecOpt ); ?>
					</div>
					
					<!--Contact Form-->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Enable or disable SMTP authentication. Default is using authentication.', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('SMTP Authentication', TEXTDOMAIN); ?></div>
						</div>
						
						<?php $mailAuthOpt = Array('0' => 'Disabled', '1'=> 'Enabled');
						SelectTag('contact_mail_auth', $mailAuthOpt ); ?>
					</div>
					
					<!--Contact Form-->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Enter your SMTP account username here. (eg info@domain.com)', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Mail Account', TEXTDOMAIN); ?></div>
						</div>
						<?php TextInput('contact_mail_user', 'Account Username'); ?>
					</div>
					
					<!--Contact Form-->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Enter your SMTP account password here.', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Mail Account Password', TEXTDOMAIN); ?></div>
						</div>
						<?php PasswordInput('contact_mail_pass', 'Account Password'); ?>
					</div>
					
					<!--Contact Form-->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Enter your email address here. Normally its the same as your SMTP account username', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Contact Email Address', TEXTDOMAIN); ?></div>
						</div>
						<?php TextInput('contact_mailto', 'Your Email Address'); ?>
					</div>
					
					<!--Contact Form-->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Enter your email subject here.', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Contact Email Subject', TEXTDOMAIN); ?></div>
						</div>
						<?php TextInput('contact_email_subject', 'Email Subject'); ?>
					</div>
					
					<!--Contact Form-->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Contact form email template. You can use [Name] , [Sender] and [Message] tags to format your message. Please note that without [Message] tag you will not receive the message sent by user.', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Contact Email Template', TEXTDOMAIN); ?></div>
						</div>
						<?php Textarea('contact_email_template', 'Email Template'); ?>
					</div>
					
				</div>
				<!-- Contact Page Settings Panel End -->
				<!-- Blog Page Settings -->
				<div id="blog-settings" class="panel">
					<div class="content-head">
						<h3><?php _e('Blog Page Settings', TEXTDOMAIN); ?></h3>
						<a href="#" class="save-button" >
							<div class="tooltip">
								<div><?php _e('SAVE', TEXTDOMAIN); ?></div>
							</div>
							<?php admin_img('save_icon.png', 'Save', 'save-icon'); ?>
							<?php admin_img('loading24.gif', 'Loading', 'loading-icon'); ?>
						</a>
					</div>
					<!-- Blog Layout -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Here you can disable the sidebar or choose the sidebar position in the pages which have sidebar.', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Sidebar Position', TEXTDOMAIN); ?></div>
						</div>
						
						<?php ImageSelect('blog_sidebar_position', array('none'=>0, 'left-side'=>1, 'right-side'=>2), 'page-sidebar'); ?>
					</div>
					<!-- Blog Layout End -->
					<!-- Blog Intro Text -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Enter default blog intro and description here.', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Blog Intro', TEXTDOMAIN); ?></div>
						</div>
						
						<?php TextInput('blog_intro_text', '', 'field-spacer'); ?>
						
						<?php TextInput('blog_intro_desc', 'Enter your description here'); ?>
					</div>
					<!-- Blog Intro Text End -->
					
					<!-- Load More Button -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Enable or disable load more button in post list', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Load More Button', TEXTDOMAIN); ?></div>
						</div>
						
						<?php SwitchInput('blog_load_more', 'Off', 'On'); ?>
					</div>
					<!-- Load More Button End -->
					
				</div>	
				<!-- Blog Page Settings End -->
				
				<!-- Portfolio Page Settings -->
				<div id="portfolio-settings" class="panel">
					<div class="content-head">
						<h3><?php _e('Portfolio Page Settings', TEXTDOMAIN); ?></h3>
						<a href="#" class="save-button" >
							<div class="tooltip">
								<div><?php _e('SAVE', TEXTDOMAIN); ?></div>
							</div>
							<?php admin_img('save_icon.png', 'Save', 'save-icon'); ?>
							<?php admin_img('loading24.gif', 'Loading', 'loading-icon'); ?>
						</a>
					</div>

					<!-- Portfolio Layout -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Swith between fixed and masonary portfolio layouts here.', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Portfolio List Layout', TEXTDOMAIN); ?></div>
						</div>
						
						<?php SelectTag('portfolio_list_layout', array("1"=> 'Masonary', "2"=>'Fixed')); ?>
					</div>
					<!-- Portfolio Layout End -->
					
					<!-- Portfolio Layout -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Show or hide portfolio layout controls', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Layout Controls', TEXTDOMAIN); ?></div>
						</div>
						
						<?php SwitchInput('portfolio_layout_controls', 'Hidden', 'Visible'); ?>
					</div>
					<!-- Portfolio Layout End -->
					
					<!-- Portfolio Layout -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Select number of related portfolio items in item details page', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Related Portfolios Count', TEXTDOMAIN); ?></div>
						</div>
						
						<?php RangeInput('portfolio_related_posts', 1, 15); ?>
					</div>
					<!-- Portfolio Layout End -->
					
				</div>	
				<!-- Portfolio Page Settings End -->
				
				<!-- Footer Settings -->
				<div id="footer-settings" class="panel">
					<div class="content-head">
						<h3><?php _e('Footer Settings', TEXTDOMAIN); ?></h3>
						<a href="#" class="save-button" >
							<div class="tooltip">
								<div><?php _e('SAVE', TEXTDOMAIN); ?></div>
							</div>
							<?php admin_img('save_icon.png', 'Save', 'save-icon'); ?>
							<?php admin_img('loading24.gif', 'Loading', 'loading-icon'); ?>
						</a>
					</div>
					
					<!-- Disable Footer -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('You can enable or disable footer in this section.', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Footer', TEXTDOMAIN); ?></div>
						</div>
						
						<?php SwitchInput('footer', 'Disabled', 'Enabled'); ?>
					</div>
					<!-- Disable Footer -->
					
					<!-- Footer Widget Count -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Select how many widget areas you like to have in footer', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Footer Widget Areas', TEXTDOMAIN); ?></div>
						</div>
						
						<?php ImageSelect('footer_widgets', array('one'=>1, 'two'=>2, 'three'=>3, 'four'=>4), 'footer-widgets'); ?>
					</div>	
					
					<!-- Footer Copyright Text -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Enter the copyright text in footer here. You can clear the field to hide copyright text from footer section.', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Copyright Text', TEXTDOMAIN); ?></div>
						</div>
						
						<?php TextInput('footer_copyright'); ?>
					</div>
					<!-- Footer Copyright Text End -->
					<!-- Disable Social Networks -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('You can enable or disable social network area in footer section here.', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Social Networks', TEXTDOMAIN); ?></div>
						</div>
						
						<?php SwitchInput('footer_social_networks', 'Disabled', 'Enabled'); ?>
					</div>	
					<!-- Disable Social Networks End -->
					<!-- Facebook URL -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Enter your Facebook address here. You can clear the field to hide Facebook icon from social networks section.', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Facebook Address', TEXTDOMAIN); ?></div>
						</div>
						
						<?php TextInput('social_facebook_address'); ?>
					</div>
					<!-- Facebook URL End -->
					<!-- Twitter URL -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Enter your Twitter address here. You can clear the field to hide Twitter icon from social networks section.', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Twitter Address', TEXTDOMAIN); ?></div>
						</div>
						
						<?php TextInput('social_twitter_address'); ?>
					</div>
					<!-- Twitter URL End -->
					<!-- Dribbble URL -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Enter your Dribbble address here. You can clear the field to hide Dribbble icon from social networks section.', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Dribbble Address', TEXTDOMAIN); ?></div>
						</div>
						
						<?php TextInput('social_dribbble_address'); ?>
					</div>
					<!-- Dribbble URL End -->
					<!-- Vimeo URL -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Enter your Vimeo address here. You can clear the field to hide Vimeo icon from social networks section.', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Vimeo Address', TEXTDOMAIN); ?></div>
						</div>
						
						<?php TextInput('social_vimeo_address'); ?>
					</div>
					<!-- Vimeo URL End -->
					<!-- YouTube URL -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Enter your YouTube address here. You can clear the field to hide YouTube icon from social networks section.', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('YouTube Address', TEXTDOMAIN); ?></div>
						</div>
						
						<?php TextInput('social_youtube_address'); ?>
					</div>
					<!-- YouTube URL End -->
					<!-- GooglePlus URL -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Enter your GooglePlus address here. You can clear the field to hide GooglePlus icon from social networks section.', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('GooglePlus Address', TEXTDOMAIN); ?></div>
						</div>
						
						<?php TextInput('social_googleplus_address'); ?>
					</div>
					<!-- GooglePlus URL End -->
					<!-- Digg URL -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Enter your Digg address here. You can clear the field to hide Digg icon from social networks section.', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Digg Address', TEXTDOMAIN); ?></div>
						</div>
						
						<?php TextInput('social_digg_address'); ?>
					</div>
					<!-- Digg URL End -->
					<!-- Tumblr URL -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Enter your Tumblr address here. You can clear the field to hide Tumblr icon from social networks section.', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Tumblr Address', TEXTDOMAIN); ?></div>
						</div>
						
						<?php TextInput('social_tumblr_address'); ?>
					</div>
					<!-- Tumblr URL End -->
					<!-- Linkedin URL -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Enter your Linkedin address here. You can clear the field to hide Linkedin icon from social networks section.', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Linkedin Address', TEXTDOMAIN); ?></div>
						</div>
						
						<?php TextInput('social_linkedin_address'); ?>
					</div>
					<!-- Linkedin URL End -->
					<!-- Forrst URL -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Enter your Forrst address here. You can clear the field to hide Forrst icon from social networks section.', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Forrst Address', TEXTDOMAIN); ?></div>
						</div>
						
						<?php TextInput('social_forrst_address'); ?>
					</div>
					<!-- Forrst URL End -->
					<!-- Sharethis URL -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Enter your Sharethis address here. You can clear the field to hide Sharethis icon from social networks section.', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Sharethis Address', TEXTDOMAIN); ?></div>
						</div>
						
						<?php TextInput('social_sharethis_address'); ?>
					</div>
					<!-- Sharethis URL End -->
					<!-- Rss URL -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Enter your Rss Feed address here. You can clear the field to hide Rss Feed icon from social networks section.', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Rss Feed Address', TEXTDOMAIN); ?></div>
						</div>
						
						<?php TextInput('rss_feed_address'); ?>
					</div>
					<!-- Rss URL End -->
					<!-- Quora URL -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Enter your Quora address here. You can clear the field to hide Quora icon from social networks section.', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Quora Address', TEXTDOMAIN); ?></div>
						</div>
						
						<?php TextInput('social_quora_address'); ?>
					</div>
					<!-- Quora URL End -->
					<!-- Lastfm URL -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Enter your Lastfm address here. You can clear the field to hide Lastfm icon from social networks section.', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Lastfm Address', TEXTDOMAIN); ?></div>
						</div>
						
						<?php TextInput('social_lastfm_address'); ?>
					</div>
					<!-- Lastfm URL End -->
					<!-- Flickr URL -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Enter your Flickr address here. You can clear the field to hide Flickr icon from social networks section.', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Flickr Address', TEXTDOMAIN); ?></div>
						</div>
						
						<?php TextInput('social_flickr_address'); ?>
					</div>
					<!-- Flickr URL End -->
					<!-- Myspace URL -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Enter your Myspace address here. You can clear the field to hide Myspace icon from social networks section.', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Myspace Address', TEXTDOMAIN); ?></div>
						</div>
						
						<?php TextInput('social_myspace_address'); ?>
					</div>
					<!-- Myspace URL End -->
				</div>	
				<!-- Footer Settings End -->
				<!-- Skin Managment Settings -->
				<div id="skin-settings" class="panel">
					<div class="content-head">
						<h3><?php _e('Skin Settings', TEXTDOMAIN); ?></h3>
						<a href="#" class="save-button" >
							<div class="tooltip">
								<div><?php _e('SAVE', TEXTDOMAIN); ?></div>
							</div>
							<?php admin_img('save_icon.png', 'Save', 'save-icon'); ?>
							<?php admin_img('loading24.gif', 'Loading', 'loading-icon'); ?>
						</a>
					</div>
					<!-- Theme Color Version -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Switch between Dark and Light version of the theme.',TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Light/Dark Skins',TEXTDOMAIN); ?></div>
						</div>
						
						<?php SwitchInput('theme_skin', 'Dark', 'Light'); ?>
					</div>
					<!-- Theme Color Version End -->
					<!-- Theme Color Variation -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Choose your skin color from several ready to use skins here.',TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Theme Skins',TEXTDOMAIN); ?></div>
						</div>
						
						<?php SelectTag('theme_skin_color', 
						array("cyan"=> 'Cyan', 
							  "purple"=>'Purple',
							  "blue"=>'Blue',
							  "green"=>'Green',
							  "red"=>'Red',
							  "yellow"=>'Yellow',
							  "orange"=>'Orange')
						); ?>
					</div>
					<!-- Theme Color Variation End -->
					
					<!-- Links Color -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Choose links color to override current skin color settings.', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Links Color', TEXTDOMAIN); ?></div>
						</div>
						
						<?php ColorInput('links_color'); ?>
					</div>
					<!-- Links Color End-->
					
					<!-- Links Hover Color -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Choose links hover color to override current skin color settings.', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Links Hover Color', TEXTDOMAIN); ?></div>
						</div>
						
						<?php ColorInput('links_hover_color'); ?>
					</div>
					<!-- Links Color End-->
					
					<!-- Text Selection Color -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Choose text selection color to override current skin color settings.', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Selection Highlight Color', TEXTDOMAIN); ?></div>
						</div>
						
						<?php ColorInput('selection_color'); ?>
					</div>
					<!-- Text Selection Color End-->
					
				</div>	
				<!-- Skin Managment Settings End -->
				<!-- Advanced Option -->
				<div id="advanced-settings" class="panel">
					<div class="content-head">
						<h3><?php _e('Advanced Settings', TEXTDOMAIN); ?></h3>
						<a href="#" class="save-button" >
							<div class="tooltip">
								<div><?php _e('SAVE', TEXTDOMAIN); ?></div>
							</div>
							<?php admin_img('save_icon.png', 'Save', 'save-icon'); ?>
							<?php admin_img('loading24.gif', 'Loading', 'loading-icon'); ?>
						</a>
					</div>
					<!-- Advanced JS Setting -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Enter your custom javascript codes here.(eg Google Analytics)', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Custom Javascript', TEXTDOMAIN); ?></div>
						</div>
						
						<?php Textarea('custom_javascript'); ?>
					</div>	
					<!-- Advanced JS Setting End -->
					<!-- Advanced CSS Setting -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('Enter your custom css codes here to override or add to the default stylesheet.', TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Custom CSS', TEXTDOMAIN); ?></div>
						</div>

						<?php Textarea('custom_css'); ?>
					</div>	
					<!-- Advanced CSS Setting End -->
				</div>	
				<!-- Advanced Option End -->

				<!-- Import Settings -->
				<div id="import-settings" class="panel">
					<div class="content-head">
						<h3><?php _e('Import Dummy Content', TEXTDOMAIN); ?></h3>
						<a href="#" class="save-button" >
							<div class="tooltip">
								<div><?php _e('SAVE', TEXTDOMAIN); ?></div>
							</div>
							<?php admin_img('save_icon.png', 'Save', 'save-icon'); ?>
							<?php admin_img('loading24.gif', 'Loading', 'loading-icon'); ?>
						</a>
					</div>
					
					<!-- Enable Demo Content Import -->
					<div class="section">
						<div class="section-head">
							<div class="section-tooltip"><?php _e('If you are new to wordpress or have problems creating posts or pages that look like the theme preview you can import dummy posts and pages here that will definitley help to understand how those tasks are done. Please note that this will override theme options as well, so be careful.',TEXTDOMAIN); ?></div>
							<div class="label"><?php _e('Import Dummy Data',TEXTDOMAIN); ?></div>
						</div>
						
						<?php SwitchInput('import_dummy_data', 'Disabled', 'Import Data'); ?>
					</div>
				</div>	
				
			</div>
		</div>
		<!--End Main-->
	</div>
</div>