<?php
/**
* Header actions used by the CyberChimps Core Framework
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
* Establishes the theme font family.
*
* @since 1.0
*/
function chimps_font() {
	global $themeslug, $options; //Call global variables

	if ($options->get($themeslug.'_font') == "" AND $options->get($themeslug.'_custom_font') == "") {
		$font = apply_filters( 'chimps_default_font', 'Arial' );
	}		
	elseif ($options->get($themeslug.'_custom_font') != "") {
		$font = $options->get($themeslug.'_custom_font');	
	}	
	else {
		$font = $options->get($themeslug.'_font'); 
	} ?>
	
	<body style="font-family:'<?php echo ereg_replace("[^A-Za-z0-9]", " ", $font ); ?>', Helvetica, serif" <?php body_class(); ?> > <?php
}

/**
* Establishes the theme HTML attributes
*
* @since 1.0
*/
function chimps_html_attributes() { ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes('xhtml'); ?>>
<head profile="http://gmpg.org/xfn/11"> <?php 
}

/**
* Establishes the theme META tags (including SEO options)
*
* @since 1.0
*/
function chimps_meta_tags() {
	global $themeslug, $options, $post; //Call global variables
	if(!$post) return; // in case of 404 page or something
	$title = get_post_meta($post->ID, 'seo_title' , true);
	$pagedescription = get_post_meta($post->ID, 'seo_description' , true);
	$keywords = get_post_meta($post->ID, 'seo_keywords' , true);  ?>

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="distribution" content="global" />
<meta name="language" content="en" /> <?php

	if ($options->get($themeslug.'_home_title') != '' AND is_front_page()) { ?>
<meta name='title' content='<?php echo ($options->get($themeslug.'_home_title')) ;?>'/> <?php
	}
	if ($options->get($themeslug.'_home_description') != '' AND is_front_page()) { ?>
<meta name='description' content='<?php echo ($options->get($themeslug.'_home_description')) ;?>' /> <?php
	}
	if ($options->get($themeslug.'_home_keywords') != '' AND is_front_page()) { ?>
<meta name='keywords' content=' <?php echo ($options->get($themeslug.'_home_keywords')) ; ?>' /> <?php
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


/**
* Establishes the theme title tags.
*
* @since 1.0
*/
function chimps_title_tag() {
	global $options, $themeslug, $post; 
	$blogtitle = ($options->get($themeslug.'_home_title'));
	$title = get_post_meta($post->ID, 'seo_title' , true);

	echo "<title>";
	
	if (function_exists('is_tag') && is_tag()) { /*Title for tags */
		bloginfo('name'); echo ' - '; single_tag_title("Tag Archive for &quot;"); echo '&quot;  ';
	}
	elseif (is_archive()) { /*Title for archives */ 
		bloginfo('name'); echo ' - '; wp_title(''); echo ' Archive '; 
	}    
	elseif (is_search()) { /*Title for search */ 
		bloginfo('name'); echo ' - '; echo 'Search for &quot;'.wp_specialchars($s).'&quot;  '; 
	}    
	elseif (is_404()) { /*Title for 404 */
		bloginfo('name'); echo ' - '; echo 'Not Found '; 
	}
	elseif (is_front_page() AND !is_page() AND $blogtitle == '') { /*Title if front page is latest posts and no custom title */
		bloginfo('name'); echo ' - '; bloginfo('description'); 
	}
	elseif (is_front_page() AND !is_page() AND $blogtitle != '') { /*Title if front page is latest posts with custom title */
		bloginfo('name'); echo ' - '; echo $blogtitle ; 
	}
	elseif (is_front_page() AND is_page() AND $title == '') { /*Title if front page is static page and no custom title */
		bloginfo('name'); echo ' - '; bloginfo('description'); 
	}
	elseif (is_front_page() AND is_page() AND $title != '') { /*Title if front page is static page with custom title */
		bloginfo('name'); echo ' - '; echo $title ; 
	}
	elseif (is_page() AND $title == '') { /*Title if static page is static page with no custom title */
		bloginfo('name'); echo ' - '; wp_title(''); 
	}
	elseif (is_page() AND $title != '') { /*Title if static page is static page with custom title */
		bloginfo('name'); echo ' - '; echo $title ; 
	}
	elseif (is_page() AND is_front_page() AND $blogtitle == '') { /*Title if blog page with no custom title */
		bloginfo('name'); echo ' - '; wp_title(''); 
	}
	elseif ($blogtitle != '') { /*Title if blog page with custom title */ 
		bloginfo('name'); echo ' - '; echo $blogtitle ; 
	}
	else { /*Title if blog page without custom title */
		bloginfo('name'); echo ' - '; wp_title(''); 
	}
	echo "</title>";    
}

/**
* Sets the header link rel attributes
*
* @since 1.0
*/
function chimps_link_rel() {
	global $themeslug, $options; //Call global variables
	$favicon = $options->get($themeslug.'_custom_favicon'); //Calls the favicon URL from the theme options ?>
<link rel="shortcut icon" href="<?php echo stripslashes($favicon); ?>" type="image/x-icon" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link href='http://fonts.googleapis.com/css?family=<?php echo ($options->get($themeslug.'_font')); ?>' rel='stylesheet' type='text/css' /> <?php
}

/**
* Header left content (sitename/description or logo)
*
* @since 1.0
*/
function chimps_header_left_content() {
	global $themeslug, $options; //Call global variables
	$logo = $options->get($themeslug.'_custom_logo'); //Calls the logo URL from the theme options

	if ($logo != '') { ?>
	<div id="logo">
		<a href="<?php echo home_url(); ?>/"><img src="<?php echo stripslashes($logo['url']); ?>" alt="logo"></a>
	</div><?php
	}
						
	if ($logo == '' ) { ?>
	<div id="sitename">
		<h1 class="sitename"><a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?> </a></h1>
	</div>
	
	<div id="description">
		<h1 class="description"><?php bloginfo('description'); ?></h1>
	</div> <?php
	}						 
}

/**
* Sets up the header contact area
*
* @since 1.0
*/
function chimps_header_contact_area() { 
	global $themeslug, $options; 
	$contactdefault = apply_filters( 'chimps_header_contact_default_text', 'Enter Contact Information Here' ); 
	
	if ($options->get($themeslug.'_header_contact') == '' ) {
		echo "<div id='header_contact'>";
			printf( __( $contactdefault, 'core' )); 
		echo "</div>";
	}
	if ($options->get($themeslug.'_header_contact') != 'hide' ) {
		echo "<div id='header_contact1'>";
		echo stripslashes ($options->get($themeslug.'_header_contact')); 
		echo "</div>";
	}	
	if ($options->get($themeslug.'_header_contact') == 'hide' ) {
		echo "<div style ='height: 10%;'>&nbsp;</div> ";
	}
}

/**
* Social icons
*
* @since 1.0
*/
function chimps_header_social_icons() { 
	global $options, $themeslug; //call globals
	
	$facebook		= $options->get($themeslug.'_facebook');
	$hidefacebook   = $options->get($themeslug.'_hide_facebook');
	$twitter		= $options->get($themeslug.'_twitter');;
	$hidetwitter    = $options->get($themeslug.'_hide_twitter');;
	$gplus		    = $options->get($themeslug.'_gplus');
	$hidegplus      = $options->get($themeslug.'_hide_gplus');
	$flickr		    = $options->get($themeslug.'_flickr');
	$hideflickr     = $options->get($themeslug.'_hide_flickr');
	$myspace	    = $options->get($themeslug.'_myspace');
	$hidemyspace    = $options->get($themeslug.'_hide_myspace');
	$linkedin		= $options->get($themeslug.'_linkedin');
	$hidelinkedin   = $options->get($themeslug.'_hide_linkedin');
	$youtube		= $options->get($themeslug.'_youtube');
	$hideyoutube    = $options->get($themeslug.'_hide_youtube');
	$googlemaps		= $options->get($themeslug.'_googlemaps');
	$hidegooglemaps = $options->get($themeslug.'_hide_googlemaps');
	$email			= $options->get($themeslug.'_email');
	$hideemail      = $options->get($themeslug.'_hide_email');
	$rss			= $options->get($themeslug.'_rsslink');
	$hiderss   		= $options->get($themeslug.'_hide_rss');

	echo "<br />";
	echo "<div id='social'>"; ?>

	<div class="icons">

		<?php if ($hidefacebook != '1' AND $facebook != '' ):?>
			<a href="<?php echo $facebook ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/facebook.png" alt="Facebook" /></a>
		<?php endif;?>
		<?php if ($hidefacebook != '1' AND $facebook == '' ):?>
			<a href="http://facebook.com" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/facebook.png" alt="Facebook" /></a>
		<?php endif;?>
		<?php if ($hidetwitter != '1' AND $twitter != '' ):?>
			<a href="<?php echo $twitter ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/twitter.png" alt="Twitter" /></a>
		<?php endif;?>
		<?php if ($hidetwitter != '1' AND $twitter == '' ):?>
			<a href="http://twitter.com" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/twitter.png" alt="Twitter" /></a>
		<?php endif;?>
		<?php if ($hidegplus != '1' AND $gplus != '' ):?>
			<a href="<?php echo $gplus ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/gplus.png" alt="Gplus" /></a>
		<?php endif;?>
		<?php if ($hidegplus != '1' AND $gplus == '' ):?>
			<a href="https://plus.google.com" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/gplus.png" alt="Gplus" /></a>
		<?php endif;?>
		<?php if ($hideflickr != '1' AND $flickr != '' ):?>
			<a href="<?php echo $flickr ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/flickr.png" alt="Flickr" /></a>
		<?php endif;?>
		<?php if ($hideflickr != '1' AND $flickr == '' ):?>
			<a href="https://flickr.com" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/flickr.png" alt="Flickr" /></a>
		<?php endif;?>
		<?php if ($hidemyspace != '1' AND $myspace != '' ):?>
			<a href="<?php echo $myspace ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/myspace.png" alt="Gplus" /></a>
		<?php endif;?>
		<?php if ($hidemyspace != '1' AND $myspace == '' ):?>
			<a href="https://myspace.com" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/myspace.png" alt="Gplus" /></a>
		<?php endif;?>
		<?php if ($hidelinkedin != '1' AND $linkedin != '' ):?>
			<a href="<?php echo $linkedin ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/linkedin.png" alt="LinkedIn" /></a>
		<?php endif;?>
		<?php if ($hidelinkedin != '1' AND $linkedin == '' ):?>
			<a href="http://linkedin.com" target="_blank" ><img src="<?php echo get_template_directory_uri(); ?>/images/social/linkedin.png" alt="LinkedIn" /></a>
		<?php endif;?>
		<?php if ($hideyoutube != '1' AND $youtube != '' ):?>
			<a href="<?php echo $youtube ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/youtube.png" alt="YouTube" /></a>
		<?php endif;?>
		<?php if ($hideyoutube != '1' AND $youtube == '' ):?>
			<a href="http://youtube.com" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/youtube.png" alt="YouTube" /></a>
		<?php endif;?>
		<?php if ($hidegooglemaps != '1' AND $googlemaps != ''):?>
			<a href="<?php echo $googlemaps ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/googlemaps.png" alt="Google Maps" /></a>
		<?php endif;?>
		<?php if ($hidegooglemaps != '1' AND $googlemaps == ''):?>
			<a href="http://google.com/maps" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/googlemaps.png" alt="Google Maps" /></a>
		<?php endif;?>
		<?php if ($hideemail != '1' AND $email != ''):?>
			<a href="mailto:<?php echo $email ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/email.png" alt="E-mail" /></a>
		<?php endif;?>
		<?php if ($hideemail != '1' AND $email == ''):?>
			<a href="mailto:no@way.com" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/email.png" alt="E-mail" /></a>
		<?php endif;?>
		<?php if ($hiderss != '1' and $rss != '' ):?>
			<a href="<?php echo $rss ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/rss.png" alt="RSS" /></a>
		<?php endif;?>
		<?php if ($hiderss != '1' and $rss == ''  ):?>
			<a href="<?php bloginfo('rss2_url'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/rss.png" alt="RSS" /></a>
		<?php endif;?>
	
	</div><!--end icons--> 
	</div><!--end social--> <?php
}

/**
* Navigation
*
* @since 1.0
*/
function chimps_nav() {
	global $options, $themeslug; //call globals
	$homeimage		= $options->get($themeslug.'_home_logo'); ?>
	
	<div id ="navbackground">
		<div id="navcontainer">

		<?php if ($homeimage == '' ):?>
			<div id="homebutton"><a href="<?php echo home_url(); ?>/"><img src="<?php echo get_template_directory_uri(); ?>/images/menu/home.png?>" alt="Home" /></a></div>
		<?php endif;?>
		<?php if ($homeimage != '' ):?>
			<div id="homebutton"><a href="<?php echo home_url(); ?>/"><img src="<?php echo stripslashes($homeimage['url']) ;?>" alt="Home" /></a></div>
		<?php endif;?>
   
   			 <div id="sfwrapper">
       			 <?php wp_nav_menu( array(
	    			'theme_location' => 'header-menu', // Setting up the location for the main-menu, Main Navigation.
	    			'menu_class' => 'sf-menu', //Adding the class for dropdowns
	    			'container_id' => 'navwrap', //Add CSS ID to the containter that wraps the menu.
	    			'fallback_cb' => 'menu_fallback', //if wp_nav_menu is unavailable, WordPress displays wp_page_menu function, which displays the pages of your blog.
	    			));
    			?>
    		</div><!--end sfwraooer-->
    		
			<div id="searchbar">
				<?php get_search_form(); ?>
			</div><!--end searchbar-->
			
		</div><!--end navbackground-->
	</div> <!--end navcontainer--> <?php
}

/**
* End
*/

?>