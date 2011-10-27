<?php
/**
* Content actions used by the CyberChimps Core Framework Pro Extension
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
* Core content actions
*/
add_action( 'chimps_post_formats', 'chimps_post_formats_content' );


/**
* Check for post format type, apply filter based on post format name for easy modification.
*
* @since 1.0
*/
function chimps_post_formats_content($content) { 
	$format = get_post_format(); 
	$root = get_template_directory_uri(); 
	
	ob_start();
?>
	<div class="post_container">
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<div class ="format-icon"><img src="<?php echo $root ;?>/images/formats/default.png" height="50px" width="50px" /></div><h2 class="posts_title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
				<div class="entry">
					<?php the_content(); ?>
				</div>
		</div><!--end post_class-->		
	</div><!--end post_container-->';
	<?php	
	$content = ob_get_clean();
	
	$content = apply_filters( 'chimps_post_formats_'.$format.'_content', $content );
	
	echo $content;
}

/**
* End
*/

?>