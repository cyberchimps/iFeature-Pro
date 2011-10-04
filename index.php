<?php

 /*
	Index
	
	Creates the iFeature default index page.
	
	Copyright (C) 2011 CyberChimps
*/

/* Call globals. */	

	global $themename, $themeslug, $options;

/* End globals. */	

/* Define Variables. */	

	$hideslider = $options[$themeslug.'_hide_slider_blog'];
	$blogsidebar = $options[$themeslug.'_blog_sidebar'];
	$blogslidersize = $options[$themeslug.'_slider_size'];
	$title = get_post_meta($post->ID, 'seo_title' , true);
	$pagedescription = get_post_meta($post->ID, 'seo_description' , true);
	$keywords = get_post_meta($post->ID, 'seo_keywords' , true);
	$enable = get_post_meta($post->ID, 'page_enable_slider' , true);
	$size = get_post_meta($post->ID, 'page_slider_size' , true);
	$hidetitle = get_post_meta($post->ID, 'hide_page_title' , true);
	$sidebar = get_post_meta($post->ID, 'page_sidebar' , true);

?>

<?php get_header(); ?>

<div class="row">
		
	<?php if ($options[$themeslug.'_hide_slider_blog'] != '1' && $blogslidersize == "full"): ?>
		<div class="eightcol">
			<?php get_template_part('sliderblog', 'index' ); ?>
		</div>
	<?php endif;?>
		
	<?php if ($sidebar == "4" OR $blogsidebar == 'none'): ?>
		<div class="row">
	<?php endif;?>
	
	<?php if ($sidebar == "1" OR $blogsidebar == "right"): ?>
		<div class="eightcol">
	<?php endif;?>
	
	<?php if ($sidebar == '' AND $blogsidebar == ''): ?>
		<div class="eightcol">
	<?php endif;?>
	
	<?php if ($sidebar == "3" OR $blogsidebar == 'right-left' ): ?>
		<?php get_sidebar('left'); ?>
		<?php get_sidebar('right'); ?>
	<?php endif;?>
	
	<?php if ($sidebar == "2"  OR $sidebar == "3" OR $blogsidebar == "two-right" OR $blogsidebar == "right-left"): ?>
		<?php get_sidebar('right'); ?>
		<div class="sixcol">
	<?php endif;?>
	
	<?php if ($options[$themeslug.'_hide_slider_blog'] != '1' && $blogslidersize != "full"): ?>
		<div class="eightcol" height="330px">
			<?php get_template_part('sliderblog', 'page' ); ?>
		</div>
	<?php endif;?>


			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<!--Call the Loop-->
			<?php get_template_part('loop', 'index' ); ?>
				
		<?php endwhile; ?>

		<?php get_template_part('pagination', 'index' ); ?>

		<?php else : ?>

			<h2>Not Found</h2>

		<?php endif; ?>
		</div>
		<div class="fourcol last">
	<?php if ($sidebar == '' AND $blogsidebar == ''): ?>
	<?php get_sidebar(); ?>
	<?php endif;?>
	
	<?php if ($sidebar == "1" OR $blogsidebar == 'right' ): ?>
	<?php get_sidebar(); ?>
	<?php endif;?>
	<?php if ($sidebar == "2" OR $blogsidebar == 'two-right' ): ?>
	<?php get_sidebar('left'); ?>
	<?php endif;?>
		</div>
	</div>
</div>


<div style="clear:both;"></div>

<?php get_footer(); ?>