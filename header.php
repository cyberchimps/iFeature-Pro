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


	$logo = $options['file'] ;
	$favicon = $options['file2'];
	$headercontact = $options[$themeslug.'_header_contact'] ;
	
/* End variable definition. */	
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes('xhtml'); ?>>
<head profile="http://gmpg.org/xfn/11">

<?php chimps_head_tag(); ?>

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
	
</head>

<?php chimps_after_head_tag(); ?>

	
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