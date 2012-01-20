<?php 

/*
	Search
	
	Establishes the iFeature search functionality. 
	
	Copyright (C) 2011 CyberChimps
*/

global $options, $themeslug, $post, $sidebar; // call globals
	
get_header(); 

?>

<div class="container">
	<div class="row">
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
	</div><!--end row-->
</div><!--end container-->

<?php get_footer(); ?>
