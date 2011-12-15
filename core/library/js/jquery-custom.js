jQuery(document).ready(function($) {


/*
      Progressive enhancement.  If javascript is enabled we change the body class.  Which in turn hides the checkboxes with css.
    */
    $('body').addClass("js");

	 /*
      Add toggle switch after each checkbox.  If checked, then toggle the switch.
    */
     $('.checkbox').after(function(){
       if ($(this).is(":checked")) {
         return "<a href='#' class='toggle checked' ref='"+$(this).attr("id")+"'></a>";
       }else{
         return "<a href='#' class='toggle' ref='"+$(this).attr("id")+"'></a>";
       }
       
     });
     
     /*
      When the toggle switch is clicked, check off / de-select the associated checkbox
     */
    $('.toggle').click(function(e) {
       var checkboxID = $(this).attr("ref");
       var checkbox = $('#'+checkboxID);

       if (checkbox.is(":checked")) {
         checkbox.removeAttr("checked").change();
       }else{
         checkbox.attr("checked","checked").change();
       }
       $(this).toggleClass("checked");

       e.preventDefault();

    });

    /*
      For demo purposes only....shows/hides checkboxes.
    */
    $('#showCheckboxes').click(function(e) {
     $('.checkbox').toggle()
     e.preventDefault();
    });

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