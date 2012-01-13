<?php 

/*
	Search
	
	Establishes the iFeature search functionality. 
	
	Copyright (C) 2011 CyberChimps
*/

global $options, $themeslug, $post, $sidebar; // call globals
	
	$sidebar = $options->get($themeslug.'_search_sidebar');
	
	if ($sidebar == 'two-right' OR $sidebar == 'right-left' ) {
		$content_grid = 'grid_6';
	}
	elseif ($sidebar == 'none' ) {
		$content_grid = 'grid_12';
	}
	else {
		$content_grid = 'grid_8';
	}

get_header(); 

?>

<div class="container_12">

	<!--Begin @Core before content sidebar hook-->
		<?php chimps_before_content_sidebar(); ?>
	<!--End @Core before content sidebar hook-->

	<div id="content" class="<?php echo $content_grid; ?>">
	
	<!-- Begin @Core before_search hook -->
		<?php chimps_before_search(); ?>
	<!-- End @Core before_search hook -->
	
	<!-- Begin @Core search hook -->
		<?php chimps_search(); ?>
	<!-- End @Core search hook -->
	
	<!-- Begin @Core after_search hook -->
		<?php chimps_after_search(); ?>
	<!-- End @Core after_search hook -->
		
	</div>
	
	<!--Begin @Core after content sidebar hook-->
		<?php chimps_after_content_sidebar(); ?>
	<!--End @Core after content sidebar hook-->
	
</div><!--end content_wrap-->
<div class="clear"></div>

<?php get_footer(); ?>
