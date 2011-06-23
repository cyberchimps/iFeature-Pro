<?php
/*

	Section: Callout
	Authors: Trent Lapinski, Tyler Cunningham
	Description: Creates the call out section.
	Version: 0.1
	
*/
	$options = get_option('ifeature') ;  


?>

<div id="calloutwrap"><!--id="calloutwrap"-->
		<div class="callout_text">
		<?php  
				if ($options['if_callout_title'] == "")
					$callouttitle = 'This is the Callout Section';
				else
				$callouttitle = $options[('if_callout_title')]; ?>
		<h2 class="callout_title"><?php echo $callouttitle ?></h2>
		<?php  
				if ($options['if_callout_text'] == "")
					$callouttext = 'Business Pro gives you the tools to turn WordPress into a modern feature rich Content Management System (CMS). ';
				else
				$callouttext = $options[('if_callout_text')]; ?>
		<p class="calloutp"><?php echo $callouttext  ?></p>
		</div>
		<?php if ($options['if_callout_button_text'] == "")
					$calloutbuttontext = 'BUY NOW';
		else
		$calloutbuttontext = $options['if_callout_button_text'] ; ?>
		
		<?php  
				if ($options['if_callout_image_link'] == "")
					$calloutimglink = 'http://cyberchimps.com';
				else
				$calloutimglink = $options['if_callout_image_link']; ?>
	
		
		<div class="calloutbutton">
		<a href="<?php echo $calloutimglink ?>"><?php echo $calloutbuttontext ;?></a>
		</div>
</div><!--end calloutwrap-->