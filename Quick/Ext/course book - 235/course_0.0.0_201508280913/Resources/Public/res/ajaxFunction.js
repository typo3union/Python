$(".kursListTermine").each(function(){
var pathname = window.location.href ;
	$(this).mouseover(function(){
		
		var data_month = $(this).attr('data-month');
		var data_year = $(this).attr('data-year');
		var data_id = $(this).attr('id');
		var splt = data_id.split("_");
		if(data_month != ""){
			var parm1 = "&month="+data_month;
		}
		if(data_year != ""){
			var parm2 = "&year="+data_year;
		}
		$.ajax({
		  url: pathname,
		  data: "tx_course_course[controller]=Course&tx_course_course[action]=ajax"+parm1+parm2+"&type=123",
		  success: function(result) {
			$(".ajaxCalender").html(result).show();		
			$(".calendarSheetSet").hide();	
			$("#calendarSheetSet_"+splt[1]).show();	
			calTheme();
		  }
		}); 
	})
})


$(function(){
		calTheme();
		
})

	
		
function calTheme(){

$(".calendarSheetSet").each(function(){
		
	var ifind = $(this).attr('id');

	var dp = $(this).css('display');
	if(dp =='block'){
				
		$("#"+ifind).find(".clday").each(function(){
				var data_day = $(this).attr('data-day');
													
				$("#"+ifind).find(".tmday").each(function(){
					var data_theme = $(this).attr('data-day');
					
					if(data_day == data_theme){
						
						var tm = $(this).attr('data-tm');
						$("#"+ifind).find(".clday.tm_"+data_day).addClass(tm);
						//$(this).addClass();
					}
				})
				
			})	 
	}
	
})

}				
				
				
				
					
