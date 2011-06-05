<?php

/*
// TEMP: Enable update check on every request. Normally you don't need this! This is for testing only!
set_site_transient('update_themes', null);
*/

add_filter('set_site_transient_update_themes', 'check_for_update');

function check_for_update($checked_data) {
	global $wp_version;
	
	if (empty($checked_data->checked))
		return $checked_data;
	
	$api_url = 'http://orangeola.com/api/';
	$theme_base = basename(dirname(dirname(__FILE__)));
	
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