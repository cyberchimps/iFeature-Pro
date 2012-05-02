<?php
/**
* Custom HTML element actions used by the CyberChimps Synapse Core Framework Pro Extension
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
* @package Pro
* @since 1.0
*/

/**
* Synapse Box Section actions
*/
add_action( 'synapse_custom_html_element', 'synapse_custom_html_element_content' );

function synapse_custom_html_element_content() {
	global $options, $themeslug, $post;
	
	if (is_page()) {
		$custom = get_post_meta($post->ID, 'custom_html' , true);
	}
	else {
		$custom = $options->get($themeslug.'_blog_custom_html');
	}?>
		
	<div class="container">
		<div class="row">
			<div class="twelve columns">
				<?php echo stripslashes ($custom); ?>
			</div>
		</div>
	</div><?php
}


?>