<?php

 /*
	Index
	
	Creates the iFeature default index page.
	
	Copyright (C) 2011 CyberChimps
*/

	global $options, $themeslug, $post; // call globals
	
	$reorder = $options->get($themeslug.'_blog_section_order');
	$slidersize = $options->get($themeslug.'_slider_size');
			
/* Set slider hook based on page option */

	if (preg_match("/chimps_blog_slider/", $reorder ) && $slidersize != "key2" ) {
		remove_action ( 'chimps_blog_slider', 'chimps_blog_slider_content' );
		add_action ( 'chimps_blog_content_slider', 'chimps_blog_slider_content');
	}
	
/* End set slider hook*/

?>

<?php get_header(); ?>

<div class="container">
	<div class="row">
		<?php
			foreach(explode(",", $options->get($themeslug.'_blog_section_order')) as $fn) {
				if(function_exists($fn)) {
					call_user_func_array($fn, array());
				}
			}
		?>
	</div>
</div><!--end container-->
<?php get_footer(); ?>