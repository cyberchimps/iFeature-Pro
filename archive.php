<?php 

/*
	Archive
	Creates the iFeature archive pages.
	Copyright (C) 2011 CyberChimps
	Version 2.0
*/

/* Header call. */

	get_header(); 
	
/* End header. */

?>

<div id="content_wrap">

	<div id="content_left">
		
		<div class="content_padding">
		
		<?php if (function_exists('chimps_breadcrumbs')) chimps_breadcrumbs(); ?>
		
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
		
	</div><!--end content_left-->

	<div id="sidebar_right">
		<?php get_sidebar(); ?>
	</div>
	
</div><!--end content_wrap-->

<div style=clear:both;></div>

<?php get_footer(); ?>