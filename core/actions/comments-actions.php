<?php
/**
* Commments actions used by the CyberChimps Core Framework 
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
* Core comments actions
*/
add_action( 'chimps_comments', 'chimps_comments_password_required' );

/**
* Checks if password is required to comment, sets a filter for text that displays.
*
* @since 1.0
*/
function chimps_comments_password_required() {
	$password_text = apply_filters( 'chimps_password_required_text', 'This post is password protected. Enter the password to view comments.');
	if ( post_password_required() ) { 
		printf( __( $password_text, 'core' )); 
		return;
	}
}

/**
* End
*/

?>