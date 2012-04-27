<?php
/**
* Footer actions used by iFeature
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
* @package iFeature
* @since 5.0
*/

/**
* Synapse footer actions
*/
add_action ( 'synapse_footer', 'synapse_footer_widgets' );

add_action ( 'synapse_secondary_footer', 'synapse_secondary_footer_menu' );
add_action ( 'synapse_secondary_footer', 'synapse_secondary_footer_copyright' );
add_action ( 'synapse_secondary_footer', 'synapse_secondary_footer_credit' );


/**
* Set the footer widgetized area.
*
* @since 1.0
*/
function synapse_footer_widgets() { 

   	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer") ) { ?>
		
		<div class="span3 footer-widgets">
			<h3 class="footer-widget-title"><?php printf( __( 'Footer Widgets', 'ifeature' )); ?></h3>
			<ul>
				<li>To customize this widget area login to your admin account, go to Appearance, then Widgets and drag new widgets into Footer Widgets</li>
			</ul>
		</div>

		<div class="span3 footer-widgets">
			<h3 class="footer-widget-title"><?php printf( __( 'Recent Posts', 'ifeature' )); ?></h3>
			<ul>
				<?php wp_get_archives('type=postbypost&limit=4'); ?>
			</ul>
		</div>
		
		<div class="span3 footer-widgets">
			<h3 class="footer-widget-title"><?php printf( __( 'Archives', 'ifeature' )); ?></h3>
			<ul>
				<?php wp_get_archives('type=monthly&limit=16'); ?>
			</ul>
		</div>

		<div class="span3 footer-widgets">
			<h3 class="footer-widget-title"><?php printf( __( 'WordPress', 'ifeature' )); ?></h3>
			<ul>
    		<?php wp_register(); ?>
    		<li><?php wp_loginout(); ?></li>
    		<li><a href="<?php echo esc_url( __('http://wordpress.org/', 'ifeature' )); ?>" target="_blank" title="<?php esc_attr_e('Powered by WordPress, state-of-the-art semantic personal publishing platform.', 'ifeature'); ?>"> <?php printf( __('WordPress', 'ifeature' )); ?></a></li>
    		<?php wp_meta(); ?>
    		</ul>
		</div>
		
			<?php }
			
			echo "<div class='clear'></div> ";
}

/**
* Adds the afterfooter copyright area. 
*
* @since 1.0
*/
function synapse_secondary_footer_copyright() {
	global $options, $themeslug; //call globals
		
	if ($options->get($themeslug.'_footer_text') == "") {
		$copyright =  get_bloginfo('name');
	}
	else {
		$copyright = $options->get($themeslug.'_footer_text');
	}
	
	echo "<div id='afterfootercopyright' class='span4'>";
		echo "&copy; $copyright";
	echo "</div>";
}

/**
* Adds the afterfooter menu.
*
* @since 1.0
*/
function synapse_secondary_footer_menu() {
	echo "<div id='afterfootermenu' class='span4'>";
	wp_nav_menu( array(
		'theme_location' => 'footer-menu', 
	)); 
	echo "</div>";
}

/**
* Adds the CyberChimps credit.
*
* @since 1.0
*/
function synapse_secondary_footer_credit() { ?>
		
	<div class="span4 credit">
		<a href="http://cyberchimps.com/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/achimps.png" alt="credit" /></a>
	</div> <?php 
}
/**
* End
*/

?>