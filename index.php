<?php

 /*
	Index
	
	Creates the iFeature default index page.
	
	Copyright (C) 2011 CyberChimps
*/

	global $options, $themeslug, $post; // call globals
	
	$reorder = $options->get($themeslug.'_blog_section_order');
	$slidersize = $options->get($themeslug.'_slider_size');
	$blogsidebar = $options->get($themeslug.'_blog_sidebar');
	$sidebar = get_post_meta($post->ID, 'page_sidebar' , true);
	
	if ($sidebar == "1" OR $sidebar == "2" OR $blogsidebar == 'two-right' OR $blogsidebar == 'right-left' ) {
		$content_grid = 'grid_6';
	}
	
	elseif ($sidebar == "3" OR $blogsidebar == 'none' ) {
		$content_grid = 'grid_12';
	}
	
	else {
		$content_grid = 'grid_8';
	}
	
/* Set slider hook based on page option */

	if (preg_match("/chimps_blog_slider/", $reorder ) && $slidersize != "key2" ) {
		remove_action ( 'chimps_blog_slider', 'chimps_blog_slider_content' );
		add_action ( 'chimps_blog_content_slider', 'chimps_blog_slider_content');
	}
	
/* End set slider hook*/

?>

<?php get_header(); ?>

<div class="container_12">

	<?php
		foreach(explode(",", $options->get($themeslug.'_blog_section_order')) as $fn) {
			if(function_exists($fn)) {
				call_user_func_array($fn, array());
			}
		}
	?>

</div><!--end container_12-->

<div class='clear'>&nbsp;</div>

<?php get_footer(); ?>