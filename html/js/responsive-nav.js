jQuery(document).ready(function(){
								
	jQuery('#menu-container').hide();
	
	
	jQuery('nav').mouseover(function() {
			jQuery('#menu-container').fadeIn(200);
	});
	
//	jQuery('#options li a').click(function() {
//			jQuery('#menu-container').fadeOut(200);
//	});
	
	jQuery('nav').mouseleave(function() {
			jQuery('#menu-container').fadeOut(200);
	});
	
});	
	