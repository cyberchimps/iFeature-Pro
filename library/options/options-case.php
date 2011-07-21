<?php 
/* 
	Options	Case
	Author: Tyler Cuningham
	Establishes the theme options case.
	Copyright (C) 2011 CyberChimps
	Version 2.0
	
*/


foreach ($optionlist as $value) {  
switch ( $value['type'] ) {
 
case "open":
?>

<table width="100%" border="0" style="padding:10px;">

 
<?php break;
 
case "close":
?>


</table><br />
 
<?php break;


case "open-tab":
?>

<div id="<?php echo $value['id']; ?>">

 
<?php break;
 
case "close-tab":
?>


</div>

<?php break; 

case 'upload':
?>   


<tr>

<td width="15%" rowspan="2" valign="middle"><strong>Custom logo</strong>


 
<tr>
<td width="85%">


    <?php settings_fields('if_options'); ?>
    <?php do_settings_sections('if'); 
    
    $file = $options['file'];
    
    if ($file != ''){
    
    echo "Logo preview:<br /><br /><img src='{$file['url']}'><br /><br />";}
    echo "<input type='text' name='if_filename_text' size='72' value='{$file['url']}'/>";
    echo "<br />" ;
    echo "<br />" ;
    echo "<input type='file' name='if_filename' size='30' />";?>

    
    <br />
    <small>Upload a logo image to use</small>


<?php
	$options = get_option('ifeature');
	$value = isset($options['file']) ? $options['file'] : '';
?>

</td>
</tr>


        
        <tr>
<td><small></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php break; 

case 'upload2':
?>   


<tr>

<td width="15%" rowspan="2" valign="middle"><strong>Custom favicon</strong>


 
<tr>
<td width="85%">


    <?php settings_fields('if_options'); ?>
    <?php do_settings_sections('if'); 
    
    $file2 = $options['file2'];
    
    if ($file2 != ''){
    
    echo "Favicon preview:<br /><br /><img src='{$file2['url']}'><br /><br />";}
    echo "<input type='text' name='if_favfilename_text' size='72' value='{$file2['url']}'/>";
    echo "<br />" ;
    echo "<br />" ;
    echo "<input type='file' name='if_favfilename' size='30' />";?>

    
    <br />
    <small>Upload a favicon image to use</small>


<?php
	$options = get_option('ifeature');
	$value = isset($options['file2']) ? $options['file2'] : '';
?>

</td>
</tr>


        
        <tr>
<td><small></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php break; 

case 'upload3':
?>   


<tr>

<td width="15%" rowspan="2" valign="middle"><strong>Custom home icon</strong>


 
<tr>
<td width="85%">


    <?php settings_fields('if_options'); ?>
    <?php do_settings_sections('if'); 
    
    $file3 = $options['file3'];
    
    if ($file3 != ''){
    
    echo "Home Button preview:<br /><br /><img src='{$file3['url']}'><br /><br />";}
    echo "<input type='text' name='if_homefilename_text' size='72' value='{$file3['url']}'/>";
    echo "<br />" ;
    echo "<br />" ;
    echo "<input type='file' name='if_homefilename' size='30' />";?>

    
    <br />
    <small>Upload a home icon image to use</small>


<?php
	$options = get_option('ifeature');
	$value = isset($options['file3']) ? $options['file3'] : '';
?>

</td>
</tr>


        
        <tr>
<td><small></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php break; 

case 'upload4':
?>   


<tr>

<td width="15%" rowspan="2" valign="middle"><strong>Custom callout image</strong>


 
<tr>
<td width="85%">


    <?php settings_fields('if_options'); ?>
    <?php do_settings_sections('if'); 
    
    $file4 = $options['file4'];
    
    if ($file4 != ''){
    
    echo "Callout Button preview:<br /><br /><img src='{$file4['url']}'><br /><br />";}
    echo "<input type='text' name='if_calloutfilename_text' size='72' value='{$file4['url']}'/>";
    echo "<br />" ;
    echo "<br />" ;
    echo "<input type='file' name='if_calloutfilename' size='30' />";?>

    
    <br />
    <small>Upload a callout image to use</small>


<?php
	$options = get_option('ifeature');
	$value = isset($options['file4']) ? $options['file4'] : '';
?>

</td>
</tr>


        
        <tr>
<td><small></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php break; 


case 'excerpts':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    <br />
    <input type="checkbox" id="ifeature[if_show_excerpts]" name="ifeature[if_show_excerpts]" value="1" <?php checked( '1', $options['if_show_excerpts'] ); ?>> - Show Excerpts
<br /><br />

	<?php
		if (isset($options['if_excerpt_link_text']) == "")
			$textlink = '(Read More...)';
			
		else
			$textlink = $options['if_excerpt_link_text']; 
	?>
	
   <input type="text" id="ifeature[if_excerpt_link_text]" name="ifeature[if_excerpt_link_text]" value="<?php echo $textlink ;?>"> - Excerpt Link Text
<br /><br />

	<?php
		if (isset($options['if_excerpt_length']) == "")
			$length = '55';
			
		else
			$length = $options['if_excerpt_length']; 
	?>

     <input type="text" id="ifeature[if_excerpt_length]" name="ifeature[if_excerpt_length]" value="<?php echo $length ;?>" > - Excerpt Character Length
<br /><br />

</td>
  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break;


case 'post':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    <br />
    <input type="checkbox" id="ifeature[if_hide_author]" name="ifeature[if_hide_author]" value="1" <?php checked( '1', $options['if_hide_author'] ); ?>> - Author
<br /><br />

   <input type="checkbox" id="ifeature[if_hide_categories]" name="ifeature[if_hide_categories]" value="1" <?php checked( '1', $options['if_hide_categories'] ); ?>> - Categories
<br /><br />

   <input type="checkbox" id="ifeature[if_hide_date]" name="ifeature[if_hide_date]" value="1" <?php checked( '1', $options['if_hide_date'] ); ?>> - Date
<br /><br />

   <input type="checkbox" id="ifeature[if_hide_comments]" name="ifeature[if_hide_comments]" value="1" <?php checked( '1', $options['if_hide_comments'] ); ?>> - Comments
<br /><br />

   <input type="checkbox" id="ifeature[if_hide_share]" name="ifeature[if_hide_share]" value="1" <?php checked( '1', $options['if_hide_share'] ); ?>> - Share
<br /><br />

   <input type="checkbox" id="ifeature[if_hide_tags]" name="ifeature[if_hide_tags]" value="1" <?php checked( '1', $options['if_hide_tags'] ); ?>> - Tags
<br /><br />

</td>
  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break;
 


case 'twitterbar':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    <br />
    <input style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>" id="<?php echo 'if['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />

<br /><br />

<input type="checkbox" id="ifeature[if_enable_twitter]" name="ifeature[if_enable_twitter]" value="1" <?php checked( '1', $options['if_enable_twitter'] ); ?>> - Check this box to enable the Twitter Bar on the iFeature Pro Homepage (Requires <a href="http://wordpress.org/extend/plugins/twitter-for-wordpress/">Twitter for WordPress Plugin</a>)
</td>
  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break;



case 'color1':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    
    <?php
$options = get_option('ifeature');

if (isset($options['if_sitetitle_color']) == "")
			$picker = '111111';
			
		else
			$picker = $options['if_sitetitle_color']; 
?>

<input type="text" class="color" id="ifeature[if_sitetitle_color]" name="ifeature[if_sitetitle_color]"  value="<?php echo $picker ;?>" style="width: 300px;">   

<br /><br />
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break; 

case 'color2':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    
    <?php
$options = get_option('ifeature');

if (isset($options['if_link_color']) == "")
			$picker = '717171';
			
		else
			$picker = $options['if_link_color']; 
?>

<input type="text" class="color{required:false}" id="ifeature[if_link_color]" name="ifeature[if_link_color]"  value="<?php echo $picker ;?>" style="width: 300px;">   

<br /><br />
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break; 


case 'color3':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    
    <?php
$options = get_option('ifeature');

if (isset($options['if_menulink_color']) == "")
			$picker = 'FFF';
			
		else
			$picker = $options['if_menulink_color']; 
?>

<input type="text" class="color{required:false}" id="ifeature[if_menulink_color]" name="ifeature[if_menulink_color]"  value="<?php echo $picker ;?>" style="width: 300px;">   

<br /><br />
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break; 

case 'color4':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    
    <?php
$options = get_option('ifeature');

if (isset($options['if_posttitle_color']) == "")
			$picker = '717171';
			
		else
			$picker = $options['if_posttitle_color']; 
?>

<input type="text" class="color{required:false}" id="ifeature[if_posttitle_color]" name="ifeature[if_posttitle_color]"  value="<?php echo $picker ;?>" style="width: 300px;">   

<br /><br />
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break; 

case 'color5':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    
    <?php
$options = get_option('ifeature');

if (isset($options['if_callout_custom_background_color']) == "")
			$picker = 'F8F8F8';
			
		else
			$picker = $options['if_callout_custom_background_color']; 
?>

<input type="checkbox" id="ifeature[if_enable_custom_calloutbg]" name="ifeature[if_enable_custom_calloutbg]" value="1" <?php checked( '1', $options['if_enable_custom_calloutbg'] ); ?>> - Check this box to enable custom callout section background color.
<br /><br />
<input type="text" class="color{required:false}" id="ifeature[if_callout_custom_background_color]" name="ifeature[if_callout_custom_background_color]"  value="<?php echo $picker ;?>" style="width: 300px;">   

<br /><br />
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break; 

case 'color6':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    
    <?php
$options = get_option('ifeature');

if (isset($options['if_callout_button_color']) == "")
			$picker = '333';
			
		else
			$picker = $options['if_callout_button_color']; 
?>

<input type="text" class="color{required:false}" id="ifeature[if_callout_button_color]" name="ifeature[if_callout_button_color]"  value="<?php echo $picker ;?>" style="width: 300px;">   

<br /><br />
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break; 


case 'color7':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    
    <?php
$options = get_option('ifeature');

if (isset($options['if_callout_text_color']) == "")
			$picker = '000';
			
		else
			$picker = $options['if_callout_text_color']; 
?>

<input type="text" class="color{required:false}" id="ifeature[if_callout_text_color]" name="ifeature[if_callout_text_color]"  value="<?php echo $picker ;?>" style="width: 300px;">   

<br /><br />
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break; 

case 'color8':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    
    <?php
$options = get_option('ifeature');

if (isset($options['if_footer_color']) == "")
			$picker = '222';
			
		else
			$picker = $options['if_footer_color']; 
?>
<br />
<input type="text" class="color{required:false}" id="ifeature[if_footer_color]" name="ifeature[if_footer_color]"  value="<?php echo $picker ;?>" style="width: 300px;">   

<br /><br />
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break; 

case 'color9':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    
    <?php
$options = get_option('ifeature');

if (isset($options['if_tagline_color']) == "")
			$picker = '000';
			
		else
			$picker = $options['if_tagline_color']; 
?>
<br />
<input type="text" class="color{required:false}" id="ifeature[if_tagline_color]" name="ifeature[if_tagline_color]"  value="<?php echo $picker ;?>" style="width: 300px;">   

<br /><br />
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break; 


 
 
case 'facebook':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>" id="<?php echo 'if['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="ifeature[if_hide_facebook]" name="ifeature[if_hide_facebook]" value="1" <?php checked( '1', $options['if_hide_facebook'] ); ?>> - Check this box to hide the Facebook icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break;


case 'twitter':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>" id="<?php echo 'if['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="ifeature[if_hide_twitter]" name="ifeature[if_hide_twitter]" value="1" <?php checked( '1', $options['if_hide_twitter'] ); ?>> - Check this box to hide the Twitter icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break;

case 'gplus':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>" id="<?php echo 'if['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="ifeature[if_hide_gplus]" name="ifeature[if_hide_gplus]" value="1" <?php checked( '1', $options['if_hide_twitter'] ); ?>> - Check this box to hide the Google + icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break;


case 'linkedin':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>" id="<?php echo 'if['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="ifeature[if_hide_linkedin]" name="ifeature[if_hide_linkedin]" value="1" <?php checked( '1', $options['if_hide_linkedin'] ); ?>> - Check this box to hide the LinkedIn icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;


case 'youtube':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>" id="<?php echo 'if['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="ifeature[if_hide_youtube]" name="ifeature[if_hide_youtube]" value="1" <?php checked( '1', $options['if_hide_youtube'] ); ?>> - Check this box to hide the YouTube icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;


case 'googlemaps':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>" id="<?php echo 'if['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="ifeature[if_hide_googlemaps]" name="ifeature[if_hide_googlemaps]" value="1" <?php checked( '1', $options['if_hide_googlemaps'] ); ?>> - Check this box to hide the Google Maps icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;


case 'email':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>" id="<?php echo 'if['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="ifeature[if_hide_email]" name="ifeature[if_hide_email]" value="1" <?php checked( '1', $options['if_hide_email'] ); ?>> - Check this box to hide the Email icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'rss':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>" id="<?php echo 'if['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="ifeature[if_hide_rss]" name="ifeature[if_hide_rss]" value="1" <?php checked( '1', $options['if_hide_rss'] ); ?>> - Check this box to hide the RSS icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break; 

 
case 'textarea':
?>
 
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong></label> <br /><small><?php echo $value['desc']; ?></small> </td> 
    <td width="85%"><textarea id="<?php echo 'ifeature['.$value['id'].']'; ?>" name="<?php echo 'ifeature['.$value['id'].']'; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo stripslashes( $options[$value['id']] ); ?></textarea></td>  
 
  
 </tr>
 <tr>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr>
<?php break; 

case 'import':
?>
 
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong></label> <br /><small><?php echo $value['desc']; ?></small> </td> 
    <td width="85%"><textarea id="<?php echo 'ifeature['.$value['id'].']'; ?>" name="<?php echo 'ifeature['.$value['id'].']'; ?>" style="width:600px; height:300px;" type="<?php echo $value['type']; ?>" cols="" rows=""></textarea></td>  
 
  
 </tr>
 <tr>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr>
<?php break; 

case 'export':
?>
 
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong></label> <br /><small><?php echo $value['desc']; ?></small> </td> 
    <td width="85%"><textarea id="<?php echo 'ifeature['.$value['id'].']'; ?>" name="<?php echo 'ifeature['.$value['id'].']'; ?>" style="width:600px; height:300px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo (serialize($options));?></textarea></td>  

 </tr>
 <tr>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr>
<?php break; 

case 'text':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>" id="<?php echo 'if['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" /></td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break;

case 'select1':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_menu_color as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select></td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;


case 'select2':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_font as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select>
<br /> <br />

Or enter your own font below (Google Fonts with more than one word format as follows: Maven+Pro)
<br /> <br />

<input style="width:300px;" name="ifeature[if_custom_font]" id="ifeature[if_custom_font]" type="text" value="<?php echo $options['if_custom_font'] ?>"  />


</td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'select3':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_slider_effect as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select></td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'select4':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_slider_type as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select></td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'select5':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_slider_placement as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select></td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'select6':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';
								
								$terms2 = get_terms('category', 'hide_empty=0');

									$blogoptions = array();

										foreach($terms2 as $term) {

										$blogoptions[$term->slug] = $term->name;

									}
									

								foreach ( $blogoptions as $option ) {
									$label = $option['label'];
									if ( $selected == $option ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option ) . "'>$option</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option ) . "'>$option</option>";      
								}
								echo $p . $r;   
							?>    


</select>

</td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'select7':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';
								
								$terms2 = get_terms('slide_categories', 'hide_empty=0');

									$blogoptions = array();

										foreach($terms2 as $term) {

										$blogoptions[$term->slug] = $term->name;

									}
									

								foreach ( $blogoptions as $option ) {
									$label = $option['label'];
									if ( $selected == $option ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option ) . "'>$option</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option ) . "'>$option</option>";      
								}
								echo $p . $r;   
							?>    


</select>

</td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'select8':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_sidebar_type as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select>


</td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'select9':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_slider_size as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select>

</td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;
 
case 'select10':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_slider_navigation as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select>
</td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'select11':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_slider_caption as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select>


</td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'select12':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_font as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select>
<br /> <br />

Or enter your own font below (Google Fonts with more than one word format as follows: Maven+Pro)
<br /> <br />

<input style="width:300px;" name="ifeature[if_custom_menu_font]" id="ifeature[if_custom_menu_font]" type="text" value="<?php echo $options['if_custom_menu_font'] ?>"  />


</td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'select13':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_callout_background  as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select>


</td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

 

 
case "checkbox":
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%">
<input type="checkbox" name="<?php echo 'ifeature['.$value['id'].']'; ?>" id="<?php echo 'ifeature['.$value['id'].']'; ?>" value="1" <?php checked( '1', $options[$value['id']] ); ?>/>
</td>
</tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php break;
}
}
?>