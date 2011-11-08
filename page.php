<?php 

/*
	Page
	Establishes the core iFeature page tempate.
	Version: 2.0
	Copyright (C) 2011 CyberChimps

*/

/* Header call. */

	get_header(); 
	
/* End header. */	

/* Define global variables. */

	$enable = get_post_meta($post->ID, 'page_enable_slider' , true);
	$size = get_post_meta($post->ID, 'page_slider_size' , true);
	$hidetitle = get_post_meta($post->ID, 'hide_page_title' , true);
	$sidebar = get_post_meta($post->ID, 'page_sidebar' , true);
	$callout = get_post_meta($post->ID, 'enable_callout_section' , true);
	$twitterbar = get_post_meta($post->ID, 'enable_twitter_bar' , true);
	$enableboxes = get_post_meta($post->ID, 'enable_box_section' , true);
	$pagecontent = get_post_meta($post->ID, 'hide_page_content' , true);
	$page_section_order = get_post_meta($post->ID, 'page_section_order' , true);

/* End define global variables. */

/* Adjust Post Meta Data bar width.  NEED TO FIGURE SOMETHING TO REPLACE THIS */

if ($sidebar == "1" OR $sidebar == "2") {
	
		echo '<style type="text/css">';
		echo ".postmetadata {width: 480px;}";
		echo '</style>';
		
	}

?>

<div class="container_12">



<?php
	foreach(explode(",", $page_section_order) as $key) {
		$fn = 'chimps_' . $key;
		if(function_exists($fn)) {
			call_user_func_array($fn, array());
		}
	}
?>

</div><!--end container_12-->



<div style=clear:both;></div>
<?php get_footer(); ?>
