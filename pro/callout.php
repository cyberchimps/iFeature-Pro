<?php
/*

	Section: Callout
	Authors: Trent Lapinski, Tyler Cunningham
	Description: Creates the call out section.
	Version: 0.1
	
*/
	$options = get_option('ifeature') ;  


?>
	<?php  
				if ($options['if_menu_color'] == "")
					$menucolor = 'Grey';
				else
				$menucolor = $options[('if_menu_color')]; ?>
	<div style="height: 100px; width: 980px; float: left; display: block; margin-top: 5px; margin-bottom: 15px; background: url(<?php bloginfo('template_url'); ?>/images/pro/callout<?php echo $menucolor ?>.png) no-repeat top center;"><!--id="calloutwrap"-->
	<div class="calloutpadding">
		<div class="callout_text">
		<?php  
				if ($options['if_callout_title'] == "")
					$callouttitle = 'This is the Callout Section';
				else
				$callouttitle = $options[('if_callout_title')]; ?>
		<h2 class="callout_title"><?php echo $callouttitle ?></h2>
		<?php  
				if ($options['if_callout_text'] == "")
					$callouttext = 'iFeature Pro comes with this callout section, five widgetized areas, typography with Google Font support, a customizable feature slider, a full shortcode library, five attractive color schemes and much more.';
				else
				$callouttext = $options[('if_callout_text')]; ?>
		<p class="calloutp"><?php echo $callouttext  ?></p>
		</div>
		<?php $calloutimg = $options['if_callout_img'] ; ?>
		<?php  
				if ($options['if_callout_image_link'] == "")
					$calloutimglink = 'http://ifeaturepro.com';
				else
				$calloutimglink = $options['if_callout_image_link']; ?>
		<?php if ($calloutimg != '' ):?>
		<div class="calloutimg">
		<a href="<?php echo $calloutimglink ?>"><img src="<?php echo $calloutimg ?>" alt="Callout"></a>
		</div>
		<?php endif;?>
		<?php if ($calloutimg == '' ):?>
		<div class="calloutimg">
		<a href="<?php echo $calloutimglink ?>"><img src="<?php bloginfo('template_url'); ?>/images/pro/callout.png? >" alt="Callout" /></a>
		</div>
		<?php endif;?>
	<div>
	</div>
	</div>
</div><!--end calloutwrap-->