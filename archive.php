<?php 

/*
	Archive
	Creates the iFeature archive pages.
	Copyright (C) 2011 CyberChimps
	Version 2.0
*/

	global $options, $themeslug, $post; // call globals
	
	$sidebar = $options->get($themeslug.'_archive_sidebar');
	
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

<?php if (function_exists('chimps_breadcrumbs') && ($options->get($themeslug.'_disable_breadcrumbs') == "1")) { chimps_breadcrumbs(); }?>

	<div id="main">
	
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
		
		<!--Begin @Core before_archive hook-->
			<?php chimps_before_archive(); ?>
		<!--End @Core before_archive hook-->
		
		<?php if (have_posts()) : ?>
		
			<!--Begin @Core archive hook-->
			<?php chimps_archive_title(); ?>
			<!--End @Core archive hook-->
		
		<?php while (have_posts()) : the_post(); ?>
		
			<!--Begin @Core archive hook-->
				<?php chimps_archive(); ?>
			<!--End @Core archive hook-->
		
		 <?php endwhile; ?>
	 
	 <?php else : ?>

		<h2>Nothing found</h2>

	<?php endif; ?>

		<!--Begin @Core pagination hook-->
			<?php chimps_pagination(); ?>
		<!--End @Core pagination hook-->
		
		<!--Begin @Core after_archive hook-->
			<?php chimps_after_archive(); ?>
		<!--End @Core after_archive hook-->
	
		</div><!--end content_padding-->

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

	</div><!--end content_left-->

<div class='clear'>&nbsp;</div>

<?php get_footer(); ?>