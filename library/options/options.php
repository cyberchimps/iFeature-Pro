<?php   

/* 
Portions of this code written by Blogatize http://blogatize.net
License: GNU General Public License v2.0
License URI: http://www.gnu.org/licenses/gpl-2.0.html  
*/


add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' ); 


$options = get_option($themename);

/**
 * Init plugin options to white list our options
 */  
function theme_options_init() {
	
	register_setting( 'if_options', 'ifeature', 'theme_options_validate' );
		add_settings_section('if_main', '', 'if_section_text', 'if');
		add_settings_section('if_main', '', 'if_section_text2', 'if');
  		add_settings_field('if_filename', '', 'if_setting_filename', 'if', 'if_main');  

	wp_register_script('ifjquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"), false, '1.4.4');
    wp_register_script('ifjqueryui', get_template_directory_uri(). '/library/js/jquery-ui.js');
    wp_register_script('ifjquerycookie', get_template_directory_uri(). '/library/js/jquery-cookie.js');
    wp_register_script('ifcookie', get_template_directory_uri(). '/library/js/cookie.js');
    wp_register_script('ifcolor', get_template_directory_uri(). '/library/js/jscolor/jscolor.js');
    wp_register_style('ifcss', get_template_directory_uri(). '/library/options/theme-options.css');
}


$name = "iFeature Pro";
$template_url = get_template_directory_uri();


/**
 * Load up the menu page
 */
 
function theme_options_add_page() {
global $name, $shortname, $options;
  $page = add_theme_page($name." Settings", "".$name."", 'edit_theme_options', 'theme_options', 'theme_options_do_page');  

  add_action('admin_print_scripts-' . $page, 'if_scripts');
  add_action('admin_print_styles-' . $page, 'if_styles');  
 
}

/*
Custom CSS
*/

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

/*
Site Title Color
*/

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

/*
Link Color
*/

function ifeature_add_link_color() {

$options = get_option('ifeature');

if (isset($options['if_link_color']) == "") 
			$link = '717171';


		else 
			$link = $options['if_link_color']; 
			
		
		
	
echo '<style type="text/css">';
		echo "a {color: #$link;}";
		echo '</style>';



}
add_action( 'wp_head', 'ifeature_add_link_color');


/*
Menu Link Color
*/

function ifeature_add_menulink_color() {

$options = get_option('ifeature');

if (isset($options['if_menulink_color']) == "") 
			$sitelink = 'FFFFFF';


		else 
			$sitelink = $options['if_menulink_color']; 
			
		
		
	
echo '<style type="text/css">';
		echo ".sf-menu a {color: #$sitelink;}";
		echo '</style>';



}
add_action( 'wp_head', 'ifeature_add_menulink_color');

/*
Tagline Color
*/

function ifeature_add_tagline_color() {

$options = get_option('ifeature');

if (isset($options['if_tagline_color']) == "") 
			$tagline = 'FFFFFF';


		else 
			$tagline = $options['if_tagline_color']; 
			
		
		
	
echo '<style type="text/css">';
		echo ".description {color: #$tagline;}";
		echo '</style>';



}
add_action( 'wp_head', 'ifeature_add_tagline_color');


/*
Post Title Color
*/

function ifeature_add_posttitle_color() {

$options = get_option('ifeature');

if (isset($options['if_posttitle_color']) == "") 
			$posttitle = '717171';


		else 
			$posttitle = $options['if_posttitle_color']; 
			
		
		
	
echo '<style type="text/css">';
		echo ".posts_title a {color: #$posttitle;}";
		echo '</style>';



}
add_action( 'wp_head', 'ifeature_add_posttitle_color');


/*
Callout Button Color
*/

function ifeature_add_calloutbutton_color() {

$options = get_option('ifeature');

if (isset($options['if_callout_button_color']) == "") 
			$callbutton = '333';


		else 
			$callbutton = $options['if_callout_button_color']; 
			
	
echo '<style type="text/css">';
		echo ".calloutbutton {background: #$callbutton;}";
		echo '</style>';



}
add_action( 'wp_head', 'ifeature_add_calloutbutton_color');

/*
Callout Text Color
*/

function ifeature_add_callouttext_color() {

$options = get_option('ifeature');

if (isset($options['if_callout_text_color']) == "") 
			$calltext = '000';


		else 
			$calltext = $options['if_callout_text_color']; 
			
	
echo '<style type="text/css">';
		echo ".callout_text {color: #$calltext;}";
		echo ".callout_title {color: #$calltext;}";
		echo '</style>';



}
add_action( 'wp_head', 'ifeature_add_callouttext_color');

/*
Hide search
*/

function ifeature_fullwidth_nav() {

$options = get_option('ifeature');

if ($options['if_hide_search'] == "1" && $options['if_hide_home_icon'] == "") {
		
		echo '<style type="text/css">';
		echo "#searchbar {display: none;}";
		echo "#sfwrapper {width: 91%;}";
		echo '</style>';

}

elseif ($options['if_hide_search'] == "" && $options['if_hide_home_icon'] == "1" ) {

		echo '<style type="text/css">';
		echo "#homebutton {display: none;}";
		echo "#sfwrapper {width: 79%;}";
		echo '</style>';
}

elseif ($options['if_hide_search'] == "1" && $options['if_hide_home_icon'] == "1" ) {

		echo '<style type="text/css">';
		echo "#homebutton {display: none;}";
		echo "#searchbar {display: none;}";
		echo "#sfwrapper {width: 100%;}";
		echo '</style>';
}

}
add_action( 'wp_head', 'ifeature_fullwidth_nav');


/*
Footer Color
*/

function ifeature_add_footer_color() {

$options = get_option('ifeature');

if (isset($options['if_footer_color']) != "" && $options['if_footer_color'] != "222222" ) {
		
			$footercolor = $options['if_footer_color']; 
	}	
	
	
echo '<style type="text/css">';
		echo "#footer {background: #$footercolor;}";
		echo '</style>';



}
add_action( 'wp_head', 'ifeature_add_footer_color');



/*
Menu Font
*/
 
 function ifeature_add_menu_font() {
		
	$options = get_option('ifeature');	
		
	if ($options['if_menu_font'] == "")
			$font = 'Cantarell';
			
		elseif ($options['if_custom_menu_font'] != "")
		$font = $options['if_custom_menu_font'];	
		
		else
			$font = $options[('if_menu_font')]; 
			$fontstrip =  ereg_replace("[^A-Za-z0-9]", " ", $font );
	
	echo "<link href='http://fonts.googleapis.com/css?family=$font' rel='stylesheet' type='text/css' />";
	echo '<style type="text/css">';
	echo ".sf-menu a {font-family: $fontstrip;}";
		echo '</style>';

}
add_action( 'wp_head', 'ifeature_add_menu_font');

/*
Menu Font
*/
 
 function ifeature_widget_titel_bg() {


	$options = get_option('ifeature');	
	$root = get_template_directory_uri();
	
	if ($options['if_widget_title_bg'] == "1") {
		
		echo '<style type="text/css">';
		echo ".box-widget-title {background: url($root/images/wtitlebg.png) no-repeat center top; margin: -6px -5px 5px -5px;}";
		echo ".sidebar-widget-title {background: url($root/images/wtitlebg.png) no-repeat center top; margin: -6px -5px 5px -5px;}";
		echo '</style>';

	
	}
}
add_action( 'wp_head', 'ifeature_widget_titel_bg');

/*
Feature Caption Style
*/

function ifeature_slider_caption_style() {

		$options = get_option('ifeature');
		
		if ($options['if_caption_style'] == "right")  {
			

		echo '<style type="text/css">';
		echo ".nivo-caption {position: relative; float: right; height: 330px; width: 320px;}";
		echo '</style>';

		}
		
		if ($options['if_caption_style'] == "left") {
			
			
		echo '<style type="text/css">';
		echo ".nivo-caption {height: 330px; width: 320px;}";
		echo '</style>';	

		}


}
add_action( 'wp_head', 'ifeature_slider_caption_style');

/*
Hide Slider Navigation
*/

function ifeature_hide_slider_navigation() {

		$options = get_option('ifeature');
		
		if ($options['if_slider_nav'] == "none")  {
			

		echo '<style type="text/css">';
		echo ".nivo-controlNav {display: none;}";
		echo '</style>';

		}
		

}
add_action( 'wp_head', 'ifeature_hide_slider_navigation');

require_once ( get_template_directory() . '/library/options/select.php' );

$shortname = "if";


$optionlist = array (

array( "id" => $shortname,
	"type" => "open-tab"),

array( "type" => "open"),
array( "type" => "close"),

array( "type" => "close-tab"),

// General

array( "id" => $shortname."-tab1",
	"type" => "open-tab"),

array( "type" => "open"),



    
array( "name" => "Logo URL",  
    "desc" => "Use the image uploader or enter your own URL into the input field to use an image as your logo. To display the site title as text, leave blank.",  
    "id" => $shortname."_logo",  
    "type" => "upload",  
    "std" => ""),  

array( "name" => "Header Contact Area",  
    "desc" => "Enter contact info such as phone number for the top right corner of the header. It can be HTML (to hide enter the word: hide).",  
    "id" => $shortname."_header_contact",  
    "type" => "textarea",
    "std" => ""),
    
array( "name" => "Twitter Bar",  
    "desc" => "Enter your Twitter handle for the Twitter Bar",  
    "id" => $shortname."_twitter_bar",  
    "type" => "twitterbar",  
    "std" => ""), 
    
   

array( "name" => "Google Analytics Code",  
    "desc" => "You can paste your Google Analytics or other tracking code in this box. This will be automatically be added to the footer.",  
    "id" => $shortname."_ga_code",  
    "type" => "textarea",  
    "std" => ""),  


        
array( "type" => "close"),

array( "type" => "close-tab"),

//Design

array( "id" => $shortname."-tab2",
	"type" => "open-tab"),
 
array( "type" => "open"),


array(  "name" => "Choose iMenu Color",
        "desc" => "(Default is Grey)",
        "id" => $shortname."_menu_color",
        "type" => "select1",
        "std" => ""),

array( "name" => "Choose a font:",  
    "desc" => "(Default is Cantarell)",  
    "id" => $shortname."_font",  
    "type" => "select2",  
    "std" => ""),
    
array( "name" => "Choose a menu font:",  
    "desc" => "(Default is Cantarell)",  
    "id" => $shortname."_menu_font",  
    "type" => "select12",  
    "std" => ""),

array( "name" => "Custom Menu Icon",  
    "desc" => "Enter the link to your custom menu icon (optional).",  
    "id" => $shortname."_menuicon",  
    "type" => "upload3",  
    "std" => ""),

array( "name" => "Hide home icon",  
    "desc" => "Check this box to hide the home icon in the navigation",  
    "id" => $shortname."_hide_home_icon",  
      "type" => "checkbox",  
    "std" => "false"),

array( "name" => "Hide menu search",  
    "desc" => "Check this box to hide the search box in the navigation.",  
    "id" => $shortname."_hide_search",  
      "type" => "checkbox",  
    "std" => "false"),

array( "name" => "Custom CSS",  
    "desc" => "Override default iFeature CSS here.",  
    "id" => $shortname."_css_options",  
    "type" => "textarea",  
    "std" => ""),  
    
array( "name" => "Custom Favicon",  
    "desc" => "A favicon is a 16x16 pixel icon that represents your site; paste the URL to a .ico image that you want to use as the image",  
    "id" => $shortname."_favicon",  
    "type" => "upload2",  
    "std" => ""),

array( "name" => "Hide the Boxes Section",  
    "desc" => "Check this box to hide the widgetized Boxes Section on the homepage.",  
    "id" => $shortname."_hide_boxes",  
      "type" => "checkbox",  
    "std" => "false"),

array( "name" => "Enable widget title background",  
    "desc" => "Check this box to hide enable the classic widget title backgrounds.",  
    "id" => $shortname."_widget_title_bg",  
      "type" => "checkbox",  
    "std" => "false"),

array( "name" => "Site Title Color",  
    "desc" => "Use the color picker to select the site title color",  
    "id" => $shortname."_sitetitle_color",  
      "type" => "color1",  
    "std" => "false"),
    
array( "name" => "Site Description Color",  
    "desc" => "Use the color picker to select the site description (tagline) color",  
    "id" => $shortname."_tagline_color",  
      "type" => "color9",  
    "std" => "false"),    
    
array( "name" => "Link Color",  
    "desc" => "Use the color picker to select the site link color",  
    "id" => $shortname."_link_color",  
      "type" => "color2",  
    "std" => "false"),

array( "name" => "Menu Link Color",  
    "desc" => "Use the color picker to select the site menu link color",  
    "id" => $shortname."_menulink_color",  
      "type" => "color3",  
    "std" => "false"),

array( "name" => "Post Title Color",  
    "desc" => "Use the color picker to select the post title color",  
    "id" => $shortname."_posttitle_color",  
      "type" => "color4",  
    "std" => "false"),


array( "type" => "close"),
array( "type" => "close-tab"),


// Social

array( "id" => $shortname."-tab3",
	"type" => "open-tab"),
 
array( "type" => "open"),


array( "name" => "Facebook URL",  
    "desc" => "Enter your Facebook page URL for the Facebook social icon.",  
    "id" => $shortname."_facebook",  
    "type" => "facebook",  
    "std" => "http://facebook.com"),

array( "name" => "Twitter URL",  
    "desc" => "Enter your Twitter URL for Twitter social icon.",  
    "id" => $shortname."_twitter",  
    "type" => "twitter",  
    "std" => "http://twitter.com"),
    
array( "name" => "Google Plus URL",  
    "desc" => "Enter your Google Plus url (we recommend using the http://gplus.to/ shortener).",  
    "id" => $shortname."_gplus",  
    "type" => "gplus",  
    "std" => "https://plus.google.com"),
    
array( "name" => "LinkedIn URL",  
    "desc" => "Enter your LinkedIn URL for the LinkedIn social icon.",  
    "id" => $shortname."_linkedin",  
    "type" => "linkedin",  
    "std" => "http://linkedin.com"),  
    
array( "name" => "YouTube URL",  
    "desc" => "Enter your YouTube URL for the YouTube social icon.",  
    "id" => $shortname."_youtube",  
    "type" => "youtube",  
    "std" => "http://youtube.com"),  
    
array( "name" => "Google Maps URL",  
    "desc" => "Enter your Google Maps URL for the Google Maps social icon.",  
    "id" => $shortname."_googlemaps",  
    "type" => "googlemaps",  
    "std" => "http://google.com/maps"),  

array( "name" => "Email",  
    "desc" => "Enter your contact email address for email social icon.",  
    "id" => $shortname."_email",  
    "type" => "email",  
    "std" => "no@way.com"),
    
array( "name" => "Custom RSS Link",  
    "desc" => "Enter Feedburner URL, or leave blank for default RSS feed.",  
    "id" => $shortname."_rsslink",  
    "type" => "rss",  
    "std" => ""),   
     
array( "type" => "close"),

array( "type" => "close-tab"),

//Blog

array( "id" => $shortname."-tab4",
	"type" => "open-tab"),
 
array( "type" => "open"),


array( "name" => "Post Excerpts",  
    "desc" => "Use the following options to control excerpts.",  
    "id" => $shortname."_excerpts",  
      "type" => "excerpts",  
    "std" => "false"),

array( "name" => "Hide Post Elements",  
    "desc" => "Use the following checkboxes to hide various post elements.",  
    "id" => $shortname."_hide_post_elements",  
    "type" => "post",  
    "std" => "false"),

array(  "name" => "Show Facebook Like Button",
        "desc" => "Check this box to show the Facebook Like Button on blog posts",
        "id" => $shortname."_show_fb_like",
        "type" => "checkbox",
        "std" => "false"),  
    
array( "name" => "Show the iFeature Slider",  
    "desc" => "Check this box to display the iFeature Slider on your blog page.",  
    "id" => $shortname."_show_slider_blog",  
      "type" => "checkbox",  
    "std" => "false"),

array( "name" => "Select the sidebar type",  
    "desc" => "Select the sidebar type for your blog page (default is Right).",  
    "id" => $shortname."_blog_sidebar",  
      "type" => "select8",  
    "std" => "false"),

array( "name" => "Select the sidebar size",  
    "desc" => "Select the slider size for your blog page (default is Half-Width).",  
    "id" => $shortname."_slider_size",  
      "type" => "select9",  
    "std" => "false"),

array( "name" => "Select the slider type:",  
    "desc" => "(Choose between custom feature slides or a post category)",  
    "id" => $shortname."_slider_type",  
    "type" => "select4",  
    "std" => ""), 
    
array( "name" => "Show posts from blog category:",  
    "desc" => "(Default is all - WARNING: do not enter a category that does not exist or slider will not display)",  
    "id" => $shortname."_slider_category",  
    "type" => "select6",  
    "std" => ""),
    
array( "name" => "Show posts from custom slide category:",  
    "desc" => "(Default is all - WARNING: do not enter a category that does not exist or slider will not display)",  
    "id" => $shortname."_customslider_category",  
    "type" => "select7",  
    "std" => ""),
    
array( "name" => "Number of featured posts:",  
    "desc" => "(Default is 5)",  
    "id" => $shortname."_slider_posts_number",  
    "type" => "text",  
    "std" => ""),  
    
array( "name" => "Slider height:",  
    "desc" => "(Default is 330)",  
    "id" => $shortname."_slider_height",  
    "type" => "text",  
    "std" => ""),

array( "name" => "Slider delay time (in milliseconds):",  
    "desc" => "(Default is 3500)",  
    "id" => $shortname."_slider_delay",  
    "type" => "text",  
    "std" => ""),
    
array( "name" => "Choose the caption style:",  
    "desc" => "(Default is Bottom)",  
    "id" => $shortname."_caption_style",  
    "type" => "select11",  
    "std" => ""),

array( "name" => "Choose the slider animation:",  
    "desc" => "(Default is random)",  
    "id" => $shortname."_slider_animation",  
    "type" => "select3",  
    "std" => ""), 
    
array( "name" => "Choose the slider navigation:",  
    "desc" => "(Default is dots)",  
    "id" => $shortname."_slider_nav",  
    "type" => "select10",  
    "std" => ""),   
    
array( "name" => "Home Description",  
    "desc" => "Enter the META description of your homepage here.",  
    "id" => $shortname."_home_description",  
    "type" => "textarea",  
    "std" => ""),
    
array( "name" => "Home Keywords",  
    "desc" => "Enter the META keywords of your homepage here (separated by commas).",  
    "id" => $shortname."_home_keywords",  
    "type" => "textarea",  
    "std" => ""),
    
array( "name" => "Optional Home Title",  
    "desc" => "Enter an alternative title of your homepage here (default is site tagline).",  
    "id" => "if_home_title",  
    "type" => "text",  
    "std" => ""),

array( "type" => "close"),
array( "type" => "close-tab"),


//SEO

array( "id" => $shortname."-tab5",
	"type" => "open-tab"),
 
array( "type" => "open"),





array( "type" => "close"),
array( "type" => "close-tab"),

// Callout Section

array( "id" => $shortname."-tab6",
	"type" => "open-tab"),

array( "type" => "open"),
  
array( "name" => "Hide Callout Section",  
    "desc" => "Check this box to hide the Callout Section on the homepage.",  
    "id" => $shortname."_hide_callout",  
     "type" => "checkbox",  
    "std" => "false"), 
  
array( "name" => "Callout Title",  
    "desc" => "Enter callout title, you can use HTML.",  
    "id" => $shortname."_callout_title",  
    "type" => "text",
    "std" => ""),

array( "name" => "Callout Text",  
    "desc" => "Enter callout text, you can use HTML.",  
    "id" => $shortname."_callout_text",  
    "type" => "textarea",
    "std" => ""),    
array( "name" => "Callout Button Link",  
    "desc" => "Enter a URL for the Callout Button's link.",  
    "id" => $shortname."_callout_button_link",  
    "type" => "text",
    "std" => ""),
    
array( "name" => "Custom Callout Button",  
    "desc" => "Use the image uploader or enter your own URL into the input field to use a custom callout button.",  
    "id" => $shortname."_custom_callout_button",  
    "type" => "upload4",  
    "std" => ""),     
    
array( "name" => "Callout Background Color",  
    "desc" => "Select your callout section background color (default is iFeature Pro 2.0)",  
    "id" => $shortname."_callout_background_color",  
      "type" => "select13",  
    "std" => "false"),
    
array( "name" => "Custom Callout Background Color",  
    "desc" => "Use the color picker to select the callout section background color",  
    "id" => $shortname."_callout_custom_background_color",  
      "type" => "color5",  
    "std" => "false"),
    
array( "name" => "Callout Text Color",  
    "desc" => "Use the color picker to select the callout section text color",  
    "id" => $shortname."_callout_text_color",  
      "type" => "color7",  
    "std" => "false"),

array( "name" => "Callout Button Color",  
    "desc" => "Use the color picker to select the callout button color",  
    "id" => $shortname."_callout_button_color",  
      "type" => "color6",  
    "std" => "false"),

array( "type" => "close"), 

array( "type" => "close-tab"),

// iFeature Slider

array( "id" => $shortname."-tab7",
	"type" => "open-tab"),

array( "type" => "open"),

array( "name" => "Hide iFeature Slider",  
    "desc" => "Check this box to hide the Feature Slider on the iFeature Pro homepage.",  
    "id" => $shortname."_hide_slider",  
    "type" => "checkbox",  
    "std" => "false"),
    
  
  

array( "type" => "close"),   

array( "type" => "close-tab"),


// Footer

array( "id" => $shortname."-tab8",
	"type" => "open-tab"),

array( "type" => "open"),
  
array( "name" => "Footer Copyright",  
    "desc" => "Enter Copyright text used on the right side of the footer. It can be HTML (default is your blog title)",  
    "id" => $shortname."_footer_text",  
    "type" => "textarea",  
    "std" => ""),
    
array( "name" => "Footer Color",  
    "desc" => "Use the color picker to select a custom footer color (default is 222)",  
    "id" => $shortname."_footer_color",  
    "type" => "color8",  
    "std" => ""),    
    
array( "name" => "Hide our link",  
    "desc" => "Check this box to hide the link back to CyberChimps.com.",  
    "id" => $shortname."_hide_link",  
      "type" => "checkbox",  
    "std" => "false"),
    
array( "type" => "close"),

array( "type" => "close-tab"),

// Import/Export

array( "id" => $shortname."-tab9",
	"type" => "open-tab"),

array( "type" => "open"),
  
array( "name" => "Import iFeature Settings",  
    "desc" => "To import your settings, Paste the iFeature Pro export code here and press Save Settings.",  
    "id" => $shortname."_import_code",  
    "type" => "import",  
    "process" => "ifeature_import_options",
    "std" => ""), 
    
array( "name" => "Export iFeature Settings",  
    "desc" => "Copy the following code, Paste it into a text file and save it. This code can be used to import your settings into another iFeature Pro site.",  
    "id" => $shortname."_export_code",  
    "type" => "export",  
    "std" => ""), 
    
array( "type" => "close"),

array( "type" => "close-tab"),


);  

/**
 * Create the options page
 */
function theme_options_do_page() {
	global $name, $shortname, $optionlist,  $select_menu_color, $select_font, $select_slider_effect, $select_sidebar_type, $select_slider_caption, $select_callout_background, $select_slider_navigation, $select_slider_size, $select_slider_type, $select_slider_placement;
  

	if ( ! isset( $_REQUEST['updated'] ) ) {
		$_REQUEST['updated'] = false; 
} 
  if( isset( $_REQUEST['reset'] )) { 
            global $wpdb;
            $query = "DELETE FROM $wpdb->options WHERE option_name LIKE 'ifeature'";
            $wpdb->query($query);
            
            die;
     } 
   
?>

	<div class="wrap">
  

<?php if ( function_exists('screen_icon') ) screen_icon(); ?>

      
<h2><?php echo $name; ?> Settings</h2><br />

<p>Need help? Follow the links below to visit our support forum and documentation pages:</p>
<a href="http://cyberchimps.com/ifeaturepro/docs"><img src="<?php echo get_template_directory_uri();?>/images/docs.png?>" alt="Docs"></a> <a href="http://cyberchimps.com/forum"><img src="<?php echo get_template_directory_uri(); ?>/images/forum.png?>" alt="Forum"></a> 

		<?php if ( false !== $_REQUEST['updated'] ) { ?>
		<?php echo '<div id="message" class="updated fade" style="float:left;"><p><strong>'.$name.' settings saved</strong></p></div>'; ?>
    
    <?php } if( isset( $_REQUEST['reset'] )) { echo '<div id="message" class="updated fade"><p><strong>'.$name.' settings reset</strong></p></div>'; } ?>  
				


  <form method="post" action="options.php" enctype="multipart/form-data">
  
    <p class="submit" style="clear:left;">
				<input type="submit" class="button-primary" value="Save Settings" />   
			</p>  
      
    <div id="tabs" style="clear:both;">   
    <ul class="tabNavigation">
        <li><a href="#if-tab1"><span>General</span></a></li>
        <li><a href="#if-tab2"><span>Design</span></a></li>
        <li><a href="#if-tab3"><span>Social</span></a></li>
        <li><a href="#if-tab4"><span>Blog</span></a></li>
        <li><a href="#if-tab5"><span>SEO</span></a></li>
        <li><a href="#if-tab6"><span>Callout Section</span></a></li>
        <li><a href="#if-tab7"><span>iFeature Slider</span></a></li>        
        <li><a href="#if-tab8"><span>Footer</span></a></li>
        <li><a href="#if-tab9"><span>Import/Export</span></a></li>
    
    </ul>
    
    <div class="tabContainer">
		
			<?php settings_fields( 'if_options' ); ?>
			<?php $options = get_option( 'ifeature' ); ?>

			<table class="form-table">   

      <?php foreach ($optionlist as $value) {  
switch ( $value['type'] ) {
 
case "open":
?>

<table width="100%" border="0" style="padding:10px;">

 
<?php break;
 
case "close":
?>


</table><br />
 
<?php break;


case "open-tab":
?>

<div id="<?php echo $value['id']; ?>">

 
<?php break;
 
case "close-tab":
?>


</div>

<?php break; 

case 'upload':
?>   


<tr>

<td width="15%" rowspan="2" valign="middle"><strong>Custom logo</strong>


 
<tr>
<td width="85%">


    <?php settings_fields('if_options'); ?>
    <?php do_settings_sections('if'); 
    
    $file = $options['file'];
    
    if ($file != ''){
    
    echo "Logo preview:<br /><br /><img src='{$file['url']}'><br /><br />";}
    echo "<input type='text' name='if_filename_text' size='72' value='{$file['url']}'/>";
    echo "<br />" ;
    echo "<br />" ;
    echo "<input type='file' name='if_filename' size='30' />";?>

    
    <br />
    <small>Upload a logo image to use</small>


<?php
	$options = get_option('ifeature');
	$value = isset($options['file']) ? $options['file'] : '';
?>

</td>
</tr>


        
        <tr>
<td><small></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php break; 

case 'upload2':
?>   


<tr>

<td width="15%" rowspan="2" valign="middle"><strong>Custom favicon</strong>


 
<tr>
<td width="85%">


    <?php settings_fields('if_options'); ?>
    <?php do_settings_sections('if'); 
    
    $file2 = $options['file2'];
    
    if ($file2 != ''){
    
    echo "Favicon preview:<br /><br /><img src='{$file2['url']}'><br /><br />";}
    echo "<input type='text' name='if_favfilename_text' size='72' value='{$file2['url']}'/>";
    echo "<br />" ;
    echo "<br />" ;
    echo "<input type='file' name='if_favfilename' size='30' />";?>

    
    <br />
    <small>Upload a favicon image to use</small>


<?php
	$options = get_option('ifeature');
	$value = isset($options['file2']) ? $options['file2'] : '';
?>

</td>
</tr>


        
        <tr>
<td><small></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php break; 

case 'upload3':
?>   


<tr>

<td width="15%" rowspan="2" valign="middle"><strong>Custom home icon</strong>


 
<tr>
<td width="85%">


    <?php settings_fields('if_options'); ?>
    <?php do_settings_sections('if'); 
    
    $file3 = $options['file3'];
    
    if ($file3 != ''){
    
    echo "Home Button preview:<br /><br /><img src='{$file3['url']}'><br /><br />";}
    echo "<input type='text' name='if_homefilename_text' size='72' value='{$file3['url']}'/>";
    echo "<br />" ;
    echo "<br />" ;
    echo "<input type='file' name='if_homefilename' size='30' />";?>

    
    <br />
    <small>Upload a home icon image to use</small>


<?php
	$options = get_option('ifeature');
	$value = isset($options['file3']) ? $options['file3'] : '';
?>

</td>
</tr>


        
        <tr>
<td><small></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php break; 

case 'upload4':
?>   


<tr>

<td width="15%" rowspan="2" valign="middle"><strong>Custom callout image</strong>


 
<tr>
<td width="85%">


    <?php settings_fields('if_options'); ?>
    <?php do_settings_sections('if'); 
    
    $file4 = $options['file4'];
    
    if ($file4 != ''){
    
    echo "Callout Button preview:<br /><br /><img src='{$file4['url']}'><br /><br />";}
    echo "<input type='text' name='if_calloutfilename_text' size='72' value='{$file4['url']}'/>";
    echo "<br />" ;
    echo "<br />" ;
    echo "<input type='file' name='if_calloutfilename' size='30' />";?>

    
    <br />
    <small>Upload a callout image to use</small>


<?php
	$options = get_option('ifeature');
	$value = isset($options['file4']) ? $options['file4'] : '';
?>

</td>
</tr>


        
        <tr>
<td><small></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php break; 


case 'excerpts':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    <br />
    <input type="checkbox" id="ifeature[if_show_excerpts]" name="ifeature[if_show_excerpts]" value="1" <?php checked( '1', $options['if_show_excerpts'] ); ?>> - Show Excerpts
<br /><br />

	<?php
		if (isset($options['if_excerpt_link_text']) == "")
			$textlink = '(Read More...)';
			
		else
			$textlink = $options['if_excerpt_link_text']; 
	?>
	
   <input type="text" id="ifeature[if_excerpt_link_text]" name="ifeature[if_excerpt_link_text]" value="<?php echo $textlink ;?>"> - Excerpt Link Text
<br /><br />

	<?php
		if (isset($options['if_excerpt_length']) == "")
			$length = '55';
			
		else
			$length = $options['if_excerpt_length']; 
	?>

     <input type="text" id="ifeature[if_excerpt_length]" name="ifeature[if_excerpt_length]" value="<?php echo $length ;?>" > - Excerpt Character Length
<br /><br />

</td>
  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break;


case 'post':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    <br />
    <input type="checkbox" id="ifeature[if_hide_author]" name="ifeature[if_hide_author]" value="1" <?php checked( '1', $options['if_hide_author'] ); ?>> - Author
<br /><br />

   <input type="checkbox" id="ifeature[if_hide_categories]" name="ifeature[if_hide_categories]" value="1" <?php checked( '1', $options['if_hide_categories'] ); ?>> - Categories
<br /><br />

   <input type="checkbox" id="ifeature[if_hide_date]" name="ifeature[if_hide_date]" value="1" <?php checked( '1', $options['if_hide_date'] ); ?>> - Date
<br /><br />

   <input type="checkbox" id="ifeature[if_hide_comments]" name="ifeature[if_hide_comments]" value="1" <?php checked( '1', $options['if_hide_comments'] ); ?>> - Comments
<br /><br />

   <input type="checkbox" id="ifeature[if_hide_share]" name="ifeature[if_hide_share]" value="1" <?php checked( '1', $options['if_hide_share'] ); ?>> - Share
<br /><br />

   <input type="checkbox" id="ifeature[if_hide_tags]" name="ifeature[if_hide_tags]" value="1" <?php checked( '1', $options['if_hide_tags'] ); ?>> - Tags
<br /><br />

</td>
  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break;
 


case 'twitterbar':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    <br />
    <input style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>" id="<?php echo 'if['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />

<br /><br />

<input type="checkbox" id="ifeature[if_enable_twitter]" name="ifeature[if_enable_twitter]" value="1" <?php checked( '1', $options['if_enable_twitter'] ); ?>> - Check this box to enable the Twitter Bar on the iFeature Pro Homepage (Requires <a href="http://wordpress.org/extend/plugins/twitter-for-wordpress/">Twitter for WordPress Plugin</a>)
</td>
  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break;



case 'color1':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    
    <?php
$options = get_option('ifeature');

if (isset($options['if_sitetitle_color']) == "")
			$picker = '111111';
			
		else
			$picker = $options['if_sitetitle_color']; 
?>

<input type="text" class="color" id="ifeature[if_sitetitle_color]" name="ifeature[if_sitetitle_color]"  value="<?php echo $picker ;?>" style="width: 300px;">   

<br /><br />
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break; 

case 'color2':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    
    <?php
$options = get_option('ifeature');

if (isset($options['if_link_color']) == "")
			$picker = '717171';
			
		else
			$picker = $options['if_link_color']; 
?>

<input type="text" class="color{required:false}" id="ifeature[if_link_color]" name="ifeature[if_link_color]"  value="<?php echo $picker ;?>" style="width: 300px;">   

<br /><br />
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break; 


case 'color3':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    
    <?php
$options = get_option('ifeature');

if (isset($options['if_menulink_color']) == "")
			$picker = 'FFF';
			
		else
			$picker = $options['if_menulink_color']; 
?>

<input type="text" class="color{required:false}" id="ifeature[if_menulink_color]" name="ifeature[if_menulink_color]"  value="<?php echo $picker ;?>" style="width: 300px;">   

<br /><br />
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break; 

case 'color4':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    
    <?php
$options = get_option('ifeature');

if (isset($options['if_posttitle_color']) == "")
			$picker = '717171';
			
		else
			$picker = $options['if_posttitle_color']; 
?>

<input type="text" class="color{required:false}" id="ifeature[if_posttitle_color]" name="ifeature[if_posttitle_color]"  value="<?php echo $picker ;?>" style="width: 300px;">   

<br /><br />
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break; 

case 'color5':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    
    <?php
$options = get_option('ifeature');

if (isset($options['if_callout_custom_background_color']) == "")
			$picker = 'F8F8F8';
			
		else
			$picker = $options['if_callout_custom_background_color']; 
?>

<input type="checkbox" id="ifeature[if_enable_custom_calloutbg]" name="ifeature[if_enable_custom_calloutbg]" value="1" <?php checked( '1', $options['if_enable_custom_calloutbg'] ); ?>> - Check this box to enable custom callout section background color.
<br /><br />
<input type="text" class="color{required:false}" id="ifeature[if_callout_custom_background_color]" name="ifeature[if_callout_custom_background_color]"  value="<?php echo $picker ;?>" style="width: 300px;">   

<br /><br />
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break; 

case 'color6':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    
    <?php
$options = get_option('ifeature');

if (isset($options['if_callout_button_color']) == "")
			$picker = '333';
			
		else
			$picker = $options['if_callout_button_color']; 
?>

<input type="text" class="color{required:false}" id="ifeature[if_callout_button_color]" name="ifeature[if_callout_button_color]"  value="<?php echo $picker ;?>" style="width: 300px;">   

<br /><br />
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break; 


case 'color7':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    
    <?php
$options = get_option('ifeature');

if (isset($options['if_callout_text_color']) == "")
			$picker = '000';
			
		else
			$picker = $options['if_callout_text_color']; 
?>

<input type="text" class="color{required:false}" id="ifeature[if_callout_text_color]" name="ifeature[if_callout_text_color]"  value="<?php echo $picker ;?>" style="width: 300px;">   

<br /><br />
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break; 

case 'color8':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    
    <?php
$options = get_option('ifeature');

if (isset($options['if_footer_color']) == "")
			$picker = '222';
			
		else
			$picker = $options['if_footer_color']; 
?>
<br />
<input type="text" class="color{required:false}" id="ifeature[if_footer_color]" name="ifeature[if_footer_color]"  value="<?php echo $picker ;?>" style="width: 300px;">   

<br /><br />
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break; 

case 'color9':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    
    <?php
$options = get_option('ifeature');

if (isset($options['if_tagline_color']) == "")
			$picker = '000';
			
		else
			$picker = $options['if_tagline_color']; 
?>
<br />
<input type="text" class="color{required:false}" id="ifeature[if_tagline_color]" name="ifeature[if_tagline_color]"  value="<?php echo $picker ;?>" style="width: 300px;">   

<br /><br />
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break; 


 
 
case 'facebook':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>" id="<?php echo 'if['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="ifeature[if_hide_facebook]" name="ifeature[if_hide_facebook]" value="1" <?php checked( '1', $options['if_hide_facebook'] ); ?>> - Check this box to hide the Facebook icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break;


case 'twitter':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>" id="<?php echo 'if['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="ifeature[if_hide_twitter]" name="ifeature[if_hide_twitter]" value="1" <?php checked( '1', $options['if_hide_twitter'] ); ?>> - Check this box to hide the Twitter icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break;

case 'gplus':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>" id="<?php echo 'if['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="ifeature[if_hide_gplus]" name="ifeature[if_hide_gplus]" value="1" <?php checked( '1', $options['if_hide_twitter'] ); ?>> - Check this box to hide the Google + icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break;


case 'linkedin':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>" id="<?php echo 'if['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="ifeature[if_hide_linkedin]" name="ifeature[if_hide_linkedin]" value="1" <?php checked( '1', $options['if_hide_linkedin'] ); ?>> - Check this box to hide the LinkedIn icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;


case 'youtube':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>" id="<?php echo 'if['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="ifeature[if_hide_youtube]" name="ifeature[if_hide_youtube]" value="1" <?php checked( '1', $options['if_hide_youtube'] ); ?>> - Check this box to hide the YouTube icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;


case 'googlemaps':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>" id="<?php echo 'if['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="ifeature[if_hide_googlemaps]" name="ifeature[if_hide_googlemaps]" value="1" <?php checked( '1', $options['if_hide_googlemaps'] ); ?>> - Check this box to hide the Google Maps icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;


case 'email':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>" id="<?php echo 'if['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="ifeature[if_hide_email]" name="ifeature[if_hide_email]" value="1" <?php checked( '1', $options['if_hide_email'] ); ?>> - Check this box to hide the Email icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'rss':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>" id="<?php echo 'if['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="ifeature[if_hide_rss]" name="ifeature[if_hide_rss]" value="1" <?php checked( '1', $options['if_hide_rss'] ); ?>> - Check this box to hide the RSS icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break; 

 
case 'textarea':
?>
 
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong></label> <br /><small><?php echo $value['desc']; ?></small> </td> 
    <td width="85%"><textarea id="<?php echo 'ifeature['.$value['id'].']'; ?>" name="<?php echo 'ifeature['.$value['id'].']'; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo stripslashes( $options[$value['id']] ); ?></textarea></td>  
 
  
 </tr>
 <tr>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr>
<?php break; 

case 'import':
?>
 
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong></label> <br /><small><?php echo $value['desc']; ?></small> </td> 
    <td width="85%"><textarea id="<?php echo 'ifeature['.$value['id'].']'; ?>" name="<?php echo 'ifeature['.$value['id'].']'; ?>" style="width:600px; height:300px;" type="<?php echo $value['type']; ?>" cols="" rows=""></textarea></td>  
 
  
 </tr>
 <tr>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr>
<?php break; 

case 'export':
?>
 
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong></label> <br /><small><?php echo $value['desc']; ?></small> </td> 
    <td width="85%"><textarea id="<?php echo 'ifeature['.$value['id'].']'; ?>" name="<?php echo 'ifeature['.$value['id'].']'; ?>" style="width:600px; height:300px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo (serialize($options));?></textarea></td>  

 </tr>
 <tr>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr>
<?php break; 

case 'text':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>" id="<?php echo 'if['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" /></td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break;

case 'select1':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_menu_color as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select></td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;


case 'select2':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_font as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select>
<br /> <br />

Or enter your own font below (Google Fonts with more than one word format as follows: Maven+Pro)
<br /> <br />

<input style="width:300px;" name="ifeature[if_custom_font]" id="ifeature[if_custom_font]" type="text" value="<?php echo $options['if_custom_font'] ?>"  />


</td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'select3':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_slider_effect as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select></td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'select4':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_slider_type as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select></td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'select5':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_slider_placement as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select></td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'select6':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';
								
								$terms2 = get_terms('category', 'hide_empty=0');

									$blogoptions = array();

										foreach($terms2 as $term) {

										$blogoptions[$term->slug] = $term->name;

									}
									

								foreach ( $blogoptions as $option ) {
									$label = $option['label'];
									if ( $selected == $option ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option ) . "'>$option</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option ) . "'>$option</option>";      
								}
								echo $p . $r;   
							?>    


</select>

</td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'select7':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';
								
								$terms2 = get_terms('slide_categories', 'hide_empty=0');

									$blogoptions = array();

										foreach($terms2 as $term) {

										$blogoptions[$term->slug] = $term->name;

									}
									

								foreach ( $blogoptions as $option ) {
									$label = $option['label'];
									if ( $selected == $option ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option ) . "'>$option</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option ) . "'>$option</option>";      
								}
								echo $p . $r;   
							?>    


</select>

</td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'select8':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_sidebar_type as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select>


</td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'select9':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_slider_size as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select>

</td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;
 
case 'select10':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_slider_navigation as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select>
</td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'select11':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_slider_caption as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select>


</td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'select12':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_font as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select>
<br /> <br />

Or enter your own font below (Google Fonts with more than one word format as follows: Maven+Pro)
<br /> <br />

<input style="width:300px;" name="ifeature[if_custom_menu_font]" id="ifeature[if_custom_menu_font]" type="text" value="<?php echo $options['if_custom_menu_font'] ?>"  />


</td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'select13':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_callout_background  as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select>


</td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

 

 
case "checkbox":
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%">
<input type="checkbox" name="<?php echo 'ifeature['.$value['id'].']'; ?>" id="<?php echo 'ifeature['.$value['id'].']'; ?>" value="1" <?php checked( '1', $options[$value['id']] ); ?>/>
</td>
</tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php break;
 
}
}
?>
      </div>  
    </div>    

			<p class="submit">
				<input type="submit" class="button-primary" value="Save Settings" />   
			</p>
		</form>

    
    <form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
&nbsp;&nbsp;&nbsp;<small>WARNING, THIS RESTORES TO DEFAULT</small>
</p>
</form> 



	</div>
	<?php
}



function theme_options_validate( $input ) {
	global  $select_menu_color, $select_font, $select_slider_effect, $select_slider_type, $select_sidebar_type, $select_slider_caption, $select_callout_background, $select_slider_navigation, $select_slider_size, $select_slider_placement;

	// Assign checkbox value
	
	
	if ( ! isset( $input['if_hide_facebook'] ) )
		$input['if_hide_facebook'] = null;
	$input['if_hide_facebook'] = ( $input['if_hide_facebook'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input['if_hide_twitter'] ) )
		$input['if_hide_twitter'] = null;
	$input['if_hide_twitter'] = ( $input['if_hide_twitter'] == 1 ? 1 : 0 ); 
	
		if ( ! isset( $input['if_hide_gplus'] ) )
		$input['if_hide_gplus'] = null;
	$input['if_hide_gplus'] = ( $input['if_hide_gplus'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input['if_hide_linkedin'] ) )
		$input['if_hide_linkedin'] = null;
	$input['if_hide_linkedin'] = ( $input['if_hide_linkedin'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input['if_hide_youtube'] ) )
		$input['if_hide_youtube'] = null;
	$input['if_hide_youtube'] = ( $input['if_hide_youtube'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input['if_hide_googlemaps'] ) )
		$input['if_hide_googlemaps'] = null;
	$input['if_hide_googlemaps'] = ( $input['if_hide_googlemaps'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input['if_hide_email'] ) )
		$input['if_hide_email'] = null;
	$input['if_hide_email'] = ( $input['if_hide_email'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input['if_hide_rss'] ) )
		$input['if_hide_rss'] = null;
	$input['if_hide_rss'] = ( $input['if_hide_rss'] == 1 ? 1 : 0 ); 

  	if ( ! isset( $input['if_hide_callout'] ) )
		$input['if_hide_callout'] = null;
	$input['if_hide_callout'] = ( $input['if_hide_callout'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input['if_show_fb_like'] ) )
		$input['if_show_fb_like'] = null;
	$input['if_show_fb_like'] = ( $input['if_show_fb_like'] == 1 ? 1 : 0 ); 
  
     if ( ! isset( $input['if_hide_slider'] ) )
		$input['if_hide_slider'] = null;
	$input['if_hide_slider'] = ( $input['if_hide_slider'] == 1 ? 1 : 0 ); 
  
    if ( ! isset( $input['if_hide_boxes'] ) )
		$input['if_hide_boxes'] = null;
	$input['if_hide_boxes'] = ( $input['if_hide_boxes'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input['if_hide_search'] ) )
		$input['if_hide_search'] = null;
	$input['if_hide_search'] = ( $input['if_hide_search'] == 1 ? 1 : 0 ); 
  
  if ( ! isset( $input['if_hide_home_icon'] ) )
		$input['if_hide_home_icon'] = null;
	$input['if_hide_home_icon'] = ( $input['if_hide_home_icon'] == 1 ? 1 : 0 ); 
  
  
     if ( ! isset( $input['if_hide_link'] ) )
		$input['if_hide_link'] = null;
	$input['if_hide_link'] = ( $input['if_hide_link'] == 1 ? 1 : 0 ); 
	
	  if ( ! isset( $input['if_slider_navigation'] ) )
		$input['if_slider_navigation'] = null;
	$input['if_slider_navigation'] = ( $input['if_slider_navigation'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input['if_show_excerpts'] ) )
		$input['if_show_excerpts'] = null;
	$input['if_show_excerpts'] = ( $input['if_show_excerpts'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input['if_hide_author'] ) )
		$input['if_hide_author'] = null;
	$input['if_hide_author'] = ( $input['if_hide_author'] == 1 ? 1 : 0 ); 
	
	 if ( ! isset( $input['if_hide_categories'] ) )
		$input['if_hide_categories'] = null;
	$input['if_hide_categories'] = ( $input['if_hide_categories'] == 1 ? 1 : 0 ); 
	
	 if ( ! isset( $input['if_hide_date'] ) )
		$input['if_hide_date'] = null;
	$input['if_hide_date'] = ( $input['if_hide_date'] == 1 ? 1 : 0 ); 
	
	 if ( ! isset( $input['if_hide_comments'] ) )
		$input['if_hide_comments'] = null;
	$input['if_hide_comments'] = ( $input['if_hide_comments'] == 1 ? 1 : 0 ); 
	
	 if ( ! isset( $input['if_hide_share'] ) )
		$input['if_hide_share'] = null;
	$input['if_hide_share'] = ( $input['if_hide_share'] == 1 ? 1 : 0 ); 
	
	 if ( ! isset( $input['if_hide_tags'] ) )
		$input['if_hide_tags'] = null;
	$input['if_hide_tags'] = ( $input['if_hide_tags'] == 1 ? 1 : 0 ); 
	
	   if ( ! isset( $input['if_enable_twitter'] ) )
		$input['if_enable_twitter'] = null;
	$input['if_enable_twitter'] = ( $input['if_enable_twitter'] == 1 ? 1 : 0 ); 
  
  
	  if ( ! isset( $input['if_enable_custom_calloutbg'] ) )
		$input['if_enable_custom_calloutbg'] = null;
	$input['if_enable_custom_calloutbg'] = ( $input['if_enable_custom_calloutbg'] == 1 ? 1 : 0 );   
  
     if ( ! isset( $input['if_show_slider_blog'] ) )
		$input['if_show_slider_blog'] = null;
	$input['if_show_slider_blog'] = ( $input['if_show_slider_blog'] == 1 ? 1 : 0 ); 
	
	     if ( ! isset( $input['if_widget_title_bg'] ) )
		$input['if_widget_title_bg'] = null;
	$input['if_widget_title_bg'] = ( $input['if_widget_title_bg'] == 1 ? 1 : 0 ); 
	
  	// Strip HTML from certain options
  	
   $input['if_logo'] = wp_filter_nohtml_kses( $input['if_logo'] );
  
   $input['if_facebook'] = wp_filter_nohtml_kses( $input['if_facebook'] ); 
    
   $input['if_twitter'] = wp_filter_nohtml_kses( $input['if_twitter'] ); 
  
   $input['if_linkedin'] = wp_filter_nohtml_kses( $input['if_linkedin'] );   
  
   $input['if_youtube'] = wp_filter_nohtml_kses( $input['if_youtube'] );  
  
   $input['if_rsslink'] = wp_filter_nohtml_kses( $input['if_rsslink'] );  
  
   $input['if_email'] = wp_filter_nohtml_kses( $input['if_email'] );   
  

	$options = get_option('ifeature');
  if ($_FILES['if_filename']['name'] != '') {
       $overrides = array('test_form' => false); 
       $file = wp_handle_upload($_FILES['if_filename'], $overrides);
       $input['file'] = $file;
   } elseif(isset($_POST['if_filename_text']) && $_POST['if_filename_text'] != '') {
	   $input['file'] = array('url' => $_POST['if_filename_text']);
   } else {
	   $input['file'] = null;
   }

if ($_FILES['if_favfilename']['name'] != '') {
       $overrides = array('test_form' => false); 
       $file2 = wp_handle_upload($_FILES['if_favfilename'], $overrides);
       $input['file2'] = $file2;
   } elseif(isset($_POST['if_favfilename_text']) && $_POST['if_favfilename_text'] != '') {
	   $input['file2'] = array('url' => $_POST['if_favfilename_text']);
   } else {
	   $input['file2'] = null;
   }
   
   if ($_FILES['if_homefilename']['name'] != '') {
       $overrides = array('test_form' => false); 
       $file3 = wp_handle_upload($_FILES['if_homefilename'], $overrides);
       $input['file3'] = $file3;
   } elseif(isset($_POST['if_homefilename_text']) && $_POST['if_homefilename_text'] != '') {
	   $input['file3'] = array('url' => $_POST['if_homefilename_text']);
   } else {
	   $input['file3'] = null;
   }
   
     if ($_FILES['if_calloutfilename']['name'] != '') {
       $overrides = array('test_form' => false); 
       $file4 = wp_handle_upload($_FILES['if_calloutfilename'], $overrides);
       $input['file4'] = $file4;
   } elseif(isset($_POST['if_calloutfilename_text']) && $_POST['if_calloutfilename_text'] != '') {
	   $input['file4'] = array('url' => $_POST['if_calloutfilename_text']);
   } else {
	   $input['file4'] = null;
   }


	return $input;    

}

?>
<?php


/* Truncate */

function truncate ($str, $length=10, $trailing='..')
{
 $length-=mb_strlen($trailing);
 if (mb_strlen($str)> $length)
	  {
 return mb_substr($str,0,$length).$trailing;
  }
 else
  {
 $res = $str;
  }
 return $res;
} 


/* Get first image */

function get_first_image() {
 global $post, $posts;
 $first_img = '';
 $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
 if(isset($matches[1][0])){
 $first_img = $matches [1][0];
 return $first_img;
 }  
}  

function if_section_text() {
    
}

function if_section_text2() {
    
}


function if_setting_filename() {
  }
  
/* Custom Menu */   
  
add_action( 'init', 'register_my_menu' );

function register_my_menu() {
	register_nav_menu( 'primary-menu', __( 'Primary Menu' ) );
}


// Add scripts and stylesheet

  function if_scripts() {
        wp_enqueue_script('ifjquery');
        wp_enqueue_script('ifjqueryui');
        wp_enqueue_script('ifjquerycookie');
        wp_enqueue_script('ifcookie');
        wp_enqueue_script('ifcolor');
   }
    
 function if_styles() {
       wp_enqueue_style('ifcss');
   }

/* Redirect after activation */

if ( is_admin() && isset($_GET['activated'] ) && $pagenow ==	"themes.php" )
	wp_redirect( 'themes.php?page=theme_options' );
	
/* Redirect after resetting theme options */

if ( isset( $_REQUEST['reset'] ))
  wp_redirect( 'themes.php?page=theme_options' );
  
/* Update theme options after saving the import code */
  
if ( isset( $_REQUEST['updated'] ))

  $options = get_option('ifeature') ; 
  $checkimport = $options['if_import_code'];
		
		if ($checkimport != '' ) {
			
			$options = get_option('ifeature') ;  
			$import = $options['if_import_code'];
			
			$options_array = (unserialize($import));
  			update_option( 'ifeature', $options_array );
		}   		

?>
