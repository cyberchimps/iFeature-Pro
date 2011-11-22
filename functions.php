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
	$themenamefull = 'iFeature Pro';
	$themeslug = 'if';
	$root = get_template_directory_uri(); 
	
	
function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div id="comment-<?php comment_ID(); ?>">
      <div class="comment-author vcard">
         <?php echo get_avatar( $comment, 48 ); ?>

         <?php printf(__('<cite class="fn">%s</cite> <span class="says"></span>'), get_comment_author_link()) ?>
      </div>
      <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is awaiting moderation.') ?></em>
         <br />
      <?php endif; ?>

      <div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','') ?></div>

      <?php comment_text() ?>

      <div class="reply">
         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>
     </div>
<?php
        }
	
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
    
    	if ($options->get($themeslug.'_excerpt_link_text') == '') {
    		$linktext = '(Read More...)';
   		}
    
    	else {
    		$linktext = $options->get($themeslug.'_excerpt_link_text');
   		}
    
    global $post;
	return '<a href="'. get_permalink($post->ID) . '"> <br /><br /> '.$linktext.'</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

function new_excerpt_length($length) {

	global $themename, $themeslug, $options;
	
		if ($options->get($themeslug.'_excerpt_length') == '') {
    		$length = '55';
    	}
    
    	else {
    		$length = $options->get($themeslug.'_excerpt_length');
    	}

	return $length;
}
add_filter('excerpt_length', 'new_excerpt_length');

/* End excerpt functions. */

/* Add auto-feed links support. */	
add_theme_support('automatic-feed-links');
	
/* Add post-thumb support. */

function init_featured_image() {	
if ( function_exists( 'add_theme_support' ) ) {

 global $themename, $themeslug, $options;
	
		if ($options->get($themeslug.'_featured_image_height') == '') {
			$featureheight = '100';
	}		
	
	else {
		$featureheight = $options->get($themeslug.'_featured_image_height'); 
		
	}
	
		if ($options->get($themeslug.'_featured_image_width') == "") {
			$featurewidth = '100';
	}		
	
	else {
		$featurewidth = $options->get($themeslug.'_featured_image_width'); 
	} 
	 
	set_post_thumbnail_size( $featureheight, $featurewidth, true );
}	
}
add_action( 'init', 'init_featured_image', 11);	

add_theme_support( 'post-thumbnails' );
// This theme allows users to set a custom background


// This theme styles the visual editor with editor-style.css to match the theme style.
add_editor_style();

// Load jQuery
if ( !is_admin() ) {
 
	   wp_enqueue_script('jquery');
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

	global $themename, $themeslug, $options, $root;
	
	register_post_type( $themeslug.'_custom_slides',
		array(
			'labels' => array(
				'name' => __( 'iFeature Slides' ),
				'singular_name' => __( 'Slides' )
			),
			'public' => true,
			'show_ui' => true, 
			'supports' => array('custom-fields', 'title'),
			'taxonomies' => array( 'slide_categories'),
			'has_archive' => true,
			'menu_icon' => "$root/images/pro/favicon.ico",
			'rewrite' => array('slug' => 'slides')
		)
	);
	
	register_post_type( $themeslug.'_featured_posts',
		array(
			'labels' => array(
				'name' => __( 'Carousel' ),
				'singular_name' => __( 'Posts' )
			),
			'public' => true,
			'show_ui' => true, 
			'supports' => array('custom-fields'),
			'taxonomies' => array( 'carousel_categories'),
			'has_archive' => true,
			'menu_icon' => "$root/images/pro/favicon.ico",
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
	
	register_taxonomy(
		'carousel_categories',		
		$themeslug.'_carousel_categories',		
		array(
			'hierarchical' => true,
			'label' => 'Carousel Categories',	
			'query_var' => true,	
			'rewrite' => array( 'slug' => 'carousel_categories' ),	
		)
	);
}

add_action('init', 'custom_taxonomies', 0);

// Define default category for custom category taxonomy

function custom_taxonomy_default( $post_id, $post ) {

	global $themename, $themeslug, $options;	

	if( 'publish' === $post->post_status ) {

		$defaults = array(

			'slide_categories' => array( 'default' ), 'carousel_categories' => array( 'default' ),

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
	 
	$path =  get_template_directory_uri() ."/library/ns";

	$script = "
		
		<script type=\"text/javascript\" src=\"".$path."/jquery.nivo.slider.js\"></script>
		";
	
	echo $script;
}
add_action('wp_head', 'nivoslider');

// Carousel Javascript

function carousel(){
	 
	$path =  get_template_directory_uri() ."/library/js/";

	$script = "
		
		<script type=\"text/javascript\" src=\"".$path."/captify.tiny.js\"></script>
		<script type=\"text/javascript\" src=\"".$path."/jcarousellite_1.0.1.pack.js\"></script>
		";
	
	echo $script;
}
add_action('wp_head', 'carousel');


// + 1 Button 

function plusone(){
	
	$path =  get_template_directory_uri() ."/library/js";

	$script = "
		
		<script type=\"text/javascript\" src=\"".$path."/plusone.js\"></script>
		";
	
	echo $script;
}
add_action('wp_head', 'plusone');

// Typekit

function typekit_support() {
	global $themename, $themeslug, $options;
	
	$embed = $options->get($themeslug.'_typekit');
	
	echo stripslashes($embed);

}
add_action('wp_head', 'typekit_support');


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
    	'before_widget' => '<div id="%1$s" class="widget-container">',
    	'after_widget'  => '</div>',
    	'before_title'  => '<h2 class="widget-title">',
    	'after_title'   => '</h2>'
    ));
    register_sidebar(array(
    	'name' => 'Sidebar Left',
    	'id'   => 'sidebar-left',
    	'description'   => 'These are widgets for the left sidebar.',
    	'before_widget' => '<div id="%1$s" class="widget-container">',
    	'after_widget'  => '</div>',
    	'before_title'  => '<h2 class="widget-title">',
    	'after_title'   => '</h2>'
    ));    	
    register_sidebar(array(
    	'name' => 'Sidebar Right',
    	'id'   => 'sidebar-right',
    	'description'   => 'These are widgets for the right sidebar.',
    	'before_widget' => '<div id="%1$s" class="widget-container">',
    	'after_widget'  => '</div>',
    	'before_title'  => '<h2 class="widget-title">',
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

	$wp_admin_bar->add_menu( array( 'id' => 'iFeature', 'title' => 'iFeature Pro Options', 'href' => admin_url('themes.php?page=ifeature')  ) ); 
  
}
add_action( 'admin_bar_menu', 'admin_link', 113 );

if ( ! isset( $content_width ) ) $content_width = 608;

//Searchform  

/*function ifeature_searchform() {

	$searchform = '<form method="get" class="searchform" action="' . home_url( '/' ) . '"
	<div><input type="text" name="s" class="s" value="Search" id="searchsubmit" onfocus="if (this.value == \'Search\') this.value = '';" /></div>
	<div><input type="submit" class="searchsubmit" value=\'\' /></div>
	</form>';

	return $searchform;

}

add_filter( 'get_search_form', 'ifeature_searchform' ); */

//hooks

require_once ( get_template_directory() . '/core/core-init.php' );

do_action('chimps_init');

// Call additional template files
	
require_once ( get_template_directory() . '/inc/update.php' ); // Include automatic updater
require_once ( get_template_directory() . '/inc/theme-hooks.php' ); // Include automatic updater
require_once ( get_template_directory() . '/inc/theme-actions.php' ); // Include automatic updater



//test filer

/*function custom_link_post_format( $content ) {
global $options, $themeslug, $post;
$root = get_template_directory_uri(); 
ob_start();
?>

	<div class="post_content" style="background: yellow; ">
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<div class ="format-icon"><!--begin format icon-->
				<img src="<?php echo get_template_directory_uri(); ?>/images/formats/link.png" height="50px" width="50px" />
			</div><!--end format-icon-->
				<h2 class="posts_title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
					<!--Call Meta-->
			<?php chimps_meta(); ?>
				<?php
				if ( has_post_thumbnail()) {
 		 			echo '<div class="featured-image">';
 		 			echo '<a href="' . get_permalink($post->ID) . '" >';
 		 				the_post_thumbnail();
  					echo '</a>';
  					echo '</div>';
				}
			?>	
				<div class="entry" <?php if ( has_post_thumbnail()) { echo 'style="min-height: 115px;" '; }?>>
					<?php 
						if (v($options, $themeslug.'_show_excerpts') == '1' ) {
						the_excerpt();
						}
						else {
							the_content();
						}
					 ?>
				</div><!--end entry-->
			</div>
			</div>
	<?php	
	$content = ob_get_clean();
	
	return $content;
}

add_filter('chimps_post_formats_link_content', 'custom_link_post_format' ); */


?>