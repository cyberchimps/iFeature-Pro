<?php

/*
	
	Footer
	Establishes the widgetized footer and static post-footer section of iFeature. 
	Copyright (C) 2011 CyberChimps
	Version 2.0
	
*/

global $options, $themeslug;

?>
	
<?php if ($options->get($themeslug.'_disable_footer') != "0"):?>	

</div><!--end container wrap-->

	<div id="footer">
		<div id="main_wrap">
     	<div class="container-fluid">
     		<div class="row-fluid">
    	
	<!-- Begin @synapse footer hook content-->
		<?php synapse_footer(); ?>
	<!-- End @synapse footer hook content-->
	
	<?php endif;?>
	

		</div><!--end footer_wrap-->
	</div><!--end footer-->
</div> </div>

<?php if ($options->get($themeslug.'_disable_afterfooter') != "0"):?>

	<div id="afterfooter">
		<div id="afterfooterwrap">
		<div class="container-fluid">
		<div class="row-fluid">	
		<!-- Begin @synapse afterfooter hook content-->
			<?php synapse_secondary_footer(); ?>
		<!-- End @synapse afterfooter hook content-->
				
		</div>  <!--end afterfooterwrap-->	
	</div> <!--end afterfooter-->	
		</div> 	
		</div> 	
	<?php endif;?>
	
	<?php wp_footer(); ?>	
</body>

</html>
