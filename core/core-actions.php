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
add_action('chimps_after_head_tag', 'chimps_font_family');
add_action('chimps_head_tag', 'chimps_title_tag');
add_action('chimps_header_left', 'chimps_header_sitename');
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

//Fonts
function chimps_font_family(){
	global $themeslug, $options; //Call global variables

	if ($options[$themeslug.'_font'] == "" AND $options[$themeslug.'_custom_font'] == "") {
		$font = 'Arial';
	}		
	elseif ($options[$themeslug.'_custom_font'] != "") {
		$font = $options[$themeslug.'_custom_font'];	
	}	
	else {
		$font = $options[$themeslug.'_font']; 
	}
	
	$fontstrip =  ereg_replace("[^A-Za-z0-9]", " ", $font ); //Strip + from between font values with two names ?>
	
	<body style="font-family:'<?php echo $fontstrip ?>', Helvetica, serif" <?php body_class(); ?> >
	<?php
}


//Controls header title elements
function chimps_title_tag(){
	if ($paged>1 ) {
		echo ' - page '. $paged;
	}
	/*Title for tags */
	elseif (function_exists('is_tag') && is_tag()) {
		bloginfo('name'); echo ' - '; single_tag_title("Tag Archive for &quot;"); echo '&quot;  ';
	}
	/*Title for archives */   
	elseif (is_archive()) {
		bloginfo('name'); echo ' - '; wp_title(''); echo ' Archive '; 
	}
	/*Title for search */     
	elseif (is_search()) {
		bloginfo('name'); echo ' - '; echo 'Search for &quot;'.wp_specialchars($s).'&quot;  '; 
	}
	/*Title for 404 */    
	elseif (is_404()) {
		bloginfo('name'); echo ' - '; echo 'Not Found '; 
	}
	/*Title if front page is latest posts and no custom title */
	elseif (is_front_page() AND !is_page() AND $blogtitle == '') {
		bloginfo('name'); echo ' - '; bloginfo('description'); 
	}
	/*Title if front page is latest posts with custom title */
	elseif (is_front_page() AND !is_page() AND $blogtitle != '') {
		bloginfo('name'); echo ' - '; echo $blogtitle ; 
	}
	/*Title if front page is static page and no custom title */
	elseif (is_front_page() AND is_page() AND $title == '') {
		bloginfo('name'); echo ' - '; bloginfo('description'); 
	}
	/*Title if front page is static page with custom title */
	elseif (is_front_page() AND is_page() AND $title != '') {
		bloginfo('name'); echo ' - '; echo $title ; 
	}
	/*Title if static page is static page with no custom title */
	elseif (is_page() AND $title == '') {
		bloginfo('name'); echo ' - '; wp_title(''); 
	}
	/*Title if static page is static page with custom title */
	elseif (is_page() AND $title != '') {
		bloginfo('name'); echo ' - '; echo $title ; 
	}
	/*Title if blog page with no custom title */
	elseif (is_page() AND is_front_page() AND $blogtitle == '') {
		bloginfo('name'); echo ' - '; wp_title(''); 
	}
	/*Title if blog page with custom title */ 
	elseif ($blogtitle != '') {
		bloginfo('name'); echo ' - '; echo $blogtitle ; 
	}
	/*Title if blog page without custom title */
	else {
		bloginfo('name'); echo ' - '; wp_title(''); 
	}		    
}

//Controls header_left title
function chimps_header_sitename(){ ?>
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