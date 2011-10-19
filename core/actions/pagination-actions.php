<?php
/**
* Pagination actions used by the CyberChimps Core Framework
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
* Core pagination actions
*/
add_action('chimps_main_index_pagination', 'chimps_previous_posts');
add_action('chimps_main_index_pagination', 'chimps_newer_posts');
add_action('chimps_links_pages', 'chimps_wp_link_pages');

/**
* Core pagination functions
*/

//Controls previous posts link for main blog index pages
function chimps_previous_posts() 
	{
	$previous_text = apply_filters('chimps_previous_posts_text', '&laquo; Older Entries' ); //filter for changing older entries link text
?>
	<div class='next-posts'>
	<?php next_posts_link($previous_text);?>
	</div>
<?php
}

//Controls next posts link for main blog index pages
function chimps_newer_posts() 
	{
	$newer_text = apply_filters('chimps_newer_posts_text', 'Newer Entries &raquo;' ); //filter for changing newer entries link text
?>
	<div class='prev-posts'>
	<?php previous_posts_link($newer_text); ?>
	</div>
<?php
}

//Controls page-links for paginated posts
function chimps_wp_link_pages() 
	{
	wp_link_pages(array(
		'before' => 'Pages: ', 
		'next_or_number' => 'number')
	);
}

/**
* End
*/

?>