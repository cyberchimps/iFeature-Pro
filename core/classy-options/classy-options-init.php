<?php

require( 'classy-options-framework/classy-options-framework.php');

global $ifeature_options, $themeslug, $themenamefull;
$ifeature_options = new ClassyOptions("ifeature", $themenamefull." Options");

$ifeature_options
	->section("General")
		->upload($themeslug."custom_logo", "Custom Logo")
		->textarea($themeslug."_header_contact", "Header Contact Area")
		->upload($themeslug."custom_favicon", "Custom Favicon")
		->checkbox($themeslug."disable_breadcrumbs", "Disable breadcrumbs")
	->section("Design")
		->upload("custom_logo_test", "Custom Logo")
		->textarea("header_contact")
	->section("Blog")
	->section("Social")
	->section("Footer")
		->textarea($themeslug."_google_analytics", "Google Analytics Code")
	
;
