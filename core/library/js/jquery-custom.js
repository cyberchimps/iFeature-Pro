jQuery(document).ready(function($) {
	function if_check_slider_value(value) {
		var slider_value = $(value).val();
		
		if ( slider_value == "0" ) {
			$(".content_slide_media_type, .content_slide_image, .content_slide_url, .content_slide_video, .content_slide_text_align, .content_slide_caption").fadeIn();
			
			if_check_media_value("select[name=\'content_slide_media_type\']");

		} else if ( slider_value == "1" ) {
			$(".content_slide_media_type, .content_slide_image, .content_slide_url, .content_slide_video").fadeIn();
			$(".content_slide_text_align, .content_slide_caption").hide();
			
			if_check_media_value("select[name=\'content_slide_media_type\']");

		} else if ( slider_value == "2" ){
			$(".content_slide_text_align, .content_slide_caption").fadeIn();
			$(".content_slide_media_type, .content_slide_image, .content_slide_url, .content_slide_video").hide();
		}	
		return false;
	}
	
	function if_check_media_value(value) {
		var media_value = $(value).val();
		
		if ( media_value == "0" ) {
			$(".content_slide_image, .content_slide_url").fadeIn();
			$(".content_slide_video").hide();
			
		} else if ( media_value == "1" ) {
			$(".content_slide_video").fadeIn();
			$(".content_slide_image, .content_slide_url").hide();
			
		}
		return false;
	}

	if_check_slider_value("select[name=\'content_slider_type\']");

	$("select[name=\'content_slide_type\']").change(function() {
		if_check_slider_value(this);
	});
	
	$("select[name=\'content_slide_media_type\']").change(function() {
		if_check_media_value(this);
	});
});


jQuery(document).ready(function($) {
	function if_check_slider_value(value) {
		var slider_value = $("select[name=\'page_slider_type\']").val();

		if ( slider_value == "0" ) {
			$(".slider_blog_category").hide();
			$(".slider_category").fadeIn();
		} else if ( slider_value == "1" ){
			$(".slider_category").hide();
			$(".slider_blog_category").fadeIn();
		}

		return false;
	}

	if_check_slider_value();

	$("select[name=\'page_slider_type\']").change(function() {
		if_check_slider_value();
	});
});

jQuery(document).ready(function($) {
	function if_check_slider_value(value) {
		var slider_value = $("select[name=\'page_nivoslider_type\']").val();

		if ( slider_value == "0" ) {
			$(".nivoslider_blog_category").hide();
			$(".nivoslider_category").fadeIn();
		} else if ( slider_value == "1" ){
			$(".nivoslider_category").hide();
			$(".nivoslider_blog_category").fadeIn();
		}

		return false;
	}

	if_check_slider_value();

	$("select[name=\'page_nivoslider_type\']").change(function() {
		if_check_slider_value();
	});
});

jQuery(document).ready(function($) {
	function bu_check_product_value(value) {
		var product_value = $("select[name=\'product_type\']").val();

		if ( product_value == "0" ) {
			$(".product_video").hide();
			$(".product_image").fadeIn();
		} else if ( product_value == "1" ){
			$(".product_image").hide();
			$(".product_video").fadeIn();
		}

		return false;
	}

	bu_check_product_value();

	$("select[name=\'product_type\']").change(function() {
		bu_check_product_value();
	});
});