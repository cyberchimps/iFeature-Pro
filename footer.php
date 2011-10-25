<?php

/*
	
	Footer
	Establishes the widgetized footer and static post-footer section of iFeature. 
	Copyright (C) 2011 CyberChimps
	Version 2.0
	
*/

/* Call globals. */	

	global $themename, $themeslug, $options;

/* End globals. */	

/* Define variables. */	

	$analytics = $options[$themeslug.'_ga_code'];
	$copyright = $options[$themeslug.'_footer_text'];
	$hidelink  = $options[$themeslug.'_hide_link'];

/* End variable definition. */	

?>
		
<div id="footer" class="container_12">

    <div class="grid_12" id="footer_wrap">
    	
    	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer") ) : ?>
		
		<div class="footer-widgets">
			<h3 class="footer-widget-title"><?php printf( __( 'Recent Posts', 'ifeature' )); ?></h3>
			<ul>
				<?php wp_get_archives('type=postbypost&limit=4'); ?>
			</ul>
		</div>
		
		<div class="footer-widgets">
			<h3 class="footer-widget-title"><?php printf( __( 'Archives', 'ifeature' )); ?></h3>
			<ul>
				<?php wp_get_archives('type=monthly&limit=16'); ?>
			</ul>
		</div>

		<div class="footer-widgets">
			<h3 class="footer-widget-title"><?php printf( __( 'Links', 'ifeature' )); ?></h3>
			<ul>
				<?php wp_list_bookmarks('categorize=0&title_li='); ?>
			</ul>
		</div>

		<div class="footer-widgets">
			<h3 class="footer-widget-title"><?php printf( __( 'WordPress', 'ifeature' )); ?></h3>
			<ul>
    		<?php wp_register(); ?>
    		<li><?php wp_loginout(); ?></li>
    		<li><a href="<?php echo esc_url( __('http://wordpress.org/', 'ifeature' )); ?>" target="_blank" title="<?php esc_attr_e('Powered by WordPress, state-of-the-art semantic personal publishing platform.', 'ifeature'); ?>"> <?php printf( __('WordPress', 'ifeature' )); ?></a></li>
    		<?php wp_meta(); ?>
    		</ul>
		</div>
			<?php endif; ?>
		<div class="clear"></div>

		<!--Inserts Google Analytics Code-->
		
		<?php echo stripslashes($analytics); ?>
			   
	</div><!--end footer_wrap-->
</div><!--end footer-->
	
	<div class="container_12" id="afterfooter">
	
		<div id="afterfooterwrap">
		
				<!--Inserts Copyright Text-->
				<?php if ($copyright == ''): ?> 
				
					<div id="afterfootercopyright">
						&copy; <?php echo bloginfo ( 'name' );  ?>
					</div>
					
				<?php endif;?>
				
				<?php if ($copyright != ''):?> 
				
					<div id="afterfootercopyright">
						&copy; <?php echo $copyright; ?>
					</div>
					
				<?php endif;?>
				
			<!--Inserts Afterfooter Menu-->
			
			<div id="afterfootermenu">
			<?php wp_nav_menu( array(
	   			'theme_location' => 'footer-menu', // Setting up the location for the main-menu, Main Navigation.
	    	)); ?>
			</div>
			
			<!--Inserts iFeature SEO Module-->
			
				<?php if ($hidelink != "1" ):?>
				
					<div id="credit">
						<?php get_template_part('credit', 'footer' ); ?>
					</div>
			
				<?php endif;?>
		</div>  <!--end afterfooterwrap-->	
		
	</div> <!--end afterfooter-->	
	<?php wp_footer(); ?>	
</body>

</html>
