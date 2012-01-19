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

add_action( 'chimps_index', 'chimps_index_content');

/**
* Index content
*
* @since 1.0
*/
function chimps_index_content() { 

	global $options, $themeslug, $post, $sidebar, $content_grid; // call globals ?>
	
	<!--Begin @Core sidebar init-->
		<?php chimps_sidebar_init(); ?>
	<!--End @Core sidebar init-->

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
					<?php chimps_fb_like_plus_one(); ?>
				<!--End @Core FB like hook-->
			
				<!--Begin @Core post tags hook-->
					<?php chimps_post_tags(); ?>
				<!--End @Core post tags hook-->
			
				<!--Begin @iFeature post bar hook-->
					<?php chimps_post_bar(); ?>
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


<?php }

/**
* End
*/

?>