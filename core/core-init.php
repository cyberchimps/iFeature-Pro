<?php
/**
* Initializes the CyberChimps Core Framework
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

//Define custom core functions
require_once ( get_template_directory() . '/core/core-functions.php' );

//Define the core hooks
require_once ( get_template_directory() . '/core/core-hooks.php' );

//Call the action files
require_once ( get_template_directory() . '/core/actions/404-actions.php' );
// require_once ( get_template_directory() . '/core/actions/archive-actions.php' ); - commenting out for now until syntax error resolved. 
require_once ( get_template_directory() . '/core/actions/comments-actions.php' );
require_once ( get_template_directory() . '/core/actions/content-actions.php' );
require_once ( get_template_directory() . '/core/actions/entry-actions.php' );
require_once ( get_template_directory() . '/core/actions/header-actions.php' );
require_once ( get_template_directory() . '/core/actions/footer-actions.php' );
require_once ( get_template_directory() . '/core/actions/pagination-actions.php' );
require_once ( get_template_directory() . '/core/actions/search-actions.php' );

//Call extend (this is only tempoaray)
require_once ( get_template_directory() . '/core/pro/pro-init.php' );

//Options
require_once ( get_template_directory() . '/core/options/options-init.php' );
require_once ( get_template_directory() . '/core/options/options-themes.php' );


/**
* End
*/

?>