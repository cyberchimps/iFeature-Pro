<?php
/**
* CyberChimps Core Framework Pro Extension functions
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
* @package Extend
* @since 1.0
*/

/**
* End
*/
		
// Works in single post outside of the Loop
function function_name() {
global $wp_query;
$thePostID = $wp_query->post->ID;
}
		    
?>