<?php
/**
* General options actions used by the CyberChimps Core Framework 
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
* Core general options actions
*/
add_action ( 'chimps_general_options', 'chimps_general_options_faq' );

/**
* Core general options functions
*/
function chimps_general_options_faq() {
	global $shortname;
	
	$faq = array( "name" => "Help",  
    "desc" => "",  
    "id" => $shortname."_general_faq",  
    "type" => "general_faq",  
    "std" => "");
    
   var_dump($faq);
}


/**
* End
*/

?>