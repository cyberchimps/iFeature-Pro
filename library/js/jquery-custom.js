jQuery(document).ready(function($) {
	function if_check_slider_value(value) {
		var slider_value = $('select#if_slider_type').val();
	
		if ( slider_value == "posts" ) {
			$(".if_row_custom").hide();
			$(".if_row_posts").fadeIn();
		} else if ( slider_value == "custom" ){
			$(".if_row_posts").hide();
			$(".if_row_custom").fadeIn();
		}
	
		return false;
	}

	if_check_slider_value();

	$("select#if_slider_type").change(function() {
		if_check_slider_value();
	});
});