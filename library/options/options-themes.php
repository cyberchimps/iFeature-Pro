<?php
/* 
	Options	Themes
	Author: Tyler Cunningham
	Establishes the CyberChimps Themes page.
	Copyright (C) 2011 CyberChimps
	Version 2.0
	
*/

add_action('admin_menu', 'cyberchimps_themes_add_menu');


// Add sub page to the Settings Menu
function cyberchimps_themes_add_menu() {
	add_theme_page('CyberChimps Themes Page', 'CyberChimps Themes', 'administrator', 'themes', 'cyberchimps_themes_page');
}

// Display the admin options page
function cyberchimps_themes_page() {
?>
	<div class="wrap">
		<h2>CyberChimps Themes</h2>
		Some optional text here explaining the overall purpose of the options and what they relate to etc.
		<form action="options.php" method="post">
		
	</div>
<?php
}
