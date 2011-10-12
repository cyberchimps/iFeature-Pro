<?php
/**
* Actions used by the CyberChimps Core Framework
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
* Core header actions
*/
add_action('chimps_header_left', 'chimps_header_title');
//add_action('chimps_header_left', 'chimps_header_logo')
add_action('chimps_header_left', 'chimps_header_description');

/**
* Core pagination actions
*/
add_action('chimps_pagination', 'chimps_previous_posts');
add_action('chimps_pagination', 'chimps_newer_posts');
add_action('chimps_links_pages', 'chimps_wp_link_pages');

/**
* Core header functions
*/

//Controls header_left title
function chimps_header_title(){ ?>
	<div id="sitename">
	<h1 class="sitename"><a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?> </a></h1>
	</div>
	<?php
}

//Controls header_left description
function chimps_header_description(){ ?>
	<div id="description">
	<h1 class="description"><?php bloginfo('description'); ?></h1>
	</div>
	<?php
}

/**
* Core pagination functions
*/

//Controls previous posts link for main blog index pages
function chimps_previous_posts() {
	$previous_text = apply_filters('chimps_previous_posts_text', '&laquo; Older Entries' ); //filter for changing older entries link text
	
	echo "<div class='next-posts'>";
	next_posts_link($previous_text);
	echo "</div>";
}

//Controls next posts link for main blog index pages
function chimps_newer_posts() {
	$newer_text = apply_filters('chimps_previous_posts_text', 'Newer Entries &raquo;' ); //filter for changing newer entries link text
	
	echo "<div class='prev-posts'>";
	previous_posts_link($newer_text);
	echo "</div>";
}

//Controls page-links for paginated posts
function chimps_wp_link_pages() {
	wp_link_pages(array(
		'before' => 'Pages: ', 
		'next_or_number' => 'number')
	);
}

?>