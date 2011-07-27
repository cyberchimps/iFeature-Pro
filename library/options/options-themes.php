<?php
/* 
	Options	Themes
	Author: Tyler Cunningham
	Establishes the CyberChimps Themes page.
	Copyright (C) 2011 CyberChimps
	Version 2.0
	
*/



// Add page to the menu
function cyberchimps_store_add_menu() {
	add_theme_page('CyberChimps Store Page', 'CyberChimps Store', 'administrator', 'themes', 'cyberchimps_store_page_init');
}

add_action('admin_menu', 'cyberchimps_store_add_menu');

// Create the page
function cyberchimps_store_page_init() {
	$root = get_template_directory_uri(); 
?>
	<div class="wrap" style="margin-left: 10px;">
	<br />
		<font size="5"><b>CyberChimps Store</b></font>
		<br /><br />
		<div style="width: 30%; float: left; margin-right: 15px;">
		<font size="3"><b>Business Pro</b></font>
		<br /><br />
		<center><img src="<?php echo $root ;?>/images/themes/bizprolarge.png" ></center>
		<br /> <br />
		Business Pro is a Professional WordPress Theme.

Business Pro gives your company the tools to turn WordPress into a modern feature rich Content Management System (CMS).
<br /><br />
We built Business Pro on the same solid foundation as iFeature Pro and Neuro Pro, and enhanced the design for businesses. Business Pro offers intuitive options enabling any business to use WordPress as their content management system. Business Pro offers designers and developers Custom CSS, Import / Export options, and support for CSS3, and HTML5. Even if you are not a designer, Business Pro is built to be business friendly.
		<br /><br />
		<center><a href="http://cyberchimps.com/businesspro" target="_blank"><img src="<?php echo $root ;?>/images/themes/buybizpro.png"></a></center>
		</div>
		
		<div style="width: 30%; float: left; margin-right: 15px;">
		<font size="3"><b>iFeature Pro</b></font>
		<br /><br />
		<center><img src="<?php echo $root ;?>/images/themes/ifeaturepropromo.jpg"></center>
		<br /><br />
		iFeature Pro turns WordPress into a beautifully designed feature rich Content Management System (CMS).

We thought differently when developing iFeature Pro, and took CyberChimps years of experience developing websites for clients and built user friendly settings for the most requested features from the ground up.
<br /><br />
iFeature Pro is an advanced WordPress theme released under the GNU GPL v2. iFeature Pro works great in Chrome, Safari, FireFox, and Internet Explorer 7, 8, and 9 (we do not support Internet Explorer 6). <br /><br />
		<center><a href="http://cyberchimps.com/ifeaturepro" target="_blank"><img src="<?php echo $root ;?>/images/themes/buyifeaturepro.png"></a></center>
		</div>
		
		<div style="width: 30%; float: left;">
		<font size="3"><b>Neuro Pro</b></font>
		<br /><br />
		<center><img src="<?php echo $root ;?>/images/themes/neuropropage.png"></center>
		<br /> <br />
		Neuro Pro gives you the tools to turn WordPress into a modern feature rich Content Management System (CMS).

We built Neuro Pro on the same solid foundation as iFeature Pro, and added new powerful design options. Neuro Pro features intuitive design options allowing anyone the ability to easily customize the look and feel of WordPress. We also included several popular color scheme to choose from, as well as beautiful modern background images. Neuro Pro also offers designers and developers Custom CSS, Import / Export options, and support for CSS3 and HTML5.
<br /><br />
Neuro Pro is a next generation WordPress theme released under the GNU GPL v2. Neuro Pro works great in Chrome, Safari, FireFox, and Internet Explorer 7, 8, and 9 (we do not support Internet Explorer 6).
		<br /> <br />
		<center><a href="http://cyberchimps.com/neuropro" target="_blank"><img src="<?php echo $root ;?>/images/themes/buyneuropro.png"></a></center>
		</div>
		
	</div>
<?php
}
