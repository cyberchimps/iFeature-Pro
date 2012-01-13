<?php
/**
* Index actions used by the CyberChimps Core Framework 
*
* Author: Tyler Cunningham
* Copyright: © 2011
* {@link http://cyberchimps.com/ CyberChimps LLC}
*
* Released under the terms of the GNU General Public License.
* You should have received a copy of the GNU General Public License,
* along with this software. In the main directory, see: /licensing/
* If not, see: {@link http://www.gnu.org/licenses/}.
*
* @package Core
* @since 1.0
*/

/**
* Core Index actions
*/

add_action( 'chimps_loop', 'chimps_loop_content' );

add_action( 'chimps_index', 'chimps_index_content');


/**
* Check for post format type, apply filter based on post format name for easy modification.
*
* @since 1.0
*/
function chimps_loop_content($content) { 

	global $options, $themeslug, $post; //call globals
	
	if (get_post_format() == '') {
		$format = "default";
	}
	else {
		$format = get_post_format();
	} ?>
		
		<?php ob_start(); ?>
			
			<?php if ($options->get($themeslug.'_post_formats') != '0') : ?>
			<div class="postformats"><!--begin format icon-->
				<img src="<?php echo get_template_directory_uri(); ?>/images/formats/<?php echo $format ;?>.png" alt="formats" />
			</div><!--end format-icon-->
			<?php endif; ?>
				<h2 class="posts_title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
					<!--Call @Core Meta hook-->
			<?php chimps_post_byline(); ?>
				<?php
				if ( has_post_thumbnail() && $options->get($themeslug.'_show_featured_images') == '1'  && !is_single()) {
 		 			echo '<div class="featured-image">';
 		 			echo '<a href="' . get_permalink($post->ID) . '" >';
 		 				the_post_thumbnail();
  					echo '</a>';
  					echo '</div>';
				}
			?>	
				<div class="entry" <?php if ( has_post_thumbnail() && $options->get($themeslug.'_show_featured_images') == '1' && !is_single()  ) { echo 'style="min-height: 115px;" '; }?>>
					<?php 
						if ($options->get($themeslug.'_show_excerpts') == '1' && !is_single() ) {
						the_excerpt();
						}
						else {
							the_content();
						}
					 ?>
				</div><!--end entry-->
				
				<div class='clear'>&nbsp;</div>
			<?php	
		
		$content = ob_get_clean();
		$content = apply_filters( 'chimps_post_formats_'.$format.'_content', $content );
	
		echo $content; 
}

/**
* Index content
*
* @since 1.0
*/
function chimps_index_content() { 

	global $options, $themeslug, $post, $sidebar; // call globals
	$sidebar = $options->get($themeslug.'_blog_sidebar');
	
	if ($sidebar == 'two-right' OR $sidebar == 'right-left' ) {
		$content_grid = 'grid_6';
	}
	elseif ($sidebar == 'none' ) {
		$content_grid = 'grid_12';
	}
	else {
		$content_grid = 'grid_8';
	}
?>

<div class="container_12">

<!--Begin @Core before content sidebar hook-->
		<?php chimps_before_content_sidebar(); ?>
	<!--End @Core before content sidebar hook-->

		<div id="content" class="<?php echo $content_grid; ?>">
		
		<!--Begin @Core index entry hook-->
		<?php chimps_blog_content_slider(); ?>
		<!--End @Core index entry hook-->

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<div class="post_container">
				<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
		
				<!--Begin @Core index loop hook-->
					<?php chimps_loop(); ?>
				<!--End @Core index loop hook-->	
			
				<!--Begin @Core link pages hook-->
					<?php chimps_link_pages(); ?>
				<!--End @Core link pages hook-->
			
				<!--Begin @Core post edit link hook-->
					<?php chimps_edit_link(); ?>
				<!--End @Core post edit link hook-->
			
				<!--Begin @Core FB like hook-->
					<?php ifeature_fb_like_plus_one(); ?>
				<!--End @Core FB like hook-->
			
				<!--Begin @Core post tags hook-->
					<?php chimps_post_tags(); ?>
				<!--End @Core post tags hook-->
			
				<!--Begin @iFeature post bar hook-->
					<?php ifeature_post_bar(); ?>
				<!--End @iFeature post bar hook-->
			
				</div><!--end post_class-->	
		</div><!--end post container--> 
	
			<?php endwhile; ?>
		
			<?php else : ?>

				<h2>Not Found</h2>

			<?php endif; ?>
			
				<!--Begin @Core pagination hook-->
			<?php chimps_pagination(); ?>
			<!--End @Core pagination loop hook-->
		
		</div><!--end content-->

	<!--Begin @Core after content sidebar hook-->
		<?php chimps_after_content_sidebar(); ?>
	<!--End @Core after content sidebar hook-->


</div><!--end container_12-->
<div class='clear'>&nbsp;</div>
<?php }

/**
* End
*/

?>