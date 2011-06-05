<?php
/*
Template Name: iFeature Pro Homepage
*/
$options = get_option('ifeature') ;  
?>


<?php get_header(); ?>

<div id="content_wrap">

	<div id="content_fullwidth">
		
	<!--Insert Feature Slider-->
	
	<?php 
	
		$hideslider = $options['if_hide_slider'];
		$sliderplacement = $options['if_slider_placement'];
	?>
		<?php if ($hideslider != '1' && $sliderplacement != 'blog'):?>
			<?php get_template_part('slider', 'featurepage' ); ?>
		<?php endif;?>
		
		<?php $hidecallout = $options['if_hide_callout'] ?>
		<?php if ($hidecallout != '1' ):?>
			<?php include (TEMPLATEPATH . '/pro/callout.php' ); ?>
		<?php endif;?>
	<?php $hideboxes = $options['if_hide_boxes']; ?>
		<?php if ($hideboxes != '1' ):?>
			<?php include (TEMPLATEPATH . '/pro/boxes.php' ); ?>
		<?php endif;?>
	</div><!--end content_fullwidth-->

</div><!--end content_wrap-->

<div style="clear:both;"></div>
<?php get_footer(); ?>
