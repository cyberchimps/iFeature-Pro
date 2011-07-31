<?php 

/*
	Section: Slider
	Authors: Tyler Cunningham 
	Description: Creates iFeature Slider.
	Version: 2.0	
	Portions of this code written by Ivan Lazarevic  (email : devet.sest@gmail.com) Copyright 2010    
*/

/* Call globals. */	

	global $themename, $themeslug, $options;

/* End globals. */

/* Define variables. */	

    $tmp_query = $wp_query; 
	$root = get_template_directory_uri(); 
	$size = $options[$themeslug.'_slider_size'];
	$size2 = $options[$themeslug.'_blog_sidebar'];
	$type = $options[$themeslug.'_slider_type']; 
	$category = $options[$themeslug.'_slider_category']; 
	$customcategory = $options[$themeslug.'_customslider_category'];
	$captionstyle = $options[$themeslug.'_caption_style'];
	$sliderheight = $options[$themeslug.'_slider_height'];
	$navautohide = $options[$themeslug.'_disable_nav_autohide'];
	$hidenav = $options[$themeslug.'_hide_slider_arrows'];

	
/* End define variables. */	

/* Define slider animation variable */

	if ($options[$themeslug.'_slider_animation'] == '') {
		$animation = 'random';	
	}

	else {
		$animation = $options[$themeslug.'_slider_animation'];
	}

/* End slider animation */		

/* Slider navigation options */

	if ($hidenav == '1') {
		$hidenavigation = 'false';
	}

	else {
		$hidenavigation = 'true';
	}
	
	if ($navautohide == '1') {
		$autohide = 'false';
	}
	
	else {
		$autohide = 'true';
	}

/* End navigation options */


/* Define blog category */

	if ($category != 'All') {
		$blogcategory = $category;
	}
	
	else {
		$blogcategory = "";
	}
	
/* End blog category */

/* Define slider height */      

	if ($sliderheight == '') {
	    $height = '330';
	}    

	else {
		$height = $sliderheight;
	}

/* End slider height */ 

/* Define slider caption style */      

	if ($captionstyle == 'left') {
		
		?>
		
			<style type="text/css">
			.nivo-caption {height: <?php echo $height ?>px; width: 30%;}
			</style>
		
		<?php
	}
	
	elseif ($captionstyle == 'right') {
		
		?>
		
			<style type="text/css">
			.nivo-caption {position: relative; float: right; height: <?php echo $height ?>px; width: 30%;}
			</style>
		
		<?php
	}    


/* Define TimThumb default height and widths. */		

	if ($size == "full") {
		$timthumb = "h=$height&w=980";
	}

	elseif ($size2 == "two-right" OR $size2 == "right-left") {
		$timthumb = "h=$height&w=480";
	}

	else {
		$timthumb = "h=$height&w=640";
	}

/* End define TimThumb. */

/* Query posts based on theme/meta options */

	if ($options[$themeslug.'_slider_type'] == '') {
		$usecustomslides = 'posts';
	}	

	else {
		$usecustomslides = $options[$themeslug.'_slider_type'];
	}

/* Query posts based on theme/meta options */

	if ( $type == 'custom') {
    	query_posts( array ('post_type' => $themeslug.'_custom_slides', 'showposts' => 20,  'slide_categories' => $customcategory  ) );
    }
    	
    else {
    	query_posts('category_name='.$blogcategory.'&showposts=50');
	}

/* End query posts based on theme/meta options */
    	
/* Establish post counter */  
  	
	if (have_posts()) :
	    $out = "<div id='slider' class='nivoSlider'>"; 
	    $i = 0;

	if ($options[$themeslug.'_slider_posts_number'] == '') {
	    $no = '5';    	
	}   	

	elseif ($usecustomslides == 'custom') {
	    $no = '20';
	}

	else {
		$no = $options[$themeslug.'_slider_posts_number'];
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
	   		$customthumb 		= get_post_meta($post->ID, 'slider_custom_thumb' , true); /* Gets custom thumbnail from page/post meta option */

			/* End variables */	

			/* Controls slide title based on page meta setting */	

			if ($hidetitlebar != 'on' AND $captionstyle != 'none') {
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

	    	if ($customimage != '' && $customthumb == ''){
	    		$image = $customsized;
	    		$thumbnail = "$root/library/tt/timthumb.php?src=$customimage&a=c&h=30&w=50";
	    	}
	    	
	    	elseif ($customimage != '' && $customthumb != '' ){
	    		$image = $customsized;
	    		$thumbnail = "$root/library/tt/timthumb.php?src=$customthumb&a=c&h=30&w=50";
	    	}
	    	
	    	elseif ($customimage == '' && $size == "full" ) {
	       		$image = "$root/library/tt/timthumb.php?src=$root/images/pro/ifeatureprolarge.jpg&a=c&h=$height&w=980";
	       		$thumbnail = "$root/images/pro/iFeaturePro2thumb.jpg";
	       	}

	    	elseif ($customimage == '' && $size2 == "right" && $size != "full"){
	    		$image = "$root/library/tt/timthumb.php?src=$root/images/pro/iFeaturePro2-640.jpg&a=c&h=$height&w=640";
	    		$thumbnail = "$root/images/pro/iFeaturePro2thumb.jpg";
	    	}

	    	elseif ($customimage == '' && $size2 == "two-right" && $size != "full" OR $customimage == '' && $size2 == "right-left" && $size != "full"){
	    		$image = "$root/library/tt/timthumb.php?src=$root/images/pro/iFeaturePro2-480.jpg&a=c&h=$height&w=480";
	    		$thumbnail = "$root/images/pro/iFeaturePro2thumb.jpg";
	    	}

	   		else {
	       		$image = "$root/library/tt/timthumb.php?src=$root/images/pro/iFeaturePro2-640.jpg&a=c&h=$height&w=640";
	       		$thumbnail = "$root/images/pro/iFeaturePro2thumb.jpg";
	       	}

	     	/* End image/thumb */	

	     	/* Markup for slides */

	    	$out .= "<a href='$link'>	
	    				<img src='$image' title='$titlevar' rel='$thumbnail' alt='iFeaturePro' />
	    					<div id='caption$i' class='nivo-html-caption'>
                				<font size='4'>$title </font> <br />
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

/* Define slider delay variable */ 
    
	if ($options[$themeslug.'_slider_delay'] == '') {
	    $delay = '3500';
	}    

	else {
		$delay = $options[$themeslug.'_slider_delay'];
	}

/* End slider delay variable */ 	

/* Define slider width variable */ 

	if ($size == 'full' && $size2 != 'two-right' AND $size2 != 'right-left') {
	  	$csWidth = '980';
	}		

	elseif ($size2 == 'right-left' && $size != 'full' OR $size2 == 'two-right' && $size != 'full') {
		$csWidth = '480';
	}  	

	else {
		$csWidth = '640';
	}

/* End slider width variable */ 

/* Define slider navigation variable */ 
  	
	if ($options[$themeslug.'_slider_navigation'] == '1') {
	    $csNavigation = 'false';
	}

	else {
		$csNavigation = 'true';
	}

/* End slider navigation variable */ 


	?>
	
<!-- Apply slider CSS based on user settings -->

	<style type="text/css" media="screen">
		#slider-wrapper { width: <?php echo $csWidth ?>px; height: <?php echo $height ?>px; margin: auto; margin-bottom: 50px;}
		#slider { width: <?php echo $csWidth ?>px; height: <?php echo $height ?>px; margin: auto; }
	</style>

<!-- End style -->

	<?php
	
/* Define slider navigation style */ 		
	
	if ($options[$themeslug.'_slider_nav'] == 'dots' OR $options[$themeslug.'_slider_nav'] == '') {
		
		echo '<style type="text/css">';
		echo ".nivo-controlNav a {background: url($root/images/bullets.png) no-repeat; display:block; width:22px; height:22px; 	text-indent:-9999px; border:0; margin-right:3px; float:left;}";
		echo ".nivo-controlNav a.active {background-position:0 -22px;} ";
		echo '</style>';
		
	}
 
	if ($options[$themeslug.'_slider_nav'] == "none")  {
			
		echo '<style type="text/css">';
		echo ".nivo-controlNav {display: none;}";
		echo '#slider-wrapper {margin-bottom: 0px;}';
		echo '</style>';

	}	

/* End slider navigation style */ 
	
	    wp_reset_query(); /* Reset post query */ 

/* Begin NivoSlider javascript */ 
    
    $out .= <<<OUT
	<script type="text/javascript">
		var $ = jQuery.noConflict();

	$(window).load(function() {
    $('#slider').nivoSlider({
        effect:'$animation', // Specify sets like: 'fold,fade,sliceDown'
        slices:15, // For slice animations
        boxCols: 8, // For box animations
        boxRows: 4, // For box animations
        animSpeed:500, // Slide transition speed
        pauseTime:'$delay', // How long each slide will show
        startSlide:0, // Set starting Slide (0 index)
        directionNav:$hidenavigation, // Next & Prev navigation
        directionNavHide:$autohide, // Only show on hover
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
	$('#slider').each(function(){
    var \$this = $(this), \$control = $(".nivo-controlNav", this);
    \$control.css({left: (\$this.width() - \$control.width()) / 2}); 
});
});

</script>


OUT;

/* End NivoSlider javascript */ 

echo $out;

/* END */ 