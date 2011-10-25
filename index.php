<?php

 /*
	Index
	
	Creates the iFeature default index page.
	
	Copyright (C) 2011 CyberChimps
*/

/* Call globals. */	

	global $themename, $themeslug, $options;

/* End globals. */

?>

<?php get_header(); ?>

<div class="container_12">

	<div id="main">

		<div id="content" class="grid_8">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php get_template_part('loop', 'index' ); ?>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
				
		<div id="sidebar" class="grid_4">
				<?php get_sidebar(); ?>
		</div>
	
	</div><!--end main-->

</div>

<div style="clear:both;"></div>

<?php get_footer(); ?>