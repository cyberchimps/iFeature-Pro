<?php 

/*
	Section: Slider
	Authors: Tyler Cunningham 
	Description: Creates iFeature slider.
	Version: 1.1.0	
	Portions of this code written by Ivan Lazarevic  (email : devet.sest@gmail.com) Copyright 2010    
*/

    	$tmp_query = $wp_query; 
		$options = get_option('ifeature') ; 
		$root = get_template_directory_uri(); 
		$cat = 'about';
		
		if ($options['if_slider_type'] == '')
		
		$usecustomslides = 'posts';
		
		else
		
		$usecustomslides		= $options['if_slider_type'];
		
		if ($usecustomslides == 'custom')
    	query_posts( array ('post_type' => 'if_custom_slides', 'showposts' => 20,  'slide_categories' => get_post_meta($post->ID, 'slider_category' , true)  ) );
    	
    	else
    	query_posts('category_name='.$options['if_slider_category'].'&showposts=50');
	       
    	
	    if (have_posts()) :
	    	$out = "<div id='slider' class='nivoSlider'>"; 
	    	$i = 0;
	    	
	    	if ($options['if_slider_posts_number'] == '')
	    	$no = '5';
	    	elseif ($usecustomslides == 'custom')
	    	$no = '20';
	    	
	    	else $no = $options['if_slider_posts_number'];
	    	

	    	while (have_posts() && $i<$no) : 
	    	
	    		the_post(); 
	    		
	    		$customimage 		= get_post_meta($post->ID, 'slider_image' , true);
	    		$customtext 		=  $post->post_content;
	    		$customlink 		= get_post_meta($post->ID, 'slider_url' , true);
	    		$permalink 			= get_permalink();
	   			$text 				= get_post_meta($post->ID, 'slider_text' , true);
	   			$image  			= get_post_meta($post->ID, 'slider_post_image' , true);
	   			$title				= get_the_title() ;
	   			$hidetitlebar       = get_post_meta($post->ID, 'slider_hidetitle' , true);

	    		
	    	if ($customimage != '' && $usecustomslides != 'posts' && $hidetitlebar == 'on') { 
	    			$out .= "<a href='$customlink'>	
	    						<img src='$root/library/tt/timthumb.php?src=$customimage&a=c&h=330&w=976' alt='iFeaturePro' />
	    						
	    					</a>
	    			";
	       } 
	       
	       		elseif 
	    			
	    			($customimage != '' && $usecustomslides != 'posts'  ){ 
	    			$out .= "<a href='$customlink'>	
	    						<img src='$root/library/tt/timthumb.php?src=$customimage&a=c&h=330&w=976' alt='iFeaturePro' />
	    						
	    					<div id='customcaption'>
	    					<div class='captiontext'>
	    							<strong>$title</strong><br />
	    							$customtext </div>
	    						</div>
	    						
	    						</a>
	    			";
	    			
	    			
	       } 
	       		elseif ($customimage == '' && $usecustomslides != 'posts' && $hidetitlebar == 'on'){ 
	       		$out .= "<a href='$customlink'>	
	    						<img src='$root/images/pro/ifeaturepro.jpg' alt='iFeaturePro' />
	    					
	    					</a>
	    			";
	       } 
	       
	       	elseif ($customimage == '' && $usecustomslides != 'posts') {
	       		$out .= "<a href='$customlink'>	
	    						<img src='$root/images/pro/ifeaturepro.jpg' alt='iFeaturePro' title='#htmlcaption'/>
	    						
	    						<div id='htmlcaption' class='nivo-html-caption'>
	    							<div class='captiontext'><strong>$title</strong><br />
	    							$customtext </div>
	    						</div>
	    					</a>
	    			";
	       } 
	       
	       elseif ($image != '' && $usecustomslides == 'posts' && $hidetitlebar == 'on'){
	     
	    		$out .= "<a href='$permalink'>	
	    						<img src='$root/library/tt/timthumb.php?src=$image&a=c&h=330&w=640' alt='iFeaturePro' />
	    						
	    					</a>
	    			";
	       } 
	       
	       elseif ($image != '' && $usecustomslides == 'posts'){
	     
	    		$out .= "<a href='$permalink'>	
	    						<img src='$root/library/tt/timthumb.php?src=$image&a=c&h=330&w=640' alt='iFeaturePro' />
	    						<span>
	    							<strong>$title</strong><br />
	    							$text
	    						</span>
	    					</a>
	    			";
	       } 
	       
	         elseif ($image == '' && $usecustomslides == 'posts' && $hidetitlebar == 'on'){
	     
	    		$out .= "<a href='$permalink'>	
	    						<img src='$root/images/pro/ifeaturepro.jpg' alt='iFeaturePro' />
	    						
	    					</a>
	    			";
	       } 
	       
	         else {
	     
	    		$out .= "<a href='$permalink'>	
	    						<img src='$root/images/pro/ifeaturepro.jpg' />
	    						<span>
	    							<strong>$title</strong><br />
	    							$text
	    						</span>
	    					</a>
	    			";
	       } 
	    	 
	      	$i++;
	      	endwhile;
	      	$out .= "</div>";
	    endif; 
	    
	    $wp_query = $tmp_query;

	    if ($options['if_slider_animation'] == '')
	    	$csEffect = 'random';
	    else $csEffect = $options['if_slider_animation'];
	    
	    $csSpw		= get_option('cs-spw') ? get_option('cs-spw') : 7;
	    $csSph		= get_option('cs-sph') ? get_option('cs-sph') : 5;	    
	    
	    if ($options['if_slider_height'] == '')
	    	$csHeight = '330';
	    else $csHeight = $options['if_slider_height'];
	    
	    if ($options['if_slider_delay'] == '')
	    	$csDelay = '3500';
	    else $csDelay = $options['if_slider_delay'];
	    
	     if ($options['if_slider_placement'] == 'blog')
	  			$csWidth = '640';
	  	
	  	else $csWidth = '976';
	  	
	  if ($options['if_slider_navigation'] == '1')
	    	$csNavigation = 'false';
	    else $csNavigation = 'true';
	    ?>
	    <style type="text/css" media="screen">
		#coin-slider-coin-slider { width: <?php echo $csWidth ?>px; margin: auto;}
</style>
<?php	    
	     wp_reset_query();
    $out .= <<<OUT
<script type="text/javascript">
var $ = jQuery.noConflict();

$(window).load(function() {
    $('#slider').nivoSlider({
        effect:'slideInLeft', // Specify sets like: 'fold,fade,sliceDown'
        slices:15, // For slice animations
        boxCols: 8, // For box animations
        boxRows: 4, // For box animations
        animSpeed:500, // Slide transition speed
        pauseTime:3000, // How long each slide will show
        startSlide:0, // Set starting Slide (0 index)
        directionNav:true, // Next & Prev navigation
        directionNavHide:true, // Only show on hover
        controlNav:true, // 1,2,3... navigation
        controlNavThumbs:false, // Use thumbnails for Control Nav
        controlNavThumbsFromRel:false, // Use image rel for thumbs
        controlNavThumbsSearch: '.jpg', // Replace this with...
        controlNavThumbsReplace: '_thumb.jpg', // ...this in thumb Image src
        keyboardNav:true, // Use left & right arrows
        pauseOnHover:true, // Stop animation while hovering
        manualAdvance:false, // Force manual transitions
        captionOpacity:0.7, // Universal caption opacity
        prevText: 'Prev', // Prev directionNav text
        nextText: 'Next', // Next directionNav text
        beforeChange: function(){
        $('.captiontext').fadeOut(500);
        }, // Triggers before a slide transition
        afterChange: function(){
        $('.captiontext').fadeIn(500);
        }, // Triggers after a slide transition
        slideshowEnd: function(){}, // Triggers after all slides have been shown
        lastSlide: function(){}, // Triggers when last slide is shown
        afterLoad: function(){} // Triggers when slider has loaded
    });
});

</script>

OUT;

echo $out;