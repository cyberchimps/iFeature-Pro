<?php
/**
* Index actions used by iFeature
*
* Author: Tyler Cunningham
* Copyright: © 2012
* {@link http://cyberchimps.com/ CyberChimps LLC}
*
* Released under the terms of the GNU General Public License.
* You should have received a copy of the GNU General Public License,
* along with this software. In the main directory, see: /licensing/
* If not, see: {@link http://www.gnu.org/licenses/}.
*
* @package iFeature
* @since 5.0
*/

/**
* Synapse index actions
*/

add_action( 'synapse_index', 'synapse_index_content');

/**
* Index content
*
* @since 1.0
*/
function synapse_index_content() { 

	global $options, $themeslug, $post, $sidebar, $content_grid; // call globals ?>
	
	<!--Begin @ifeature sidebar init-->
		<?php synapse_sidebar_init(); ?>
	<!--End @ifeature sidebar init-->
	<div class="row">
<!--Begin @ifeature before content sidebar hook-->
		<?php synapse_before_content_sidebar(); ?>
	<!--End @ifeature before content sidebar hook-->

		<div id="content" class="<?php echo $content_grid; ?>">
		
		<!--Begin @ifeature index entry hook-->
		<?php synapse_blog_content_slider(); ?>
		<!--End @ifeature index entry hook-->

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<div class="post_container">
				<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
		
				<!--Begin @ifeature index loop hook-->
					<?php synapse_loop(); ?>
				<!--End @ifeature index loop hook-->	
			
				<!--Begin @ifeature link pages hook-->
					<?php synapse_link_pages(); ?>
				<!--End @ifeature link pages hook-->
			
				<!--Begin @ifeature post edit link hook-->
					<?php synapse_edit_link(); ?>
				<!--End @ifeature post edit link hook-->
			
				<!--Begin @ifeature FB like hook-->
					<?php synapse_fb_like_plus_one(); ?>
				<!--End @ifeature FB like hook-->
			
				<!--Begin @ifeature post tags hook-->
					<?php synapse_post_tags(); ?>
				<!--End @ifeature post tags hook-->
				
				<?php if (is_single() && $options->get($themeslug.'_post_pagination') == "1") : ?>
				<!--Begin @ifeature post pagination hook-->
					<?php synapse_post_pagination(); ?>
				<!--End @ifeature post pagination hook-->			
				<?php endif;?>
			
				</div><!--end post_class-->
			</div><!--end post container-->
			<!--Begin @iFeature post bar hook-->
				<?php synapse_post_bar(); ?>
			<!--End @iFeature post bar hook-->
			
			<?php if (is_single()):?>
			<?php comments_template(); ?>
			<?php endif ?>
			
	
			<?php endwhile; ?>
		
			<?php else : ?>

				<h2>Not Found</h2>

			<?php endif; ?>
			
				<!--Begin @ifeature pagination hook-->
			<?php synapse_pagination(); ?>
			<!--End @ifeature pagination loop hook-->
		
		</div><!--end content-->

	<!--Begin @ifeature after content sidebar hook-->
		<?php synapse_after_content_sidebar(); ?>
	<!--End @ifeature after content sidebar hook-->

</div>
<?php }

/**
* End
*/

?>