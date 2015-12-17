jQuery(document).ready(function(){
	
	jQuery('.about, .portfolio').hover(function() {
		jQuery(this).find('.infos').stop().fadeTo(200,1);
	}, function() {
		jQuery(this).find('.infos').stop().fadeTo(200,0);
	});
	

	
});	

jQuery(window).load(function() {
			jQuery('.infos').css({
			display: 'inline-block',
		});
			
});