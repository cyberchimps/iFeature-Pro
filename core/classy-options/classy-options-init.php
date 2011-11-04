<?php

require( 'classy-options-framework/classy-options-framework.php');

global $ifeature_options, $themeslug, $themenamefull;
$ifeature_options = new ClassyOptions("ifeature", $themenamefull." Options");

$ifeature_options
	->section("General")
		->upload($themeslug."_custom_logo", "Custom Logo")
		->textarea($themeslug."_header_contact", "Header Contact Area")
		->upload($themeslug."_custom_favicon", "Custom Favicon")
		->checkbox($themeslug."_disable_breadcrumbs", "Disable breadcrumbs")
	->section("Design")
		->color($themeslug."_menu_link_color", "Menu Link Color")
		->color($themeslug."_site_title_color", "Site Title Color")
		->color($themeslug."_site_description_color", "Site Description Color")
		->color($themeslug."_link_color", "Link Color")
		->color($themeslug."_post_title_color", "Post Title Color")
		->textarea($themeslug."_custom_css", "Custom CSS")
	->section("Blog")
		->checkbox($themeslug."_show_fb_like", "Show Facebook Like Button")
		->checkbox($themeslug."_show_plus_one", "Show Google Plus One Button")
		->textarea($themeslug."_home_description", "Home Description")
		->textarea($themeslug."_home_keywords", "Home Keywords")
		->text($themeslug."_home_title", "Optional Home Title")
	->section("Social")
		->text($themeslug."_twitter_url", "Twitter Icon URL")
		->text($themeslug."_facebook_url", "Facebook Icon URL")
		->text($themeslug."_gplus_url", "Google + Icon URL")
		->text($themeslug."_flickr_url", "Flickr Icon URL")
		->text($themeslug."_myspace_url", "Myspace Icon URL")
		->text($themeslug."_linkedin_url", "LinkedIn Icon URL")
		->text($themeslug."_youtube_url", "YouTube Icon URL")
		->text($themeslug."_maps_url", "Google Maps Icon URL")
		->text($themeslug."_email_address", "Email Address")
		->text($themeslug."_rss_url", "RSS Icon URL")
	->section("Footer")
		->textarea($themeslug."_google_analytics", "Google Analytics Code")
		->select($themeslug."_footer_show", "Show in Footer", array( 'options' => array('nothing' => "Nothing", 'credits' => "Credits", "everything" => "Everything" )))
	
;
