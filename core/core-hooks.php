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

function chimps_before_header() {
	do_action('chimps_before_header');
}

function chimps_header(){
	do_action('chimps_header');
}

function chimps_after_header() {
	do_action('chimps_after_header');
}

function chimps_header_left() {
	do_action('chimps_header_left');
}

function chimps_header_left_logo() {
	do_action('chimps_header_left_logo');
}

function chimps_header_right_contact_area() {
	do_action('chimps_header_right_contact_area');
}

function chimps_header_right_social_icons() {
	do_action('chimps_header_right_social_icons');
}

function chimps_navigation() {
	do_action('chimps_navigation');
}

/** 
* Content 
*/

function chimps_before_content() {
	do_action('chimps_before_content');
}

function chimps_after_content() {
	do_action('chimps_after_content');
}

/** 
* Entry 
*/

function chimps_before_entry(){
	do_action('chimps_before_entry');
}

function chimps_after_entry(){
	do_action('chimps_after_entry');
}

/** 
* Pagination 
*/
function chimps_main_index_pagination() { 
	do_action('chimps_main_index_pagination');
}

function chimps_links_pages() { 
	do_action('chimps_links_pages');
}
?>