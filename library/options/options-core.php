<?php   

/* 
	Options	Core
	Author: Tyler Cunningham
	Establishes the core theme options settings.
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
	 

	wp_register_script($themeslug.'jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"), false, '1.4.4');
    wp_register_script($themeslug.'jqueryui', get_template_directory_uri(). '/library/js/jquery-ui.js');
    wp_register_script($themeslug.'jquerycookie', get_template_directory_uri(). '/library/js/jquery-cookie.js');
    wp_register_script($themeslug.'cookie', get_template_directory_uri(). '/library/js/cookie.js');
    wp_register_script($themeslug.'color', get_template_directory_uri(). '/library/js/jscolor/jscolor.js');
    wp_register_style($themeslug.'css', get_template_directory_uri(). '/library/options/theme-options.css');
}

// Add scripts and stylesheet

function enqueue_scripts() {

	global $themename, $themeslug, $options;
	
    wp_enqueue_script($themeslug.'jquery');
    wp_enqueue_script($themeslug.'jqueryui');
    wp_enqueue_script($themeslug.'jquerycookie');
    wp_enqueue_script($themeslug.'cookie');
    wp_enqueue_script($themeslug.'color');
}
    
 function enqueue_styles() {
 
 	global $themename, $themeslug, $options;
      
    wp_enqueue_style($themeslug.'css');  
}

$name = "iFeature Pro";
$template_url = get_template_directory_uri();


/* Load up the menu page */
 
function theme_options_add_page() {
global $name, $shortname, $options;
  $page = add_theme_page($name." Settings", "".$name."", 'edit_theme_options', 'theme_options', 'theme_options_do_page');  

  add_action('admin_print_scripts-' . $page, 'enqueue_scripts');
  add_action('admin_print_styles-' . $page, 'enqueue_styles');  
 
}

/* Include select arrays */

	require_once ( get_template_directory() . '/library/options/options-select.php' );

/* End select arrays */

/* Include options functions */

	require_once ( get_template_directory() . '/library/options/options-functions.php' );

/* End options functions */

/* Include options tabs */

	require_once ( get_template_directory() . '/library/options/options-tabs.php' );

/* End options tabs */

/* Create the options page */

function theme_options_do_page() {
	global $name, $shortname, $optionlist,  $select_menu_color, $select_font, $select_slider_effect, $select_sidebar_type, $select_slider_caption, $select_callout_background, $select_slider_navigation, $select_slider_size, $select_slider_type, $select_slider_placement, $select_featured_images;
  

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
        <li><a href="#tab5"><span>Footer</span></a></li>
        <li><a href="#tab6"><span>Import/Export</span></a></li>
    
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

/* Include options validate */

	require_once ( get_template_directory() . '/library/options/options-validate.php' );

/* End options validate */

/* Redirect after activation */

if ( is_admin() && isset($_GET['activated'] ) && $pagenow ==	"themes.php" )
	wp_redirect( 'themes.php?page=theme_options' );
	
/* Redirect after resetting theme options */

if ( isset( $_REQUEST['reset'] ))
  wp_redirect( 'themes.php?page=theme_options' );
  
/* Update theme options after saving the import code */
  
if ( isset( $_REQUEST['updated'] ))

	$options = get_option($themename);
  	$checkimport = $options[$themeslug.'_import_code'];

		if ($checkimport != '' ) {
		
			$import = $options[$themeslug.'_import_code'];

			$options_array = (unserialize($import));
  			update_option( ''.$themename.'', $options_array );
		}   		
?>