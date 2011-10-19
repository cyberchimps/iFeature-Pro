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

/**
* Options wrapper
*/

function v($arr,$key, $default='')
  {
    if(!isset($arr[$key])) return $default;
    return $arr[$key];
  }

/**
* Localization 
*/
	    
	load_theme_textdomain( 'core', TEMPLATEPATH . '/core/languages' );

	    $locale = get_locale();
	    $locale_file = TEMPLATEPATH . "/core/languages/$locale.php";
	    if ( is_readable( $locale_file ) )
		    require_once( $locale_file );

/**
* End
*/
		    
?>