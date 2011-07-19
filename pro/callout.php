<?php
/*

	Section: Callout
	Authors: Trent Lapinski, Tyler Cunningham
	Description: Creates the call out section.
	Version: 2.0
	
*/

/* Define global variables. */	

	$options = get_option('ifeature') ; 
	$root = get_template_directory_uri();  
	$customcalloutbutton = $options['file4'];
	$calloutbgcolor = get_post_meta($post->ID, 'callout_background_color' , true);
	$customcalloutbgcolor = get_post_meta($post->ID, 'custom_callout_color' , true);

/* End global variable definition. */	

/* Define background colors. */	

	if ($calloutbgcolor == '1') {
		$calloutbg = 'calloutBlue.png';
	}
	
	elseif ($calloutbgcolor == '2') {
		$calloutbg = 'calloutGrey.png';
	}
	
	elseif ($calloutbgcolor == '3') {
		$calloutbg = 'calloutOrange.png';
	}

	elseif ($calloutbgcolor == '4') {
		$calloutbg = 'calloutPink.png';
	}
	
	elseif ($calloutbgcolor == '5') {
		$calloutbg = 'calloutRed.png';
	}
	
	else {
		$calloutbg = $customcalloutbgcolor;
	}
	
/* End define background colors. */		

/* Echo background color CSS. */	

	if ($calloutbgcolor != '6' AND $calloutbgcolor != '0'){
	
		echo '<style type="text/css" media="screen">';
		echo "#calloutwrap {background: url($root/images/pro/$calloutbg) no-repeat top center;}";
		echo '</style>';
	}
	
	elseif ($calloutbgcolor == '6'){
	
		echo '<style type="text/css" media="screen">';
		echo "#calloutwrap {background: $calloutbg ;}";
		echo '</style>';
	
	}
		
/* End CSS. */	

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
	
		<?php if ($customcalloutbutton == ''): ?>
		<div class="calloutbutton">
		<a href="<?php echo $calloutimglink ?>"><?php echo $calloutbuttontext ;?></a>
		</div>
		<?php endif;?>
		<?php if ($customcalloutbutton != ''): ?>
		<div class="calloutimg">
		<a href="<?php echo $calloutimglink ?>"><img src="<?php echo stripslashes($customcalloutbutton['url']);?>" alt="Callout" /></a>
		</div>
		<?php endif;?>
</div><!--end calloutwrap-->