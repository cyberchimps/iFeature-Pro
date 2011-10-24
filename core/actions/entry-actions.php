<?php
/**
* Entry actions used by the CyberChimps Core Framework 
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
* Core Entry actions
*/
add_action( 'chimps_meta', 'chimps_meta_byline' );

/**
* Sets the post byline information (author, date, category). 
*
* @since 1.0
*/
function chimps_meta_byline() {
	global $options, $themeslug; //call globals  ?>
	
	<div class="meta">
<?php if ((v($options, $themeslug.'_hide_author')) != '1'):?><?php printf( __( 'Published by', 'core' )); ?> <?php the_author_posts_link(); ?> <?php endif;?> <?php if ((v($options, $themeslug.'_hide_categories')) != '1'):?><?php printf( __( 'in', 'core' )); ?> <?php the_category(', ') ?> <?php endif;?><?php if ((v($options, $themeslug.'_hide_date')) != '1'):?> <?php printf( __( 'on', 'core' )); ?> <a href="<?php the_permalink() ?>"><?php the_time('F jS, Y') ?></a><?php endif;?></div> <?

}

/**
* End
*/

?>