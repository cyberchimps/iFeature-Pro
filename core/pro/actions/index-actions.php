<?php
/**
* Index actions used by the CyberChimps Core Framework Pro Extension
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
* @package Pro
* @since 1.0
*/


add_action( 'chimps_pro_before_entry', 'chimps_before_entry_sidebar' );

add_action( 'chimps_pro_index', 'chimps_pro_index_content');

remove_action( 'chimps_after_entry', 'chimps_after_entry_sidebar' );
add_action( 'chimps_after_entry', 'chimps_pro_after_entry_sidebar' );


/**
* Pro index content
*
* @since 1.0
*/
function chimps_pro_index_content() { 

	global $options, $themeslug, $post; // call globals
	
	$blogsidebar = $options->get($themeslug.'_blog_sidebar');
	
	if ($blogsidebar == 'two-right' OR $blogsidebar == 'right-left' ) {
		$content_grid = 'grid_6';
	}
	
	elseif ($blogsidebar == 'none' ) {
		$content_grid = 'grid_12';
	}
	
	else {
		$content_grid = 'grid_8';
	}
?>

<!--Begin @Core index entry hook-->
		<?php chimps_pro_before_entry(); ?>
	<!--End @Core index entry hook-->

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

	<!--Begin @Core index after entry hook-->
	<?php chimps_after_entry(); ?>
	<!--End @Core index after entry hook-->

<?php }


/**
* Before entry sidebar
*
* @since 1.0
*/
function chimps_before_entry_sidebar() { 
	global $options, $themeslug, $post; // call globals
	
	$blogsidebar = $options->get($themeslug.'_blog_sidebar');
	$sidebar = get_post_meta($post->ID, 'page_sidebar' , true);?>
				
	<?php if ($sidebar == "3" OR $blogsidebar == 'right-left' ): ?>
	<div id="sidebar" class="grid_3">
		<?php get_sidebar('left'); ?>
	</div>
	<?php endif; ?>
	
	<?php if ($sidebar == "4" OR $blogsidebar == 'left' ): ?>
	<div id="sidebar" class="grid_4">
		<?php get_sidebar(); ?>
	</div>
	<?php endif;
	
}

/**
* After entry sidebar
*
* @since 1.0
*/
function chimps_pro_after_entry_sidebar() {
	global $options, $themeslug, $post; // call globals
	
	$blogsidebar = $options->get($themeslug.'_blog_sidebar');
	$sidebar = get_post_meta($post->ID, 'page_sidebar' , true);?>
	
	
	<?php if ($sidebar == "0" OR $blogsidebar == 'right' OR $blogsidebar == '' ): ?>
	<div id="sidebar" class="grid_4">
		<?php get_sidebar(); ?>
	</div>
	<?php endif;?>
	
	<?php if ($sidebar == "3" OR $blogsidebar == 'two-right' ): ?>
	<div id="sidebar" class="grid_3">
		<?php get_sidebar('left'); ?>
	</div>
	<?php endif;?> 
	
	<?php if ($sidebar == "2" OR $sidebar == "3" OR $blogsidebar == 'two-right' OR $blogsidebar == 'right-left' ): ?>
	<div id="sidebar" class="grid_3">
		<?php get_sidebar('right'); ?>
	</div>
	<?php endif;?> <?php 
}

/**
* End
*/

?>