<?php

	function comment_fields($fields) {
	
		$commenter = wp_get_current_commenter();
		
		$fields['author'] = "<div class=\"text_input\"><input name=\"author\" value=\"" . esc_attr($commenter['comment_author']) . "\" placeholder=\"" . __('Your Name', TEXTDOMAIN) . "\" type=\"text\" tabindex=\"1\"></div>";
		
		$fields['email'] = "<div class=\"text_input\"><input name=\"email\" value=\"" . esc_attr($commenter['comment_author_email']). "\" placeholder=\"" . __('Email Address (never published)', TEXTDOMAIN) . "\" type=\"text\" tabindex=\"2\"></div>";
		
		$fields['url'] = '<div  class="text_input"><input name="url" value="' . esc_attr($commenter['comment_author_url']). '" placeholder="' . __('Website (Optional)', TEXTDOMAIN).'" type="text" tabindex="3"  ></div>';
		
		return $fields;
	}
	add_filter('comment_form_default_fields','comment_fields');

	//Comment styling

	function theme_comment($comment, $args, $depth) {

		$isByAuthor = false;

		if($comment->comment_author_email == get_the_author_meta('email')) {
			$isByAuthor = true;
		}

		$GLOBALS['comment'] = $comment; ?>
		
		<li id="li-comment-<?php comment_ID() ?>">
		 
			<div id="comment-<?php comment_ID(); ?>" <?php comment_class('clearfix'); ?>>
				<div class="hidden comment_id"><?php comment_ID(); ?></div>
				<div class="comment_head">
					<div class="comment_image">
						<?php echo get_avatar($comment,$size='80', THEME_IMAGES_URI . '/commnet_avatar1.jpg'); ?>
						<div class="mask"></div>
					</div>
					<div class="meta">
						<?php printf(__('<cite>%s</cite> <span class="says">says:</span>', TEXTDOMAIN), get_comment_author_link()) ?>
						<?php if($isByAuthor) { ?><span class="author-tag"><?php _e('(Author)',TEXTDOMAIN) ?></span><?php } ?>
						<br />
						<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s', TEXTDOMAIN), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)', TEXTDOMAIN),'  ','') ?><br /><br /><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
					</div>
				</div>
				
				<div class="comment_body clearfix">
					<?php comment_text() ?>
				</div>
		  
		 </div>

	<?php
	}

	function theme_list_pings($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment; ?>
		<li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?>
	<?php }

	
	// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', TEXTDOMAIN) ?></p>
	<?php
		return;
	}

/*-----------------------------------------------------------------------------------*/
/*	Display the comments + Pings
/*-----------------------------------------------------------------------------------*/

if ( have_comments() ) { // if there are comments ?>
	<div class="comments-wrap">
	
		<h3 id="comments"><?php comments_number(__('No Comments', TEXTDOMAIN), __('One Comment', TEXTDOMAIN), __('% Comments', TEXTDOMAIN)); ?></h3>
		<div class="separator"></div>
	
		<?php if ( ! empty($comments_by_type['comment']) ) { // if there are normal comments ?>

			<ul class="comment_list">
			<?php wp_list_comments('type=comment&avatar_size=30&callback=theme_comment'); ?>
			</ul>

		<?php } // if there are normal comments ?>

		<?php if ( ! empty($comments_by_type['pings']) ) { // if there are pings ?>

			<h4 id="pings"><?php _e('Trackbacks for this post', TEXTDOMAIN) ?></h4>

			<ol class="ping_list">
			<?php wp_list_comments('type=pings&callback=theme_list_pings'); ?>
			</ol>

		<?php } // if there are pings ?>

			<div class="navigation">
				<div class="alignleft"><?php previous_comments_link(); ?></div>
				<div class="alignright"><?php next_comments_link(); ?></div>
			</div>
	</div>
<?php
	
	//Deal with closed comments	
	if (!comments_open()) { // if the post has comments but comments are now closed ?>
		
			<?php if (is_single()) { ?>
				<p class="nocomments"><?php _e('Comments are now closed.', TEXTDOMAIN); ?></p>
			<?php 
			} else{ ?>
				<p class="nocomments"><?php _e('Comments are now closed for this article.', TEXTDOMAIN); ?></p>
			<?php } ?> 
		
	<?php }
	
}
else //There are no comments
{
	//If there are no comments so far and comments are open
	if(comments_open())
	{
		if (is_single()) { ?>
			<p class="nocomments"><?php _e('No comments so far.', TEXTDOMAIN); ?></p>
		<?php 
		} else{ ?>
			<p class="nocomments"><?php _e('There are no comments for this article.', TEXTDOMAIN); ?></p>
		<?php 
		}  
	}
	else
	{
		if (is_single()) { ?>
			<p class="nocomments"><?php _e('Comments are closed.', TEXTDOMAIN); ?></p>
		<?php 
		} else{ ?>
			<p class="nocomments"><?php _e('Comments are closed for this article.', TEXTDOMAIN); ?></p>
		<?php 
		}  
	}
	
} // if there are comments  
	
	//Comment Form
	if ( !comments_open() ) return; 
?>
<div id="respond-wrap">
<?php comment_form(array( 
'comment_notes_before' => '<p>'. __('Your email address will not be published. Website Field Is Optional', TEXTDOMAIN) .'</p>',
'comment_field'=>'<div class="textarea_input"><textarea rows="10" cols="58" name="comment" value="" placeholder="' . __('Your Message', TEXTDOMAIN).  '" tabindex="4"></textarea></div>',
'comment_notes_after' => ''
)); ?>
</div>