
$(document).ready(function(){
	$("#loginform").validationEngine({promptPosition : "topRight:-100",updatePromptsPosition: true,autoPositionUpdate: true});
	$( ".tx-trform .alert" ).delay(5000).fadeOut("slow");
	$("#tiform").validationEngine({promptPosition : "topRight:-125",updatePromptsPosition: true,autoPositionUpdate: true});
	
	if ($(window).width() > 768) {
		$('#datetimepicker2').parent().css('padding-right','0');
	}
	$(window).resize(function() {
		if ($(window).width() > 768) {
			 $('#datetimepicker2').parent().css('padding-right','0');
		} else {
			 $('#datetimepicker2').parent().css('padding-right','5px');
		}
	});
	
	
});