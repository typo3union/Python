
$(document).ready(function() {
	
	$('#myCarousel_date').carousel({
		interval: false,
		cycle: false,
		pause: true,
		
	});
	
	$('#myCarousel_date_1').carousel({
		interval: false,
		cycle: false,
		pause: true,
		
	});
	
	
	$('#myCarousel_date .carousel-inner .item').each(function(i){
		 $(this).removeAttr('id');
	  $(this).attr('id', (i+1));
	});
	
	$('#myCarousel_date_1 .carousel-inner .item').each(function(i){
		 $(this).removeAttr('id');
	  $(this).attr('id', (i+1));
	});


		
});
