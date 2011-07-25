<?php 

/*
	Search
	
	Establishes the iFeature search functionality. 
	
	Copyright (C) 2011 CyberChimps
*/

get_header(); ?>

<div id="content_wrap">

	<div id="content_left">
		
		<div class="content_padding">

		<?php if (have_posts()) : ?>

		<h2>Search Results</h2>

		<?php while (have_posts()) : the_post(); ?>
		
		<!--Call the Loop-->
			<?php get_template_part('loop', 'index' ); ?>		<?php endwhile; ?>

		<?php get_template_part('pagination', 'search'); ?>

	<?php else : ?>

		<h2>No posts found.</h2>

	<?php endif; ?>
		</div><!--end content_padding-->
	</div><!--end content_left-->

	<div id="sidebar_right"><?php get_sidebar(); ?></div>
</div><!--end content_wrap-->
<div class="clear"></div>
<?php get_footer(); ?>
