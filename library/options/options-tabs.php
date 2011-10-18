<?php

/* 
	Options	Tabs
	Author: Tyler Cuningham
	Establishes the theme options tabs.
	Copyright (C) 2011 CyberChimps
	Version 2.0
	
*/

$shortname = $themeslug;

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
   

array( "name" => "Help",  
    "desc" => "",  
    "id" => $shortname."_general_faq",  
    "type" => "general_faq",  
    "std" => ""),
    
    
array( "name" => __( 'Logo URL', 'ifeature' ),  
    "desc" => __( 'Use the image uploader or enter your own URL into the input field to use an image as your logo. To display the site title as text, leave blank.', 'ifeature' ),   
    "id" => $shortname."_logo",  
    "type" => "upload",  
    "std" => ""),  

array( "name" =>  __( 'Header Contact Area', 'ifeature' ), 
    "desc" => __( 'Enter contact info such as phone number for the top right corner of the header. It can be HTML (to hide enter the word: hide).', 'ifeature' ),   
    "id" => $shortname."_header_contact",  
    "type" => "textarea",
    "std" => ""),
    
array( "name" => __( 'Custom Favicon', 'ifeature' ), 
    "desc" => __( 'A favicon is a 16x16 pixel icon that represents your site; paste the URL to a .ico image that you want to use as the image.', 'ifeature' ),   
    "id" => $shortname."_favicon",  
    "type" => "upload2",  
    "std" => ""),
    
array( "name" => __( 'Disable Breadcrumbs', 'ifeature' ), 
    "desc" => __( 'Check this box to disable breadcrumb links.', 'ifeature' ),  
    "id" => $shortname."_disable_breadcrumbs",  
      "type" => "checkbox",  
    "std" => "false"),

array( "name" => __( 'Google Analytics Code', 'ifeature' ),   
    "desc" => __( 'You can paste your Google Analytics or other tracking code in this box. This will be automatically be added to the footer.', 'ifeature' ),  
    "id" => $shortname."_ga_code",  
    "type" => "textarea",  
    "std" => ""),  

    
array( "type" => "close"),

array( "type" => "close-tab"),

//Design

array( "id" => "tab2",
	"type" => "open-tab"),
 
array( "type" => "open"),

array( "name" => "Help",  
    "desc" => "",  
    "id" => $shortname."_design_faq",  
    "type" => "design_faq",  
    "std" => ""),
    
array( "name" => __( 'Choose a font:', 'ifeature' ),  
    "desc" => __( '(Default is Arial)', 'ifeature' ),  
    "id" => $shortname."_font",  
    "type" => "select2",  
    "std" => ""),

array( "name" => __( 'Choose iMenu Color:', 'ifeature' ),
	"desc" => __( '(Default is Grey)', 'ifeature' ),
	"id" => $shortname."_menu_color",
	"type" => "select1",
	"std" => ""),
	
array( "name" => __( 'Choose a Menu Font:', 'ifeature' ),  
    "desc" => __( '(Default is Arial)', 'ifeature' ), 
    "id" => $shortname."_menu_font",  
    "type" => "select12",  
    "std" => ""),

array( "name" => __( 'Menu Link Color:', 'ifeature' ),  
    "desc" => __( 'Use the color picker to select the site menu link color (Default is FFFFFF)', 'ifeature' ),  
    "id" => $shortname."_menulink_color",  
      "type" => "color3",  
    "std" => "false"),
    

array( "name" => __( 'Custom Menu Icon:', 'ifeature' ),  
    "desc" => "Enter the link to your custom menu icon (optional).",  
    "id" => $shortname."_menuicon",  
    "type" => "upload3",  
    "std" => ""),
    
array( "name" => __( 'Hide Home Icon:', 'ifeature' ),  
    "desc" => __( 'Check this box to hide the home icon in the navigation', 'ifeature' ),  
    "id" => $shortname."_hide_home_icon",  
      "type" => "checkbox",  
    "std" => "false"),

array( "name" => __( 'Hide Menu Search:', 'ifeature' ),  
    "desc" => __( 'Check this box to hide the search box in the navigation.', 'ifeature' ),  
    "id" => $shortname."_hide_search",  
      "type" => "checkbox",  
    "std" => "false"),
    
array( "name" => __( 'Site Title Color', 'ifeature' ),  
    "desc" => __( 'Use the color picker to select the site title color', 'ifeature' ),  
    "id" => $shortname."_sitetitle_color",  
      "type" => "color1",  
    "std" => "false"),
    
array( "name" => __( 'Site Description Color', 'ifeature' ),  
    "desc" => __( 'Use the color picker to select the site description (tagline) color.', 'ifeature' ),  
    "id" => $shortname."_tagline_color",  
      "type" => "color9",  
    "std" => "false"),    
    
array( "name" => __( 'Link Color', 'ifeature' ),  
    "desc" => __( 'Use the color picker to select the site link color).', 'ifeature' ),  
    "id" => $shortname."_link_color",  
      "type" => "color2",  
    "std" => "false"),

array( "name" => __( 'Post Title Color', 'ifeature' ),  
    "desc" => __( 'Use the color picker to select the post title color,', 'ifeature' ),  
    "id" => $shortname."_posttitle_color",  
      "type" => "color4",  
    "std" => "false"),

array( "name" => __( 'Disable Header:', 'ifeature' ),  
    "desc" => __( 'Check this box to disable the header.', 'ifeature' ),  
    "id" => $shortname."_hide_header",  
      "type" => "checkbox",  
    "std" => "false"),

array( "name" => __( 'Enable Widget Title Background:', 'ifeature' ),  
    "desc" => __( 'Check this box to enable the classic widget title backgrounds.', 'ifeature' ),  
    "id" => $shortname."_widget_title_bg",  
      "type" => "checkbox",  
    "std" => "false"),

array( "name" => __( 'Custom CSS', 'ifeature' ),  
    "desc" => __( 'Override default CSS here.', 'ifeature' ),  
    "id" => $shortname."_css_options",  
    "type" => "customcss",  
    "std" => ""),  
    


array( "type" => "close"),
array( "type" => "close-tab"),

//Blog

array( "id" => "tab3",
	"type" => "open-tab"),
 
array( "type" => "open"),

array( "name" => "Help",  
    "desc" => "",  
    "id" => $shortname."_blog_faq",  
    "type" => "blog_faq",  
    "std" => ""),

array( "name" => "",  
    "desc" => "",  
    "id" => $shortname."_blog_title",  
    "type" => "blog_title",  
    "std" => ""),

array( "name" => __( 'Select the Sidebar Type:', 'ifeature' ),  
    "desc" => __( 'Select the sidebar type for your blog page (default is Right).', 'ifeature' ),  
    "id" => $shortname."_blog_sidebar",  
	"type" => "select8",  
    "std" => "false"),

array( "name" => __( 'Post Excerpts:', 'ifeature' ),  
    "desc" => __( 'Use the following options to control excerpts.', ' ifeature' ),  
    "id" => $shortname."_excerpts",  
      "type" => "excerpts",  
    "std" => "false"),

array( "name" => __( 'Featured Images', 'ifeature' ),  
    "desc" => __( 'Use the following options to control featured image alignment and size.', 'ifeature' ),  
    "id" => $shortname."_featured_images",  
      "type" => "featured",  
    "std" => "false"),

array( "name" => __( 'Hide Post Elements:', 'ifeature' ),  
    "desc" => __( 'Use the following checkboxes to hide various post elements.', 'ifeature' ),  
    "id" => $shortname."_hide_post_elements",  
    "type" => "post",  
    "std" => "false"),

array(  "name" => __( 'Show Facebook Like Button:', 'ifeature' ),
	"desc" => __( 'Check this box to show the Facebook Like Button on blog posts.', 'ifeature' ),
	"id" => $shortname."_show_fb_like",
	"type" => "checkbox",
	"std" => "false"),  
	
array(  "name" => __( 'Show Google +1 button', 'ifeature' ),
	"desc" => __( 'Check this box to show the Google +1 Button on blog posts.', 'ifeature' ),
	"id" => $shortname."_show_gplus",
	"type" => "checkbox",
	"std" => "false"),  
	
array( "name" => "",  
    "desc" => "",  
    "id" => $shortname."_slider_title",  
    "type" => "slider_title",  
    "std" => ""),
    
array( "name" => __( 'Hide the Slider:', 'ifeautre' ),  
    "desc" => __( 'Check this box to hide the Slider on your blog page.', 'ifeature' ),  
    "id" => $shortname."_hide_slider_blog",  
	"type" => "checkbox",  
    "std" => "false"),

array( "name" => __( 'Select the Slider Size:', 'ifeature' ),  
    "desc" => "Select the slider size for your blog page (default is Half-Width).",  
    "id" => $shortname."_slider_size",  
	"type" => "select9",  
    "std" => "false"),

array( "name" => __( 'Select the Slider Type:', 'ifeature' ),  
    "desc" => __( '(Choose between custom feature slides or a post category).', 'ifeature' ),  
    "id" => $shortname."_slider_type",  
    "type" => "select4",  
    "std" => ""), 
    
array( "name" => __( 'Show Posts From Blog Category:', 'ifeature' ),  
    "desc" => __( '(Default is all).', 'ifeature' ),  
    "id" => $shortname."_slider_category",  
    "type" => "select6",  
    "std" => ""),
    
array( "name" => __( 'Show Posts From Custom Slide Category,' , 'ifeature' ),  
    "desc" => __( '(Default is default)', 'ifeature' ),  
    "id" => $shortname."_customslider_category",  
    "type" => "select7",  
    "std" => ""),
    
array( "name" => __( 'Number of Featured Blog Posts:', 'ifeature' ),  
    "desc" => __( '(Default is 5)', 'ifeature' ),  
    "id" => $shortname."_slider_posts_number",  
    "type" => "text",  
    "std" => ""),  
    
array( "name" => __( 'Slider Height:' , 'ifeature' ),  
    "desc" => __( 'Default is 330.', 'ifeature' ),  
    "id" => $shortname."_slider_height",  
    "type" => "text",  
    "std" => ""),

array( "name" => __( 'Slider Delay Time (in milliseconds):', 'ifeature' ),  
    "desc" => __( '(Default is 3500)' , 'ifeature' ),  
    "id" => $shortname."_slider_delay",  
    "type" => "text",  
    "std" => ""),
    
array( "name" => __( 'Choose the Caption Style:', 'ifeature' ),  
    "desc" => __( '(Default is Bottom).', 'ifeature' ),  
    "id" => $shortname."_caption_style",  
    "type" => "select11",  
    "std" => ""),

array( "name" => __( 'Choose the Slider Animation:', 'ifeature' ),  
    "desc" => __( '(Default is random).', 'ifeature' ),  
    "id" => $shortname."_slider_animation",  
    "type" => "select3",  
    "std" => ""), 
    
array( "name" => __( 'Choose the Slider Navigation:', 'ifeature' ),  
    "desc" => __( '(Default is dots).', 'ifeature' ),  
    "id" => $shortname."_slider_nav",  
    "type" => "select10",  
    "std" => ""),   
    
array( "name" => __( 'Disable Slider Navigation:', 'ifeature' ),  
    "desc" => __( 'Check this box to hide the navigation arrows.', 'ifeature' ),  
    "id" => $shortname."_hide_slider_arrows",  
	"type" => "checkbox",  
    "std" => "false"),
    
array( "name" => __( 'Disable Slider Navigation Auto-Hide:', 'ifeature' ),  
    "desc" => __( 'Check this box to keep the navigation arrows active at all times.', 'ifeature' ),  
    "id" => $shortname."_disable_nav_autohide",  
	"type" => "checkbox",  
    "std" => "false"),
    
array( "name" => __( 'Enable WordThumb Image Resizing:', 'ifeature' ),  
    "desc" => __( 'Check this box to enable the use of WordThumb Image Resizing on the slider.' , 'ifeature' ),  
    "id" => $shortname."_enable_wordthumb",  
	"type" => "checkbox",  
    "std" => "false"),
    
array( "name" => "",  
    "desc" => "",  
    "id" => $shortname."_seo_title",  
    "type" => "seo_title",  
    "std" => ""),
    
array( "name" => __( 'Home Description', 'ifeature' ),  
    "desc" => __( 'Enter the META description of your homepage here.', 'ifeature' ),  
    "id" => $shortname."_home_description",  
    "type" => "textarea",  
    "std" => ""),
    
array( "name" => __( 'Home Keywords', 'ifeature' ),  
    "desc" => __( 'Enter the META keywords of your homepage here (separated by commas).', 'ifeature' ),  
    "id" => $shortname."_home_keywords",  
    "type" => "textarea2",  
    "std" => ""),
    
array( "name" => __( 'Optional Home Title:)', 'ifeature' ),  
    "desc" => __( 'Enter an alternative title of your homepage here (default is site tagline).', 'ifeature' ),  
    "id" => $shortname."_home_title",  
    "type" => "text2",  
    "std" => ""),

array( "type" => "close"),
array( "type" => "close-tab"),

// Social

array( "id" => "tab4",
	"type" => "open-tab"),
 
array( "type" => "open"),

array( "name" => "Help",  
    "desc" => "",  
    "id" => $shortname."_social_faq",  
    "type" => "social_faq",  
    "std" => ""),

array( "name" => __( 'Facebook URL', 'ifeature' ),  
    "desc" => __( 'Enter your Facebook page URL for the Facebook social icon.', 'ifeature' ),  
    "id" => $shortname."_facebook",  
    "type" => "facebook",  
    "std" => "http://facebook.com/"),

array( "name" => __( 'Twitter URL:', 'ifeature' ),  
    "desc" => __( 'Enter your Twitter URL for the Twitter social icon.', 'ifeature' ),  
    "id" => $shortname."_twitter",  
    "type" => "twitter",  
    "std" => "http://twitter.com/"),
    
array( "name" => __( 'Google Plus URL:', 'ifeature' ),  
    "desc" => __( 'Enter your Google Plus url (we recommend using the http://gplus.to/ shortener).', 'ifeature'),  
    "id" => $shortname."_gplus",  
    "type" => "gplus",  
    "std" => "https://plus.google.com/"),
    
array( "name" => __( 'Flickr URL', 'ifeature' ),  
    "desc" => __( 'Enter your Flickr URL for the Flickr social icon.', 'ifeature' ),  
    "id" => $shortname."_flickr",  
    "type" => "flickr",  
    "std" => "http://flickr.com/"),
    
array( "name" => __( 'Myspace URL', 'ifeature' ),  
    "desc" => __( 'Enter your Myspace URL for Myspace social icon.', 'ifeature' ),  
    "id" => $shortname."_myspace",  
    "type" => "myspace",  
    "std" => "http://myspace.com/"),
    
array( "name" => __( 'LinkedIn URL', 'ifeature' ),  
    "desc" => __( 'Enter your LinkedIn URL for the LinkedIn social icon.', 'ifeature' ),  
    "id" => $shortname."_linkedin",  
    "type" => "linkedin",  
    "std" => "http://linkedin.com/"),  
    
array( "name" => __( 'YouTube URL:', 'ifeature' ),  
    "desc" => __( 'Enter your YouTube URL for the YouTube social icon.', 'ifeature' ),  
    "id" => $shortname."_youtube",  
    "type" => "youtube",  
    "std" => "http://youtube.com/"),  
    
array( "name" => __( 'Google Maps URL:', 'ifeature' ),  
    "desc" => __( 'Enter your Google Maps URL for the Google Maps social icon.', 'ifeature' ),  
    "id" => $shortname."_googlemaps",  
    "type" => "googlemaps",  
    "std" => "http://google.com/maps/"),  

array( "name" => __( 'Email:', 'ifeature' ),  
    "desc" => "Enter your contact email address for email social icon.",  
    "id" => $shortname."_email",  
    "type" => "email",  
    "std" => "no@way.com"),
    
array( "name" => __( 'Custom RSS Link:', 'ifeature' ),  
    "desc" => __( 'Enter Feedburner URL, or leave blank for default RSS feed.', 'ifeature' ),  
    "id" => $shortname."_rsslink",  
    "type" => "rss",  
    "std" => ""),   
     
array( "type" => "close"),

array( "type" => "close-tab"),


// Footer

array( "id" => "tab5",
	"type" => "open-tab"),

array( "type" => "open"),
  
array( "name" => "Help",  
    "desc" => "",  
    "id" => $shortname."_footer_faq",  
    "type" => "footer_faq",  
    "std" => ""),

array( "name" => __( 'Footer Copyright', 'ifeature' ),  
    "desc" => __( 'Enter Copyright text used on the right side of the footer. It can be HTML (default is your blog title),', 'ifeature' ),  
    "id" => $shortname."_footer_text",  
    "type" => "textarea",  
    "std" => ""),
    
array( "name" => __( 'Footer Color', 'ifeature' ),  
    "desc" => __( 'Use the color picker to select a custom footer color (default is 222).', 'ifeature' ),  
    "id" => $shortname."_footer_color",  
    "type" => "color8",  
    "std" => ""),    
    
array( "name" => __( 'Hide Our Link', 'ifeature' ),  
    "desc" => __( 'Check this box to hide the link back to CyberChimps.com.', 'ifeature' ),  
    "id" => $shortname."_hide_link",  
      "type" => "checkbox",  
    "std" => "false"),
    
array( "type" => "close"),

array( "type" => "close-tab"),

// Import/Export

array( "id" => "tab6",
	"type" => "open-tab"),

array( "type" => "open"),

array( "name" => "Help",  
    "desc" => "",  
    "id" => $shortname."_import_faq",  
    "type" => "import_faq",  
    "std" => ""),
  
array( "name" => __( 'Import Options Settings', 'ifeature' ),  
    "desc" => __( 'To import your settings, Paste the export code here and press Save Settings.', 'ifeature' ),  
    "id" => $shortname."_import_code",  
    "type" => "import",  
    "std" => ""), 
    
array( "name" => __( 'Export Options Settings' , 'ifeature' ),  
    "desc" => __( 'Copy the following code, Paste it into a text file and save it. This code can be used to import your settings into another site' , 'ifeature' ),  
    "id" => $shortname."_export_code",  
    "type" => "export",  
    "std" => ""), 
    
array( "type" => "close"),

array( "type" => "close-tab"),


);  

?>