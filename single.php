<?php 

/*
	Single
	
	Establishes the single post template of iFeature. 
	
	Copyright (C) 2011 CyberChimps
*/


	global $options, $themeslug, $post; // call globals

/* End variable definition. */	


get_header(); ?>

<div class="container_12">

<?php if (function_exists('chimps_breadcrumbs') && ($options->get($themeslug.'_disable_breadcrumbs') == "1")) { chimps_breadcrumbs(); }?>

	<!--Begin @Core post area-->
		<?php chimps_index(); ?>
	<!--End @Core post area-->
	
</div><!--end container_12-->

<div style="clear:both;"></div>

<?php get_footer(); ?>