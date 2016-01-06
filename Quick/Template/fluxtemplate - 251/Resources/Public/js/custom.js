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

$(document).ready(function() {
	var select = $("#status").simpleselect(),
		newOptionInput = $("#add-option"),
		newOptionAutoSelectionCheckbox = $("#should-select-option"),
		newOption;
	$("#add-option-form").on("submit", function(e) {
		e.preventDefault();

		newOption = $("<option>").text(newOptionInput.val());
		if (newOptionAutoSelectionCheckbox.prop("checked")) newOption.prop("selected", true);

		select
			.append(newOption)
			.simpleselect("refreshContents")
			.simpleselect("setActive");
	});
});
$(document).ready(function () {
    $('.carousel').carousel();
    $('.landing-box-inside img').eq(4).unwrap();
    jQuery('.popup').magnificPopup({
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        closeOnContentClick: true,
        closeBtnInside: true,
        fixedContentPos: false,
        mainClass: 'mfp-no-margins mfp-with-zoom',
        image: {
            verticalFit: true
        },
        zoom: {
            enabled: true,
            duration: 300 
        },
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1] 
        },
    });
    $('.csc-default table').addClass('table date-table table-hover');
    $('.csc-default table').wrap('<div class="table-responsive"></div>');
    $('.csc-textpic caption').each(function () {
        var a = $(this).text();
        $(this).closest(".popup").removeAttr("title");
        $(this).closest(".popup").attr("title", "+a+");
    });
    $('.crop-img img').resizecrop({
        width: '200',
        height: '200'
    });

     if ($('.alert').hasClass('alert-success')) {
         $('#email').focus();
     }    
     $('#email-form').validate();

	 
});