<?php
/**
* Header section actions used by the CyberChimps Synapse Core Framework Pro Extension
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
* @package Pro
* @since 1.0
*/

remove_action( 'synapse_after_head_tag', 'synapse_font' );
add_action( 'synapse_after_head_tag', 'synapse_pro_font' );

add_action( 'ifeature_custom_header_element', 'ifeature_custom_header_element_content');
add_action( 'ifeature_banner', 'ifeature_banner_content');
add_action( 'ifeature_logo_menu', 'ifeature_logo_menu_content'); 
add_action( 'ifeature_sitename_register', 'ifeature_sitename_register_content'); //

/**
* Sitename/Register
*
* @since 3.0
*/
function ifeature_sitename_register_content() {
global $current_user;
?>

	<div class="container">
		<div class="row">
		
			<div class="seven columns">
				
				<!-- Begin @Core header sitename hook -->
					<?php synapse_header_sitename(); ?> 
				<!-- End @Core header sitename hook -->
			
				
			</div>	
			
			<div id="register" class="five columns">
			
			<?php if(!is_user_logged_in()) :?>

		<li><?php wp_loginout(); ?></li> <?php wp_meta(); ?><li> |<?php wp_register(); ?>  </li>

			<?php else :?>

			Welcome back <strong><?php global $current_user; get_currentuserinfo(); echo ($current_user->user_login); ?></strong> | <?php wp_loginout(); ?>

		<?php endif;?>
				
			</div>	
		</div><!--end row-->
	</div>

<?php
}


/**
* Logo/menu
*
* @since 3.0
*/
function ifeature_logo_menu_content() {
?>
	
	<div class="container">
		<div class="row">	
			
			<div class="five columns">
				
				<!-- Begin @Core header sitename hook -->
					<?php synapse_header_sitename(); ?> 
				<!-- End @Core header sitename hook -->
			
			</div>	
			
			<div class="seven columns">
			<div id="halfnav">
			<?php wp_nav_menu( array(
		    'theme_location' => 'sub-menu' // Setting up the location for the main-menu, Main Navigation.
			    )
			);
	    	?>
			</div>					
			</div>	
		
		</div><!--end row-->
	</div>
<?php
}



/**
* Full-Width Logo
*
* @since 3.0
*/
function ifeature_banner_content() {
global $themeslug, $options, $root; //Call global variables
$banner = $options->get($themeslug.'_banner'); //Calls the logo URL from the theme options
$url = $options->get($themeslug.'_banner_url');
$default = "$root/images/pro/banner.jpg";

?>
	<div class="container">
		<div class="row">
		
			<div class="twelve columns">
			<div id="banner">
			
			<?php if ($banner != ""):?>
				<a href="<?php echo $url; ?>/"><img src="<?php echo stripslashes($banner['url']); ?>" alt="logo"></a>		
			<?php endif; ?>
			
			<?php if ($banner == ""):?>
				<a href="<?php echo $url; ?>/"><img src="<?php echo $default; ?>" alt="logo"></a>		
			<?php endif; ?>
			
			</div>		
			</div>	
		</div><!--end row-->
	</div>	

<?php
}

/**
* Custom header content element
*
* @since 5.0
*/
function ifeature_custom_header_element_content() { 
	global $themeslug, $options; ?>
	
	<div class="container">
		<div class="row">
		
			<div class="twelve columns">
				
				<?php echo stripslashes ($options->get($themeslug.'_custom_header_element')); 	?>
						
			</div>	
		</div><!--end row-->
	</div>	

<?php	
}

/**
* Establishes the Pro theme font family.
*
* @since 1.0
*/
function synapse_pro_font() {
	global $themeslug, $options; //Call global variables
	$family = apply_filters( 'synapse_default_font_family', 'Helvetica, serif' );
	
	if ($options->get($themeslug.'_font') == "" AND $options->get($themeslug.'_custom_font') == "") {
		$font = apply_filters( 'synapse_default_font', 'Arial' );
	}		
	elseif ($options->get($themeslug.'_custom_font') != "" && $options->get($themeslug.'_font') == 'custom') {
		$font = $options->get($themeslug.'_custom_font');	
	}	
	else {
		$font = $options->get($themeslug.'_font'); 
	} ?>
	
	<body style="font-family:'<?php echo ereg_replace("[^A-Za-z0-9]", " ", $font ); ?>', <?php echo $family; ?>" <?php body_class(); ?> > <?php
}

/**
* End
*/

?>