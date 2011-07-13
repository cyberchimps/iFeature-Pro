<?php 

/*
	Section: Slider
	Authors: Tyler Cunningham 
	Description: Creates iFeature Slider.
	Version: 2.0	
	Portions of this code written by Ivan Lazarevic  (email : devet.sest@gmail.com) Copyright 2010    
*/

/* Define global variables. */	

    $tmp_query = $wp_query; 
	$options = get_option('ifeature') ; 
	$root = get_template_directory_uri(); 
	$size = $options['if_slider_size'];
	$size2 = $options['if_blog_sidebar'];
	$type = $options['if_slider_type']; 
	$blogcategory = $options['if_slider_category']; 
	$customcategory = $options['if_customslider_category'];

/* End define global variables. */	

/* Define TimThumb default height and widths. */		

	if ($size == "full") {
		$timthumb = 'h=330&w=980';
	}

	elseif ($size2 == "two-right" OR $size2 == "right-left") {
		$timthumb = 'h=330&w=480';
	}

	else {
		$timthumb = 'h=330&w=640';
	}

/* End define TimThumb. */

/* Query posts based on theme/meta options */

	if ($options['if_slider_type'] == '') {
		$usecustomslides = 'posts';
	}	

	else {
		$usecustomslides = $options['if_slider_type'];
	}

/* Query posts based on theme/meta options */

	if ( $type == 'custom') {
    	query_posts( array ('post_type' => 'if_custom_slides', 'showposts' => 20,  'slide_categories' => $customcategory  ) );
    }
    	
    else {
    	query_posts('category_name='.$options['if_slider_category'].'&showposts=50');
	}

/* End query posts based on theme/meta options */
    	
/* Establish post counter */  
  	
	if (have_posts()) :
	    $out = "<div id='slider' class='nivoSlider'>"; 
	    $i = 0;

	if ($options['if_slider_posts_number'] == '') {
	    $no = '5';    	
	}   	

	elseif ($usecustomslides == 'custom') {
	    $no = '20';
	}

	else {
		$no = $options['if_slider_posts_number'];
	}

/* End post counter */	    	

/* Initialize slide creation */	

	while (have_posts() && $i<$no) : 

		the_post(); 

	    	/* Post-specific variables */	

	    	$customimage 		= get_post_meta($post->ID, 'slider_image' , true);  /* Gets slide custom image from page/post meta option */
	    	$customtext 		=  $post->post_content; /* Gets slide caption from custom slide meta option */
	    	$customlink 		= get_post_meta($post->ID, 'slider_url' , true); /* Gets link from custom slide meta option */
	    	$permalink 			= get_permalink(); /* Gets post URL for blog post slides */
	   		$blogtext 				= get_post_meta($post->ID, 'slider_text' , true); /* Gets slide caption from post meta option */  		
	   		$title				= get_the_title() ; /* Gets slide title from post/custom slide title */
	   		$hidetitlebar       = get_post_meta($post->ID, 'slider_hidetitle' , true); /* Gets page/post meta option for disabling slide title bar */
	   		$customsized        = "$root/library/tt/timthumb.php?src=$customimage&a=c&$timthumb"; /* Gets custom image from page/post meta option, applies timthumb code  */

			/* End variables */	

			/* Controls slide title based on page meta setting */	

			if ($hidetitlebar != 'on') {
	   			$titlevar = "#caption$i";
	   		}

	   		else {
	   			$titlevar = '';
	   		}

	    	/* End slide title */

	    	/* Controls slide link */

	    	if ( $type == 'custom') {
	    		$link = get_post_meta($post->ID, 'slider_url' , true);
	    	}

	    	else {
	    		$link = get_permalink();
	    	}

	    	/* End slide link */
	    	
	    	/* Establish slider text */
	    	
	    	if ($type == 'custom') {
	    		$text = $customtext;
	    	}
	    	
	    	else {
	    		$text = $blogtext;
	    	}
	    	
	    	/* End slider text */	

	    	/* Controls slide image and thumbnails */

	    	if ($customimage != '' ){
	    		$image = $customsized;
	    		$thumbnail = "$root/library/tt/timthumb.php?src=$customimage&a=c&h=30&w=50";
	    	}

	    	elseif ($customimage == '' && $size2 == "right" && $size != "full"){
	    		$image = "$root/images/pro/ifeatureprosmall.png";
	    		$thumbnail = "$root/images/pro/ifeatureprothumb.jpg";
	    	}

	    	elseif ($customimage == '' && $size2 == "two-right" OR $customimage == '' && $size2 == "right-left"){
	    		$image = "$root/images/pro/ifeaturepro480.png";
	    		$thumbnail = "$root/images/pro/ifeatureprothumb.jpg";
	    	}

	   		else {
	       		$image = "$root/images/pro/ifeaturepro.jpg";
	       		$thumbnail = "$root/images/pro/ifeatureprothumb.jpg";
	       	}

	     	/* End image/thumb */	

	     	/* Markup for slides */

	    	$out .= "<a href='$link'>	
	    				<img src='$image' title='$titlevar' rel='$thumbnail' alt='iFeaturePro' />
	    					<div id='caption$i' class='nivo-html-caption'>
                				$title <br />
                				$text 
                			</div>
	    				</a>
	    			";

	    	/* End slide markup */		

	      	$i++;
	      	endwhile;
	      	$out .= "</div>";
	endif; 	    
	$wp_query = $tmp_query;    

/* End slide creation */	

/* Define slider animation variable */

	if ($options['if_slider_animation'] == '') {
		$csEffect = 'random';	
	}

	else {
		$csEffect = $options['if_slider_animation'];
	}

/* End slider animation */	

/* Define slider height variable */      

	if ($options['if_slider_height'] == '') {
	    $csHeight = '330';
	}    

	else {
		$csHeight = $options['if_slider_height'];
	}

/* End slider height */ 	

/* Define slider delay variable */ 
    
	if ($options['if_slider_delay'] == '') {
	    $csDelay = '3500';
	}    

	else {
		$csDelay = $options['if_slider_delay'];
	}

/* End slider delay variable */ 	

/* Define slider width variable */ 

	if ($size == 'half' && $size2 != 'two-right' AND $size2 != 'right-left') {
	  	$csWidth = '640';
	}		

	elseif ($size2 == 'right-left' && $size != 'full' OR $size2 == 'two-right' && $size != 'full') {
		$csWidth = '480';
	}  	

	else {
		$csWidth = '976';
	}

/* End slider width variable */ 

/* Define slider navigation variable */ 
  	
	if ($options['if_slider_navigation'] == '1') {
	    $csNavigation = 'false';
	}

	else {
		$csNavigation = 'true';
	}

/* End slider navigation variable */ 

	?>
	
<!-- Apply slider CSS based on user settings -->

	<style type="text/css" media="screen">
		#slider-wrapper { width: <?php echo $csWidth ?>px; margin: auto; margin-bottom: 45px;}
		#slider { width: <?php echo $csWidth ?>px; margin: auto;}
	</style>

<!-- End style -->

	<?php	
	    wp_reset_query(); /* Reset post query */ 

/* Begin NivoSlider javascript */ 
    
    $out .= <<<OUT
	<script type="text/javascript">
		var $ = jQuery.noConflict();

	$(window).load(function() {
    $('#slider').nivoSlider({
        effect:'$csEffect', // Specify sets like: 'fold,fade,sliceDown'
        slices:15, // For slice animations
        boxCols: 8, // For box animations
        boxRows: 4, // For box animations
        animSpeed:500, // Slide transition speed
        pauseTime:3000, // How long each slide will show
        startSlide:0, // Set starting Slide (0 index)
        directionNav:true, // Next & Prev navigation
        directionNavHide:true, // Only show on hover
        
        controlNavThumbs:true, // Use thumbnails for Control Nav
        controlNavThumbsFromRel:true, // Use image rel for thumbs
        controlNavThumbsSearch: '.jpg', // Replace this with...
        controlNavThumbsReplace: '_thumb.jpg', // ...this in thumb Image src
        keyboardNav:true, // Use left & right arrows
        pauseOnHover:true, // Stop animation while hovering
        manualAdvance:false, // Force manual transitions
        captionOpacity:0.7, // Universal caption opacity
        prevText: 'Prev', // Prev directionNav text
        nextText: 'Next', // Next directionNav text
        beforeChange: function(){}, // Triggers before a slide transition
        afterChange: function(){}, // Triggers after a slide transition
        slideshowEnd: function(){}, // Triggers after all slides have been shown
        lastSlide: function(){}, // Triggers when last slide is shown
        afterLoad: function(){} // Triggers when slider has loaded
    });
});

</script>

OUT;

/* End NivoSlider javascript */ 

echo $out;

/* END */ 