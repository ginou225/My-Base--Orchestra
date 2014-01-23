/**
 * Main.js
 * @version 1.0
 */

(function( $ ) {
  "use strict";
 
	$(function() {
		$(document).foundation();

		$('#masonryContainer').masonry({  
	    	itemSelector: '.masonry-brick',
	    	columnWidth: 310,
	    	isFitWidth: true,
	    	isAnimated: true,
        }); 
	});
 
}(jQuery));

