<?php
/**
* CyberChimps Core Framework functions
*
* Authors: Tyler Cunningham, Ben Allfree
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

//Define custom core functions
require_once ( get_template_directory() . '/core/extend/extend-functions.php' );

//Define the core hooks
require_once ( get_template_directory() . '/core/extend/extend-hooks.php' );

//Call actions
require_once ( get_template_directory() . '/core/extend/actions/slider-actions.php' );

/**
* End
*/
		    
?>