<?php
/**
 * Create meta box for editing pages in WordPress
 *
 * Compatible with custom post types since WordPress 3.0
 * Support input types: text, textarea, checkbox, checkbox list, radio box, select, wysiwyg, file, image, date, time, color
 *
 * @author: Rilwis
 * @url: http://www.deluxeblogtips.com/2010/04/how-to-create-meta-box-wordpress-post.html
 * @usage: please read document at project homepage and meta-box-usage.php file
 * @version: 3.0.1
 */
 

/********************* BEGIN DEFINITION OF META BOXES ***********************/

// prefix of meta keys, optional
// use underscore (_) at the beginning to make keys hidden, for example $prefix = '_rw_';
// you also can make prefix empty to disable it

add_action('init', 'initialize_the_meta_boxes');

function initialize_the_meta_boxes() {

	global  $themename, $themeslug, $themenamefull, $options; // call globals.
	
	// Call taxonomies for select options
	
	$carouselterms = get_terms('carousel_categories', 'hide_empty=0');
	$carouseloptions = array();

		foreach($carouselterms as $term) {
			$carouseloptions[$term->slug] = $term->name;
		}

	$terms = get_terms('slide_categories', 'hide_empty=0');
	$slideroptions = array();

		foreach($terms as $term) {
			$slideroptions[$term->slug] = $term->name;
		}

	$terms2 = get_terms('category', 'hide_empty=0');
	$blogoptions = array();
	$blogoptions['all'] = "All";

		foreach($terms2 as $term) {
			$blogoptions[$term->slug] = $term->name;
		}
	
	// End taxonomy call
	
	$meta_boxes = array();

	$mb = new CyberChimps_Metabox('post_slide_options', $themenamefull.' Slider Options', array('pages' => array('post')));
	$mb
		->tab("Slider Options")
			->single_image('slider_image', $themenamefull . ' Pro Slider Image', '')
			->text('slider_text', $themenamefull. ' Pro Slider Text', 'Enter your slider text here')
			->checkbox('slider_hidetitle', 'Hide Title Bar', 'Click to disable the title bar on this slide:', array('std' => ''))
			->single_image('slider_custom_thumb', 'Custom Thumbnail', 'Use the image uploader to upload a custom navigation thumbnail')
			->sliderhelp('', 'Need Help?', '')
		->end();
		
	$mb = new CyberChimps_Metabox('Carousel', 'Featured Post Carousel', array('pages' => array($themeslug.'_featured_posts')));
	$mb
		->tab("Carousel Options")
			->text('post_title', 'Featured Post Title', '')
			->single_image('post_image', 'Featured Post Image', '')
			->text('post_url', 'Featured Post URL', '')
			->reorder('reorder_id', 'Reorder Name', 'Reorder Desc' )
		->end();

	$mb = new CyberChimps_Metabox('slides', 'Custom Feature Slides', array('pages' => array($themeslug.'_custom_slides')));
	$mb
		->tab("Custom Slide Options")
			->text('slider_caption', 'Custom Slide Caption', '')
			->text('slider_url', 'Custom Slide Link', '')
			->single_image('slider_image', 'Custom Slide Image', '')
			->checkbox('slider_hidetitle', 'Slide Title Bar', '', array('std' => 'true'))
			->single_image('slider_custom_thumb', 'Custom Thumbnail', '')
			->sliderhelp('', 'Need Help?', '')
			->reorder('reorder_id', 'Reorder Name', 'Reorder Desc' )
		->end();

	$mb = new CyberChimps_Metabox('pages', $themenamefull.' Page Options', array('pages' => array('page')));
	$mb
		->tab("Page Options")
			->image_select('page_sidebar', 'Select Page Layout', '',  array('options' => array(TEMPLATE_URL . '/images/options/right.png', TEMPLATE_URL . '/images/options/tworight.png', TEMPLATE_URL . '/images/options/rightleft.png', TEMPLATE_URL . '/images/options/none.png')))
			->checkbox('hide_page_title', 'Page Title', '', array('std' => 'true'))
			->section_order('page_section_order', 'Page Elements', '', array('options' => array(
					'page_slider' => 'iFeature Slider',
					'callout_section' => 'Callout',
					'twitterbar_section' => 'Twitter Bar',
					'page_section' => 'Page',
					'box_section' => 'Boxes',
					'carousel_section' => 'Carousel',			
					),
					'std' => 'page_section'
				))

			->pagehelp('', 'Need Help?', '')
		->tab($themenamefull." Slider Options")
			->select('page_slider_size', 'Select Slider Size', '', array('options' => array('Full-Width', 'Half-Width')) )
			->select('page_slider_type', 'Select Slider Type', '', array('options' => array('Custom Slides', 'Blog Posts')) )
			->select('slider_category', 'Custom Slide Category', '', array('options' => $slideroptions) )
			->select('slider_blog_category', 'Blog Post Category', '', array('options' => $blogoptions, 'all') )
			->text('slider_blog_posts_number', 'Number of Featured Blog Posts', '', array('std' => '5'))
			->text('slider_height', 'Slider Height', '', array('std' => '330'))
			->text('slider_delay', 'Slider Delay Time (MS)', '', array('std' => '3500'))
			->select('page_slider_animation', 'Slider Animation Type', '', array('options' => array('Random (default)', 'Slice Down', 'Slice Down-Left', 'Slice Up', 'Slice Up-Left', 'Slice Up-Down', 'Slice Up-Down-Left', 'Fold', 'Fade', 'Slide In-Right', 'Slide In-Left', 'Box Random', 'Box Rain', 'Box Rain-Reverse', 'Box Rain-Grow', 'Box Rain-Grow-Reverse')) )
			->select('page_slider_navigation_style', 'Slider Navigation Style', '', array('options' => array('Dots (default)', 'Thumbnails', 'None')) )
			->checkbox('hide_arrows', 'Navigation Arrows', '', array('std' => 'true'))
			->checkbox('disable_autohide', 'Navigation Arrows Autohide', '', array('std' => 'true'))
			->checkbox('enable_wordthumb', 'WordThumb Image Resizing', '')
			->sliderhelp('', 'Need Help?', '')
		->tab("Callout Options")
			->text('callout_title', 'Callout Title', '')
			->textarea('callout_text', 'Callout Text', '')
			->checkbox('disable_callout_button', 'Callout Button', '', array('std' => 'true'))
			->text('callout_button_text', 'Callout Button Text', '')
			->text('callout_url', 'Callout Button URL', '')
			->single_image('callout_image', 'Custom Button Image', '')
			->color('custom_callout_color', 'Custom Background Color', '')
			->color('custom_callout_title_color', 'Custom Title Color', '')
			->color('custom_callout_text_color', 'Custom Text Color', '')
			->color('custom_callout_button_color', 'Custom Button Color', '')
			->pagehelp('', 'Need help?', '')
		->tab("Carousel Options")
			->select('carousel_category', 'Carousel Category', '', array('options' => $carouseloptions) )
		->tab("Twitter Options")
			->text('twitter_handle', 'Twitter Handle', 'Enter your Twitter handle if using the Twitter bar - Requires <a href="http://wordpress.org/extend/plugins/twitter-for-wordpress/" target="_blank">Twitter for WordPress Plugin')
		->tab("SEO Options")
			->text('seo_title', 'SEO Title', '')
			->textarea('seo_description', 'SEO Description', '')
			->textarea('seo_keywords', 'SEO Keywords', '')
			->pagehelp('', 'Need help?', '')
		->end();

	foreach ($meta_boxes as $meta_box) {
		$my_box = new RW_Meta_Box_Taxonomy($meta_box);
	}

}

add_action( 'admin_print_styles-post-new.php', 'metabox_enqueue' );
add_action( 'admin_print_styles-post.php', 'metabox_enqueue' );

function metabox_enqueue() {
	$path =  get_template_directory_uri()."/core/library/js/";
	$path2 = get_template_directory_uri()."/css/";
	$color = get_user_meta( get_current_user_id(), 'admin_color', true );

	wp_register_style(  'metabox-tabs-css', $path2. 'metabox-tabs.css');

	wp_register_script ( 'jf-metabox-tabs', $path. 'metabox-tabs.js');

	wp_enqueue_script('jf-metabox-tabs');
	
	wp_enqueue_script('jf-metabox-tabs');
	wp_enqueue_script('jquerycustom', get_template_directory_uri().'/core/library/js/jquery-custom.js', array('jquery') );
	
	wp_enqueue_style('metabox-tabs-css');
}

/********************* END DEFINITION OF META BOXES ***********************/

function cyberchimps_add_edit_form_multipart_encoding() {
	echo ' enctype="multipart/form-data"';
}
add_action('post_edit_form_tag', 'cyberchimps_add_edit_form_multipart_encoding');
