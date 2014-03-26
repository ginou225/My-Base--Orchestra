(function( $ ) {
  "use strict";
 
	$(function() {

		$('#masonryContainer').imagesLoaded( function(){
			$('#masonryContainer').masonry({  
		    	itemSelector: '.masonry-brick',
		    	columnWidth: '.masonry-brick',
		    	isAnimated: true,
	        }).resize();
		});
		
	});
}(jQuery));