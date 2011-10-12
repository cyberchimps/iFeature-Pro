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
add_action('chimps_header_left', 'chimps_header_description');
add_action('chimps_header_left_logo', 'chimps_header_logo');
add_action('chimps_header_right_contact_area', 'chimps_header_contact_area');
add_action('chimps_header_right_social_icons', 'chimps_header_social_icons');
add_action('chimps_navigation', 'chimps_nav');

/**
* Core pagination actions
*/
add_action('chimps_main_index_pagination', 'chimps_previous_posts');
add_action('chimps_main_index_pagination', 'chimps_newer_posts');
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

//Controls header_left logo
function chimps_header_logo(){ ?>
	<div id="logo">
		<a href="<?php echo home_url(); ?>/"><img src="<?php echo stripslashes($logo['url']); ?>" alt="logo"></a>
	</div>
	<?php
}

//Controls header_right contact area
function chimps_header_contact_area(){ 
	global $themeslug, $options; ?>
	
	<div id="header_contact1">
		<?php echo stripslashes ($options[$themeslug.'_header_contact']); ?>
	</div>
	<?php 
}

//Controls header_right social icons
function chimps_header_social_icons(){ ?>
	<div id="social">
		<?php get_template_part('icons', 'header'); ?>
	</div>
	<?php
}

//Controls navigation
function chimps_nav() {
	get_template_part('nav', 'header' ); 
}

/**
* Core pagination functions
*/

//Controls previous posts link for main blog index pages
function chimps_previous_posts() {
	$previous_text = apply_filters('chimps_previous_posts_text', '&laquo; Older Entries' ); //filter for changing older entries link text
	
	?>
	<div class='next-posts'>
	<?php next_posts_link($previous_text);?>
	</div>
	<?php
}

//Controls next posts link for main blog index pages
function chimps_newer_posts() {
	$newer_text = apply_filters('chimps_previous_posts_text', 'Newer Entries &raquo;' ); //filter for changing newer entries link text
	?>
	<div class='prev-posts'>
	<?php previous_posts_link($newer_text); ?>
	</div>
	<?php
}

//Controls page-links for paginated posts
function chimps_wp_link_pages() {
	wp_link_pages(array(
		'before' => 'Pages: ', 
		'next_or_number' => 'number')
	);
}

/**
* End
*/

?>