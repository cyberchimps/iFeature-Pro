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
function chimps_after_head_tag() {
	do_action('chimps_after_head_tag');
}

function chimps_before_header() {
	do_action('chimps_before_header');
}

function chimps_head_tag(){
	do_action('chimps_head_tag');
}

function chimps_after_header() {
	do_action('chimps_after_header');
}

function chimps_header_left() {
	do_action('chimps_header_left');
}

function chimps_header_right() {
	do_action('chimps_header_right');
}

function chimps_navigation() {
	do_action('chimps_navigation');
}

function chimps_404_content() {
  do_action('chimps_404_content');
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

/**
* End
*/

?>