(function($) {
    "use strict"; 
    $(function() {     	   	
    	// header navigation    	
    	dropDown();	
		$(window).resize(function() {
			dropDown();			
		});						
		function dropDown() {
			var winWidth = $(window).width();			
			if (winWidth > 768) {
				$('header nav .menu-item-has-children').hover(
					function() {
				    	$(this).find('ul').fadeIn('fast');
				    	$(this).addClass('sub-active');
					}, function() {
				    	$(this).find('ul').fadeOut('fast');
				    	$(this).removeClass('sub-active');
				  }
				);
				$('header nav').css('display','block');	
			}	
		}		
		$('#mobile-menu').click(function() {
			$('#primary-menu').toggle();				
		});
		$('.wp-caption').removeAttr('style');
 	}); 	
}(jQuery));