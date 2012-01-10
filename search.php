<?php 

/*
	Search
	
	Establishes the iFeature search functionality. 
	
	Copyright (C) 2011 CyberChimps
*/

global $options, $themeslug, $post; // call globals
	
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

	<?php if ($sidebar == 'right-left' ): ?>
	<div id="sidebar" class="grid_3">
		<?php get_sidebar('left'); ?>
	</div>
	<?php endif; ?>
	
	<?php if ($sidebar == "4" OR $sidebar == 'left' ): ?>
	<div id="sidebar" class="grid_4">
		<?php get_sidebar(); ?>
	</div>
	<?php endif; ?>


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
	
	<?php if ($sidebar == 'right' OR $sidebar == '' ): ?>
	<div id="sidebar" class="grid_4">
		<?php get_sidebar(); ?>
	</div>
	<?php endif;?>
	
	<?php if ($sidebar == 'two-right' ): ?>
	<div id="sidebar" class="grid_3">
		<?php get_sidebar('left'); ?>
	</div>
	<?php endif;?> 
	
	<?php if ($sidebar == 'two-right' OR $sidebar == 'right-left' ): ?>
	<div id="sidebar" class="grid_3">
		<?php get_sidebar('right'); ?>
	</div>
	<?php endif;?>
	
</div><!--end content_wrap-->
<div class="clear"></div>

<?php get_footer(); ?>
