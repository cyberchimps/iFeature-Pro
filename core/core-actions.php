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
add_action('chimps_after_head_tag', 'chimps_font');
add_action('chimps_head_tag', 'chimps_html_attributes');
add_action('chimps_head_tag', 'chimps_meta_tags');
add_action('chimps_head_tag', 'chimps_link_rel');
add_action('chimps_head_tag', 'chimps_title_tag');
add_action('chimps_header_left', 'chimps_header_left_content');
add_action('chimps_header_right', 'chimps_header_contact_area');
add_action('chimps_header_right', 'chimps_header_social_icons');
add_action('chimps_navigation', 'chimps_nav');
add_action('chimps_404_content', 'chimps_404_content_handler');

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
function chimps_font() {
	global $themeslug, $options; //Call global variables

	if (v($options, $themeslug.'_font') == "" AND v($options, $themeslug.'_custom_font') == "") 
	{
		$font = apply_filters( 'chimps_default_font', 'Arial' );
	}		
	elseif (v($options, $themeslug.'_custom_font') != "") 
	{
		$font = v($options, $themeslug.'_custom_font');	
	}	
	else 
	{
		$font = v($options, $themeslug.'_font'); 
	}
	
 ?>
	
	<body style="font-family:'<?php echo ereg_replace("[^A-Za-z0-9]", " ", $font ); ?>', Helvetica, serif" <?php body_class(); ?> >
	<?php
}

//HTML attributes
function chimps_html_attributes() 
{ 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes('xhtml'); ?>>
<head profile="http://gmpg.org/xfn/11">
<?php 
}

//Meta tags
function chimps_meta_tags() {
	global $themeslug, $options, $post; //Call global variables
	if(!$post) return; // in case of 404 page or something
	$title = get_post_meta($post->ID, 'seo_title' , true);
	$pagedescription = get_post_meta($post->ID, 'seo_description' , true);
	$keywords = get_post_meta($post->ID, 'seo_keywords' , true); 
	
?>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="distribution" content="global" />
<meta name="language" content="en" />
<?php
if (v($options, $themeslug.'_home_title') != '' AND is_front_page()) 
	{ 
?>
<meta name='title' content='<?php echo v($options, $themeslug.'_home_title') ;?>'/> 
<?php
	}
	if (v($options, $themeslug.'_home_description') != '' AND is_front_page()) 
	{ 
?>
<meta name='description' content='<?php echo v($options, $themeslug.'_home_description') ;?>' />
<?php
	}
	if (v($options, $themeslug.'_home_keywords') != '' AND is_front_page()) 
	{ 
?>
<meta name='keywords' content=' <?php echo v($options, $themeslug.'_home_keywords') ; ?>' /> 
<?php
	}
	
	if ($title != '' AND !is_front_page()) {
		echo "<meta name='title' content='$title' />";
	}
	if ($pagedescription != '' AND !is_front_page()) {
		echo "<meta name='description' content='echo $pagedescription'/>";
	}
	if ($keywords != '' AND !is_front_page()) {
		echo "<meta name='keywords' content='$keywords'/>";
	}	
}


//Controls header title elements
function chimps_title_tag(){?>
	<title><?php
	if ($paged>1 ) 
	{
		echo ' - page '. $paged;
	}
	/*Title for tags */
	elseif (function_exists('is_tag') && is_tag()) 
	{
		bloginfo('name'); echo ' - '; single_tag_title("Tag Archive for &quot;"); echo '&quot;  ';
	}
	/*Title for archives */   
	elseif (is_archive()) 
	{
		bloginfo('name'); echo ' - '; wp_title(''); echo ' Archive '; 
	}
	/*Title for search */     
	elseif (is_search()) 
	{
		bloginfo('name'); echo ' - '; echo 'Search for &quot;'.wp_specialchars($s).'&quot;  '; 
	}
	/*Title for 404 */    
	elseif (is_404()) 
	{
		bloginfo('name'); echo ' - '; echo 'Not Found '; 
	}
	/*Title if front page is latest posts and no custom title */
	elseif (is_front_page() AND !is_page() AND $blogtitle == '') 
	{
		bloginfo('name'); echo ' - '; bloginfo('description'); 
	}
	/*Title if front page is latest posts with custom title */
	elseif (is_front_page() AND !is_page() AND $blogtitle != '') 
	{
		bloginfo('name'); echo ' - '; echo $blogtitle ; 
	}
	/*Title if front page is static page and no custom title */
	elseif (is_front_page() AND is_page() AND $title == '') 
	{
		bloginfo('name'); echo ' - '; bloginfo('description'); 
	}
	/*Title if front page is static page with custom title */
	elseif (is_front_page() AND is_page() AND $title != '') 
	{
		bloginfo('name'); echo ' - '; echo $title ; 
	}
	/*Title if static page is static page with no custom title */
	elseif (is_page() AND $title == '') 
	{
		bloginfo('name'); echo ' - '; wp_title(''); 
	}
	/*Title if static page is static page with custom title */
	elseif (is_page() AND $title != '') 
	{
		bloginfo('name'); echo ' - '; echo $title ; 
	}
	/*Title if blog page with no custom title */
	elseif (is_page() AND is_front_page() AND $blogtitle == '') 
	{
		bloginfo('name'); echo ' - '; wp_title(''); 
	}
	/*Title if blog page with custom title */ 
	elseif ($blogtitle != '') {
		bloginfo('name'); echo ' - '; echo $blogtitle ; 
	}
	/*Title if blog page without custom title */
	else 
	{
		bloginfo('name'); echo ' - '; wp_title(''); 
	}?>
	</title><?php	    
}

//Link rel
function chimps_link_rel()
	{
	global $themeslug, $options; //Call global variables
	$favicon = $options['file2'];
?>
<link rel="shortcut icon" href="<?php echo stripslashes($favicon['url']); ?>" type="image/x-icon" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link href='http://fonts.googleapis.com/css?family=<?php echo v($options, $themeslug.'_font'); ?>' rel='stylesheet' type='text/css' />

<?php
}

//Header left content (sitename/description or logo)
function chimps_header_left_content()
{
	global $themeslug, $options; //Call global variables
	$logo = $options['file'];

	if ($logo != '')
	{
?>
	<div id="logo">
		<a href="<?php echo home_url(); ?>/"><img src="<?php echo stripslashes($logo['url']); ?>" alt="logo"></a>
	</div>
<?php
	}
						
	if ($$logo == '' )
	{
?>
	<div id="sitename">
		<h1 class="sitename"><a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?> </a></h1>
	</div>
	
	<div id="description">
		<h1 class="description"><?php bloginfo('description'); ?></h1>
	</div>
<?php
	
	}						 
}

//Controls header_left title
function chimps_header_sitename()
	{ 
?>
	<div id="sitename">
		<h1 class="sitename"><a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?> </a></h1>
	</div>
<?php
}

//Controls header_left description
function chimps_header_description()
	{ 
?>
	<div id="description">
		<h1 class="description"><?php bloginfo('description'); ?></h1>
	</div>
<?php
}

//Controls header_left logo
function chimps_header_logo()
	{ 
?>
	<div id="logo">
		<a href="<?php echo home_url(); ?>/"><img src="<?php echo stripslashes($logo['url']); ?>" alt="logo"></a>
	</div>
<?php
}

//Controls header_right contact area
function chimps_header_contact_area()
{ 
	global $themeslug, $options; 
	$contactdefault = apply_filters( 'chimps_header_contact_default_text', 'Enter Contact Information Here' ); 
	
	if ($options[$themeslug.'_header_contact'] == '' ) 
	
		{
		echo "<div id='header_contact'>";
			printf( __( $contactdefault, 'core' )); 
		echo "</div>";
		}

	 if ($options[$themeslug.'_header_contact'] != 'hide' ) 
	 
	 	{
			echo "<div id='header_contact1'>";
			echo stripslashes (v($options, $themeslug.'_header_contact')); 
			echo "</div>";
		}
		
	if ($options[$themeslug.'_header_contact'] == 'hide' ) 
	
		{
			echo "<div style ='height: 10%;'>&nbsp;</div> ";
		}
}

//Controls header_right social icons
function chimps_header_social_icons()
	{ 
?>
	<br />
	<div id="social">
		<?php get_template_part('icons', 'header'); ?>
	</div>
<?php
}

//Controls navigation
function chimps_nav() 
{
	get_template_part('nav', 'header' ); 
}

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

function chimps_404_content_handler()
{
  ?>
  <div class="error">Parent 404 Handler<br />
  	<center></center><img src="<?php echo get_template_directory_uri() ;?>/images/confusedchimp.png" height="400" width="400" /></center>
  </div>
  <?
}

/**
* End
*/

?>