<?php
/*
Template Name: Sidebar Left and Right
Copyright (C) 2011 CyberChimps
*/
get_header();
?>

<?php

$title = get_post_meta($post->ID, 'seo_title' , true);
$pagedescription = get_post_meta($post->ID, 'seo_description' , true);
$keywords = get_post_meta($post->ID, 'seo_keywords' , true);
$enable = get_post_meta($post->ID, 'page_enable_slider' , true);
$size = get_post_meta($post->ID, 'page_slider_size' , true);
$hidetitle = get_post_meta($post->ID, 'hide_page_title' , true);
$sidebar = get_post_meta($post->ID, 'page_sidebar' , true);

?>
<!-- iFeature Pro Page SEO options -->
<meta name="title" content="<?php echo $title ?>" />
<meta name="description" content="<?php echo $pagedescription ?>" />
<meta name="keywords" content="<?php echo $keywords ?>" />
<!-- /iFeature Pro Page SEO options -->
<div id="content_wrap">

	<?php if ($enable == "on" && $size == "0"): ?>
		<div id = "slider-wrapper">
			<?php get_template_part('nivoslider', 'page' ); ?> 
			
		</div>

	<?php endif;?>
	
	<?php if ($sidebar == "4"): ?>
		<div id="content_fullwidth">
	<?php endif;?>
	
	<?php if ($sidebar == "1"): ?>
		<div id="content_left">
	<?php endif;?>
	
	<?php if ($sidebar == "0"): ?>
	
	<?php get_sidebar('left'); ?>
	<?php get_sidebar('right'); ?>
	<div class="content_half">
	<?php endif;?>
	
	<?php if ($sidebar == "3"): ?>
	<?php get_sidebar('left'); ?>
	<?php get_sidebar('right'); ?>
	<?php endif;?>
	
	<?php if ($sidebar == "2"  OR $sidebar == "3"): ?>
	<?php get_sidebar('right'); ?>
	<div class="content_half">
	<?php endif;?>
	
	<?php if ($enable == "on" && $size == "1"): ?>
		<div id = "slider-wrapper">
			<?php get_template_part('nivoslider', 'page' ); ?>
		</div>
	<?php endif;?>

		
		<div class="content_padding">
		
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
			<div class="post_container">
			
				<div class="post" id="post-<?php the_ID(); ?>">
				<?php if ($hidetitle == ""): ?>
				
			

					<h2 class="posts_title"><?php the_title(); ?></h2>
						<?php endif;?>

					<div class="entry">

						<?php the_content(); ?>
						

						<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

					</div><!--end entry-->

				<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

				</div><!--end post-->
		
			<?php comments_template(); ?>

			<?php endwhile; endif; ?>
			</div><!--end post_container-->
			
		</div><!--end content_padding-->
		
	</div><!--end content_left-->
<?php if ($sidebar == "1"): ?>
	<?php get_sidebar(); ?>
	<?php endif;?>
	<?php if ($sidebar == "2"): ?>
	<?php get_sidebar('left'); ?>
	<?php endif;?>
</div><!--end content_wrap-->

<div style=clear:both;></div>
<?php get_footer(); ?>
