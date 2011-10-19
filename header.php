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
<!-- Begin @Core head_tag hook content-->
	<?php chimps_head_tag(); ?>
<!-- End @Core head_tag hook content-->

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?> <!-- adds WP comment threading support
<?php wp_head(); ?> <!-- fires the wp_head action
	
</head> <!-- closing head tag

<!-- Begin @Core after_head_tag hook content-->
	<?php chimps_after_head_tag(); ?>
<!-- End @Core after_head_tag hook content-->
	
	<div id="page-wrap">
		<div id="main">
			<!-- Begin @Core before_header hook  content-->
				<?php chimps_before_header(); ?> 
			<!-- End @Core before_header hook content -->
			<div id="header">
				<div id="headerwrap">
					<div id="header_right">
					<!-- Begin @Core header_right contact area hook -->
						<?php chimps_header_right(); ?> 
					<!-- End @Core header_right contact area hook -->			
					</div><!-- end header_right -->
					<!-- Begin @Core header_left contact area hook -->
						<?php chimps_header_left(); ?> 
					<!-- End @Core header_left contact area hook -->
				</div><!-- end headerwrap -->
				<?php chimps_navigation(); ?> <!-- Inserts @Core navigation -->
			</div><!-- end header -->
<!-- Begin @Core after_header hook -->
	<?php chimps_after_header(); ?> 
<!-- End @Core after_header hook -->