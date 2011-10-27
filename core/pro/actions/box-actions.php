<?php
/**
* Box section actions used by the CyberChimps Core Framework Pro Extension
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

/**
* Core Box Section actions
*/
add_action( 'chimps_box_section', 'chimps_box_section_content' );

/**
* Sets up the Box Section wigetized area
*
* @since 1.0
*/
function chimps_box_section_content() { 
	global $post; //call globals
	
	$enableboxes = get_post_meta($post->ID, 'enable_box_section' , true);
	$root = get_template_directory_uri();

	if ($enableboxes == 'on' ) { ?>

	<div id="box_container"> <!--box container-->
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Box Left") ) : ?>
			<div class="box1">
				<h2 class="box-widget-title">iFeature Pro 2 Slider</h2>
					<img src="<?php echo $root ; ?>/images/icons/slidericon.png" height="100" alt="slider" class="aligncenter" />
					<p>The new iFeature Pro 2 Slider includes auto-image resizing, new transitions, thumbnails, custom categories, improved captions, and the ability to have a slider on every page.</p>
			</div><!--end box1-->
			<?php endif; ?>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Box Middle") ) : ?>
			<div class="box2">
				<h2 class="box-widget-title">Advanced Design</h2>
					<img src="<?php echo $root ; ?>/images/icons/blueprint.png" height="100" alt="blueprint" class="aligncenter" />
					<p>With <a href="http://cyberchimps.com/ifeaturepro/">iFeature Pro 2</a> we’ve done the design work for you, all you need to do is pick your colors, select your settings, and add your content.</p>
			</div><!--end box2-->
			<?php endif; ?>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Box Right") ) : ?>
			<div class="box3">
				<h2 class="box-widget-title">Excellent Support</h2>
				<img src="<?php echo $root ; ?>/images/icons/docs.png" height="100" alt="docs" class="aligncenter" />
				<p>We designed iFeature Pro 2 to be as easy to design with as possible, if you do run into trouble we provide a <a href="http://cyberchimps.com/forum">support forum</a>, and <a href="http://www.cyberchimps.com/ifeature-pro/docs/">precise documentation</a>.</p>
			</div><!--end box3-->
		<?php endif; ?>

	</div><!--end box_container--> <?php
	}
}

/**
* End
*/

?>