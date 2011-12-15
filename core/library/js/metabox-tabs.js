jQuery(document).ready(function($) {

 	
	// tab between them
	jQuery('.metabox-tabs li a').each(function(i) {
		var thisTab = jQuery(this).parent().attr('class').replace(/active /, '');

		if ( 'active' != jQuery(this).attr('class') )
			jQuery('div.' + thisTab).hide();
		
		jQuery('div.' + thisTab).addClass('tab-content');
 
		jQuery(this).click(function(){
			// hide all child content
			jQuery(this).parent().parent().parent().children('div').hide();
 
			// remove all active tabs
			jQuery(this).parent().parent('ul').find('li.active').removeClass('active');
 
			// show selected content
			jQuery(this).parent().parent().parent().find('div.'+thisTab).show();
			jQuery(this).parent().parent().parent().find('li.'+thisTab).addClass('active');
		});
	});

	jQuery('.heading').hide();
	jQuery('.metabox-tabs').show();

	$(".subsection-items").hide();
	$(".subsection > h4").click(function() {
		var $this = $(this);
		$this.find("span.minus").removeClass('minus');
		if($this.siblings('div').is(":visible")) {
			$this.siblings('div').fadeOut();
		} else {
			$this.siblings('div').fadeIn();
			$this.find("span").addClass('minus');
		}
	});

	// show by default
	$("#subsection-Page-Options > h4").click();
	var page_subsection_map = {
		page_slider: "subsection-iFeature-Pro-Slider-Options",
		callout_section: "subsection-Callout-Options",
		twitterbar_section: "subsection-Twitter-Options",
		carousel_section: "subsection-Carousel-Options"
	};
	$("#page_section_order").change(function(){
		var array = $(this).val().split(",");
		$.each(page_subsection_map, function(key, value) {
			if($.inArray(key, array) != -1) {
				$("#" + value).show();
			} else {
				$("#" + value).hide();
			}
		});
	}).change();


	// image_select
	$(".image_select").each(function(){
		$(this).find("img").click(function(){
			if($(this).hasClass('selected')) return;
			$(this).siblings("img").removeClass('selected');
			$(this).addClass('selected');
			$(this).siblings("input").val($(this).attr("src"));
		});
	});
});
