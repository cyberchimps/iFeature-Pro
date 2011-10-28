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



	$hideslider = v($options, $themeslug.'_hide_slider_blog');
	$blogsidebar = v($options,$themeslug.'_blog_sidebar');
	$blogslidersize = v($options,$themeslug.'_slider_size');
	$title = get_post_meta($post->ID, 'seo_title' , true);
	$pagedescription = get_post_meta($post->ID, 'seo_description' , true);
	$keywords = get_post_meta($post->ID, 'seo_keywords' , true);
	$enable = get_post_meta($post->ID, 'page_enable_slider' , true);
	$size = get_post_meta($post->ID, 'page_slider_size' , true);
	$hidetitle = get_post_meta($post->ID, 'hide_page_title' , true);
	$sidebar = get_post_meta($post->ID, 'page_sidebar' , true);

?>

<?php get_header(); ?>

<div id="content_wrap">
		
	<?php if (v($options, $themeslug.'_hide_slider_blog') != '1' && $blogslidersize == "full"): ?>
		<div id = "slider-wrapper">
			<?php get_template_part('sliderblog', 'index' ); ?>
		</div>
	<?php endif;?>
		
	<?php chimps_before_entry(); ?>
	
	<?php chimps_index_entry(); ?>

		<div class="content_padding">
		
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<!--Call the Loop-->
			<?php chimps_post_formats(); ?>
				
		<?php endwhile; ?>
		
		<!--Call @Core pagination-->
		<?php chimps_pagination(); ?>

		<?php else : ?>

			<h2>Not Found</h2>

		<?php endif; ?>
		</div> <!--end content_padding-->
	</div> <!--end content_left-->

<?php chimps_after_entry(); ?>

</div><!--end content_wrap-->
<div style="clear:both;"></div>

<?php get_footer(); ?>