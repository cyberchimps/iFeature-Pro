<?php 

/*
	Header
	Authors: Tyler Cunningham, Trent Lapinski
	Creates the theme header. 
	Copyright (C) 2011 CyberChimps
	Version 2.0
*/

/* Call globals. */	

	global $themename, $themeslug, $options;

/* End globals. */

/* Define variables. */	

	$blogtitle = $options[$themeslug.'_home_title'];
	$homekeywords = $options[$themeslug.'_home_keywords'];
	$homedescription = $options[$themeslug.'_home_description'];
	$logo = $options['file'] ;
	$favicon = $options['file2'];
	$headercontact = $options[$themeslug.'_header_contact'] ;
	$title = get_post_meta($post->ID, 'seo_title' , true);
	$pagedescription = get_post_meta($post->ID, 'seo_description' , true);
	$keywords = get_post_meta($post->ID, 'seo_keywords' , true);


/* End variable definition. */	

/* Establish fonts. */	

	if ($options[$themeslug.'_font'] == "" AND $options[$themeslug.'_custom_font'] == "") {
		$font = 'Lucida Grande';
	}
			
	elseif ($options[$themeslug.'_custom_font'] != "") {
		$font = $options[$themeslug.'_custom_font'];	
	}
		
	else {
		$font = $options[$themeslug.'_font']; 
	}
	
	$fontstrip =  ereg_replace("[^A-Za-z0-9]", " ", $font );
/* End fonts. */	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes('xhtml'); ?>>

<head profile="http://gmpg.org/xfn/11">
	
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="distribution" content="global" />
<meta name="language" content="en" />

<!-- iFeature Blog Page SEO options -->
	<?php if ($blogtitle != '' AND is_front_page()): ?>
		<meta name="title" content="<?php echo $blogtitle ?>" />
	<?php endif; ?> 
	
	<?php if ($homedescription != '' AND is_front_page()): ?>
		<meta name="description" content="<?php echo $homedescription ?>" />
	<?php endif; ?>	
	
	<?php if ($homekeywords != '' AND is_front_page()): ?>
		<meta name="keywords" content="<?php echo $homekeywords ?>" />
	<?php endif; ?>
<!-- /iFeature Blog Page SEO options -->


<!-- iFeature Page SEO options -->
	<?php if ($title != '' AND !is_front_page()): ?>
		<meta name="title" content="<?php echo $title ?>" />
	<?php endif; ?> 
	
	<?php if ($pagedescription != '' AND !is_front_page()): ?>
		<meta name="description" content="<?php echo $pagedescription ?>" />
	<?php endif; ?>	
	
	<?php if ($keywords != '' AND !is_front_page()): ?>
		<meta name="keywords" content="<?php echo $keywords ?>" />
	<?php endif; ?>
<!-- /iFeature Page SEO options -->
	
<!-- Page title -->
	<title>
		   <?php
		   
		   	  /*Title for tags */
		      if (function_exists('is_tag') && is_tag()) {
		         bloginfo('name'); echo ' - '; single_tag_title("Tag Archive for &quot;"); echo '&quot;  '; }
		      /*Title for archives */   
		      elseif (is_archive()) {
		          bloginfo('name'); echo ' - '; wp_title(''); echo ' Archive '; }
		      /*Title for search */     
		      elseif (is_search()) {
		         bloginfo('name'); echo ' - '; echo 'Search for &quot;'.wp_specialchars($s).'&quot;  '; }
		      /*Title for 404 */    
		      elseif (is_404()) {
		          bloginfo('name'); echo ' - '; echo 'Not Found '; }
		      /*Title if front page is latest posts and no custom title */
		      elseif (is_front_page() AND !is_page() AND $blogtitle == '') {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      /*Title if front page is latest posts with custom title */
		      elseif (is_front_page() AND !is_page() AND $blogtitle != '') {
		         bloginfo('name'); echo ' - '; echo $blogtitle ; }
		      /*Title if front page is static page and no custom title */
		      elseif (is_front_page() AND is_page() AND $title == '') {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      /*Title if front page is static page with custom title */
		      elseif (is_front_page() AND is_page() AND $title != '') {
		         bloginfo('name'); echo ' - '; echo $title ; }
		     /*Title if static page is static page with no custom title */
		      elseif (is_page() AND $title == '') {
		         bloginfo('name'); echo ' - '; wp_title(''); }
		      /*Title if static page is static page with custom title */
		      elseif (is_page() AND $title != '') {
		         bloginfo('name'); echo ' - '; echo $title ; }
		      /*Title if blog page with no custom title */
		      elseif (is_page() AND is_front_page() AND $blogtitle == '') {
		         bloginfo('name'); echo ' - '; wp_title(''); }
		  	  /*Title if blog page with custom title */ 
		  	  elseif ($blogtitle != '') {
		         bloginfo('name'); echo ' - '; echo $blogtitle ; }
		  	   /*Title if blog page without custom title */
		      else  {
		         bloginfo('name'); echo ' - '; wp_title(''); }
		    
		      if ($paged>1 ) {
		         echo ' - page '. $paged; }
		   ?>
	</title>	

<link rel="shortcut icon" href="<?php echo stripslashes($favicon['url']); ?>" type="image/x-icon" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link href='http://fonts.googleapis.com/css?family=<?php echo $font ?>' rel='stylesheet' type='text/css' />
	
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
    
	<?php wp_head(); ?>
	
</head>

<body style="font-family:'<?php echo $fontstrip ?>', Arial, serif" <?php body_class(); ?> >

	
	<div id="page-wrap">
		
		<div id="main">
			<?php chimps_before_header(); ?> <!-- Inserts @Core before_header hook -->
			<div id="header">
				<div id="headerwrap">
					<div id="header_right">
						<!-- Inserts Header Contact Area -->
		
							<?php if ($headercontact == '' ):?>
							<div id="header_contact">
								Enter Contact Information Here
							</div>
							<?php endif;?>
							<?php if ($headercontact != 'hide' ):?>
								<?php chimps_header_right_contact_area(); ?> <!-- Inserts @Core header_right contact area hook -->
							<?php endif;?>
							<?php if ($headercontact == 'hide' ):?>
								<div style ="height: 10%;">&nbsp;</div> 
							<?php endif;?>
						<br />
							<?php chimps_header_right_social_icons(); ?> <!-- Inserts @Core header_right social icons hook -->
					</div><!-- end header_right -->
					<!-- Inserts Site Logo -->
						<?php if ($logo != ''):?>
							<?php chimps_header_left_logo(); ?> <!-- Inserts @Core header_left logo hook -->
						<?php endif;?>
						<?php if ($logo == '' ):?>
							<?php chimps_header_left(); ?> <!-- Inserts @Core header_left title and description hook -->
						<?php endif;?>
				</div><!-- end headerwrap -->
				
				<?php chimps_navigation(); ?> <!-- Inserts @Core navigation -->
				
			</div><!-- end header -->
<?php chimps_after_header(); ?> <!-- Inserts @Core after_header hook -->