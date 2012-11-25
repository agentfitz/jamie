<?php

/*-----------------------------------------------------------------------------------

	Theme Shortcodes

-----------------------------------------------------------------------------------*/


/*-----------------------------------------------------------------------------------*/
/*	Row, Column and Offset Shortcodes
/*-----------------------------------------------------------------------------------*/

/* Row */

function px_row( $atts, $content = null ) {
   return '<div class="row">' . do_shortcode($content) . '</div>';
}

add_shortcode('row', 'px_row');

/* One Twelve Column */

function px_span1( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'offset'   => ''
    ), $atts));
	
   return "<div class=\"span1 $offset\">" . do_shortcode($content) . "</div>";
}

add_shortcode('span1', 'px_span1');

/* Two Twelve Column */

function px_span2( $atts, $content = null ) {
   	extract(shortcode_atts(array(
		'offset'   => ''
    ), $atts));
	
   return "<div class=\"span2 $offset\">" . do_shortcode($content) . "</div>";
}

add_shortcode('span2', 'px_span2');

/* Three Twelve Column */

function px_span3( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'offset'   => ''
    ), $atts));
	
   return "<div class=\"span3 $offset\">" . do_shortcode($content) . "</div>";
}

add_shortcode('span3', 'px_span3');

/* Four Twelve Column */

function px_span4( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'offset'   => ''
    ), $atts));
	
   return "<div class=\"span4 $offset\">" . do_shortcode($content) . "</div>";
}

add_shortcode('span4', 'px_span4');

/* Five Twelve Column */

function px_span5( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'offset'   => ''
    ), $atts));
	
   return "<div class=\"span5 $offset\">" . do_shortcode($content) . "</div>";
}

add_shortcode('span5', 'px_span5');

/* Six Twelve Column */

function px_span6( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'offset'   => ''
    ), $atts));
	
   return "<div class=\"span6 $offset\">" . do_shortcode($content) . "</div>";
}

add_shortcode('span6', 'px_span6');

/* Seven Twelve Column */

function px_span7( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'offset'   => ''
    ), $atts));
	
   return "<div class=\"span7 $offset\">" . do_shortcode($content) . "</div>";
}

add_shortcode('span7', 'px_span7');

/* Eight Twelve Column */

function px_span8( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'offset'   => ''
    ), $atts));
	
   return "<div class=\"span8 $offset\">" . do_shortcode($content) . "</div>";
}

add_shortcode('span8', 'px_span8');

/* Nine Twelve Column */

function px_span9( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'offset'   => ''
    ), $atts));
	
   return "<div class=\"span9 $offset\">" . do_shortcode($content) . "</div>";
}

add_shortcode('span9', 'px_span9');

/* Ten Twelve Column */

function px_span10( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'offset'   => ''
    ), $atts));
	
   return "<div class=\"span10 $offset\">" . do_shortcode($content) . "</div>";
}

add_shortcode('span10', 'px_span10');

/* Eleven Twelve Column */

function px_span11( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'offset'   => ''
    ), $atts));
	
   return "<div class=\"span11 $offset\">" . do_shortcode($content) . "</div>";
}

add_shortcode('span11', 'px_span11');

/* Twelve Twelve Column */

function px_span12( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'offset'   => ''
    ), $atts));
	
   return "<div class=\"span12 $offset\">" . do_shortcode($content) . "</div>";
}

add_shortcode('span12', 'px_span12');

/*-----------------------------------------------------------------------------------*/
/*	Buttons
/*-----------------------------------------------------------------------------------*/


function px_button( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'style'   => 'btn_default',
		'url'     => '#',
    ), $atts));
	//Available styles: btn_default , button_tailed
	
   return '<a class="btn ' . $style . '" href="'.$url.'"><span class="text">' . do_shortcode($content) .'</span><span class="tail"></span></a>';
}

add_shortcode('button', 'px_button');


/*-----------------------------------------------------------------------------------*/
/*	Lists
/*-----------------------------------------------------------------------------------*/


function px_custom_list( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'type'   => 'disk_list',
    ), $atts));
	//Available styles: disk_list , arrow_list , arrow2_list , arrow3_list , check_list, plus_list

	$list = str_replace('<ul>','<ul class="' .$type. '">', do_shortcode($content));
    return $list;
}

add_shortcode('list', 'px_custom_list');


/*-----------------------------------------------------------------------------------*/
/*	Dropcaps
/*-----------------------------------------------------------------------------------*/


function px_dropcap( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'style'   => 'dropcap',
    ), $atts));
	//Available styles: dropcap , dropcap2 , dropcap3
	
   return '<span class="'.$style.'">' . do_shortcode($content) . '</span>';
}

add_shortcode('dropcap', 'px_dropcap');


/*-----------------------------------------------------------------------------------*/
/*	Pull Quotes
/*-----------------------------------------------------------------------------------*/

/* Pullquote */

function px_pullquote( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'style'   => 'pullquote',
    ), $atts));
	//Available styles: pullquote , pullquote_right
	
   return '<span class="'.$style.'">' . do_shortcode($content) . '</span>';
}

add_shortcode('pullquote', 'px_pullquote');

/*-----------------------------------------------------------------------------------*/
/*	Highlights
/*-----------------------------------------------------------------------------------*/

function px_highlight( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'style'   => 'highlight_orange',
    ), $atts));
	//Available styles: highlight_orange , highlight_gray , highlight_black
	
   return '<span class="'.$style.'">' . do_shortcode($content) . '</span>';
}

add_shortcode('highlight', 'px_highlight');

/*-----------------------------------------------------------------------------------*/
/*	Accordions
/*-----------------------------------------------------------------------------------*/

function px_toggle( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'status'   => 'toggle_closed',
		'title'    => '',
		'padding'  => 'content_pad',
		'separator'  => 'yes'
    ), $atts));
	//Availabel types: toggle1 , toggle2
	
	if($padding !== 'content_pad')
		$padding = '';
		
	$toggle = '';
	$sep = $separator == 'yes' ? '<div class="separator1"></div>' : '';
	
	//Div accordion_header
	$toggle_header = '<div class="toggle_header"><h3 class="toggle_title"><span></span><a href="#"> '.$title.' </a></h3><div class="clearfix"></div></div>';
	
	//Div accordion_content
	$toggle_content = '<div class="toggle_content '.$padding.'">' . do_shortcode($content) . '</div>';
	
	//Wrap the whole thing together
	$toggle .= '<div class="toggle ' . $status . ' ">' . $toggle_header . $toggle_content . $sep . '</div>'; 
	
   return $toggle;
}

add_shortcode('toggle', 'px_toggle');

/*-----------------------------------------------------------------------------------*/
/*	Message Boxes
/*-----------------------------------------------------------------------------------*/

function px_messagebox( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'style'          => 'messageBox1',
		'title'          => '',
		'button_title'   => 'button title',
		'url'            => '#',
		'btn_style'      => 'btn_default'
    ), $atts));
	
   //Available styles: messageBox1 , messageBox2 , messageBox3
   
   $msgbox='';
   $msgbox_button = '';
   
   //if url is null then button won't be shown
   if(strlen($url) != 0)
		$msgbox_button= '<a class="btn '.$btn_style.'" href="'.$url.'"><span class="text">'.$button_title.'</span><span class="tail"></span></a>';
		
	if($style=='messageBox3')
		return '<div class="messageBox '.$style.'"><span class="head">'.$title.'</span> <p class="text">' . do_shortcode($content) . '</p></div>';
	else
		return '<div class="messageBox '.$style.'"><span class="content">' . do_shortcode($content) . '</span>'.$msgbox_button.'</div>';
}

add_shortcode('messagebox', 'px_messagebox');


/*-----------------------------------------------------------------------------------*/
/*	Separators
/*-----------------------------------------------------------------------------------*/

function px_separator() {
   return '<div class="separator1"></div>';
}

add_shortcode('separator', 'px_separator');


/*-----------------------------------------------------------------------------------*/
/*	Alerts
/*-----------------------------------------------------------------------------------*/

function px_alert( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'style'   => 'alert_info',
    ), $atts));
	//Available styles: alert_info , alert_danger , alert_success , alert_warning
	
   return '<div class="alert '.$style.'">'. do_shortcode($content) .'</div>';
}

add_shortcode('alert', 'px_alert');

/*-----------------------------------------------------------------------------------*/
/*	Tabs
/*-----------------------------------------------------------------------------------*/

function px_tab_group( $atts, $content ){

	extract(shortcode_atts(array(
	'title' => 'Tab %d'
	), $atts));
	
	//Init
	$GLOBALS['tabs'] = array();
	
	do_shortcode( $content );
	
	$tabs = array();
	$panes = array();
	
	foreach( $GLOBALS['tabs'] as $tab ){
		$selected = $tab['selected'] == 'yes' ? 'selected' : '';
		$id = $tab['id'];
		$title = $tab['title'];
		$cnt = $tab['content'];
		
		$tabs[] = "<li><a class=\"clearfix $selected\" href=\"#tab$id\"><span>$title</span></a></li>";

		$panes[] = "<div class=\"tab_content\" id=\"tab$id\">$cnt</div> ";
	}
	
	$return = "<div class=\"tab tab1\">\n<ul class=\"tab_head\">\n" . 
			  implode( "\n", $tabs ) . 
			  "</ul>\n<div class=\"clearfix\"></div>\n" .
			  implode( "\n", $panes ) .
			  "</div>";
	
	return $return;
}

add_shortcode( 'tabgroup', 'px_tab_group' );

function px_tab( $atts, $content ){

	extract(shortcode_atts(array(
	'title' => 'Tab %d',
	'selected' => ''
	), $atts));

	if(!array_key_exists('all_tabs_count',$GLOBALS))
		$GLOBALS['all_tabs_count'] = 0;
	
	$id = $GLOBALS['all_tabs_count'];
	$GLOBALS['tabs'][] = array( 'title' => sprintf( $title, count($GLOBALS['tabs']) + 1 ), 'content' => $content, 'id' => $id, 'selected' => $selected );

	$GLOBALS['all_tabs_count']++;
}

add_shortcode( 'tab', 'px_tab' );

/*-----------------------------------------------------------------------------------*/
/*	Social Icons
/*-----------------------------------------------------------------------------------*/

function px_social_link( $atts, $content ){

	extract(shortcode_atts(array(
	'url' => '#',
	'type' => ''
	), $atts));

	$GLOBALS['social_links'][] = "<a href=\"$url\" class=\"$type\">$type</a>";
}

//Social Link
add_shortcode( 'sl', 'px_social_link' );

function px_social_link_group( $atts, $content ){

	//Init
	$GLOBALS['social_links'] = array();
	
	do_shortcode( $content );

	return '<div class="social_icons clearfix">' . implode("\n", $GLOBALS['social_links'] ) . '</div>';
}

add_shortcode( 'socialgroup', 'px_social_link_group' );

?>
