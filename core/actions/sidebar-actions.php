<?php
/**
* Sidebar section actions used by the CyberChimps Core Framework Pro Extension
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

add_action( 'chimps_before_content_sidebar', 'chimps_before_content_sidebar_markup' );
add_action( 'chimps_after_content_sidebar', 'chimps_after_content_sidebar_markup' );

/**
* Before entry sidebar
*
* @since 1.0
*/
function chimps_before_content_sidebar_markup() { 
	global $options, $themeslug, $post; // call globals
	
	$sidebar_single = $options->get($themeslug.'_single_sidebar');
	$sidebar_blog = $options->get($themeslug.'_blog_sidebar');
	$sidebar_page = get_post_meta($post->ID, 'page_sidebar' , true);
	
	if (is_single()) {
	$sidebar = $options->get($themeslug.'_single_sidebar');
	}
	?>
				
	<?php if ($sidebar_single == 'right-left' OR $sidebar_blog == 'right-left' OR $sidebar_page == "2"): ?>
	<div id="sidebar" class="grid_3">
		<?php get_sidebar('left'); ?>
	</div>
	<?php endif; ?>
	
	<?php if ($sidebar == 'left' OR $sidebar_page == "4"): ?>
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
function chimps_after_content_sidebar_markup() {
	global $options, $themeslug, $post; // call globals
	
	$sidebar_single = $options->get($themeslug.'_single_sidebar');
	$sidebar_blog = $options->get($themeslug.'_blog_sidebar');
	$sidebar_page = get_post_meta($post->ID, 'page_sidebar' , true);

	if (!is_single()) {
	$sidebar = $options->get($themeslug.'_single_sidebar');
	}
	?>
	
	
	<?php if ($sidebar == 'right' OR $sidebar_page == '' ): ?>
	<div id="sidebar" class="grid_4">
		<?php get_sidebar(); ?>
	</div>
	<?php endif;?>
	
	<?php if ($sidebar == 'two-right' OR  $sidebar_page == '1' ): ?>
	<div id="sidebar" class="grid_3">
		<?php get_sidebar('left'); ?>
	</div>
	<?php endif;?> 
	
	<?php if ($sidebar_single == 'two-right' OR $sidebar_single == 'right-left' OR $sidebar_blog == 'two-right' OR $sidebar_blog == 'right-left' OR $sidebar_page == '1' OR $sidebar_page == '2'): ?>
	<div id="sidebar" class="grid_3">
		<?php get_sidebar('right'); ?>
	</div>
	<?php endif;?> <?php 
}



/**
* End
*/

?>