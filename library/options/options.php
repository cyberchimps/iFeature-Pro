<?php   

/* 
	Options	
	Author: Tyler Cunningham
	Establishes the theme options settings.
	Copyright (C) 2011 CyberChimps
	Version 2.0
	
	Portions of this code written by Blogatize http://blogatize.net
	License: GNU General Public License v2.0
	License URI: http://www.gnu.org/licenses/gpl-2.0.html  
*/


add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' ); 


/* Initialize plugin options to white list our options */  
function theme_options_init() {

	global $themename, $themeslug, $options;
	
	register_setting( $themeslug.'_options', ''.$themename.'', 'theme_options_validate' );
		add_settings_section($themeslug.'_main', '', $themeslug.'_section_text', ''.$themeslug.'');
		add_settings_section($themeslug.'_main', '', $themeslug.'_section_text2', ''.$themeslug.'');
  		add_settings_field($themeslug.'_filename', '', $themeslug.'_setting_filename', ''.$themeslug.'', $themeslug.'_main');  

	wp_register_script($themeslug.'jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"), false, '1.4.4');
    wp_register_script($themeslug.'jqueryui', get_template_directory_uri(). '/library/js/jquery-ui.js');
    wp_register_script($themeslug.'jquerycookie', get_template_directory_uri(). '/library/js/jquery-cookie.js');
    wp_register_script($themeslug.'cookie', get_template_directory_uri(). '/library/js/cookie.js');
    wp_register_script($themeslug.'color', get_template_directory_uri(). '/library/js/jscolor/jscolor.js');
    wp_register_style($themeslug.'css', get_template_directory_uri(). '/library/options/theme-options.css');
}


$name = "iFeature Pro";
$template_url = get_template_directory_uri();


/* Load up the menu page */
 
function theme_options_add_page() {
global $name, $shortname, $options;
  $page = add_theme_page($name." Settings", "".$name."", 'edit_theme_options', 'theme_options', 'theme_options_do_page');  

  add_action('admin_print_scripts-' . $page, 'if_scripts');
  add_action('admin_print_styles-' . $page, 'if_styles');  
 
}

/* Include select arrays */

	require_once ( get_template_directory() . '/library/options/select.php' );

/* End select arrays */

/* Include options functions */

	require_once ( get_template_directory() . '/library/options/options-functions.php' );

/* End options functions */

/* Include options tabs */

	require_once ( get_template_directory() . '/library/options/options-tabs.php' );

/* End options tabs */

/* Create the options page */

function theme_options_do_page() {
	global $name, $shortname, $optionlist,  $select_menu_color, $select_font, $select_slider_effect, $select_sidebar_type, $select_slider_caption, $select_callout_background, $select_slider_navigation, $select_slider_size, $select_slider_type, $select_slider_placement;
  

	if ( ! isset( $_REQUEST['updated'] ) ) {
		$_REQUEST['updated'] = false; 
} 
  if( isset( $_REQUEST['reset'] )) { 
            global $wpdb;
            $query = "DELETE FROM $wpdb->options WHERE option_name LIKE 'ifeature'";
            $wpdb->query($query);
            
            die;
     } 
   
?>

	<div class="wrap">
  

<?php if ( function_exists('screen_icon') ) screen_icon(); ?>

      
<h2><?php echo $name; ?> Settings</h2><br />

<p>Need help? Follow the links below to visit our support forum and documentation pages:</p>
<a href="http://cyberchimps.com/ifeaturepro/docs"><img src="<?php echo get_template_directory_uri();?>/images/docs.png?>" alt="Docs"></a> <a href="http://cyberchimps.com/forum"><img src="<?php echo get_template_directory_uri(); ?>/images/forum.png?>" alt="Forum"></a> 

		<?php if ( false !== $_REQUEST['updated'] ) { ?>
		<?php echo '<div id="message" class="updated fade" style="float:left;"><p><strong>'.$name.' settings saved</strong></p></div>'; ?>
    
    <?php } if( isset( $_REQUEST['reset'] )) { echo '<div id="message" class="updated fade"><p><strong>'.$name.' settings reset</strong></p></div>'; } ?>  
				


  <form method="post" action="options.php" enctype="multipart/form-data">
  
    <p class="submit" style="clear:left;">
				<input type="submit" class="button-primary" value="Save Settings" />   
			</p>  
      
    <div id="tabs" style="clear:both;">   
    <ul class="tabNavigation">
        <li><a href="#tab1"><span>General</span></a></li>
        <li><a href="#tab2"><span>Design</span></a></li>
        <li><a href="#tab3"><span>Social</span></a></li>
        <li><a href="#tab4"><span>Blog</span></a></li>
        <li><a href="#tab5"><span>SEO</span></a></li>
        <li><a href="#tab6"><span>Callout Section</span></a></li>
        <li><a href="#tab7"><span>iFeature Slider</span></a></li>        
        <li><a href="#tab8"><span>Footer</span></a></li>
        <li><a href="#tab9"><span>Import/Export</span></a></li>
    
    </ul>
    
    <div class="tabContainer">
		
			<?php settings_fields( 'if_options' ); ?>
			<?php $options = get_option( 'ifeature' ); ?>

			<table class="form-table">   

<?php
/* Include options case */

	require_once ( get_template_directory() . '/library/options/options-case.php' );

/* End options case */
?>       

      </div>  
    </div>    

			<p class="submit">
				<input type="submit" class="button-primary" value="Save Settings" />   
			</p>
		</form>

    
    <form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
&nbsp;&nbsp;&nbsp;<small>WARNING, THIS RESTORES TO DEFAULT</small>
</p>
</form> 



	</div>
	<?php
}



function theme_options_validate( $input ) {
	global  $select_menu_color, $select_font, $select_slider_effect, $select_slider_type, $select_sidebar_type, $select_slider_caption, $select_callout_background, $select_slider_navigation, $select_slider_size, $select_slider_placement;

	// Assign checkbox value
	
	
	if ( ! isset( $input['if_hide_facebook'] ) )
		$input['if_hide_facebook'] = null;
	$input['if_hide_facebook'] = ( $input['if_hide_facebook'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input['if_hide_twitter'] ) )
		$input['if_hide_twitter'] = null;
	$input['if_hide_twitter'] = ( $input['if_hide_twitter'] == 1 ? 1 : 0 ); 
	
		if ( ! isset( $input['if_hide_gplus'] ) )
		$input['if_hide_gplus'] = null;
	$input['if_hide_gplus'] = ( $input['if_hide_gplus'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input['if_hide_linkedin'] ) )
		$input['if_hide_linkedin'] = null;
	$input['if_hide_linkedin'] = ( $input['if_hide_linkedin'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input['if_hide_youtube'] ) )
		$input['if_hide_youtube'] = null;
	$input['if_hide_youtube'] = ( $input['if_hide_youtube'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input['if_hide_googlemaps'] ) )
		$input['if_hide_googlemaps'] = null;
	$input['if_hide_googlemaps'] = ( $input['if_hide_googlemaps'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input['if_hide_email'] ) )
		$input['if_hide_email'] = null;
	$input['if_hide_email'] = ( $input['if_hide_email'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input['if_hide_rss'] ) )
		$input['if_hide_rss'] = null;
	$input['if_hide_rss'] = ( $input['if_hide_rss'] == 1 ? 1 : 0 ); 

  	if ( ! isset( $input['if_hide_callout'] ) )
		$input['if_hide_callout'] = null;
	$input['if_hide_callout'] = ( $input['if_hide_callout'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input['if_show_fb_like'] ) )
		$input['if_show_fb_like'] = null;
	$input['if_show_fb_like'] = ( $input['if_show_fb_like'] == 1 ? 1 : 0 ); 
  
     if ( ! isset( $input['if_hide_slider'] ) )
		$input['if_hide_slider'] = null;
	$input['if_hide_slider'] = ( $input['if_hide_slider'] == 1 ? 1 : 0 ); 
  
    if ( ! isset( $input['if_hide_boxes'] ) )
		$input['if_hide_boxes'] = null;
	$input['if_hide_boxes'] = ( $input['if_hide_boxes'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input['if_hide_search'] ) )
		$input['if_hide_search'] = null;
	$input['if_hide_search'] = ( $input['if_hide_search'] == 1 ? 1 : 0 ); 
  
  if ( ! isset( $input['if_hide_home_icon'] ) )
		$input['if_hide_home_icon'] = null;
	$input['if_hide_home_icon'] = ( $input['if_hide_home_icon'] == 1 ? 1 : 0 ); 
  
  
     if ( ! isset( $input['if_hide_link'] ) )
		$input['if_hide_link'] = null;
	$input['if_hide_link'] = ( $input['if_hide_link'] == 1 ? 1 : 0 ); 
	
	  if ( ! isset( $input['if_slider_navigation'] ) )
		$input['if_slider_navigation'] = null;
	$input['if_slider_navigation'] = ( $input['if_slider_navigation'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input['if_show_excerpts'] ) )
		$input['if_show_excerpts'] = null;
	$input['if_show_excerpts'] = ( $input['if_show_excerpts'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input['if_hide_author'] ) )
		$input['if_hide_author'] = null;
	$input['if_hide_author'] = ( $input['if_hide_author'] == 1 ? 1 : 0 ); 
	
	 if ( ! isset( $input['if_hide_categories'] ) )
		$input['if_hide_categories'] = null;
	$input['if_hide_categories'] = ( $input['if_hide_categories'] == 1 ? 1 : 0 ); 
	
	 if ( ! isset( $input['if_hide_date'] ) )
		$input['if_hide_date'] = null;
	$input['if_hide_date'] = ( $input['if_hide_date'] == 1 ? 1 : 0 ); 
	
	 if ( ! isset( $input['if_hide_comments'] ) )
		$input['if_hide_comments'] = null;
	$input['if_hide_comments'] = ( $input['if_hide_comments'] == 1 ? 1 : 0 ); 
	
	 if ( ! isset( $input['if_hide_share'] ) )
		$input['if_hide_share'] = null;
	$input['if_hide_share'] = ( $input['if_hide_share'] == 1 ? 1 : 0 ); 
	
	 if ( ! isset( $input['if_hide_tags'] ) )
		$input['if_hide_tags'] = null;
	$input['if_hide_tags'] = ( $input['if_hide_tags'] == 1 ? 1 : 0 ); 
	
	   if ( ! isset( $input['if_enable_twitter'] ) )
		$input['if_enable_twitter'] = null;
	$input['if_enable_twitter'] = ( $input['if_enable_twitter'] == 1 ? 1 : 0 ); 
  
  
	  if ( ! isset( $input['if_enable_custom_calloutbg'] ) )
		$input['if_enable_custom_calloutbg'] = null;
	$input['if_enable_custom_calloutbg'] = ( $input['if_enable_custom_calloutbg'] == 1 ? 1 : 0 );   
  
     if ( ! isset( $input['if_show_slider_blog'] ) )
		$input['if_show_slider_blog'] = null;
	$input['if_show_slider_blog'] = ( $input['if_show_slider_blog'] == 1 ? 1 : 0 ); 
	
	     if ( ! isset( $input['if_widget_title_bg'] ) )
		$input['if_widget_title_bg'] = null;
	$input['if_widget_title_bg'] = ( $input['if_widget_title_bg'] == 1 ? 1 : 0 ); 
	
  	// Strip HTML from certain options
  	
   $input['if_logo'] = wp_filter_nohtml_kses( $input['if_logo'] );
  
   $input['if_facebook'] = wp_filter_nohtml_kses( $input['if_facebook'] ); 
    
   $input['if_twitter'] = wp_filter_nohtml_kses( $input['if_twitter'] ); 
  
   $input['if_linkedin'] = wp_filter_nohtml_kses( $input['if_linkedin'] );   
  
   $input['if_youtube'] = wp_filter_nohtml_kses( $input['if_youtube'] );  
  
   $input['if_rsslink'] = wp_filter_nohtml_kses( $input['if_rsslink'] );  
  
   $input['if_email'] = wp_filter_nohtml_kses( $input['if_email'] );   
  

	$options = get_option('ifeature');
  if ($_FILES['if_filename']['name'] != '') {
       $overrides = array('test_form' => false); 
       $file = wp_handle_upload($_FILES['if_filename'], $overrides);
       $input['file'] = $file;
   } elseif(isset($_POST['if_filename_text']) && $_POST['if_filename_text'] != '') {
	   $input['file'] = array('url' => $_POST['if_filename_text']);
   } else {
	   $input['file'] = null;
   }

if ($_FILES['if_favfilename']['name'] != '') {
       $overrides = array('test_form' => false); 
       $file2 = wp_handle_upload($_FILES['if_favfilename'], $overrides);
       $input['file2'] = $file2;
   } elseif(isset($_POST['if_favfilename_text']) && $_POST['if_favfilename_text'] != '') {
	   $input['file2'] = array('url' => $_POST['if_favfilename_text']);
   } else {
	   $input['file2'] = null;
   }
   
   if ($_FILES['if_homefilename']['name'] != '') {
       $overrides = array('test_form' => false); 
       $file3 = wp_handle_upload($_FILES['if_homefilename'], $overrides);
       $input['file3'] = $file3;
   } elseif(isset($_POST['if_homefilename_text']) && $_POST['if_homefilename_text'] != '') {
	   $input['file3'] = array('url' => $_POST['if_homefilename_text']);
   } else {
	   $input['file3'] = null;
   }
   
     if ($_FILES['if_calloutfilename']['name'] != '') {
       $overrides = array('test_form' => false); 
       $file4 = wp_handle_upload($_FILES['if_calloutfilename'], $overrides);
       $input['file4'] = $file4;
   } elseif(isset($_POST['if_calloutfilename_text']) && $_POST['if_calloutfilename_text'] != '') {
	   $input['file4'] = array('url' => $_POST['if_calloutfilename_text']);
   } else {
	   $input['file4'] = null;
   }


	return $input;    

}

?>
<?php


/* Truncate */

function truncate ($str, $length=10, $trailing='..')
{
 $length-=mb_strlen($trailing);
 if (mb_strlen($str)> $length)
	  {
 return mb_substr($str,0,$length).$trailing;
  }
 else
  {
 $res = $str;
  }
 return $res;
} 


/* Get first image */

function get_first_image() {
 global $post, $posts;
 $first_img = '';
 $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
 if(isset($matches[1][0])){
 $first_img = $matches [1][0];
 return $first_img;
 }  
}  

function if_section_text() {
    
}

function if_section_text2() {
    
}


function if_setting_filename() {
  }
  
/* Custom Menu */   
  
add_action( 'init', 'register_my_menu' );

function register_my_menu() {
	register_nav_menu( 'primary-menu', __( 'Primary Menu' ) );
}


// Add scripts and stylesheet

  function if_scripts() {
        wp_enqueue_script('ifjquery');
        wp_enqueue_script('ifjqueryui');
        wp_enqueue_script('ifjquerycookie');
        wp_enqueue_script('ifcookie');
        wp_enqueue_script('ifcolor');
   }
    
 function if_styles() {
       wp_enqueue_style('ifcss');
   }

/* Redirect after activation */

if ( is_admin() && isset($_GET['activated'] ) && $pagenow ==	"themes.php" )
	wp_redirect( 'themes.php?page=theme_options' );
	
/* Redirect after resetting theme options */

if ( isset( $_REQUEST['reset'] ))
  wp_redirect( 'themes.php?page=theme_options' );
  
/* Update theme options after saving the import code */
  
if ( isset( $_REQUEST['updated'] ))

  $options = get_option('ifeature') ; 
  $checkimport = $options['if_import_code'];
		
		if ($checkimport != '' ) {
			
			$options = get_option('ifeature') ;  
			$import = $options['if_import_code'];
			
			$options_array = (unserialize($import));
  			update_option( 'ifeature', $options_array );
		}   		

?>
