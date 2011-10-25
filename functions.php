<?php

/*
	Functions
	Author: Tyler Cunningham
	Establishes the core theme functions.
	Copyright (C) 2011 CyberChimps
	Version 2.0
*/


/* Define global variables. */	

	$themename = 'ifeature';
	$themenamefull = 'iFeature';
	$themeslug = 'if';
	$options = get_option($themename);
	
/* Localization */
	    
	load_theme_textdomain( 'core', TEMPLATEPATH . '/languages' );

	    $locale = get_locale();
	    $locale_file = TEMPLATEPATH . "/languages/$locale.php";
	    if ( is_readable( $locale_file ) )
		    require_once( $locale_file );

/* End global variables. */	

/* Begin custom excerpt functions. */	

function new_excerpt_more($more) {

	global $themename, $themeslug, $options;
    
    	if ($options[$themeslug.'_excerpt_link_text'] == '') {
    		$linktext = '(Read More...)';
   		}
    
    	else {
    		$linktext = $options[$themeslug.'_excerpt_link_text'];
   		}
    
    global $post;
	return '<a href="'. get_permalink($post->ID) . '"> <br /><br /> '.$linktext.'</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

function new_excerpt_length($length) {

	global $themename, $themeslug, $options;
	
		if ($options[$themeslug.'_excerpt_length'] == '') {
    		$length = '55';
    	}
    
    	else {
    		$length = $options[$themeslug.'_excerpt_length'];
    	}

	return $length;
}
add_filter('excerpt_length', 'new_excerpt_length');

/* End excerpt functions. */

/* Add auto-feed links support. */	
add_theme_support('automatic-feed-links');
	
/* Add post-thumb support. */

	
if ( function_exists( 'add_theme_support' ) ) {

	global $themename, $themeslug, $options;
	
		if($options[$themeslug.'_featured_image_height'] == "") {
			$featureheight = '100';
	}		
	
	else {
		$featureheight = $options[$themeslug.'_featured_image_height']; 
		
	}
	
		if ($options[$themeslug.'_featured_image_width'] == "") {
			$featurewidth = '100';
	}		
	
	else {
		$featurewidth = $options[$themeslug.'_featured_image_width']; 
	}
	add_theme_support( 'post-thumbnails' ); 
	set_post_thumbnail_size( $featureheight, $featurewidth, true );
}	
	
// This theme allows users to set a custom background
add_custom_background();

// This theme styles the visual editor with editor-style.css to match the theme style.
add_editor_style();

// Load jQuery
if ( !is_admin() ) {
  function ifeature_frontend_scripts()
  {
	   wp_deregister_script('jquery');
	   wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"), false);
	   wp_enqueue_script('jquery');
  }
  add_action('wp_enqueue_scripts', 'ifeature_frontend_scripts');
}

/**
* Attach CSS3PIE behavior to elements
* Add elements here that need PIE applied
*/   
function render_ie_pie() { ?>
	
	<style type="text/css" media="screen">
		#header li a, .postmetadata, .post_container, #navbackground, .wp-caption, .sidebar-widget-style, .sidebar-widget-title, .boxes, .box1, .box2, .box3, .box-widget-title, #calloutwrap, .calloutbutton, #twitterbar 
  		
  			{
  				behavior: url('<?php bloginfo('stylesheet_directory'); ?>/library/pie/PIE.htc');
			}
	</style>
<?php
}

add_action('wp_head', 'render_ie_pie', 8);
	



// Create custom post type for Slider

add_action( 'init', 'create_post_type' );

function create_post_type() {

	global $themename, $themeslug, $options;
	
	register_post_type( $themeslug.'_custom_slides',
		array(
			'labels' => array(
				'name' => __( 'Custom Slides' ),
				'singular_name' => __( 'Slides' )
			),
			'public' => true,
			'show_ui' => true, 
			'supports' => array('title', 'editor','custom-fields'),
			'taxonomies' => array( 'slide_categories'),
			'has_archive' => true,
			'rewrite' => array('slug' => 'slides')
		)
	);
}

// Register custom category taxonomy for Slider

function custom_taxonomies() {

	global $themename, $themeslug, $options;
	
	register_taxonomy(
		'slide_categories',		
		$themeslug.'_custom_slides',		
		array(
			'hierarchical' => true,
			'label' => 'Slide Categories',	
			'query_var' => true,	
			'rewrite' => array( 'slug' => 'slide_categories' ),	
		)
	);
}

add_action('init', 'custom_taxonomies', 0);

// Define default category for custom category taxonomy

function custom_taxonomy_default( $post_id, $post ) {

	global $themename, $themeslug, $options;	

	if( 'publish' === $post->post_status ) {

		$defaults = array(

			'slide_categories' => array( 'default' ),

			);

		$taxonomies = get_object_taxonomies( $post->post_type );

		foreach( (array) $taxonomies as $taxonomy ) {

			$terms = wp_get_post_terms( $post_id, $taxonomy );

			if( empty( $terms ) && array_key_exists( $taxonomy, $defaults ) ) {

				wp_set_object_terms( $post_id, $defaults[$taxonomy], $taxonomy );

			}

		}

	}

}

add_action( 'save_post', 'custom_taxonomy_default', 100, 2 );

// Nivo Slider 

function nivoslider(){
	 
	$path =  get_template_directory_uri() ."/library/ns/";

	$script = "
		
		<script type=\"text/javascript\" src=\"".$path."/jquery.nivo.slider.js\"></script>
		";
	
	echo $script;
}
add_action('wp_head', 'nivoslider');

// + 1 Button 

function plusone(){
	
	$path =  get_template_directory_uri() ."/library/js/";

	$script = "
		
		<script type=\"text/javascript\" src=\"".$path."/plusone.js\"></script>
		";
	
	echo $script;
}
add_action('wp_head', 'plusone');


// Register superfish scripts
	
function add_scripts() {
 
    if (!is_admin()) { // Add the scripts, but not to the wp-admin section.
    // Adjust the below path to where scripts dir is, if you must.
    $scriptdir = get_template_directory_uri() ."/library/sf/";
 
    // Register the Superfish javascript file
    wp_register_script( 'superfish', $scriptdir.'sf.js', false, '1.4.8');
    wp_register_script( 'sf-menu', $scriptdir.'sf-menu.js');
    // Now the superfish CSS
   
    //load the scripts and style.
	wp_enqueue_style('superfish-css');
    wp_enqueue_script('superfish');
    wp_enqueue_script('sf-menu');
    } // end the !is_admin function
} //end add_our_scripts function
 
//Add our function to the wp_head. You can also use wp_print_scripts.
add_action( 'wp_head', 'add_scripts',0);
	
	// Register menu names
	
	function register_menus() {
	register_nav_menus(
	array( 'header-menu' => __( 'Header Menu' ), 'footer-menu' => __( 'Footer Menu' ))
  );
}
	add_action( 'init', 'register_menus' );
	
	// Menu fallback
	
	function menu_fallback() {
	global $post; ?>
	
	<ul id="menu-nav" class="sf-menu">
		<?php wp_list_pages( 'title_li=&sort_column=menu_order&depth=3'); ?>
	</ul><?php
}

function ifp_widgets_init() {
    register_sidebar(array(
    	'name' => 'Sidebar Widgets',
    	'id'   => 'sidebar-widgets',
    	'description'   => 'These are widgets for the sidebar.',
    	'before_widget' => '<div id="%1$s" class="sidebar-widget-style">',
    	'after_widget'  => '</div>',
    	'before_title'  => '<h2 class="sidebar-widget-title">',
    	'after_title'   => '</h2>'
    ));
    register_sidebar(array(
    	'name' => 'Sidebar Left',
    	'id'   => 'sidebar-left',
    	'description'   => 'These are widgets for the left sidebar.',
    	'before_widget' => '<div id="%1$s" class="sidebar-left-widget-style">',
    	'after_widget'  => '</div>',
    	'before_title'  => '<h2 class="sidebar-left-widget-title">',
    	'after_title'   => '</h2>'
    ));    	
    register_sidebar(array(
    	'name' => 'Sidebar Right',
    	'id'   => 'sidebar-right',
    	'description'   => 'These are widgets for the right sidebar.',
    	'before_widget' => '<div id="%1$s" class="sidebar-right-widget-style">',
    	'after_widget'  => '</div>',
    	'before_title'  => '<h2 class="sidebar-right-widget-title">',
    	'after_title'   => '</h2>'
   	));
    	
    register_sidebar(array(
		'name' => 'Box Left',
		'id' => 'box-left',
		'description' => 'This is the left widget of the three-box section',
		'before_widget' => '<div class="box1">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="box-widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => 'Box Middle',
		'id' => 'box-middle',
		'description' => 'This is the middle widget of the three-box section',
		'before_widget' => '<div class="box2">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="box-widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => 'Box Right',
		'id' => 'box-right',
		'description' => 'This is the right widget of the three-box section',
		'before_widget' => '<div class="box3">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="box-widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => 'Footer',
		'id' => 'footer-widgets',
		'description' => 'These are the footer widgets',
		'before_widget' => '<div class="footer-widgets">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="footer-widget-title">',
		'after_title' => '</h3>',
	));
}
add_action ('widgets_init', 'ifp_widgets_init');

//Add link to theme settings in Admin bar

function admin_link() {

	global $wp_admin_bar;

	$wp_admin_bar->add_menu( array( 'id' => 'iFeature', 'title' => 'iFeature Pro Settings', 'href' => admin_url('themes.php?page=theme_options')  ) ); 
  
}
add_action( 'admin_bar_menu', 'admin_link', 113 );

//test filter

//function previous_post_text(){
	//$previous_text = 'Older Post: ';
	//return $previous_text;
//}
//add_filter('chimps_previous_posts_text','previous_post_text');

//hooks

require_once ( get_template_directory() . '/core/core-init.php' );

do_action('chimps_init');

// Call additional template files
	
require_once ( get_template_directory() . '/pro/meta-box.php' );
require_once ( get_template_directory() . '/inc/update.php' ); // Include automatic updater
?>