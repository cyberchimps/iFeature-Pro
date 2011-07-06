<?php   

/* 
Portions of this code written by Blogatize http://blogatize.net
License: GNU General Public License v2.0
License URI: http://www.gnu.org/licenses/gpl-2.0.html  
*/


add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' ); 


$options = get_option($themename);

/**
 * Init plugin options to white list our options
 */  
function theme_options_init() {
	
	register_setting( 'if_options', 'ifeature', 'theme_options_validate' );
		add_settings_section('if_main', '', 'if_section_text', 'if');
  		add_settings_field('if_filename', '', 'if_setting_filename', 'if', 'if_main');  

	wp_register_script('ifjquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"), false, '1.4.4');
    wp_register_script('ifjqueryui', get_template_directory_uri(). '/library/js/jquery-ui.js');
    wp_register_script('ifjquerycookie', get_template_directory_uri(). '/library/js/jquery-cookie.js');
    wp_register_script('ifcookie', get_template_directory_uri(). '/library/js/cookie.js');
    wp_register_script('ifcolor', get_template_directory_uri(). '/library/js/jscolor/jscolor.js');
    wp_register_style('ifcss', get_template_directory_uri(). '/library/options/theme-options.css');
}


$themename = "iFeature Pro";
$template_url = get_template_directory_uri();


/**
 * Load up the menu page
 */
 
function theme_options_add_page() {
global $themename, $shortname, $options;
  $page = add_theme_page($themename." Settings", "".$themename."", 'edit_theme_options', 'theme_options', 'theme_options_do_page');  

  add_action('admin_print_scripts-' . $page, 'if_scripts');
  add_action('admin_print_styles-' . $page, 'if_styles');  
 
}

/*
Custom CSS
*/

function ifeature_add_css() {
	$options = get_option('ifeature');
	$ifeature_css_css = $options['if_css_options'];
	echo '<style type="text/css">' . "\n";
	echo ifeature_css_filter ( $ifeature_css_css ) . "\n";
	echo '</style>' . "\n";
}

function ifeature_css_filter($_content) {
	$_return = preg_replace ( '/@import.+;( |)|((?:\/\*(?:[^*]|(?:\*+[^*\/]))*\*+\/))/i', '', $_content );
	$_return = htmlspecialchars ( strip_tags($_return), ENT_NOQUOTES, 'UTF-8' );
	return $_return;
}

		
add_action ( 'wp_head', 'ifeature_add_css' );

/*
Site Title Color
*/

function ifeature_add_sitetitle_color() {

$options = get_option('ifeature');

if (isset($options['if_sitetitle_color']) == "") 
			$sitetitle = '717171';


		else 
			$sitetitle = $options['if_sitetitle_color']; 
			
		
		
	
echo '<style type="text/css">';
		echo ".sitename {color: #$sitetitle;}";
		echo '</style>';



}
add_action( 'wp_head', 'ifeature_add_sitetitle_color');

/*
Link Color
*/

function ifeature_add_link_color() {

$options = get_option('ifeature');

if (isset($options['if_link_color']) == "") 
			$link = '717171';


		else 
			$link = $options['if_link_color']; 
			
		
		
	
echo '<style type="text/css">';
		echo "a {color: #$link;}";
		echo '</style>';



}
add_action( 'wp_head', 'ifeature_add_link_color');


/*
Menu Link Color
*/

function ifeature_add_menulink_color() {

$options = get_option('ifeature');

if (isset($options['if_menulink_color']) == "") 
			$sitelink = 'FFFFFF';


		else 
			$sitelink = $options['if_menulink_color']; 
			
		
		
	
echo '<style type="text/css">';
		echo ".sf-menu a {color: #$sitelink;}";
		echo '</style>';



}
add_action( 'wp_head', 'ifeature_add_menulink_color');

/*
Post Title Color
*/

function ifeature_add_posttitle_color() {

$options = get_option('ifeature');

if (isset($options['if_posttitle_color']) == "") 
			$posttitle = '717171';


		else 
			$posttitle = $options['if_posttitle_color']; 
			
		
		
	
echo '<style type="text/css">';
		echo ".posts_title a {color: #$posttitle;}";
		echo '</style>';



}
add_action( 'wp_head', 'ifeature_add_posttitle_color');

/*
Callout BG Color
*/

function ifeature_add_calloutbg_color() {

$options = get_option('ifeature');

if (isset($options['if_callout_background_color']) == "") 
			$callbg = 'F8F8F8';


		else 
			$callbg = $options['if_callout_background_color']; 
			
	
echo '<style type="text/css">';
		echo "#calloutwrap {background: #$callbg;}";
		echo '</style>';



}
add_action( 'wp_head', 'ifeature_add_calloutbg_color');

/*
Callout Button Color
*/

function ifeature_add_calloutbutton_color() {

$options = get_option('ifeature');

if (isset($options['if_callout_button_color']) == "") 
			$callbutton = '333';


		else 
			$callbutton = $options['if_callout_button_color']; 
			
	
echo '<style type="text/css">';
		echo ".calloutbutton {background: #$callbutton;}";
		echo '</style>';



}
add_action( 'wp_head', 'ifeature_add_calloutbutton_color');

/*
Callout Text Color
*/

function ifeature_add_callouttext_color() {

$options = get_option('ifeature');

if (isset($options['if_callout_text_color']) == "") 
			$calltext = '000';


		else 
			$calltext = $options['if_callout_text_color']; 
			
	
echo '<style type="text/css">';
		echo ".callout_text {color: #$calltext;}";
		echo ".callout_title {color: #$calltext;}";
		echo '</style>';



}
add_action( 'wp_head', 'ifeature_add_callouttext_color');


$select_menu_color = array(
	'0' => array('value' =>	'Grey','label' => __( 'Grey (default)' )),'1' => array('value' =>	'Blue','label' => __( 'Blue' )),'2' => array('value' =>	'Red','label' => __( 'Red' )),'3' => array('value' =>	'Orange','label' => __( 'Orange' )),'4' => array('value' =>	'Pink','label' => __( 'Pink' )),            
);

$select_font = array(
	'0' => array('value' =>'Cantarell','label' => __('Cantarell (default)')), '1' => array('value' =>'Arial','label' => __('Arial')),'2' => array('value' =>'Courier New','label' => __('Courier New')),'3' => array('value' =>'Georgia','label' => __('Georgia')),'4' => array('value' =>'Lucida Grande','label' => __('Lucida Grande')),'5' => array('value' =>'Tahoma','label' => __('Tahoma')),'6' => array('value' =>'Times New Roman','label' => __('Times New Roman')),'7' => array('value' =>'Verdana','label' => __('Verdana')),'8' => array('value' =>'Allan','label' => __('Allan')),'9' => array('value' =>'Allerta','label' => __('Allerta')),'10' => array('value' =>'Allerta+Stencil','label' => __('Allerta Stencil')),'11' => array('value' =>'Amaranth','label' => __('Amaranth')),'12' => array('value' =>'Annie+Use+Your+Telescope','label' => __('Annie Use Your Telescope')),'13' => array('value' =>'Anonymous+Pro','label' => __('Anonymous Pro')),'14' => array('value' =>'Anton','label' => __('Anton')),'15' => array('value' =>'Architects+Daughter','label' => __('Architects Daughter')),'16' => array('value' =>'Arimo','label' => __('Arimo')),'17' => array('value' =>'Arvo','label' => __('Arvo')),'18' => array('value' =>'Astloch','label' => __('Astloch')),'19' => array('value' =>'Bangers','label' => __('Bangers')),'20' => array('value' =>'Bentham','label' => __('Bentham')),'21' => array('value' =>'Bevan','label' => __('Bevan')),'22' => array('value' =>'Buda','label' => __('Buda')),'23' => array('value' =>'Cabin','label' => __('Cabin')),'24' => array('value' =>'Cabin+Sketch','label' => __('Cabin Sketch')),'25' => array('value' =>'Calligraffitti','label' => __('Calligraffitti')),'26' => array('value' =>'Candal','label' => __('Candal')),'27' => array('value' =>'Cardo','label' => __('Cardo')),'28' => array('value' =>'Cherry+Cream+Soda','label' => __('Cherry Cream Soda')),'29' => array('value' =>'Chewy','label' => __('Chewy')),'30' => array('value' =>'Coda','label' => __('Coda')),'31' => array('value' =>'Coming+Soon','label' => __('Coming Soon')),'32' => array('value' =>'Copse','label' => __('Copse')),'33' => array('value' =>'Corben','label' => __('Corben')),'34' => array('value' =>'Cousine','label' => __('Cousine')),'35' => array('value' =>'Covered+By+Your+Grace','label' => __('Covered By Your Grace')),'36' => array('value' =>'Crafty+Girls','label' => __('Crafty Girls')),'37' => array('value' =>'Crimson+Text','label' => __('Crimson Text')),'38' => array('value' =>'Crushed','label' => __('Crushed')),'39' => array('value' =>'Cuprum','label' => __('Cuprum')),'40' => array('value' =>'Dancing+Script','label' => __('Dancing Script')),'41' => array('value' =>'Dawning+of+a+New+Day','label' => __('Dawning of a New Day')),'42' => array('value' =>'Droid+Sans','label' => __('Droid Sans')),'43' => array('value' =>'Droid+Sans+Mono','label' => __('Droid Sans Mono')),'44' => array('value' =>'Droid+Serif','label' => __('Droid Serif')),'45' => array('value' =>'EB+Garamond','label' => __('EB Garamond')),'46' => array('value' =>'Expletus+Sans','label' => __('Expletus Sans')),'47' => array('value' =>'Fontdiner+Swanky','label' => __('Fontdiner Swanky')),'48' => array('value' =>'Geo','label' => __('Geo')),'49' => array('value' =>'Goudy+Bookletter+1911','label' => __('Goudy Bookletter 1911')),'50' => array('value' =>'Gruppo','label' => __('Gruppo')),'51' => array('value' =>'Homemade+Apple','label' => __('Homemade Apple')),'52' => array('value' =>'Inconsolata','label' => __('Inconsolata')),'53' => array('value' =>'Indie+Flower','label' => __('Indie Flower')),'54' => array('value' =>'Irish+Grover','label' => __('Irish Grover')),'55' => array('value' =>'Josefin+Sans','label' => __('Josefin Sans')),'56' => array('value' =>'Josefin+Slab','label' => __('Josefin Slab')),'57' => array('value' =>'Just+Another+Hand','label' => __('Just Another Hand')),'58' => array('value' =>'Just+Me+Again+Down+Here','label' => __('Just Me Again Down Here')),'59' => array('value' =>'Kenia','label' => __('Kenia')),'60' => array('value' =>'Kranky','label' => __('Kranky')),'61' => array('value' =>'Kreon','label' => __('Kreon')),'62' => array('value' =>'Kristi','label' => __('Kristi')),'63' => array('value' =>'Lato','label' => __('Lato')),'64' => array('value' =>'League+Script','label' => __('League Script')),'65' => array('value' =>'Lekton','label' => __('Lekton')),'66' => array('value' =>'Lobster','label' => __('Lobster')),'67' => array('value' =>'Luckiest+Guy','label' => __('Luckiest Guy')),'68' => array('value' =>'Maiden+Orange','label' => __('Maiden Orange')),'69' => array('value' =>'Meddon','label' => __('Meddon')),'70' => array('value' =>'MedievalSharp','label' => __('MedievalSharp')),'71' => array('value' =>'Merriweather','label' => __('Merriweather')),'72' => array('value' =>'Michroma','label' => __('Michroma')),'73' => array('value' =>'Miltonian','label' => __('Miltonian')),'74' => array('value' =>'Miltonian+Tattoo','label' => __('Miltonian Tattoo')),'75' => array('value' =>'Molengo','label' => __('Molengo')),'76' => array('value' =>'Mountains+of+Christmas','label' => __('Mountains of Christmas')),'77' => array('value' =>'Neucha','label' => __('Neucha')),'78' => array('value' =>'Neuton','label' => __('Neuton')),'79' => array('value' =>'Nobile','label' => __('Nobile')),'80' => array('value' =>'OFL+Sorts+Mill+Goudy+TT','label' => __('OFL Sorts Mill Goudy TT')),'81' => array('value' =>'Old+Standard+TT','label' => __('Old Standard TT')),'82' => array('value' =>'Orbitron','label' => __('Orbitron')),'83' => array('value' =>'Oswald','label' => __('Oswald')),'84' => array('value' =>'Pacifico','label' => __('Pacifico')),'85' => array('value' =>'Permanent+Marker','label' => __('Permanent Marker')),'86' => array('value' =>'Philosopher','label' => __('Philosopher')),'87' => array('value' =>'Puritan','label' => __('Puritan')),'88' => array('value' =>'Quattrocento','label' => __('Quattrocento')),'89' => array('value' =>'Quattrocento+Sans','label' => __('Quattrocento Sans')),'90' => array('value' =>'Radley','label' => __('Radley')),'91' => array('value' =>'Raleway','label' => __('Raleway')),'92' => array('value' =>'Reenie+Beanie','label' => __('Reenie Beanie')),'93' => array('value' =>'Rock+Salt','label' => __('Rock Salt')),'94' => array('value' =>'Schoolbell','label' => __('Schoolbell')),'95' => array('value' =>'Six+Caps','label' => __('Six Caps')),'96' => array('value' =>'Slackey','label' => __('Slackey')),'97' => array('value' =>'Smythe','label' => __('Smythe')),'98' => array('value' =>'Sniglet','label' => __('Sniglet')),'99' => array('value' =>'Special+Elite','label' => __('Special Elite')),'100' => array('value' =>'Sue+Ellen+Francisco','label' => __('Sue Ellen Francisco')),'101' => array('value' =>'Sunshiney','label' => __('Sunshiney')),'102' => array('value' =>'Syncopate','label' => __('Syncopate')),'103' => array('value' =>'Terminal+Dosis+Light','label' => __('Terminal Dosis Light')),'104' => array('value' =>'The+Girl+Next+Door','label' => __('The Girl Next Door')),'105' => array('value' =>'Tinos','label' => __('Tinos')),'106' => array('value' =>'Ubuntu','label' => __('Ubuntu')),'107' => array('value' =>'Unkempt','label' => __('Unkempt')),'108' => array('value' =>'VT323','label' => __('VT323')),'109' => array('value' =>'Vibur','label' => __('Vibur')),'110' => array('value' =>'Vollkorn','label' => __('Vollkorn')),'111' => array('value' =>'Waiting+for+the+Sunrise','label' => __('Waiting for the Sunrise')),'112' => array('value' =>'Walter+Turncoat','label' => __('Walter Turncoat')),'113' => array('value' =>'Yanone+Kaffeesatz','label' => __('Yanone Kaffeesatz')),

);

$select_slider_effect = array(
	'0' => array('value' => 'random', 'label' => __( 'Random (default)')), '1' => array('value' => 'slideDown', 'label' => __( 'Slice Down')), '2' => array('value' => 'sliceDownLeft', 'label' => __('Slice Down-Left')), '3' => array('value' => 'sliceUp', 'label' =>__('Slice Up')), '4' => array('value' => 'sliceUpLeft', 'label' => __('Slice Up-Left')), '5' => array('value' => 'sliceUpDown', 'label' => __('Slice Up-Down')), '6' => array('value' => 'sliceUpDownLeft', 'label' => __('Slice Up-Down-Left')),'7' => array('value' => 'fold', 'label' => __('Fold')), '8' => array('value' => 'fade', 'label' => __('Fade')), '9' => array('value' => 'slideInRight', 'label' => __('Slide In-Right')), '10' => array('value' => 'slideInLeft', 'label' => __('Slide In-Left')), '11' => array('value' => 'boxRandom', 'label' => __('Box Random')), '12' => array('value' => 'boxRain', 'label' => __('Box Rain')), '13' => array('value' => 'boxRainReverse', 'label' => __('Box Rain-Reverse')), '14' => array('value' => 'boxRainGrow', 'label' => __('Box Rain-Grow')), '15' => array('value' => 'boxRainGrowReverse', 'label' => __('Box Rain-Grow-Reverse')),

  
);

$select_slider_type = array(
	'0' => array('value' => 'posts', 'label' => __('Post Categeory')), '1' => array('value' => 'custom', 'label' => __( 'Custom Slides')), 
);

$select_slider_placement = array(
	'0' => array('value' => 'feature', 'label' => __( 'iFeature Pro Homepage')), '1' => array('value' => 'blog', 'label' => __('Default (Post) Template')),
	
);

$shortname = "if";


$optionlist = array (

array( "id" => $shortname,
	"type" => "open-tab"),

array( "type" => "open"),
array( "type" => "close"),

array( "type" => "close-tab"),

// General

array( "id" => $shortname."-tab1",
	"type" => "open-tab"),

array( "type" => "open"),


array(  "name" => "Choose iMenu Color",
        "desc" => "(Default is Grey)",
        "id" => $shortname."_menu_color",
        "type" => "select1",
        "std" => ""
),

array( "name" => "Choose a font:",  
    "desc" => "(Default is Cantarell)",  
    "id" => $shortname."_font",  
    "type" => "select2",  
    "std" => ""),
    
array( "name" => "Logo URL",  
    "desc" => "Use the image uploader or enter your own URL into the input field to use an image as your logo. To display the site title as text, leave blank.",  
    "id" => $shortname."_logo",  
    "type" => "upload",  
    "std" => ""),  
    
array( "name" => "Custom Menu Icon",  
    "desc" => "Enter the link to your custom menu icon (optional).",  
    "id" => $shortname."_menuicon",  
    "type" => "text",  
    "std" => ""),

array( "name" => "Header Contact Area",  
    "desc" => "Enter contact info such as phone number for the top right corner of the header. It can be HTML (to hide enter the word: hide).",  
    "id" => $shortname."_header_contact",  
    "type" => "textarea",
    "std" => ""),
    
array( "name" => "Twitter Bar",  
    "desc" => "Enter your Twitter handle for the Twitter Bar",  
    "id" => $shortname."_twitter_bar",  
    "type" => "twitterbar",  
    "std" => ""), 
    
array( "name" => "Custom CSS",  
    "desc" => "Override default iFeature CSS here.",  
    "id" => $shortname."_css_options",  
    "type" => "textarea",  
    "std" => ""),  
    
array( "name" => "Custom Favicon",  
    "desc" => "A favicon is a 16x16 pixel icon that represents your site; paste the URL to a .ico image that you want to use as the image",  
    "id" => $shortname."_favicon",  
    "type" => "text",  
    "std" => ""),   

array( "name" => "Google Analytics Code",  
    "desc" => "You can paste your Google Analytics or other tracking code in this box. This will be automatically be added to the footer.",  
    "id" => $shortname."_ga_code",  
    "type" => "textarea",  
    "std" => ""),  

array(  "name" => "Show Facebook Like Button",
        "desc" => "Check this box to show the Facebook Like Button on blog posts",
        "id" => $shortname."_show_fb_like",
        "type" => "checkbox",
        "std" => "false"),  
        
array( "type" => "close"),

array( "type" => "close-tab"),

//Design

array( "id" => $shortname."-tab2",
	"type" => "open-tab"),
 
array( "type" => "open"),

array( "name" => "Site Title Color",  
    "desc" => "Use the color picker to select the site title color",  
    "id" => $shortname."_sitetitle_color",  
      "type" => "color1",  
    "std" => "false"),
    
array( "name" => "Link Color",  
    "desc" => "Use the color picker to select the site link color",  
    "id" => $shortname."_link_color",  
      "type" => "color2",  
    "std" => "false"),

array( "name" => "Menu Link Color",  
    "desc" => "Use the color picker to select the site menu link color",  
    "id" => $shortname."_menulink_color",  
      "type" => "color3",  
    "std" => "false"),

array( "name" => "Post Title Color",  
    "desc" => "Use the color picker to select the post title color",  
    "id" => $shortname."_posttitle_color",  
      "type" => "color4",  
    "std" => "false"),


array( "type" => "close"),
array( "type" => "close-tab"),


// Social

array( "id" => $shortname."-tab3",
	"type" => "open-tab"),
 
array( "type" => "open"),


array( "name" => "Facebook URL",  
    "desc" => "Enter your Facebook page URL for the Facebook social icon.",  
    "id" => $shortname."_facebook",  
    "type" => "facebook",  
    "std" => "http://facebook.com"),

array( "name" => "Twitter URL",  
    "desc" => "Enter your Twitter URL for Twitter social icon.",  
    "id" => $shortname."_twitter",  
    "type" => "twitter",  
    "std" => "http://twitter.com"),
    
array( "name" => "LinkedIn URL",  
    "desc" => "Enter your LinkedIn URL for the LinkedIn social icon.",  
    "id" => $shortname."_linkedin",  
    "type" => "linkedin",  
    "std" => "http://linkedin.com"),  
    
array( "name" => "YouTube URL",  
    "desc" => "Enter your YouTube URL for the YouTube social icon.",  
    "id" => $shortname."_youtube",  
    "type" => "youtube",  
    "std" => "http://youtube.com"),  
    
array( "name" => "Google Maps URL",  
    "desc" => "Enter your Google Maps URL for the Google Maps social icon.",  
    "id" => $shortname."_googlemaps",  
    "type" => "googlemaps",  
    "std" => "http://google.com/maps"),  

array( "name" => "Email",  
    "desc" => "Enter your contact email address for email social icon.",  
    "id" => $shortname."_email",  
    "type" => "email",  
    "std" => "no@way.com"),
    
array( "name" => "Custom RSS Link",  
    "desc" => "Enter Feedburner URL, or leave blank for default RSS feed.",  
    "id" => $shortname."_rsslink",  
    "type" => "rss",  
    "std" => ""),   
     
array( "type" => "close"),

array( "type" => "close-tab"),

//Blog

array( "id" => $shortname."-tab4",
	"type" => "open-tab"),
 
array( "type" => "open"),


array( "name" => "Show Excerpts",  
    "desc" => "Check this box to show post excerpts instead of full-length content.",  
    "id" => $shortname."_show_excerpts",  
      "type" => "checkbox",  
    "std" => "false"),

array( "name" => "Hide the Author",  
    "desc" => "Check this box to hide the author link on posts.",  
    "id" => $shortname."_hide_author",  
      "type" => "checkbox",  
    "std" => "false"),
    
array( "name" => "Hide the Categories",  
    "desc" => "Check this box to hide the categories link on posts.",  
    "id" => $shortname."_hide_categories",  
      "type" => "checkbox",  
    "std" => "false"),
        
array( "name" => "Hide the Date",  
    "desc" => "Check this box to hide the date link on posts.",  
    "id" => $shortname."_hide_date",  
      "type" => "checkbox",  
    "std" => "false"),
    
array( "name" => "Hide the Comments",  
    "desc" => "Check this box to hide the comments link on posts.",  
    "id" => $shortname."_hide_comments",  
      "type" => "checkbox",  
    "std" => "false"),
    
array( "name" => "Hide the Share Icons",  
    "desc" => "Check this box to hide the share icons on posts.",  
    "id" => $shortname."_hide_share",  
      "type" => "checkbox",  
    "std" => "false"),
    
array( "name" => "Hide the Tags",  
    "desc" => "Check this box to hide the tags link on posts.",  
    "id" => $shortname."_hide_tags",  
      "type" => "checkbox",  
    "std" => "false"),

array( "type" => "close"),
array( "type" => "close-tab"),


//SEO

array( "id" => $shortname."-tab5",
	"type" => "open-tab"),
 
array( "type" => "open"),


array( "name" => "Home Description",  
    "desc" => "Enter the META description of your homepage here.",  
    "id" => $shortname."_home_description",  
    "type" => "textarea",  
    "std" => ""),
    
array( "name" => "Home Keywords",  
    "desc" => "Enter the META keywords of your homepage here (separated by commas).",  
    "id" => $shortname."_home_keywords",  
    "type" => "textarea",  
    "std" => ""),
    
array( "name" => "Optional Home Title",  
    "desc" => "Enter an alternative title of your homepage here (default is site tagline).",  
    "id" => "if_home_title",  
    "type" => "text",  
    "std" => ""),


array( "type" => "close"),
array( "type" => "close-tab"),

// Callout Section

array( "id" => $shortname."-tab6",
	"type" => "open-tab"),

array( "type" => "open"),
  
array( "name" => "Hide Callout Section",  
    "desc" => "Check this box to hide the Callout Section on the homepage.",  
    "id" => $shortname."_hide_callout",  
     "type" => "checkbox",  
    "std" => "false"), 
  
array( "name" => "Callout Title",  
    "desc" => "Enter callout title, you can use HTML.",  
    "id" => $shortname."_callout_title",  
    "type" => "text",
    "std" => ""),

array( "name" => "Callout Text",  
    "desc" => "Enter callout text, you can use HTML.",  
    "id" => $shortname."_callout_text",  
    "type" => "textarea",
    "std" => ""),

array( "name" => "Callout Image",  
    "desc" => "Enter HTML to display call out image (max-height: 60px, max-width 180px, you can use callout.psd).",  
    "id" => $shortname."_callout_img",  
    "type" => "text",
    "std" => ""),
    
array( "name" => "Callout Button Link",  
    "desc" => "Enter a URL for the Callout Button's link.",  
    "id" => $shortname."_callout_button_link",  
    "type" => "text",
    "std" => ""),
    
array( "name" => "Callout Background Color",  
    "desc" => "Use the color picker to select the callout section background color",  
    "id" => $shortname."_callout_background_color",  
      "type" => "color5",  
    "std" => "false"),
    
array( "name" => "Callout Text Color",  
    "desc" => "Use the color picker to select the callout section text color",  
    "id" => $shortname."_callout_text_color",  
      "type" => "color7",  
    "std" => "false"),

array( "name" => "Callout Button Color",  
    "desc" => "Use the color picker to select the callout button color",  
    "id" => $shortname."_callout_button_color",  
      "type" => "color6",  
    "std" => "false"),

array( "type" => "close"), 

array( "type" => "close-tab"),

// iFeature Slider

array( "id" => $shortname."-tab7",
	"type" => "open-tab"),

array( "type" => "open"),

array( "name" => "Hide iFeature Slider",  
    "desc" => "Check this box to hide the Feature Slider on the homepage.",  
    "id" => $shortname."_hide_slider",  
    "type" => "checkbox",  
    "std" => "false"),
    
array( "name" => "Select the slider type:",  
    "desc" => "(Choose between custom feature slides or a post category)",  
    "id" => $shortname."_slider_type",  
    "type" => "select4",  
    "std" => ""), 
    
array( "name" => "Select the slider placement:",  
    "desc" => "(Choose between the feature template or the posts page)",  
    "id" => $shortname."_slider_placement",  
    "type" => "select5",  
    "std" => ""), 
    
array( "name" => "Show posts from category:",  
    "desc" => "(Default is all - WARNING: do not enter a category that does not exist or slider will not display)",  
    "id" => $shortname."_slider_category",  
    "type" => "select6",  
    "std" => ""),
    
array( "name" => "Number of featured posts:",  
    "desc" => "(Default is 5)",  
    "id" => $shortname."_slider_posts_number",  
    "type" => "text",  
    "std" => ""),  
    
array( "name" => "Slider height:",  
    "desc" => "(Default is 330)",  
    "id" => $shortname."_slider_height",  
    "type" => "text",  
    "std" => ""),

array( "name" => "Slider delay time (in milliseconds):",  
    "desc" => "(Default is 3500)",  
    "id" => $shortname."_slider_delay",  
    "type" => "text",  
    "std" => ""),
    
array( "name" => "Choose the slider animation:",  
    "desc" => "(Default is random)",  
    "id" => $shortname."_slider_animation",  
    "type" => "select3",  
    "std" => ""), 
    
array( "name" => "Hide the navigation:",  
    "desc" => "Check to disable the slider navigation",  
    "id" => $shortname."_slider_navigation",    
   	"type" => "checkbox",
        "std" => "false"),   
  

array( "type" => "close"),   

array( "type" => "close-tab"),


// Footer

array( "id" => $shortname."-tab8",
	"type" => "open-tab"),

array( "type" => "open"),
  
array( "name" => "Hide the Boxes Section",  
    "desc" => "Check this box to hide the widgetized Boxes Section on the homepage.",  
    "id" => $shortname."_hide_boxes",  
      "type" => "checkbox",  
    "std" => "false"),
  
array( "name" => "Footer Copyright",  
    "desc" => "Enter Copyright text used on the right side of the footer. It can be HTML (default is your blog title)",  
    "id" => $shortname."_footer_text",  
    "type" => "textarea",  
    "std" => ""),
    
array( "name" => "Hide our link",  
    "desc" => "Check this box to hide the link back to CyberChimps.com.",  
    "id" => $shortname."_hide_link",  
      "type" => "checkbox",  
    "std" => "false"),
    
array( "type" => "close"),

array( "type" => "close-tab"),

// Import/Export

array( "id" => $shortname."-tab9",
	"type" => "open-tab"),

array( "type" => "open"),
  
array( "name" => "Import iFeature Settings",  
    "desc" => "To import your settings, Paste the iFeature Pro export code here and press Save Settings.",  
    "id" => $shortname."_import_code",  
    "type" => "import",  
    "process" => "ifeature_import_options",
    "std" => ""), 
    
array( "name" => "Export iFeature Settings",  
    "desc" => "Copy the following code, Paste it into a text file and save it. This code can be used to import your settings into another iFeature Pro site.",  
    "id" => $shortname."_export_code",  
    "type" => "export",  
    "std" => ""), 
    
array( "type" => "close"),

array( "type" => "close-tab"),


);  

/**
 * Create the options page
 */
function theme_options_do_page() {
	global $themename, $shortname, $optionlist,  $select_menu_color, $select_font, $select_slider_effect, $select_slider_type, $select_slider_placement;
  

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

      
<h2><?php echo $themename; ?> Settings</h2><br />

<p>Need help? Follow the links below to visit our support forum and documentation pages:</p>
<a href="http://cyberchimps.com/ifeaturepro/docs"><img src="<?php echo get_template_directory_uri();?>/images/docs.png?>" alt="Docs"></a> <a href="http://cyberchimps.com/forum"><img src="<?php echo get_template_directory_uri(); ?>/images/forum.png?>" alt="Forum"></a> 

		<?php if ( false !== $_REQUEST['updated'] ) { ?>
		<?php echo '<div id="message" class="updated fade" style="float:left;"><p><strong>'.$themename.' settings saved</strong></p></div>'; ?>
    
    <?php } if( isset( $_REQUEST['reset'] )) { echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset</strong></p></div>'; } ?>  
				


  <form method="post" action="options.php" enctype="multipart/form-data">
  
    <p class="submit" style="clear:left;">
				<input type="submit" class="button-primary" value="Save Settings" />   
			</p>  
      
    <div id="tabs" style="clear:both;">   
    <ul class="tabNavigation">
        <li><a href="#if-tab1"><span>General</span></a></li>
        <li><a href="#if-tab2"><span>Design</span></a></li>
        <li><a href="#if-tab3"><span>Social</span></a></li>
        <li><a href="#if-tab4"><span>Blog</span></a></li>
        <li><a href="#if-tab5"><span>SEO</span></a></li>
        <li><a href="#if-tab6"><span>Callout Section</span></a></li>
        <li><a href="#if-tab7"><span>iFeature Slider</span></a></li>        
        <li><a href="#if-tab8"><span>Footer</span></a></li>
        <li><a href="#if-tab9"><span>Import/Export</span></a></li>
    
    </ul>
    
    <div class="tabContainer">
		
			<?php settings_fields( 'if_options' ); ?>
			<?php $options = get_option( 'ifeature' ); ?>

			<table class="form-table">   

      <?php foreach ($optionlist as $value) {  
switch ( $value['type'] ) {
 
case "open":
?>

<table width="100%" border="0" style="padding:10px;">

 
<?php break;
 
case "close":
?>


</table><br />
 
<?php break;


case "open-tab":
?>

<div id="<?php echo $value['id']; ?>">

 
<?php break;
 
case "close-tab":
?>


</div>

<?php break; 

case 'upload':
?>   


<tr>

<td width="15%" rowspan="2" valign="middle"><strong>Custom logo</strong>


 
<tr>
<td width="85%">


    <?php settings_fields('if_options'); ?>
    <?php do_settings_sections('if'); 
    
    $file = $options['file'];
    
    echo "<input type='text' name='if_filename_text' size='72' value='{$file['url']}'/>";
    echo "<br />" ;
    echo "<br />" ;
    echo "<input type='file' name='if_filename' size='30' />";?>

    
    <br />
    <small>Upload a logo image to use</small>


<?php
	$options = get_option('ifeature');
	$value = isset($options['file']) ? $options['file'] : '';
?>

</td>
</tr>


        
        <tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php break; 
 
case 'twitterbar':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    <br />
    <input style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>" id="<?php echo 'if['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />

<br /><br />

<input type="checkbox" id="ifeature[if_enable_twitter]" name="ifeature[if_enable_twitter]" value="1" <?php checked( '1', $options['if_enable_twitter'] ); ?>> - Check this box to enable the Twitter Bar on the iFeature Pro Homepage (Requires <a href="http://wordpress.org/extend/plugins/twitter-for-wordpress/">Twitter for WordPress Plugin</a>)
</td>
  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break;



case 'color1':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    
    <?php
$options = get_option('ifeature');

if (isset($options['if_sitetitle_color']) == "")
			$picker = '111111';
			
		else
			$picker = $options['if_sitetitle_color']; 
?>

<input type="text" class="color" id="ifeature[if_sitetitle_color]" name="ifeature[if_sitetitle_color]"  value="<?php echo $picker ;?>" style="width: 300px;">   

<br /><br />
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break; 

case 'color2':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    
    <?php
$options = get_option('ifeature');

if (isset($options['if_link_color']) == "")
			$picker = '717171';
			
		else
			$picker = $options['if_link_color']; 
?>

<input type="text" class="color{required:false}" id="ifeature[if_link_color]" name="ifeature[if_link_color]"  value="<?php echo $picker ;?>" style="width: 300px;">   

<br /><br />
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break; 


case 'color3':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    
    <?php
$options = get_option('ifeature');

if (isset($options['if_menulink_color']) == "")
			$picker = 'FFF';
			
		else
			$picker = $options['if_menulink_color']; 
?>

<input type="text" class="color{required:false}" id="ifeature[if_menulink_color]" name="ifeature[if_menulink_color]"  value="<?php echo $picker ;?>" style="width: 300px;">   

<br /><br />
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break; 

case 'color4':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    
    <?php
$options = get_option('ifeature');

if (isset($options['if_posttitle_color']) == "")
			$picker = '717171';
			
		else
			$picker = $options['if_posttitle_color']; 
?>

<input type="text" class="color{required:false}" id="ifeature[if_posttitle_color]" name="ifeature[if_posttitle_color]"  value="<?php echo $picker ;?>" style="width: 300px;">   

<br /><br />
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break; 

case 'color5':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    
    <?php
$options = get_option('ifeature');

if (isset($options['if_callout_background_color']) == "")
			$picker = 'F8F8F8';
			
		else
			$picker = $options['if_callout_background_color']; 
?>

<input type="text" class="color{required:false}" id="ifeature[if_callout_background_color]" name="ifeature[if_callout_background_color]"  value="<?php echo $picker ;?>" style="width: 300px;">   

<br /><br />
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break; 

case 'color6':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    
    <?php
$options = get_option('ifeature');

if (isset($options['if_callout_button_color']) == "")
			$picker = '333';
			
		else
			$picker = $options['if_callout_button_color']; 
?>

<input type="text" class="color{required:false}" id="ifeature[if_callout_button_color]" name="ifeature[if_callout_button_color]"  value="<?php echo $picker ;?>" style="width: 300px;">   

<br /><br />
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break; 


case 'color7':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    
    <?php
$options = get_option('ifeature');

if (isset($options['if_callout_text_color']) == "")
			$picker = '000';
			
		else
			$picker = $options['if_callout_text_color']; 
?>

<input type="text" class="color{required:false}" id="ifeature[if_callout_text_color]" name="ifeature[if_callout_text_color]"  value="<?php echo $picker ;?>" style="width: 300px;">   

<br /><br />
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break; 


 
 
case 'facebook':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'business['.$value['id'].']'; ?>" id="<?php echo 'bu['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="ifeature[if_hide_facebook]" name="ifeature[if_hide_facebook]" value="1" <?php checked( '1', $options['if_hide_facebook'] ); ?>> - Check this box to hide the Facebook icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break;


case 'twitter':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'business['.$value['id'].']'; ?>" id="<?php echo 'bu['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="ifeature[if_hide_twitter]" name="ifeature[if_hide_twitter]" value="1" <?php checked( '1', $options['if_hide_twitter'] ); ?>> - Check this box to hide the Twitter icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break;

case 'linkedin':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'business['.$value['id'].']'; ?>" id="<?php echo 'bu['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="ifeature[if_hide_linkedin]" name="ifeature[if_hide_linkedin]" value="1" <?php checked( '1', $options['if_hide_linkedin'] ); ?>> - Check this box to hide the LinkedIn icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;


case 'youtube':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'business['.$value['id'].']'; ?>" id="<?php echo 'bu['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="ifeature[if_hide_youtube]" name="ifeature[if_hide_youtube]" value="1" <?php checked( '1', $options['if_hide_youtube'] ); ?>> - Check this box to hide the YouTube icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;


case 'googlemaps':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'business['.$value['id'].']'; ?>" id="<?php echo 'bu['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="ifeature[if_hide_googlemaps]" name="ifeature[if_hide_googlemaps]" value="1" <?php checked( '1', $options['if_hide_googlemaps'] ); ?>> - Check this box to hide the Google Maps icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;


case 'email':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'business['.$value['id'].']'; ?>" id="<?php echo 'bu['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="ifeature[if_hide_email]" name="ifeature[if_hide_email]" value="1" <?php checked( '1', $options['if_hide_email'] ); ?>> - Check this box to hide the Email icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'rss':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'business['.$value['id'].']'; ?>" id="<?php echo 'bu['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="ifeature[if_hide_rss]" name="ifeature[if_hide_rss]" value="1" <?php checked( '1', $options['if_hide_rss'] ); ?>> - Check this box to hide the RSS icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break; 

 
case 'textarea':
?>
 
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong></label> <br /><small><?php echo $value['desc']; ?></small> </td> 
    <td width="85%"><textarea id="<?php echo 'ifeature['.$value['id'].']'; ?>" name="<?php echo 'ifeature['.$value['id'].']'; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo stripslashes( $options[$value['id']] ); ?></textarea></td>  
 
  
 </tr>
 <tr>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr>
<?php break; 

case 'import':
?>
 
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong></label> <br /><small><?php echo $value['desc']; ?></small> </td> 
    <td width="85%"><textarea id="<?php echo 'ifeature['.$value['id'].']'; ?>" name="<?php echo 'ifeature['.$value['id'].']'; ?>" style="width:600px; height:300px;" type="<?php echo $value['type']; ?>" cols="" rows=""></textarea></td>  
 
  
 </tr>
 <tr>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr>
<?php break; 

case 'export':
?>
 
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong></label> <br /><small><?php echo $value['desc']; ?></small> </td> 
    <td width="85%"><textarea id="<?php echo 'ifeature['.$value['id'].']'; ?>" name="<?php echo 'ifeature['.$value['id'].']'; ?>" style="width:600px; height:300px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo (serialize($options));?></textarea></td>  

 </tr>
 <tr>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr>
<?php break; 

case 'text':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>" id="<?php echo 'if['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" /></td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break;

case 'select1':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_menu_color as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select></td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;


case 'select2':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_font as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select>
<br /> <br />

Or enter your own font below (Google Fonts with more than one word format as follows: Maven+Pro)
<br /> <br />

<input style="width:300px;" name="ifeature[if_custom_font]" id="ifeature[if_custom_font]" type="text" value="<?php echo $options['if_custom_font'] ?>"  />


</td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'select3':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_slider_effect as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select></td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'select4':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_slider_type as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select></td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'select5':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_slider_placement as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select></td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'select6':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';
								
								$terms2 = get_terms('category', 'hide_empty=0');

									$blogoptions = array();

										foreach($terms2 as $term) {

										$blogoptions[$term->slug] = $term->name;

									}
									

								foreach ( $blogoptions as $option ) {
									$label = $option['label'];
									if ( $selected == $option ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option ) . "'>$option</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option ) . "'>$option</option>";      
								}
								echo $p . $r;   
							?>    


</select>

<br />
Test: <?php echo $options['if_slider_category'] ; ?>
</td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;


 
case "checkbox":
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%">
<input type="checkbox" name="<?php echo 'ifeature['.$value['id'].']'; ?>" id="<?php echo 'ifeature['.$value['id'].']'; ?>" value="1" <?php checked( '1', $options[$value['id']] ); ?>/>
</td>
</tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php break;
 
}
}
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
	global  $select_menu_color, $select_font, $select_slider_effect, $select_slider_type, $select_slider_placement;

	// Assign checkbox value
	
	
	if ( ! isset( $input['if_hide_facebook'] ) )
		$input['if_hide_facebook'] = null;
	$input['if_hide_facebook'] = ( $input['if_hide_facebook'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input['if_hide_twitter'] ) )
		$input['if_hide_twitter'] = null;
	$input['if_hide_twitter'] = ( $input['if_hide_twitter'] == 1 ? 1 : 0 ); 
	
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
    $options = get_option('ifeature');
    if ($file = $options['file']) {
        echo "Logo preview<br /><br /><img src='{$file['url']}' /><br /><br />";
    }
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
