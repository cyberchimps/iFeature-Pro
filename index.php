<?php

 /*
	Index
	
	Creates the iFeature default index page.
	
	Copyright (C) 2011 CyberChimps
*/

	global $options, $themeslug, $post; // call globals
	
	$reorder = $options->get($themeslug.'_blog_section_order');
	$slidersize = $options->get($themeslug.'_slider_size');
	$nivoslidersize = $options->get($themeslug.'_nivo_slider_size');
	
			
/* Set slider hook based on page option */

	if (preg_match("/synapse_blog_slider/", $reorder ) && $slidersize != "key2" ) {
		remove_action ( 'synapse_blog_slider', 'synapse_slider_content' );
		add_action ( 'synapse_blog_content_slider', 'synapse_slider_content');
	}
	
	if (preg_match("/synapse_blog_nivoslider/", $reorder ) && $nivoslidersize == "key1" ) {
		remove_action ( 'synapse_blog_nivoslider', 'synapse_nivoslider_content' );
		add_action ( 'synapse_blog_content_slider', 'synapse_nivoslider_content');
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
	</div><!--end row-->
</div><!--end container-->

<!-- For sticky footer -->
<div class="push"></div>  
</div>	<!-- End of wrapper -->

<?php get_footer(); ?>