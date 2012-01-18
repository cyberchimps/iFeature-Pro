<?php
/**
* Twitterbar actions used by the CyberChimps Core Framework
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
* Core Twitterbar actions
*/
add_action( 'chimps_twitterbar_section', 'chimps_twitterbar_section_content' );

/**
* Retrieves the Twitterbar options and sets up the HTML
*/
function chimps_twitterbar_section_content() {
	global $options, $themeslug, $post; //call globals
	$root = get_template_directory_uri();
	
	if (is_page()) {
	$handle = get_post_meta($post->ID, 'twitter_handle' , true); 
	}
	if (is_front_page()) {
	$handle = $options->get($themeslug.'_blog_twitter');
	}?>
	
		<div id="twitterbar"><!--id="twitterbar"-->
			<div class="twittertext">
				<a href=" http://twitter.com/<?php echo $handle ; ?>" > <img src="<?php echo "$root/images/twitterbird.png" ?>" /> <?php echo $handle ;?> - </a><?php twitter_messages($handle); ?>
			</div>
		</div><!--end twitterbar--> 
		<?php
}	

/**
* End
*/

?>