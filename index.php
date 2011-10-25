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

<div id="content" class="container_12">

	<div id="main">

		<div class="grid_8">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php get_template_part('loop', 'index' ); ?>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
				
		<div class="grid_4">
			<div id="sidebar" class="container">
				<?php get_sidebar(); ?>
			</div>
		</div>
	
	</div><!--end main-->

</div>

<div style="clear:both;"></div>

<?php get_footer(); ?>