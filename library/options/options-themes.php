<?php   

/* 
	Options	Themes
	Author: Tyler Cunningham
	Establishes the CyberChimps Themes page.
	Copyright (C) 2011 CyberChimps
	Version 2.0
	
*/


 // add the CyberChimps theme page
	add_action('admin_menu', 'cyberchimps_themes_page');
	
	function cyberchimps_themes_page() {
		add_theme_page('CyberChimps Theme Page', 'CyberChimps Themes', 'manage_options', 'themes', 'cyberchimps_theme_page');
	}
 
 // display the CyberChimps theme page
	function cyberchimps_theme_page() {
		
		$root = get_template_directory_uri(); 
?>
	<div>
		<h2>CyberChimps Themes</h2>
		
		IFEETURE PRO<br /> <br />
		
		6 MILLION SANDWICHES

	</div>

<?php

}?>


