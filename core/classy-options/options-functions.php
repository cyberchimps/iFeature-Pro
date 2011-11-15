<?php
/* 
	Options	Functions
	Author: Tyler Cuningham
	Establishes the theme options functions.
	Copyright (C) 2011 CyberChimps
	Version 2.0
	
*/

/* Disable breadcrumbs*/
 
function disable_breadcrumbs() {

	global $options, $themeslug;
	$root = get_template_directory_uri();
	
	if ($options->get($themeslug.'_disable_breadcrumbs') == "1") {
		
		echo '<style type="text/css">';
		echo "#crumbs {display: none;}";
		echo '</style>';

	}
}
add_action( 'wp_head', 'disable_breadcrumbs');

/* Plus 1 Allignment */

function plusone_alignment() {

	global $themename, $themeslug, $options;
	
	if ($options->get($themeslug.'_show_fb_like') == "1" AND $options->get($themeslug.'_show_gplus') == "1" ) {

		echo '<style type="text/css">';
		echo ".gplusone {float: right; margin-right: -38px;}";
		echo '</style>';
		
	}
	
}
add_action( 'wp_head', 'plusone_alignment');


/* Featured Image Alignment */

function featured_image_alignment() {

	global $themename, $themeslug, $options;
	
	if ($options->get($themeslug.'_featured_image_align') == "key3" ) {

		echo '<style type="text/css">';
		echo ".featured-image {float: right;}";
		echo '</style>';
		
	}
	
	elseif ($options->get($themeslug.'_featured_image_align') == "key2" ) {

		echo '<style type="text/css">';
		echo ".featured-image {text-align: center;}";
		echo '</style>';
		
	}
	
	else {

		echo '<style type="text/css">';
		echo ".featured-image {float: left;}";
		echo '</style>';
		
	}

	
}
add_action( 'wp_head', 'featured_image_alignment');


/* Hide Header*/

/* function hide_header() {

	global $themename, $themeslug, $options;

	if (v($options, $themeslug.'_hide_header') == "1") {

		echo '<style type="text/css">';
		echo "#headerwrap {display: none;}";
		echo "#header {height: 40px; margin-top: 10px;}";
		echo '</style>';
		
	}
	
}
add_action( 'wp_head', 'hide_header'); */

/* Post Meta Data width */

function post_meta_data_width() {

	global $themename, $themeslug, $options;

	if ($options->get($themeslug.'_blog_sidebar') == "two-right" OR $options->get($themeslug.'_blog_sidebar') == "right-left") {

		echo '<style type="text/css">';
		echo ".postmetadata {width: 480px;}";
		echo '</style>';
		
	}
	
}
add_action( 'wp_head', 'post_meta_data_width');


/* Menu Color */

function add_menu_color() {

	global $themename, $themeslug, $options;
	$root = get_template_directory_uri(); 
		
		echo '<style type="text/css">';
		echo "#navbackground {background: url($root/images/menu/Grey.png) no-repeat left top}";
		echo '</style>';
		

	
	/* elseif (v($options, $themeslug.'_menu_color') != "picker" && v($options, $themeslug.'_menu_color') != "") {
	
		$menucolor = v($options, $themeslug.'_menu_color');
		
		echo '<style type="text/css">';
		echo "#navbackground {background: url($root/images/menu/$menucolor.png) no-repeat left top}";
		echo '</style>';
		
	}
	
	elseif (v($options, $themeslug.'_menu_color') == "picker") {
	
		$menucolor = v($options, $themeslug.'_custom_menu_color'); 
			
		echo '<style type="text/css">';
		echo "#navbackground {height: 35px; border: 1px solid #333; -moz-border-radius: 3px; border-radius: 3px; -moz-box-shadow:0 0 3px #444; -webkit-box-shadow:0 0 3px #444; box-shadow:0 0 3px #444;background-color: #$menucolor;}";
		echo '</style>';
	} */
	
}
add_action( 'wp_head', 'add_menu_color');

/* Site Title Color */

function add_sitetitle_color() {

	global $themename, $themeslug, $options;

	if ($options->get($themeslug.'_sitetitle_color') == "") {
		$sitetitle = '#717171';
	}
	
	else {
		$sitetitle = $options->get($themeslug.'_sitetitle_color'); 
	}		
	
		echo '<style type="text/css">';
		echo ".sitename a {color: $sitetitle;}";
		echo '</style>';
		
}
add_action( 'wp_head', 'add_sitetitle_color');

/* Link Color */

function add_link_color() {

	global $themename, $themeslug, $options;

	if (!$options->get($themeslug.'_link_color')) {
		$link = '#0085CF';
	}

	else { 
		$link = $options->get($themeslug.'_link_color'); 
	}				
	
		echo '<style type="text/css">';
		echo "a {color: $link;}";
		echo '</style>';
		
}
add_action( 'wp_head', 'add_link_color');


/* Menu Link Color */

function add_menulink_color() {

	global $themename, $themeslug, $options;

	if (!$options->get($themeslug.'_menulink_color')) {
		$sitelink = '#FFFFFF';
	}
	
	else{ 
		$sitelink = $options->get($themeslug.'_menulink_color'); 
	}	
		
		echo '<style type="text/css">';
		echo ".sf-menu a {color: $sitelink;}";
		echo '</style>';
}
add_action( 'wp_head', 'add_menulink_color');

/* Tagline Color */

function add_tagline_color() {

	global $themename, $themeslug, $options;

	if (!$options->get($themeslug.'_tagline_color')) {
		$tagline = '#000';
	}
	
	else { 
		$tagline = $options->get($themeslug.'_tagline_color'); 
	}		
		
		echo '<style type="text/css">';
		echo "#description {color: $tagline;}";
		echo '</style>';

}
add_action( 'wp_head', 'add_tagline_color');

/* Post Title Color */

function add_posttitle_color() {

	global $themename, $themeslug, $options;

	if (!$options->get($themeslug.'_posttitle_color')) {
		$posttitle = '#0085CF';
	}
	else {
		$posttitle = $options->get($themeslug.'_posttitle_color'); 
	}		
		
		echo '<style type="text/css">';
		echo ".posts_title a {color: $posttitle;}";
		echo '</style>';

}
add_action( 'wp_head', 'add_posttitle_color');

/* Hide search/home button */

/*function fullwidth_nav() {

	global $themename, $themeslug, $options;

	if (v($options, $themeslug.'_hide_search') == "1" && v($options, $themeslug.'_hide_home_icon') == "") {
		
		echo '<style type="text/css">';
		echo "#searchbar {display: none;}";
		echo "#sfwrapper {width: 91%;}";
		echo '</style>';
	}

	elseif (v($options, $themeslug.'_hide_search') == "" && v($options, $themeslug.'_hide_home_icon') == "1" ) {

		echo '<style type="text/css">';
		echo "#homebutton {display: none;}";
		echo "#sfwrapper {width: 79%; padding-left: 5px;}";
		echo '</style>';
	}

	elseif (v($options, $themeslug.'_hide_search') == "1" && v($options, $themeslug.'_hide_home_icon') == "1" ) {

		echo '<style type="text/css">';
		echo "#homebutton {display: none;}";
		echo "#searchbar {display: none;}";
		echo "#sfwrapper {width: 100%; padding-left: 5px;}";
		echo '</style>';
	}

}
add_action( 'wp_head', 'fullwidth_nav'); */

/* Footer Color */

function add_footer_color() {

	global $themename, $themeslug, $options;

	if ($options->get($themeslug.'_footer_color') != "#222222" ) {
	
		$footercolor = $options->get($themeslug.'_footer_color'); 
	
	
		echo '<style type="text/css">';
		echo "#footer {background: $footercolor;}";
		echo '</style>';
	}
}
add_action( 'wp_head', 'add_footer_color');

/* Menu Font */
 
/* function add_menu_font() {
		
	global $themename, $themeslug, $options;	
		
	if (v($options, $themeslug.'_menu_font') == "") {
		$font = 'Cantarell';
	}		
		
	elseif (v($options, $themeslug.'_custom_menu_font') != "") {
		$font = v($options, $themeslug.'_custom_menu_font');	
	}
	
	else {
		$font = v($options, ($themeslug.'_menu_font')); 
	}
	
		$fontstrip =  ereg_replace("[^A-Za-z0-9]", " ", $font );
	
		echo "<link href='http://fonts.googleapis.com/css?family=$font' rel='stylesheet' type='text/css' />";
		echo '<style type="text/css">';
		echo ".sf-menu a {font-family: $fontstrip;}";
		echo '</style>';
}
add_action( 'wp_head', 'add_menu_font'); */

/* Widget title background */
 
/*function widget_title_bg() {

	global $themename, $themeslug, $options;
	$root = get_template_directory_uri();
	
	if (v($options, $themeslug.'_widget_title_bg') == "1") {
		
		echo '<style type="text/css">';
		echo ".box-widget-title {background: url($root/images/wtitlebg.png) no-repeat center top; margin: -6px -5px 5px -5px;}";
		echo ".sidebar-widget-title {background: url($root/images/wtitlebg.png) no-repeat center top; margin: -6px -5px 5px -5px;}";
		echo '</style>';

	}
}
add_action( 'wp_head', 'widget_title_bg'); */


/* Custom CSS */

function custom_css() {

	global $themename, $themeslug, $options;
	
	$custom =$options->get($themeslug.'_css_options');
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