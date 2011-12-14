<?php
/**
* Box section actions used by the CyberChimps Core Framework Pro Extension
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

add_action( 'chimps_index_before_entry', 'chimps_pro_index_before_entry_slider' );


/**
* Pro index content before entry slider
*
* @since 1.0
*/
function chimps_pro_index_before_entry_slider() { 
	global $options, $themeslug; ?>
		
		<?php if ($options->get($themeslug.'_hide_slider_blog') == '1' && $options->get($themeslug.'_slider_size') == "key2"): ?>
	
			<?php chimps_blog_slider(); ?>
		
		<?php endif;

}


/**
* End
*/

?>