<?php

require( 'classy-options-framework/classy-options-framework.php');

add_action('init', 'chimps_init_options');

function chimps_init_options() {

global $options, $themeslug, $themename, $themenamefull;
$options = new ClassyOptions($themename, $themenamefull." Options");

$customterms2 = get_terms('category', 'hide_empty=0');

	$customslider = array();
                                    
    	foreach($customterms2 as $customterm) {

        	$customslider[$customterm->slug] = $customterm->name;

        }

$terms2 = get_terms('category', 'hide_empty=0');

	$blogoptions = array();
                                    
	$blogoptions['all'] = "All";

    	foreach($terms2 as $term) {

        	$blogoptions[$term->slug] = $term->name;

        }


$options
	->section("General")
		->upload($themeslug."_custom_logo", "Custom Logo")
		->textarea($themeslug."_header_contact", "Header Contact Area")
		->upload($themeslug."_custom_favicon", "Custom Favicon")
		->checkbox($themeslug."_disable_breadcrumbs", "Disable breadcrumbs")
	->section("Design")
		->select($themeslug."_font", "Choose a Font", array( 'options' => array("Arial" => "Arial (default)", "Courier New" => "Courier New", "Georgia" => "Georgia", "Helvetica" => "Helvetica", "Lucida Grande" => "Lucida Grande", "Tahoma" => "Tahoma", "Times New Roman" => "Times New Roman", "Verdana" => "Verdana", "Actor" => "Actor", "Coda" => "Coda", "Maven+Pro" => "Maven Pro", "Metrophobic" => "Metrophobic", "News+Cycle" => "News Cycle", "Nobile" => "Nobile", "Tenor+Sans" => "Tenor Sans", "Quicksand" => "Quicksand", "Ubuntu" => "Ubuntu")))
		->text($themeslug."_custom_font", "Enter a Custom Font")
		->select($themeslug."_color_scheme", "Select a Color Scheme", array( 'options' => array("key1" => "Blue", "key2" => "Black")))
		->color($themeslug."_menu_link_color", "Menu Link Color")
		->color($themeslug."_site_title_color", "Site Title Color")
		->color($themeslug."_site_description_color", "Site Description Color")
		->color($themeslug."_link_color", "Link Color")
		->color($themeslug."_post_title_color", "Post Title Color")
		->color($themeslug."_footer_color", "Footer Color")
		->textarea($themeslug."_css_options", "Custom CSS")
	->section("Blog")
		->select($themeslug."_blog_sidebar", "Select the Sidebar Type", array( 'options' => array("key1" => "Right", "key2" => "None", "key3" => "Two Right", "key4" => "Right and Left")))
		->checkbox($themeslug."_show_excerpts", "Post Excerpts")
		->text($themeslug."_excerpt_link_text", "Excerpt Link Text")
		->text($themeslug."_excerpt_length", "Excerpt Length")
		->select($themeslug."_featured_images", "Featured Images", array( 'options' => array("key1" => "Left", "key2" => "Center", "key3" => "Right")))
		->text($themeslug."_featured_image_height", "Featured Image Height")
		->text($themeslug."_featured_image_width", "Featured Image WIdth")
		->multicheck($themeslug."_hide_byline", "Hide Post Byline Elements", array( 'options' => array("key1" => "Author", "key2" => "Categories", "key3" => "Date", "key4" => "Comments", "key5" => "Share", "key6" => "Tags")))
		->checkbox($themeslug."_show_fb_like", "Show Facebook Like Button")
		->checkbox($themeslug."_show_gplus", "Show Google Plus One Button")
		->checkbox($themeslug."_hide_slider_blog", "Hide Index Slider")
		->select($themeslug."_slider_size", "Select the Slider Size", array( 'options' => array("key1" => "half", "key2" => "full")))
		->select($themeslug."_slider_type", "Select the Slider Type", array( 'options' => array("key1" => "posts", "key2" => "custom")))
		->select($themeslug.'_slider_posts_category', 'Select the post category for the slider', array( 'options' => $blogoptions ))
		->select($themeslug.'_slider_custom_category', 'Select the custom slide category for the slider', array( 'options' => $customslider ))
		->text($themeslug."_slider_posts_number", "Number of Featured Blog Posts")
		->text($themeslug."_slider_height", "Slider height")
		->text($themeslug."_slider_delay", "Slider Delay")
		->select($themeslug."_caption_style", "Select the Caption Style", array( 'options' => array("key1" => "Bottom", "key2" => "Right", "key3" => "Left", "key4" => "None")))
		->select($themeslug."_slider_animation", "Select the Sidebar Animation", array( 'options' => array("key1" => "Random", "key2" => "sliceDown", "key3" => "sliceDownLeft", "key4" => "sliceUp", "key5" => "sliceUpLeft", "key6" => "sliceUpDown", "key7" => "sliceUpDownLeft", "key8" => "fold", "key9" => "fade", "key10" => "slideInRight", "key11" => "slideInLeft", "key12" => "boxRandom", "key13" => "boxRain", "key14" => "boxRainReverse", "key15" => "boxRainGrow", "key16" => "boxRainGrowReverse",)))
		->select($themeslug."_slider_nav", "Select the Slider Navigation", array( 'options' => array("key1" => "Dots", "key2" => "Thumbnails", "key3" => "none")))
		->checkbox($themeslug."_hide_slider_arrows", "Disable Slider Navigation")
		->checkbox($themeslug."_disable_nav_autohide", "Disable Slider Navigation Auto-Hide")
		->checkbox($themeslug."_enable_wordthumb", "Enable WordThumb Image Resizing")
		->textarea($themeslug."_home_description", "Home Description")
		->textarea($themeslug."_home_keywords", "Home Keywords")
		->text($themeslug."_home_title", "Optional Home Title")
	->section("Social")
		->text($themeslug."_twitter", "Twitter Icon URL")
		->checkbox($themeslug."_hide_twitter", "Hide Twitter Icon")
		->text($themeslug."_facebook", "Facebook Icon URL")
		->checkbox($themeslug."_hide_facebook", "Hide Facebook Icon")
		->text($themeslug."_gplus", "Google + Icon URL")
		->checkbox($themeslug."_hide_gplus", "Hide Google + Icon")
		->text($themeslug."_flickr", "Flickr Icon URL")
		->checkbox($themeslug."_hide_flickr", "Hide Flickr Icon")
		->text($themeslug."_myspace", "Myspace Icon URL")
		->checkbox($themeslug."_hide_myspace", "Hide Myspace Icon")
		->text($themeslug."_linkedin", "LinkedIn Icon URL")
		->checkbox($themeslug."_hide_linkedin", "Hide LinkedIn Icon")
		->text($themeslug."_youtube", "YouTube Icon URL")
		->checkbox($themeslug."_hide_youtube", "Hide YouTube Icon")
		->text($themeslug."_googlemaps", "Google Maps Icon URL")
		->checkbox($themeslug."_hide_googlemaps", "Hide Google maps Icon")
		->text($themeslug."_email", "Email Address")
		->checkbox($themeslug."_hide_email", "Hide Email Icon")
		->text($themeslug."_rsslink", "RSS Icon URL")
		->checkbox($themeslug."_hide_rss", "Hide RSS Icon")
	->section("Footer")
		->text($themeslug."_footer_text", "Footer Copyright Text")
		->textarea($themeslug."_ga_code", "Google Analytics Code")
		->checkbox($themeslug."_hide_link", "Hide CyberChimps Link")
			
;
}
