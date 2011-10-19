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
	
?>

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
		
						<?php chimps_header_right(); ?> <!-- Inserts @Core header_right contact area hook -->
								
					</div><!-- end header_right -->
					<!-- Inserts Site Logo -->
						<?php if ($options['file'] != ''):?>
							<?php chimps_header_left_logo(); ?> <!-- Inserts @Core header_left logo hook -->
						<?php endif;?>
						<?php if ($options['file'] == '' ):?>
							<?php chimps_header_left(); ?> <!-- Inserts @Core header_left title and description hook -->
						<?php endif;?>
				</div><!-- end headerwrap -->
				<?php chimps_navigation(); ?> <!-- Inserts @Core navigation -->
			</div><!-- end header -->
<?php chimps_after_header(); ?> <!-- Inserts @Core after_header hook -->