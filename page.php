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

/* End define global variables. */

/* Adjust Post Meta Data bar width.  NEED TO FIGURE SOMETHING TO REPLACE THIS */

if ($sidebar == "1" OR $sidebar == "2") {
	
		echo '<style type="text/css">';
		echo ".postmetadata {width: 480px;}";
		echo '</style>';
		
	}

?>

<div id="content_wrap">



	<!-- Begin @Core page_slider hook -->
		<?php chimps_page_slider(); ?> 
	<!-- End @Core page_slider hook -->

	<!-- Begin @Core Callout hook -->
		<?php chimps_callout_section(); ?> 
	<!-- End @Core callout hook -->	
	
	<!-- Begin @Core Twitterbar hook -->
		<?php chimps_twitterbar_section(); ?> 
	<!-- End @Core Twitterbar hook -->	
	
	<!-- Begin @Core page section hook -->
		<?php chimps_page_section(); ?> 
	<!-- End @Core page section hook -->	
		

	<!-- Begin @Core Box Section hook -->
		<?php chimps_box_section(); ?> 
	<!-- End @Core Box Section hook -->

</div><!--end content_wrap-->



<div style=clear:both;></div>
<?php get_footer(); ?>