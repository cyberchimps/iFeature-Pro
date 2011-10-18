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
	$flickr		    = $options[$themeslug.'_flickr'] ;
	$hideflickr      = $options[$themeslug.'_hide_flickr'];
	$myspace	    = $options[$themeslug.'_myspace'] ;
	$hidemyspace        = $options[$themeslug.'_hide_myspace'];
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
		<a href="<?php echo esc_url( __( $facebook, 'ifeature')); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/facebook.png" height=32 width=32 alt="<?php esc_attr_e('Facebook', 'ifeature'); ?>" /></a>
		<?php endif;?>
	<?php if ($hidefacebook != '1' AND $facebook == '' ):?>
		<a href="<?php echo esc_url( __( 'http://facebook.com', 'ifeature' )); ?>/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/facebook.png" height=32 width=32 alt="<?php esc_attr_e('Facebook', 'ifeature' ); ?>" /></a>
	<?php endif;?>
	<?php if ($hidetwitter != '1' AND $twitter != '' ):?>
		<a href="<?php echo esc_url( __( $twitter, 'ifeature' )); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/twitter.png" height=32 width=32 alt="<?php esc_attr_e( 'Twitter', 'ifeature' ); ?>" /></a>
	<?php endif;?>
	<?php if ($hidetwitter != '1' AND $twitter == '' ):?>
		<a href="<?php echo esc_url( __( 'http://twitter.com/', 'ifeature' )); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/twitter.png" height=32 width=32 alt="<?php esc_attr_e( 'Twitter' ); ?>" /></a>
	<?php endif;?>
		<?php if ($hidegplus != '1' AND $gplus != '' ):?>
		<a href="<?php echo esc_url( __( $gplus, 'ifeature' )); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/gplus.png" height=32 width=32 alt="<?php esc_attr_e(' Gplus', 'ifeature' ); ?>" /></a>
	<?php endif;?>
	<?php if ($hidegplus != '1' AND $gplus == '' ):?>
		<a href="<?php echo esc_url( __( 'https://plus.google.com/', 'ifeature' )); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/gplus.png" height=32 width=32 alt="<?php esc_attr_e( 'Gplus', 'ifeature' ); ?>" /></a>
	<?php endif;?>
		<?php if ($hideflickr != '1' AND $flickr != '' ):?>
		<a href="<?php echo esc_url( __( $flickr, 'ifeature' )); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/flickr.png" height=32 width=32 alt="<?php esc_attr_e( 'Flickr', 'ifeature' ); ?>" /></a>
	<?php endif;?>
	<?php if ($hideflickr != '1' AND $flickr == '' ):?>
		<a href="<?php echo esc_url( __( 'https://flickr.com/', 'ifeature' )); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/flickr.png" height=32 width=32 alt="<?php esc_attr_e( 'Flickr', 'ifeature' ); ?>" /></a>
	<?php endif;?>
	<?php if ($hidemyspace != '1' AND $myspace != '' ):?>
		<a href="<?php echo esc_url( __( $myspace, 'ifeature' )); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/myspace.png" alt="<?php esc_attr_e( 'Myspace', 'ifeature' ); ?>" /></a>
	<?php endif;?>
	<?php if ($hidemyspace != '1' AND $myspace == '' ):?>
		<a href="<?php echo esc_url( __( 'http://myspace.com', 'ifeature' )); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/myspace.png" alt="<?php esc_attr_e( 'Myspace', 'ifeature' ); ?>" /></a>
	<?php endif;?>
	<?php if ($hidelinkedin != '1' AND $linkedin != '' ):?>
		<a href="<?php echo esc_url( __( $linkedin, 'ifeature' )); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/linkedin.png" height=32 width=32 alt="<?php esc_attr_e( 'LinkedIn', 'ifeature' ); ?>" /></a>
	<?php endif;?>
		<?php if ($hidelinkedin != '1' AND $linkedin == '' ):?>
		<a href="<?php echo esc_url( __( 'http://linkedin.com/', 'ifeature' )); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/linkedin.png" height=32 width=32 alt="<?php esc_attr_e( 'LinkedIn' , 'ifeature' ); ?>" /></a>
	<?php endif;?>
	<?php if ($hideyoutube != '1' AND $youtube != '' ):?>
		<a href="<?php echo esc_url( __( $youtube, 'ifeature' )); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/youtube.png" height=32 width=32 alt="<?php esc_attr_e( 'YouTube' ,'ifeature' ); ?>" /></a>
	<?php endif;?>
	<?php if ($hideyoutube != '1' AND $youtube == '' ):?>
		<a href="<?php echo esc_url( __(' http://youtube.com/', 'ifeature' )); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/youtube.png" height=32 width=32 alt="<?php esc_attr_e( 'YouTube', 'ifeature' ); ?>" /></a>
	<?php endif;?>
	<?php if ($hidegooglemaps != '1' AND $googlemaps != ''):?>
		<a href="<?php echo esc_url( __( $googlemaps, 'ifeature' )); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/googlemaps.png" height=32 width=32 alt="<?php esc_attr_e( 'Google Maps', 'ifeature' ); ?>" /></a>
	<?php endif;?>
	<?php if ($hidegooglemaps != '1' AND $googlemaps == ''):?>
		<a href="http://google.com/maps/"><img src="<?php echo get_template_directory_uri(); ?>/images/social/googlemaps.png" height=32 width=32 alt="Google Maps" /></a>
	<?php endif;?>
	<?php if ($hideemail != '1' AND $email != ''):?>
		<a href="mailto:<?php echo esc_url( __( $email, 'ifeature' )); ?> ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/email.png" height=32 width=32 alt="<?php esc_attr_e( 'E-mail', 'ifeature' ); ?>" /></a>
	<?php endif;?>
		<?php if ($hideemail != '1' AND $email == ''):?>
		<a href="<?php echo esc_url( __( 'mailto:no@way.com', 'ifeature' )); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/email.png" height=32 width=32 alt="<?php esc_attr_e( 'E-mail', 'ifeature' ); ?>" /></a>
	<?php endif;?>
	<?php if ($hiderss != '1' and $rss != '' ):?>
		<a href="<?php echo esc_url( __($rss, 'ifeature' )); ?> ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/rss.png" height=32 width=32 alt="<?php esc_attr_e( 'RSS', 'ifeature' ); ?>" /></a>
	<?php endif;?>
	<?php if ($hiderss != '1' and $rss == ''  ):?>
		<a href="<?php echo esc_url( __(bloginfo('rss2_url'), 'ifeature' )); ?> ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/rss.png" height=32 width=32 alt="<?php esc_attr_e( 'RSS', 'ifeature' ); ?>" /></a>
	<?php endif;?>	
	
	
</div>