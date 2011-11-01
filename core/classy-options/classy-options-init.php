<?php

require( 'classy-options-framework/classy-options-framework.php');

global $ifeature_options;
$ifeature_options = new ClassyOptions("ifeature", "iFeature Options");

$ifeature_options
	->section("General")
		->upload("custom_logo", "Custom Logo")
		->textarea("if_header_contact")
;
