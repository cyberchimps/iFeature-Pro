<?php 

/*
	404
	Creates the iFeature 404 page.
	Copyright (C) 2011 CyberChimps
*/

global $options, $themeslug, $post; // call globals
	
	$sidebar = $options->get($themeslug.'_404_sidebar');
	
		if ($sidebar == 'two-right' OR $sidebar == 'right-left' ) {
		$content_grid = 'six columns';
	}
	
	elseif ($sidebar == 'none' ) {
		$content_grid = 'twelve columns';
	}
	
	else {
		$content_grid = 'eight columns';
	}

/* Header call. */

	get_header(); 
	
/* End header. */

?>

<div class="container">
	<div class="row">

<?php if ($sidebar == 'right-left' ): ?>
	<div id="sidebar" class="three columns">
		<?php get_sidebar('left'); ?>
	</div>
	<?php endif; ?>
	
	<?php if ($sidebar == "4" OR $sidebar == 'left' ): ?>
	<div id="sidebar" class="four columns">
		<?php get_sidebar(); ?>
	</div>
	<?php endif; ?>


	<div id="content" class="eight columns">
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
	
		<?php if ($sidebar == 'right' OR $sidebar == '' ): ?>
	<div id="sidebar" class="four columns">
		<?php get_sidebar(); ?>
	</div>
	<?php endif;?>
	
	<?php if ($sidebar == 'two-right' ): ?>
	<div id="sidebar" class="three columns">
		<?php get_sidebar('left'); ?>
	</div>
	<?php endif;?> 
	
	<?php if ($sidebar == 'two-right' OR $sidebar == 'right-left' ): ?>
	<div id="sidebar" class="three columns">
		<?php get_sidebar('right'); ?>
	</div>
	<?php endif;?>
	
</div>
</div><!--end content_wrap-->
<div class='clear'>&nbsp;</div>

<?php get_footer(); ?>