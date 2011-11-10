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

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?> <!-- wp_enqueue_script( 'comment-reply' );-->
<?php wp_head(); ?> <!-- wp_head();-->
	
</head> <!-- closing head tag-->

<!-- Begin @Core after_head_tag hook content-->
	<?php chimps_after_head_tag(); ?>
<!-- End @Core after_head_tag hook content-->
	
<!-- Begin @Core before_header hook  content-->
	<?php chimps_before_header(); ?> 
<!-- End @Core before_header hook content -->
			
	<header id="head">
			
		<div class="container_12">
		
			<div class="grid_6">
				
				<!-- Begin @Core header sitename hook -->
					<?php chimps_header_sitename(); ?> 
				<!-- End @Core header sitename hook -->
				
			</div>	
			
			<div id="header_contact" class="grid_6">
			
				<!-- Begin @Core header contact area hook -->
					<?php chimps_header_contact_area(); ?> 
				<!-- End @Core header contact area hook -->
					
			</div>	
		
		</div>
		
		<div class='clear'>&nbsp;</div>
		
		<div class="container_12">
				
			<div class="grid_6">
			
				<!-- Begin @Core header description hook -->
					<?php chimps_header_site_description(); ?> 
				<!-- End @Core header description hook -->
			
			</div>
			
			<div class="grid_6">
			
				<!-- Begin @Core header social icon hook -->
					<?php chimps_header_social_icons(); ?> 
				<!-- End @Core header contact social icon hook -->	
				
			</div>
			
		</div>
		
		<div class='clear'>&nbsp;</div>

		<!-- Begin @Core navigation contact area hook -->
			<?php chimps_navigation(); ?> 
		<!-- End @Core navigation contact area hook -->
				
			</header>
				
<!-- Begin @Core after_header hook -->
	<?php chimps_after_header(); ?> 
<!-- End @Core after_header hook -->