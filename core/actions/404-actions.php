 <?php
/**
* 404 actions used by the CyberChimps Core Framework
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
* Core 404 actions
*/
add_action( 'chimps_404', 'chimps_404_content' );

/**
* Core 404 functions
*/

// 404 content - chimps_404_content
function chimps_404_content()
{
	$message_text = apply_filters( 'chimps_404_message', 'Error 404' ); //filter for changing older entries link text
?>
	<div class="error"><?php printf( __( $message_text, 'core' )); ?><br />
		<center><img src="<?php echo get_template_directory_uri() ;?>/images/confusedchimp.png" height="400" width="400" /></center>
	</div>

<?php	
}

/**
* End
*/

?>