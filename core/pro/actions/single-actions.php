<?php
/**
* Single post actions used by the CyberChimps Core Framework Pro Extension
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

add_action( 'chimps_single_before_entry', 'chimps_single_before_entry_sidebar' );
add_action( 'chimps_single_after_entry', 'chimps_single_after_entry_sidebar' );

/**
* Before entry sidebar
*
* @since 1.0
*/
function chimps_single_before_entry_sidebar() { 
	global $options, $themeslug, $post; // call globals
	
	$sidebar = $options->get($themeslug.'_single_sidebar');?>
				
	<?php if ($sidebar == 'right-left' ): ?>
	<div id="sidebar" class="three columns">
		<?php get_sidebar('left'); ?>
	</div>
	<?php endif; ?>
	
	<?php if ($sidebar == "4" OR $sidebar == 'left' ): ?>
	<div id="sidebar" class="four columns">
		<?php get_sidebar(); ?>
	</div>
	<?php endif;
	
}

/**
* After entry sidebar
*
* @since 1.0
*/
function chimps_single_after_entry_sidebar() {
	global $options, $themeslug, $post; // call globals
	
	$sidebar = $options->get($themeslug.'_single_sidebar');?>
	
	
	<?php if ($sidebar == 'right' OR $sidebar == '' ): ?>
	<div id="sidebar" class="four columns">
		<?php get_sidebar(); ?>
	</div>
	<?php endif;?>
	
	<?php if ($sidebar == 'two-right' ): ?>
	<div id="sidebar" class="three columns">
		<?php get_sidebar('left'); ?>
	</div>
	<?php endif;?> 
	
	<?php if ($sidebar == 'two-right' OR $sidebar == 'right-left' ): ?>
	<div id="sidebar" class="three columns">
		<?php get_sidebar('right'); ?>
	</div>
	<?php endif;?> <?php 
}



/**
* End
*/

?>