<?php
/* 
	Options	Functions
	Author: Tyler Cuningham
	Establishes the theme options functions.
	Copyright (C) 2011 CyberChimps
	Version 2.0
	
*/

/* Site Title Color */

function add_menu_color() {

	global $themename, $themeslug, $options;
	$root = get_template_directory_uri(); 

	if ($options[$themeslug.'_menu_color'] != "picker") {
	
		$menucolor = $options[$themeslug.'_menu_color'];
		
		echo '<style type="text/css">';
		echo "#navbackground {background: url($root/images/menu/$menucolor.png) no-repeat left top}";
		echo '</style>';
		
	}
	
	elseif ($options[$themeslug.'_menu_color'] == "picker") {
	
		$menucolor = $options[$themeslug.'_custom_menu_color']; 
			
		echo '<style type="text/css">';
		echo "#navbackground {height: 35px; border: 1px solid #333; -moz-border-radius: 3px; border-radius: 3px; -moz-box-shadow:0 0 3px #444; -webkit-box-shadow:0 0 3px #444; box-shadow:0 0 3px #444;background-color: #$menucolor;}";
		echo '</style>';
	}
	
}
add_action( 'wp_head', 'add_menu_color');

function add_sitetitle_color() {

	global $themename, $themeslug, $options;

	if (isset($options[$themeslug.'_sitetitle_color']) == "") {
		$sitetitle = '717171';
	}
	
	else {
		$sitetitle = $options[$themeslug.'_sitetitle_color']; 
	}		
	
		echo '<style type="text/css">';
		echo ".sitename {color: #$sitetitle;}";
		echo '</style>';
		
}
add_action( 'wp_head', 'add_sitetitle_color');

/* Link Color */

function add_link_color() {

	global $themename, $themeslug, $options;

	if (isset($options[$themeslug.'_link_color']) == "") {
		$link = '717171';
	}

	else { 
		$link = $options[$themeslug.'_link_color']; 
	}				
	
		echo '<style type="text/css">';
		echo "a {color: #$link;}";
		echo '</style>';
		
}
add_action( 'wp_head', 'add_link_color');


/* Menu Link Color */

function add_menulink_color() {

	global $themename, $themeslug, $options;

	if (isset($options[$themeslug.'_menulink_color']) == "") {
		$sitelink = 'FFFFFF';
	}
	
	else{ 
		$sitelink = $options[$themeslug.'_menulink_color']; 
	}	
		
		echo '<style type="text/css">';
		echo ".sf-menu a {color: #$sitelink;}";
		echo '</style>';
}
add_action( 'wp_head', 'add_menulink_color');

/* Tagline Color */

function add_tagline_color() {

	global $themename, $themeslug, $options;

	if (isset($options[$themeslug.'_tagline_color']) == "") {
		$tagline = 'FFFFFF';
	}
	
	else { 
		$tagline = $options[$themeslug.'_tagline_color']; 
	}		
		
		echo '<style type="text/css">';
		echo ".description {color: #$tagline;}";
		echo '</style>';

}
add_action( 'wp_head', 'add_tagline_color');

/* Post Title Color */

function add_posttitle_color() {

	global $themename, $themeslug, $options;

	if (isset($options[$themeslug.'_posttitle_color']) == "") {
		$posttitle = '717171';
	}
	else {
		$posttitle = $options[$themeslug.'_posttitle_color']; 
	}		
		
		echo '<style type="text/css">';
		echo ".posts_title a {color: #$posttitle;}";
		echo '</style>';

}
add_action( 'wp_head', 'add_posttitle_color');

/* Hide search/home button */

function fullwidth_nav() {

	global $themename, $themeslug, $options;

	if ($options[$themeslug.'_hide_search'] == "1" && $options[$themeslug.'_hide_home_icon'] == "") {
		
		echo '<style type="text/css">';
		echo "#searchbar {display: none;}";
		echo "#sfwrapper {width: 91%;}";
		echo '</style>';
	}

	elseif ($options[$themeslug.'_hide_search'] == "" && $options[$themeslug.'_hide_home_icon'] == "1" ) {

		echo '<style type="text/css">';
		echo "#homebutton {display: none;}";
		echo "#sfwrapper {width: 79%;}";
		echo '</style>';
	}

	elseif ($options[$themeslug.'_hide_search'] == "1" && $options[$themeslug.'_hide_home_icon'] == "1" ) {

		echo '<style type="text/css">';
		echo "#homebutton {display: none;}";
		echo "#searchbar {display: none;}";
		echo "#sfwrapper {width: 100%;}";
		echo '</style>';
	}

}
add_action( 'wp_head', 'fullwidth_nav');

/* Footer Color */

function add_footer_color() {

	global $themename, $themeslug, $options;

	if (isset($options[$themeslug.'_footer_color']) != "" && $options[$themeslug.'_footer_color'] != "222222" ) {
	
		$footercolor = $options[$themeslug.'_footer_color']; 
	
	
		echo '<style type="text/css">';
		echo "#footer {background: #$footercolor;}";
		echo '</style>';
	}
}
add_action( 'wp_head', 'add_footer_color');

/* Menu Font */
 
function add_menu_font() {
		
	global $themename, $themeslug, $options;	
		
	if ($options[$themeslug.'_menu_font'] == "") {
		$font = 'Cantarell';
	}		
		
	elseif ($options[$themeslug.'_custom_menu_font'] != "") {
		$font = $options[$themeslug.'_custom_menu_font'];	
	}
	
	else {
		$font = $options[($themeslug.'_menu_font')]; 
	}
	
		$fontstrip =  ereg_replace("[^A-Za-z0-9]", " ", $font );
	
		echo "<link href='http://fonts.googleapis.com/css?family=$font' rel='stylesheet' type='text/css' />";
		echo '<style type="text/css">';
		echo ".sf-menu a {font-family: $fontstrip;}";
		echo '</style>';
}
add_action( 'wp_head', 'add_menu_font');

/* Widget title background */
 
function widget_title_bg() {

	global $themename, $themeslug, $options;
	$root = get_template_directory_uri();
	
	if ($options[$themeslug.'_widget_title_bg'] == "1") {
		
		echo '<style type="text/css">';
		echo ".box-widget-title {background: url($root/images/wtitlebg.png) no-repeat center top; margin: -6px -5px 5px -5px;}";
		echo ".sidebar-widget-title {background: url($root/images/wtitlebg.png) no-repeat center top; margin: -6px -5px 5px -5px;}";
		echo '</style>';

	}
}
add_action( 'wp_head', 'widget_title_bg');

/* Feature Caption Style */

function slider_caption_style() {

	global $themename, $themeslug, $options;
		
	if ($options[$themeslug.'_caption_style'] == "right")  {

		echo '<style type="text/css">';
		echo ".nivo-caption {position: relative; float: right; height: 330px; width: 320px;}";
		echo '</style>';

	}
		
	elseif ($options[$themeslug.'_caption_style'] == "left") {	
			
		echo '<style type="text/css">';
		echo ".nivo-caption {height: 330px; width: 320px;}";
		echo '</style>';	

	}
}
add_action( 'wp_head', 'slider_caption_style');

/* Hide Slider Navigation */

function hide_slider_navigation() {

	global $themename, $themeslug, $options;
		
	if ($options[$themeslug.'_slider_nav'] == "none")  {
			
		echo '<style type="text/css">';
		echo ".nivo-controlNav {display: none;}";
		echo '</style>';

	}	
}
add_action( 'wp_head', 'hide_slider_navigation');

/* Custom CSS */

function custom_css() {

	global $themename, $themeslug, $options;
	
	$custom = $options[$themeslug.'_css_options'];
	echo '<style type="text/css">' . "\n";
	echo custom_css_filter ( $custom ) . "\n";
	echo '</style>' . "\n";
}

function custom_css_filter($_content) {
	$_return = preg_replace ( '/@import.+;( |)|((?:\/\*(?:[^*]|(?:\*+[^*\/]))*\*+\/))/i', '', $_content );
	$_return = htmlspecialchars ( strip_tags($_return), ENT_NOQUOTES, 'UTF-8' );
	return $_return;
}
		
add_action ( 'wp_head', 'custom_css' );

?>