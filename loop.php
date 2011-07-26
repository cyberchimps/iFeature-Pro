<?php

/* Call globals. */	

	global $themename, $themeslug, $options;

/* End globals. */	

/* Define variables. */	

	$share = $options['if_hide_share'];
	$tags = $options['if_hide_tags'];
	$comments = $options['if_hide_comments'];
	$excerpts = $options['if_show_excerpts'];
	$showfblike		= $options[$themeslug.'_show_fb_like'];
	$showgplus		= $options[$themeslug.'_show_gplus'];
	
/* End define variables. */	
	
?>

<div class="post_container">
			
	<div <?php post_class() ?> id="post-<?php the_ID(); ?>">

		<h2 class="posts_title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

		<?php get_template_part('meta', 'index' ); ?>
						
			<?php
				if ( has_post_thumbnail()) {
 		 			echo '<div class="featured-image">';
 		 			echo '<a href="' . get_permalink($post->ID) . '" >';
 		 				the_post_thumbnail();
  					echo '</a>';
  					echo '</div>';
				}
			?>	
				<div class="entry">
					<?php 
						if ($excerpts == '1' ) {
						the_excerpt();
						}
						else {
							the_content();
						}
					 ?>
				</div><!--end entry-->
				
			<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
						
			<?php if ($showfblike == "1" && $showgplus == "1" ):?>
					
				<div class="fb" >
					<iframe src="http://www.facebook.com/plugins/like.php?href=<?php the_permalink() ?>&layout=standard&show_faces=true&width=450&action=like&colorscheme=light" scrolling="no" frameborder="0"  allowTransparency="true" style="border:none; overflow:hidden; width:530px; height:28px"></iframe>
					<div class="g-plusone" data-size="standard" data-count="true"></div>
				</div>
			
			<?php endif;?>
			
			<?php if ($showfblike == "1" && $showgplus != "1" ):?>
					
				<div class="fb" >
					<iframe src="http://www.facebook.com/plugins/like.php?href=<?php the_permalink() ?>&layout=standard&show_faces=true&width=450&action=like&colorscheme=light" scrolling="no" frameborder="0"  allowTransparency="true" style="border:none; overflow:hidden; width:530px; height:28px"></iframe>
					
				</div>
			
			<?php endif;?>
				<?php if ($showgplus == "1" && $showfblike != "1"):?>
					
				<div class="g-plusone" data-size="standard" data-count="true"></div>
				
				<?php endif;?>
			<!--end fb-->
				<div class="tags">
					<?php if ($tags != '1'):?>
						<?php the_tags('Tags: ', ', ', '<br />'); ?>
					<?php endif;?>
				</div><!--end tags-->	

				<div class="postmetadata">
					<?php if ($share != '1'):?>
						<?php get_template_part('share', 'index' ); ?>
					<?php endif;?>

				<div class="comments">
					<?php if ($comments != '1'):?>
						<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
					<?php endif;?>
				</div><!--end comments-->	
				</div><!--end postmetadata-->
							
	</div><!--end post_class-->
				
</div><!--end post_container-->
