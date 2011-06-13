<<<<<<< HEAD
<?php


/**/
// TEMP: Enable update check on every request. Normally you don't need this! This is for testing only!
//set_site_transient('update_themes', null);


add_filter('pre_set_site_transient_update_themes', 'check_for_update');

	$theme_data = get_theme_data( TEMPLATEPATH . '/style.css');
	$theme_version = $theme_data['Version'];
	$theme_base = get_option('stylesheet');
	
	/******************Change this*******************/
	$api_url = 'http://cyberchimps.com/api/';
	/************************************************/
	
function check_for_update($checked_data) {
	global $wp_version, $theme_version, $theme_base, $api_url;
	
	$request = array(
		'slug' => $theme_base,
		'version' => $checked_data->checked[$theme_base .'/'. $theme_base .'.php']
	);
	
	// Start checking for an update
	$send_for_check = array(
		'body' => array(
			'action' => 'theme_update', 
			'request' => serialize($request),
			'api-key' => md5(get_bloginfo('url'))
		),
		'user-agent' => 'WordPress/' . $wp_version . '; ' . get_bloginfo('url')
	);

	$raw_response = wp_remote_post($api_url, $send_for_check);
	
	if (!is_wp_error($raw_response) && ($raw_response['response']['code'] == 200))
		$response = unserialize($raw_response['body']);
		
	// Feed the update data into WP updater
	if (!empty($response)) 
		$checked_data->response[$theme_base] = $response;
	
	return $checked_data;
}


if (is_admin())
	$current = get_transient('update_themes');

?>
=======
<?php
/**/// TEMP: Enable update check on every request. Normally you don't need this! This is for testing only!set_site_transient('update_themes', null);
add_filter('pre_set_site_transient_update_themes', 'check_for_update');	$theme_data = get_theme_data( TEMPLATEPATH . '/style.css');	$theme_version = $theme_data['Version'];	$theme_base = get_option('stylesheet');		/******************Change this*******************/	$api_url = 'http://cyberchimps.com/api/';	/************************************************/	
function check_for_update($checked_data) {	global $wp_version, $theme_version, $theme_base, $api_url;	$request = array(		'slug' => $theme_base,		'version' => $theme_version 	);	// Start checking for an update	$send_for_check = array(		'body' => array(			'action' => 'theme_update', 			'request' => serialize($request),			'api-key' => md5(get_bloginfo('url'))		),		'user-agent' => 'WordPress/' . $wp_version . '; ' . get_bloginfo('url')	);	
	$raw_response = wp_remote_post($api_url, $send_for_check);	if (!is_wp_error($raw_response) && ($raw_response['response']['code'] == 200))		$response = unserialize($raw_response['body']);
	// Feed the update data into WP updater	if (!empty($response)) 		$checked_data->response[$theme_base] = $response;
	return $checked_data;}// Take over the Plugin info screenadd_filter('themes_api', 'my_theme_api_call', 10, 3);function my_theme_api_call($def, $action, $args) {	global $theme_base, $api_url, $theme_version, $api_url;	if ($args->slug != $theme_base)		return false;		// Get the current version	$args->version = $theme_version;	$args->name = 	$request_string = prepare_request($action, $args);	$request = wp_remote_post($api_url, $request_string);	if (is_wp_error($request)) {		$res = new WP_Error('themes_api_failed', __('An Unexpected HTTP Error occurred during the API request.</p> <p><a href="?" onclick="document.location.reload(); return false;">Try again</a>'), $request->get_error_message());	} else {		$res = unserialize($request['body']);				if ($res === false)			$res = new WP_Error('themes_api_failed', __('An unknown error occurred'), $request['body']);	}		return $res;}
if (is_admin())	$current = get_transient('update_themes');?>
>>>>>>> ecfa5a978d02ac0811db20a025373c2434e884be
