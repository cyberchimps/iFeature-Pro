jQuery(document).ready(function($){
		jQuery('.ifeature-tabbed-wrap').tabs();
});

jQuery(document).ready(function($){
	$("ul").parent("li").addClass("parent"); 
});

jQuery(document).ready(function($){
	$("#orbitDemo, #orbitDemo.orbit").touchwipe({
     	wipeLeft: function() { alert("left"); },
    	 wipeRight: function() { alert("right"); },
    	 wipeUp: function() { alert("up"); },
    	 wipeDown: function() { alert("down"); },
    	 min_move_x: 20,
    	 min_move_y: 20,
    	 preventDefaultEvents: true
	});
});