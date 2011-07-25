<?php

/* 
	Options	Tabs
	Author: Tyler Cuningham
	Establishes the theme options tabs.
	Copyright (C) 2011 CyberChimps
	Version 2.0
	
*/

$shortname = "if";

$optionlist = array (

array( "id" => $shortname,
	"type" => "open-tab"),

array( "type" => "open"),
array( "type" => "close"),

array( "type" => "close-tab"),

// General

array( "id" => "tab1",
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

array( "id" => "tab2",
	"type" => "open-tab"),
 
array( "type" => "open"),


array( "name" => "Choose iMenu Color",
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

array( "id" => "tab3",
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

array( "id" => "tab4",
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
    
array( "name" => "Number of featured blog posts:",  
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

// Footer

array( "id" => "tab5",
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

array( "id" => "tab6",
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

?>