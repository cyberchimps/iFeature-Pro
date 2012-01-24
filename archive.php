<?php 

/*
	Archive
	Creates the iFeature archive pages.
	Copyright (C) 2011 CyberChimps
	Version 2.0
*/

	global $options, $themeslug, $post, $content_grid; // call globals
	
/* Header call. */

	chimps_sidebar_init();
	get_header(); 
	
/* End header. */

?>

<div class="container">
	<div class="row">
		<?php if (function_exists('chimps_breadcrumbs') && ($options->get($themeslug.'_disable_breadcrumbs') == "1")) { chimps_breadcrumbs(); }?>
	</div>
	<div class="row">
	<?php if (have_posts()) : ?>
		
			<!--Begin @Core archive hook-->
			<?php chimps_archive_title(); ?>
			<!--End @Core archive hook-->

	<!--Begin @Core before content sidebar hook-->
		<?php chimps_before_content_sidebar(); ?>
	<!--End @Core before content sidebar hook-->
	
		<div id="content" class="<?php echo $content_grid; ?>">
		
		<!--Begin @Core before_archive hook-->
			<?php chimps_before_archive(); ?>
		<!--End @Core before_archive hook-->
		
		<?php while (have_posts()) : the_post(); ?>
		
		<div class="post_container">
			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
		
			<!--Begin @Core archive hook-->
				<?php chimps_loop(); ?>
			<!--End @Core archive hook-->
			
			</div><!--end post_class-->	
		</div><!--end post container--> 
		
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

	<!--Begin @Core after content sidebar hook-->
		<?php chimps_after_content_sidebar(); ?>
	<!--End @Core after content sidebar hook-->
	
		</div><!--end content-->
	</div><!--end row-->
</div><!--end container-->

<?php get_footer(); ?>