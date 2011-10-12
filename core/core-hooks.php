<?php
/**
* Hook wrappers used by the CyberChimps Core Framework
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
* Header 
*/
function chimps_header_left() {
	do_action('chimps_header_left');
}

/** 
* Pagination 
*/
function chimps_pagination() { 
	do_action('chimps_pagination');
}

function chimps_links_pages() { 
	do_action('chimps_links_pages');
}
?>