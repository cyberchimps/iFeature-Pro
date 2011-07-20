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

	$hometitle = $options[$themeslug.'_home_title'];
	$logo = $options['file'] ;
	$favicon = $options['file2'];
	$headercontact = $options[$themeslug.'_header_contact'] ;

/* End variable definition. */	

/* Establish fonts. */	

	if ($options[$themeslug.'_font'] == "") {
		$font = 'Cantarell';
	}
			
	elseif ($options[$themeslug.'_custom_font'] != "") {
		$font = $options['if_custom_font'];	
	}
		
	else {
		$font = $options[($themeslug.'_font')]; 
		$fontstrip =  ereg_replace("[^A-Za-z0-9]", " ", $font );
	}
/* End fonts. */	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes('xhtml'); ?>>

<head profile="http://gmpg.org/xfn/11">
	
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="distribution" content="global" />
<meta name="language" content="en" />
	
<!-- Page title -->
	<title>
		   <?php
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
		         wp_title(''); echo ' Archive - '; }
		      elseif (is_search()) {
		         echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title('');  }
		      elseif (is_404()) {
		         echo 'Not Found - '; }
		      if (is_front_page() AND $hometitle == '') {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      elseif (is_front_page() AND $hometitle != '') {
		         bloginfo('name'); echo ' - '; echo $hometitle ; }
		      else {
		         echo ' - '; bloginfo('name'); }
		      if ($paged>1) {
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

<body style="font-family:'<?php echo $fontstrip ?>'" <?php body_class(); ?> >
	
	<div id="page-wrap">
		
		<div id="main">

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
							<div id="header_contact1">
								<?php echo stripslashes ($headercontact); ?></div> 
							<?php endif;?>
							<?php if ($headercontact == 'hide' ):?>
								<div style ="height: 10%;">&nbsp;</div> 
							<?php endif;?>
						<br />
							<div id="social">
								<?php get_template_part('icons', 'header'); ?>
							</div><!-- end social -->
					</div><!-- end header_right -->
					<!-- Inserts Site Logo -->
						<?php if ($logo != ''):?>
							<div id="logo">
								<a href="<?php echo home_url(); ?>/"><img src="<?php echo stripslashes($logo['url']); ?>" alt="logo"></a>
							</div>
						<?php endif;?>
						<?php if ($logo == '' ):?>
							<div id="logo">
								<a href="<?php echo home_url(); ?>/"><h1 class="sitename"><?php bloginfo('name'); ?> </h1></a>
							</div>
						<?php endif;?>
					<div id="description">
						<h1 class="description"><?php bloginfo('description'); ?></h1>
					</div>
				</div><!-- end headerwrap -->
				
				<?php get_template_part('nav', 'header' ); ?>
				
			</div><!-- end header -->
