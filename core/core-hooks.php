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
* Archive
*/
function chimps_before_archive()
{
	do_action('chimps_before_archive');
}

function chimps_archive()
{
	do_action('chimps_archives');
}

function chimps_after_archive()
{
	do_action('chimps_after_archive');
}

/** 
* 404
*/
function chimps_before_404()
{
	do_action('chimps_before_404');
}

function chimps_404()
{
	do_action('chimps_404');
}

function chimps_after_404()
{
	do_action('chimps_after_404');
}

/** 
* Header 
*/
function chimps_after_head_tag() 
{
	do_action('chimps_after_head_tag');
}

function chimps_before_header() 
{
	do_action('chimps_before_header');
}

function chimps_head_tag()
{
	do_action('chimps_head_tag');
}

function chimps_after_header() 
{
	do_action('chimps_after_header');
}

function chimps_header_left() 
{
	do_action('chimps_header_left');
}

function chimps_header_right() 
{
	do_action('chimps_header_right');
}

function chimps_navigation() 
{
	do_action('chimps_navigation');
}

/** 
* Content 
*/

function chimps_before_content() 
{
	do_action('chimps_before_content');
}

function chimps_after_content() 
{
	do_action('chimps_after_content');
}

/** 
* Entry 
*/

function chimps_before_entry()
{
	do_action('chimps_before_entry');
}

function chimps_after_entry()
{
	do_action('chimps_after_entry');
}

/** 
* Pagination 
*/
function chimps_main_index_pagination() 
{ 
	do_action('chimps_main_index_pagination');
}

function chimps_links_pages() 
{ 
	do_action('chimps_links_pages');
}

/**
* End
*/

?>