<?php
	function GetPageSidebar()
	{
		$sidebar = get_post_meta(get_the_ID(), 'sidebar', true);
		
		if($sidebar == '')
			return dynamic_sidebar('Page Sidebar');
		else
			return dynamic_sidebar($sidebar);
	}
?>
	<div class="sidebar span3">
		<?php 
		if(!is_page()) 
		{
		/* Widgetised Area */ 
		if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar() ) { ?>

		<?php 
		}
		}
		else
		{
		/* Widgetised Area */ 
		if ( !function_exists( 'dynamic_sidebar' ) || !GetPageSidebar() ) { ?>
			
		<?php
		}
		}
		?>
	</div>

