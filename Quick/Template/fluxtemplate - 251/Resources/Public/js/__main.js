$(document).ready(function(){
	$(".multi-lang").click(function(){
		$(this).addClass("multi-lang-open");
	});
	$(".container-fluid").click(function(){
	   $(".multi-lang").removeClass("multi-lang-open");
	});	

	 $("#banner-slider").swiperight(function() {  
		   $("#banner-slider").carousel('prev');  
	  });  
	 $("#banner-slider").swipeleft(function() {  
		   $("#banner-slider").carousel('next');  
	 });
	  
	 $(".dropdown").click(function(){
          $("#main-header").addClass("nav-divider");
        });
	
	$('.landing-box-outside:nth-child(1) img').addClass('img-responsive');
	$('.landing-box-outside:nth-child(3) img').addClass('img-responsive');
	$('.landing-box-outside:nth-child(5) img:first').addClass('img-responsive');
	
	   $("#contact-page-slider").owlCarousel({
		  items : 6,
		  itemsDesktop : [1000,4],
		  itemsDesktopSmall : [900,4],
		  itemsTablet: [600,2],
		  itemsMobile : [420,1],
		  navigation  : true,
		  navigationText  : ["<",">"]
		 });
		 
 });
 
$(document).on("dragstart", function(e) { if (e.target.nodeName.toUpperCase() == "IMG") { return false; } });