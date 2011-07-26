<?php   

/* 
	Options	Themes
	Author: Tyler Cunningham
	Establishes the CyberChimps Themes page.
	Copyright (C) 2011 CyberChimps
	Version 2.0
	
*/
?>

<div class="wrap">
<h2>CyberChimps Themes</h2>

<form method="post" action="options.php"> 

<?php 

	settings_fields( 'cyberchimps-themes' );
	do_settings( 'cyberchimps-themes' );
	
?>

<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>
</form>
</div>

<?php

	if ( is_admin() ){ // admin actions
  		add_action( 'admin_menu', 'add_mymenu' );
  		add_action( 'admin_init', 'register_mysettings' );
	} 
	else {
  // non-admin enqueues, actions, and filters
	}