(function($) {
	/**
	 * JOJO kurstermine plugin
	 * $Id$
	 */
	$.fn.kurstermine = function(options) {
		// extend and save the default options
		var opts = $.extend({}, $.fn.kurstermine.defaults, options);
		
		var $calTd = $(".calendarSheet td");
		var locked = false;
	    
		$("tr.kursListTermine")
			.mouseenter(function(){
				if(!locked) {
					displayTermine($(this));
				}
	    	})
			.mouseover(function(){
				if(!locked) {
					displayTermine($(this));
				}
			})
			.mouseout(function(){
				if(!locked) {
					cleanCalendar($calTd);
				}
			})
			.click(function(){
				locked = true;
				$("tr.kursListTermine").removeClass("locked");
				$(this).addClass("locked");
				cleanCalendar($calTd);
				displayTermine($(this));
			});
		
        $("#KursSchulferien")
            .change(function(){
                var $selected = $(this).find(":selected");
                schulfrei($selected.attr('value'), $calTd);
            });
		
		
		// return object to make it jQuery-chainable
		return this;
	};
	
	function displayTermine($obj) {
		var termineStr = $obj.metadata().termine;
		var termine = termineStr.split(',');
		for (var i=0; i < termine.length; i++) {
			var parts = new Array;
			parts = termine[i].split('|');
			$(".day_" + parts[0]).addClass("highlight " + parts[1]);
		};

	    var idParts = $obj.attr("id").split("_");
	    $(".calendarSheetSet").hide();
	    $("#calendarSheetSet_" + idParts[1]).show();
		$(".kursDescription").hide();
	    $("#description_" + idParts[1]).show();
	}

	function cleanCalendar($calTd) {
		$calTd.removeClass("highlight abends abends_pruefung1 abends_pruefung2 halbtags halbtags_pruefung1 halbtags_pruefung2 pruefung1 pruefung2 ganztags_pruefung1 ganztags_pruefung2");
	}
	
	function schulfrei(value, $calTd) {
		$calTd.removeClass("schulfrei");
		var dates = new Array();
		dates = value.split(',');
		// start at second date since the first is only there to proved unique keys in php 
		for (var i=1; i < dates.length; i++) {
			$(".day_" + dates[i]).addClass("schulfrei");
		};
	}
	
	/**
	 * Default settings for the jQuery plugin
	 */	
	$.fn.kurstermine.defaults = {
	};
	
}(jQuery));
