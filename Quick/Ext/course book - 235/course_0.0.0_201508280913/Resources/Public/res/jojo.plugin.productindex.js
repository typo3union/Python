(function($) {
	/**
	 * JOJO productindex plugin
	 * $Id$
	 */
	$.fn.productindex = function(options) {
		// extend and save the default options
		var opts = $.extend({}, $.fn.productindex.defaults, options);
		
		$product = $("div.product");
		$product.css("cursor", "pointer");
		
		$product.click(function(){
			var href = $(this).find("h2 a").attr("href");
			if (href) {
				window.location = href;
			};
		});
		
		// return object to make it jQuery-chainable
		return this;
	};
	
	/**
	 * Default settings for the jQuery plugin
	 */	
	$.fn.productindex.defaults = {
	};
	
}(jQuery));
