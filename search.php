<?php 

/*
	Search
	
	Establishes the iFeature search functionality. 
	
	Copyright (C) 2011 CyberChimps
*/

get_header(); 

?>

<div id="content_wrap">

	<!-- Begin @Core before_entry hook -->
		<?php chimps_before_entry(); ?>
	<!-- End @Core before_entry hook -->
	
	<!-- Begin @Core before_search hook -->
		<?php chimps_before_search(); ?>
	<!-- End @Core before_search hook -->
	
	<!-- Begin @Core search hook -->
		<?php chimps_search(); ?>
	<!-- End @Core search hook -->
	
	<!-- Begin @Core after_search hook -->
		<?php chimps_after_search(); ?>
	<!-- End @Core after_search hook -->
	
	<div id="sidebar_right"><?php get_sidebar(); ?></div>
</div><!--end content_wrap-->
<div class="clear"></div>

<?php get_footer(); ?>
