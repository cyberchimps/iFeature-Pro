<?php 

/*
	404
	Creates the iFeature 404 page.
	Copyright (C) 2011 CyberChimps
*/

	global $options, $themeslug, $post, $sidebar; // call globals
	$sidebar = $options->get($themeslug.'_404_sidebar');
	
	if ($sidebar == 'two-right' OR $sidebar == 'right-left' ) {
		$content_grid = 'grid_6';
	}
	elseif ($sidebar == 'none' ) {
		$content_grid = 'grid_12';
	}
	else {
		$content_grid = 'grid_8';
	}

/* Header call. */

	get_header(); 
	
/* End header. */

?>

<div class="container_12">

	<!--Begin @Core before content sidebar hook-->
		<?php chimps_before_content_sidebar(); ?>
	<!--End @Core before content sidebar hook-->

	<div id="content" class="<?php echo $content_grid; ?>">
		<div class="content_padding">
		
			<!-- Begin @Core before_404 hook content-->
      			<?php chimps_before_404(); ?>
      		<!-- Begin @Core before_404 hook content-->
		
      		<!-- Begin @Core 404 hook content-->
      			<?php chimps_404(); ?>
      		<!-- Begin @Core 404 hook content-->
      		
      		<!-- Begin @Core after_404 hook content-->
      			<?php chimps_after_404(); ?>
      		<!-- Begin @Core after_404 hook content-->
      		
		</div><!--end content_padding-->
	</div><!--end content_left-->
	
	<!--Begin @Core after content sidebar hook-->
		<?php chimps_after_content_sidebar(); ?>
	<!--End @Core after content sidebar hook-->
	
</div><!--end content_wrap-->
<div class='clear'>&nbsp;</div>

<?php get_footer(); ?>