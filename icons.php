<?php
/*
	Section: Icons
	Authors: Trent Lapinski, Tyler Cunningham 
	Description: Creates header icons.
	Version: 2.0	
*/

/* Call globals. */	

	global $themename, $themeslug, $options;

/* End globals. */	

/* Define variables. */	
 
	$facebook		= $options[$themeslug.'_facebook'];
	$hidefacebook   = $options[$themeslug.'_hide_facebook'];
	$twitter		= $options[$themeslug.'_twitter'] ;
	$hidetwitter    = $options[$themeslug.'_hide_twitter'];
	$gplus		    = $options[$themeslug.'_gplus'] ;
	$hidegplus      = $options[$themeslug.'_hide_gplus'];
	$linkedin		= $options[$themeslug.'_linkedin'] ;
	$hidelinkedin   = $options[$themeslug.'_hide_linkedin'];
	$youtube		= $options[$themeslug.'_youtube'];
	$hideyoutube    = $options[$themeslug.'_hide_youtube'];
	$googlemaps		= $options[$themeslug.'_googlemaps'];
	$hidegooglemaps = $options[$themeslug.'_hide_googlemaps'];
	$email			= $options[$themeslug.'_email'];
	$hideemail      = $options[$themeslug.'_hide_email'];
	$rss			= $options[$themeslug.'_rsslink'] ;
	$hiderss   		= $options[$themeslug.'_hide_rss'];

/* Define variables. */	

?>

<div class="icons">

	<?php if ($hidefacebook != '1' AND $facebook != '' ):?>
		<a href="<?php echo $facebook ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/facebook.png" alt="Facebook" /></a>
		<?php endif;?>
	<?php if ($hidefacebook != '1' AND $facebook == '' ):?>
		<a href="http://facebook.com"><img src="<?php echo get_template_directory_uri(); ?>/images/social/facebook.png" alt="Facebook" /></a>
	<?php endif;?>
	<?php if ($hidetwitter != '1' AND $twitter != '' ):?>
		<a href="<?php echo $twitter ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/twitter.png" alt="Twitter" /></a>
	<?php endif;?>
	<?php if ($hidetwitter != '1' AND $twitter == '' ):?>
		<a href="http://twitter.com"><img src="<?php echo get_template_directory_uri(); ?>/images/social/twitter.png" alt="Twitter" /></a>
	<?php endif;?>
		<?php if ($hidegplus != '1' AND $gplus != '' ):?>
		<a href="<?php echo $gplus ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/gplus.png" alt="Gplus" /></a>
	<?php endif;?>
	<?php if ($hidegplus != '1' AND $gplus == '' ):?>
		<a href="https://plus.google.com"><img src="<?php echo get_template_directory_uri(); ?>/images/social/gplus.png" alt="Gplus" /></a>
	<?php endif;?>
	<?php if ($hidelinkedin != '1' AND $linkedin != '' ):?>
		<a href="<?php echo $linkedin ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/linkedin.png" alt="LinkedIn" /></a>
	<?php endif;?>
		<?php if ($hidelinkedin != '1' AND $linkedin == '' ):?>
		<a href="http://linkedin.com" ><img src="<?php echo get_template_directory_uri(); ?>/images/social/linkedin.png" alt="LinkedIn" /></a>
	<?php endif;?>
	<?php if ($hideyoutube != '1' AND $youtube != '' ):?>
		<a href="<?php echo $youtube ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/youtube.png" alt="YouTube" /></a>
	<?php endif;?>
	<?php if ($hideyoutube != '1' AND $youtube == '' ):?>
		<a href="http://youtube.com"><img src="<?php echo get_template_directory_uri(); ?>/images/social/youtube.png" alt="YouTube" /></a>
	<?php endif;?>
	<?php if ($hidegooglemaps != '1' AND $googlemaps != ''):?>
		<a href="<?php echo $googlemaps ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/googlemaps.png" alt="Google Maps" /></a>
	<?php endif;?>
	<?php if ($hidegooglemaps != '1' AND $googlemaps == ''):?>
		<a href="http://google.com/maps"><img src="<?php echo get_template_directory_uri(); ?>/images/social/googlemaps.png" alt="Google Maps" /></a>
	<?php endif;?>
	<?php if ($hideemail != '1' AND $email != ''):?>
		<a href="mailto:<?php echo $email ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/email.png" alt="E-mail" /></a>
	<?php endif;?>
		<?php if ($hideemail != '1' AND $email == ''):?>
		<a href="mailto:no@way.com"><img src="<?php echo get_template_directory_uri(); ?>/images/social/email.png" alt="E-mail" /></a>
	<?php endif;?>
	<?php if ($hiderss != '1' and $rss != '' ):?>
		<a href="<?php echo $rss ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/rss.png" alt="RSS" /></a>
	<?php endif;?>
	<?php if ($hiderss != '1' and $rss == ''  ):?>
		<a href="<?php bloginfo('rss2_url'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/rss.png" alt="RSS" /></a>
	<?php endif;?>
	
</div>