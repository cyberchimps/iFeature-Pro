/**
 * Prints out the inline javascript needed for the colorpicker and choosing
 * the tabs in the panel.
 */

// validating options
function validate_options() {
	jQuery("#section-if_blog_product_custom_url").append("<lable class='validation_error' id='url_validation_msg'></lable>");
	var reg_url = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
	var custom_url = jQuery("#if_blog_product_custom_url").val();
	if((custom_url.search(reg_url)) == -1 || custom_url == "") {
		jQuery("#url_validation_msg").html("Please enter a valid URL");
		return false;
	}
	else {
		jQuery("#url_validation_msg").html("");
	}
	return true;
}

jQuery(document).ready(function($) {

	jQuery("#if_blog_product_custom_url").blur(function(){
		jQuery("#section-if_blog_product_custom_url").append("<lable class='validation_error' id='url_validation_msg'></lable>");
		var reg_url = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
		var custom_url = $("#if_blog_product_custom_url").val();
		alert(custom_url);
		if((custom_url.search(reg_url)) == -1 || custom_url == "") {
			jQuery("#url_validation_msg").html("Please enter a valid URL");
			return false;
		}
		else {
			jQuery("#url_validation_msg").html("");
		}
		return true;
	});

  $("#section-if_font").change(function() {
    if($(this).find(":selected").val() == 'custom') {
      $('#section-if_custom_font').fadeIn();
    } else {
      $('#section-if_custom_font').hide();
    }
  }).change();
  $("#section-if_menu_font").change(function() {
    if($(this).find(":selected").val() == 'custom') {
      $('#section-if_custom_menu_font').fadeIn();
    } else {
      $('#section-if_custom_menu_font').hide();
    }
  }).change();
  $("#if_show_excerpts").change(function() {
    var toShow = $("#section-if_excerpt_link_text, #section-if_excerpt_length");
    if($(this).is(':checked')) {
      toShow.show();
    } else {
      toShow.hide();
    }
  }).change();
  $("#if_show_featured_images").change(function() {
    var toShow = $("#section-if_featured_image_align, #section-if_featured_image_height, #section-if_featured_image_width, #section-if_featured_image_crop");
    if($(this).is(':checked')) {
      toShow.show();
    } else {
      toShow.hide();
    }
  }).change();
    $("#if_disable_footer").change(function() {
    var toShow = $("#section-if_footer_text, #section-if_hide_link");
    if($(this).is(':checked')) {
      toShow.fadeIn();
    } else {
      toShow.fadeOut();
    }
  }).change();
      $("#if_custom_background").change(function() {
    var toShow = $("#section-if_background_upload, #section-if_bg_image_position, #section-if_bg_image_repeat, #section-if_background_color, #section-if_bg_image_attachment ");
    if($(this).is(':checked')) {
      toShow.show();
    } else {
      toShow.hide();
    }
   }).change();
      $("#if_custom_menu_color_toggle").change(function() {
    var toShow = $("#section-if_custom_menu_color, #section-if_custom_dropdown_color, #section-if_menulink_color, #section-if_menu_hover_color ");
    if($(this).is(':checked')) {
      toShow.show();
    } else {
      toShow.hide();
    }
  }).change();
  $("#if_slider_type").change(function(){
    var val = $(this).val(),
      post = $("#section-if_slider_category"),
      custom = $("#section-if_customslider_category");
    if(val == 'custom') {
      post.hide(); custom.show();
    } else {
      post.show(); custom.hide();
    }
  }).change();
   $("#if_nivo_slider_type").change(function(){
    var val = $(this).val(),
      post = $("#section-if_nivo_slider_category"),
      custom = $("#section-if_nivo_customslider_category");
    if(val == 'custom') {
      post.hide(); custom.show();
    } else {
      post.show(); custom.hide();
    }
  }).change();
   $("#if_blog_custom_callout_options").change(function() {
    var toShow = $("#section-if_blog_custom_callout_button, #section-if_blog_callout_bg_color, #section-if_blog_callout_bg_color, #section-if_blog_callout_text_color, #section-if_blog_callout_button_color, #section-if_blog_callout_button_text_color, #section-if_blog_callout_title_color ");
    if($(this).is(':checked')) {
      toShow.show();
    } else {
      toShow.hide();
    }
  }).change();
	$("#if_blog_callout_button").change(function() {
    var toShow = $("#section-if_blog_callout_button_text, #section-if_blog_callout_button_url");
    if($(this).is(':checked')) {
      toShow.show();
    } else {
      toShow.hide();
    }
  }).change();
   $("#if_portfolio_title_toggle").change(function() {
    var toShow = $("#section-if_portfolio_title");
    if($(this).is(':checked')) {
      toShow.show();
    } else {
      toShow.hide();
    }
  }).change();
    $("#if_blog_product_link_toggle").change(function() {
    var toShow = $("#section-if_blog_product_link_url, #section-if_blog_product_link_text");
    if($(this).is(':checked')) {
      toShow.show();
    } else {
      toShow.hide();
    }
  }).change();
   $("#section-if_blog_product_type").change(function() {
    if($(this).find(":selected").val() == 'key1') {
      $('#section-if_blog_product_image').fadeIn();
    } else {
      $('#section-if_blog_product_image').hide();
    }
  }).change();
     $("#section-if_blog_product_type").change(function() {
    if($(this).find(":selected").val() == 'key2') {
      $('#section-if_blog_product_video').fadeIn();
    } else {
      $('#section-if_blog_product_video').hide();
    }
  }).change();

  // To toggle product title
	$("#if_blog_product_title_toggle").change(function() {
    var toShow = $("#section-if_blog_product_title, #section-if_blog_product_title");
    if($(this).is(':checked')) {
      toShow.show();
    } else {
      toShow.hide();
    }
  }).change();
  
  // To toggle custom url of product image
	$("#if_blog_product_custom_url_toggle").change(function() {
    var toShow = $("#section-if_blog_product_custom_url, #section-if_blog_product_custom_url");
    if($(this).is(':checked')) {
      toShow.show();
    } else {
      toShow.hide();
    }
  }).change();
  

  
  $.each(['twitter', 'facebook', 'gplus', 'flickr', 'linkedin', 'pinterest', 'youtube', 'googlemaps', 'email', 'rsslink'], function(i, val) {
	  $("#section-if_" + val).each(function(){
		  var $this = $(this), $next = $(this).next();
		  $this.find(".controls").css({float: 'left', clear: 'both'});
		  $next.find(".controls").css({float: 'right', width: 80});
		  $next.hide();
		  $this.find('.option').before($next.find(".option"));
		  $this.find("input[type='checkbox']").change(function() {
			  if($(this).is(":checked")) {
				  $(this).closest('.option').next().show();
			  } else {
				  $(this).closest('.option').next().hide();
			  }
		  }).change();
	  });
  });
});	

jQuery(function($) {
	var initialize = function(id) {
		var el = $("#" + id);
		function update(base) {
			var hidden = base.find("input[type='hidden']");
			var val = [];
			base.find('.right_list .list_items span').each(function() {
				val.push($(this).data('key'));
			});
			hidden.val(val.join(",")).change();
			el.find('.right_list .action').show();
			el.find('.left_list .action').hide();
		}
		el.find(".left_list .list_items").delegate(".action", "click", function() {
			var item = $(this).closest('.list_item');
			$(this).closest('.section_order').children('.right_list').children('.list_items').append(item);
			update($(this).closest(".section_order"));
		});
		el.find(".right_list .list_items").delegate(".action", "click", function() {
			var item = $(this).closest('.list_item');
			$(this).val('Add');
			$(this).closest('.section_order').children('.left_list').children('.list_items').append(item);
			$(this).hide();
			update($(this).closest(".section_order"));
		});
		el.find(".right_list .list_items").sortable({
			update: function() {
				update($(this).closest(".section_order"));
			},
			connectWith: '#' + id + ' .left_list .list_items'
		});

		el.find(".left_list .list_items").sortable({
			connectWith: '#' + id + ' .right_list .list_items'
		});

		update(el);
	}

	$('.section_order').each(function() {
		initialize($(this).attr('id'));
	});

	$("input[name='ifeature[if_blog_section_order]']").change(function(){
		var show = $(this).val().split(",");
		var map = {
			synapse_blog_slider: "subsection-blogslider",
			synapse_callout_section: "subsection-calloutoptions",
			synapse_portfolio_element: "subsection-portfoliooptions",
			synapse_product_element: "subsection-productoptions",
			synapse_twitterbar_section: "subsection-twtterbaroptions",
			synapse_custom_html_element: "subsection-customhtml",
			synapse_index_carousel_section: "subsection-carouseloptions",
			synapse_blog_nivoslider: "subsection-nivoslider"
			// , synapse_box_section: ""
		};

		$.each(map, function(key, value) {
			$("#" + value).hide();
			$.each(show, function(i, show_key) {
				if(key == show_key)
					$("#" + value).show();
			});
		});
	}).trigger('change');
	
	$("input[name='ifeature[header_section_order]']").change(function(){
		var show = $(this).val().split(",");
		var map = {
			ifeature_sitename_contact: "section-if_header_contact",
			ifeature_custom_header_element: "section-if_custom_header_element",
			ifeature_banner: "subsection-banneroptions"
			// , synapse_box_section: ""
		};

		$.each(map, function(key, value) {
			$("#" + value).hide();
			$.each(show, function(i, show_key) {
				if(key == show_key)
					$("#" + value).show();
			});
		});
	}).trigger('change');
});