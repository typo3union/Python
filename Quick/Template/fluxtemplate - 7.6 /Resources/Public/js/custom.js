// $('.gallery_view').each(function(){
// 			$(this).find('.csc-textpic-imagerow').each(function(i){
				
// 					if(i == 0)
// 					{
// 						$(this).find('.csc-textpic-imagecolumn:eq(1)').css('display','none');	
// 						$(this).find('.csc-textpic-imagecolumn').last().css('display','none');					
						
// 					}
// 					else {
// 						$(this).css('display','none');
// 					}
// 			});
// 	});

$(document).ready(function() {
// $("#owl-demo").owlCarousel({
// 	     autoPlay            : 3000,
//             items               : 4,
//             stopOnHover         : true,
//             lazyLoad            : true,
//             navigation : true,
//             navigationText : ["<<",">>"],
//             rewindNav : true,
//             pagination : true,
//             loop:true,
//   }); 
// 	   $('.owl-pagination').css('display','none');
	 
	 $('#carouselWork').slick({
		  slidesToShow: 4,
		  slidesToScroll: 1,
		  autoplay: true,
		  autoplaySpeed: 2000,
		  responsive: [
		    {
		      breakpoint: 1024,
		      settings: {
		        slidesToShow: 3,
		        slidesToScroll: 3,
		        infinite: true,
		        dots: true
		      }
		    },
		    {
		      breakpoint: 600,
		      settings: {
		        slidesToShow: 2,
		        slidesToScroll: 2
		      }
		    },
		    {
		      breakpoint: 480,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    }
		  ]
		});



if($('.pager').length>0){
 	var perpage = $('.total-num').text();      
    var listElement = $('.event-list');
    if(perpage!=''){
    	var perPage = perpage; 	
    }else{
    	var perPage = 10; 
    }
    
    var numItems = listElement.children().size();
    var numPages = Math.ceil(numItems/perPage);

    $('.pager').data("curr",0);

    var curr = 0;
    while(numPages > curr){
      $('<li><a href="#" class="page_link">'+(curr+1)+'</a></li>').appendTo('.pager');
      curr++;
    }

    //$('.pager .page_link:first').addClass('active'); 
    $(".pager li:nth-child(1) a").addClass("present"); 
	
    listElement.children().css('display', 'none');
    listElement.children().slice(0, perPage).css('display', 'block');

    $('.pager li a').click(function(){
      var clickedPage = $(this).html().valueOf() - 1;
	 $('.pager li a').removeClass("present");
	 $(this).addClass("present"); 
      goTo(clickedPage,perPage);
	  return false;
    });

    function goTo(page){
      var startAt = page * perPage,
        endOn = startAt + perPage;
      
      listElement.children().css('display','none').slice(startAt, endOn).css('display','block');
      $('.pager').attr("curr",page);	  
	 
	 // $(".pager li:nth-child(+page+)").addClass("present");
	 
    }
	  var size = $( " .pager li" ).size();
	  if(size<2){
		  $('.pager').remove();
	  }

	var current =  $( ".pager" ).attr( "curr" );
}
	


/*
var cofee = $('body').find('.fa-coffee');
if(cofee){
	cofee.replaceWith('<span class="glyphicon glyphicon-coffee"></span>');
}
*/
$(".map-frame-box").click(function(){
	$(this).removeClass("disabled");		
	 $( ".alert-success" ).fadeOut( "slow", function() {
			$("div").remove(".alert-success");
		});	
	});	
 
var fire = $('body').find('.fa-fire');
if(fire){
	fire.replaceWith('<span class="glyphicon glyphicon-fire"></span>');
}
var heart = $('body').find('.fa-heart');
if(heart){
	heart.replaceWith('<span class="glyphicon glyphicon-heart"></span>');
}
var calendar = $('body').find('.fa-calendar');
if(calendar){
	calendar.replaceWith('<span class="glyphicon glyphicon-calendar"></span>');
}

	

$('.videolist').paginate({

	  perPage:      12
	});

$('.gallery_view').each(function(){
	$(this).find('.popup').magnificPopup({
        type: "image",
        tLoading: "Loading image #%curr%...",
        closeOnContentClick: true,
        closeBtnInside: true,
        fixedContentPos: false,
        mainClass: "mfp-no-margins mfp-with-zoom",
        image: {
            verticalFit: true
        },
        
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [ 0, 1 ],
            tCounter: '<span class="mfp-counter">%curr% von %total%</span>'
        }
    });

});
 
$('.carousel').carousel({
	 	interval: 5000,
	 	pause	: 'hover'
	 });
	 jQuery("#layerslider").layerSlider({
        pauseOnHover: true,
        autoPlayVideos: false,
        skinsPath: 'typo3conf/ext/fluxtemplate/Resources/Public/skins/',
        responsive: false,
        responsiveUnder: 800,
        layersContainer: 1280,
        skin: 'borderlessdark3d',
        hoverPrevNext: true,
    });
	// WP Mobile Nav (Second method besides Bootstrap standrd menu) - Populating mobile nav list
	var navbarContainer = $('.navbar-nav');
	var linkTextLevel1;
	var linkTextLevel2;
	var linkTextLevel3;
	var navList;
	var navListEnd = '</ul>';

 $(".csc-default table").addClass("table date-table table-hover");
    $(".csc-default table").wrap('<div class="table-responsive"></div>');
    $(".csc-textpic-imagecolumn").addClass("img-gallery");
    $(".csc-textpic .table caption").each(function() {
        var a = $(this).text();
        $(this).closest(".popup").removeAttr("title");
        $(this).closest(".popup").attr("title", "+a+");
    });

 if($('.mfp-bottom-bar').find('.mfp-title').text() == '')
 {
 	$('.mfp-bottom-bar').removeClass('mfp-bottom-bar');
 }

    // $(".team .owl-carousel").owlCarousel({
    //     loop: true,
    //     margin: 10,
    //     responsiveClass: true,
    //     responsive: {
    //         0: {
    //             items: 1,
    //             nav: true
    //         },
    //         400: {
    //             items: 2,
    //             nav: true
    //         },
    //         600: {
    //             items: 3,
    //             nav: true
    //         },
    //         1000: {
    //             items: 5,
    //             nav: true,
    //             loop: true
    //         }
    //     }
    // })

    // $('.team .owl-carousel').each(function () {
    //     if ($(this).find('.team .owl-item.active').length <= 4)
    //     {
    //         $('.team.owl-controls').css('display', 'none');
    //     }
    //     else {
    //         $('.team .owl-controls').css('display', 'block');
    //         $('.team .owl-controls').find('.owl-prev').html('<i class="fa fa-chevron-left"></i>');
    //          $('.team .owl-controls').find('.owl-next').html('<i class="fa fa-chevron-right"></i>');
    //     }
    // });




$('#calendar').fullCalendar({

            // THIS KEY WON'T WORK IN PRODUCTION!!!
            // To make your own Google API key, follow the directions here:
            // http://fullcalendar.io/docs/google_calendar/
            googleCalendarApiKey: 'AIzaSyDEPXsuT5owYcsmArUh-y3rd5x6L_YAPQU',
        
            // US Holidays
            events: 'weboffice.co.at_v13lo3tov7g5te0bu1diul8k94@group.calendar.google.com',
            
            eventClick: function(event) {
                // opens events in a popup window
                window.open(event.url, 'gcalevent', 'width=700,height=600');
                return false;
            },
            
            loading: function(bool) {
             //   $('#loading').toggle(bool);
            },
            buttonText: {
				today: 'Heute',
				month: 'Monat',
				day: 'Tag',
				week: 'Woche'
			},
			monthNames: ['Jänner','Februar','März','April','Mai','Juni','Juli','August','September','Oktober','November','Dezember'],
			monthNamesShort: ['Jän','Feb','Mär','Apr','Mai','Jun','Jul','Aug','Sept','Okt','Nov','Dez'],
			dayNames: ['Sonntag','Montag','Dienstag','Mittwoch','Donnerstag','Freitag','Samstag'],
			dayNamesShort: ['So','Mo','Di','Mi','Do','Fr','Sa']
            
        });


	// Get first level items
	$('.navbar-nav > li.dropdown').each(function(index) {
		// Meganav list items
		if($(this).hasClass('dropdown-meganav')){
			linkTextLevel1 = $(this).find('a:first').text();
			linkUrlLevel1 = $(this).find('a:first').attr('href');
			navList = '<li><a href="'+ linkUrlLevel1 +'">'+ linkTextLevel1 +'</a>';

			// Get second level items
			if($(this).find('.mega-nav-section').length > 0){
				navList = navList + '<ul class="dl-submenu">';

				$(this).find('.mega-nav-section').each(function(index){
					linkTextLevel2 = $(this).find('.mega-nav-section-title').text();
					linkUrlLevel2 = $(this).find('a:first').attr('href');
					navList = navList + '<li><a href="'+ linkUrlLevel2 +'">'+ linkTextLevel2 +'</a>';

					// Get third level items
					if($(this).find('.mega-nav-ul').length > 0){
						navList = navList + '<ul class="dl-submenu">';
						
						$(this).find('.mega-nav-ul > li').each(function(index){
							linkTextLevel3 = $(this).find('a').text();
							linkUrlLevel3 = $(this).find('a:first').attr('href');
							navList = navList + '<li><a href="'+ linkUrlLevel3 +'">'+ linkTextLevel3 +'</a></li>';
						});

						navList = navList + navListEnd;
						navList = navList + '</li>';
					} 
				});
			}

		}

		// Normal nav list items
		if(!$(this).hasClass('dropdown-search') && !$(this).hasClass('dropdown-meganav')){
			linkTextLevel1 = $(this).find('a:first').text();
			linkUrlLevel1 = $(this).find('a:first').attr('href');
			navList = '<li><a href="'+ linkUrlLevel1 +'">'+ linkTextLevel1 +'</a>';

			// Get second level items
			if($(this).find('ul > li').length > 0){
				navList = navList + '<ul class="dl-submenu">';

				$(this).children().children().each(function(index){
					linkTextLevel2 = $(this).find('a:first').text();
					linkUrlLevel2 = $(this).find('a:first').attr('href');
					navList = navList + '<li><a href="'+ linkUrlLevel2 +'">'+ linkTextLevel2 +'</a>';

					// Get third level items
					if($(this).find('ul > li').length > 0){
						navList = navList + '<ul class="dl-submenu">';
						
						$(this).children().children().each(function(index){
							linkTextLevel3 = $(this).find('a').text();
							linkUrlLevel3 = $(this).find('a:first').attr('href');
							navList = navList + '<li><a href="'+ linkUrlLevel3 +'">'+ linkTextLevel3 +'</a></li>';
						});

						navList = navList + navListEnd;
						navList = navList + '</li>';
					} 
				});
			} 		
		}

		navList = navList + navListEnd;
		navList = navList + '</li>';

		// Append and create list menu
		$('#dl-menu > ul.dl-menu').append(navList + '</ul>');		
	});
	// Initializing mobile menu
	// $('#dl-menu').dlmenu({
 //        animationClasses:{
 //        	classin: 'dl-animate-in-2', 
 //        	classout: 'dl-animate-out-2' 
 //        }
 //    });
    // Bootstrap - Dropdown Hover
   	function allowDropdownHover() {
   		if($(window).width() > 767){
	    	$('.dropdown-toggle').dropdownHover();
	    }	
    }
    allowDropdownHover();
    window.onresize = allowDropdownHover; // Call the function on resize

	// //Carousels
	 $('.carousel').carousel({
		interval: 5000,
		pause	: 'hover'
	});
	   
	// // Owl carousel
	 if($(".owl-carousel-single").length > 0){
	 	$(".owl-carousel-single").owlCarousel({
	 		//items : 4,
	 		lazyLoad : true,
	 		pagination : true,
	 		autoPlay: 10000,
	 		singleItem: true,
	 		stopOnHover: true
	 	}); 
	 }
	 if($(".owl-carousel-2").length > 0){
	 	// Owl Carousel
	 	$(".owl-carousel-2").owlCarousel({
	 		items : 2,
	 		lazyLoad : true,
	 		pagination : false,
	 		autoPlay: 10000,
	 		stopOnHover: true
	 	}); 
	 }
	 if($(".owl-carousel-3").length > 0){
	 	// Owl Carousel
	 	$(".owl-carousel-3").owlCarousel({
	 		items : 3,
	 		lazyLoad : true,
	 		pagination : false,
	 		autoPlay: 10000,
	 		stopOnHover: true
	 	}); 
	 }
	 if($(".owl-carousel-4").length > 0){
	 	// Owl Carousel
	 	$(".owl-carousel-4").owlCarousel({
	 		items : 4,
	 		lazyLoad : true,
	 		pagination: false,			
	 		autoPlay: 10000,
	 		stopOnHover: true
	 	}); 
	 }
	 if($(".owl-carousel-5").length > 0){
	 	// Owl Carousel
	 	$(".owl-carousel-5").owlCarousel({
	 		items : 5,
	 		lazyLoad : true,
	 		pagination : false,
	 		autoPlay: 10000,
	 		stopOnHover: true
	 	}); 
	 }
	// Sortable list
	// $('#ulSorList').mixitup();
	// // Fancybox
	// $(".theater").fancybox();
	// // Fancybox	
	// $(".ext-source").fancybox({
	// 	'transitionIn'		: 'none',
	// 	'transitionOut'		: 'none',
	// 	'autoScale'     	: false,
	// 	'type'				: 'iframe',
	// 	'width'				: '50%',
	// 	'height'			: '60%',
	// 	'scrolling'   		: 'no'
	// });
	// // Stellar JS
	// $(".prlx-bg").stellar();
	// Isotope Masonry
	// if($('.wp-masonry-wrapper').length > 0){
	// 	$('.wp-masonry-wrapper').isotope({
	// 	    itemSelector: '.wp-masonry-block',
	// 	    masonry: {
	// 	      columnWidth: '.wp-masonry-block',
	// 	      gutter: '.wp-masonry-gutter'
	// 	    }
	// 	  });
	// }
	// Milestone counter
	// $('.milestone-count').countTo({
 //        //from: 50,
 //        //to: 250,
 //        //speed: 1000,
 //        //refreshInterval: 50,
 //        formatter: function (value, options) {
 //            return value.toFixed(options.decimals);
 //        },
 //        onUpdate: function (value) {
 //            console.debug(this);
 //        },
 //        onComplete: function (value) {
 //            console.debug(this);
 //        }
 //    });
    // Range sliders
  //   if($('.range-slider-wrapper').length > 0){
  //   	var customToolTip = $.Link({
		// 	target: '-tooltip-<div class="tooltip"></div>',
		// 	method: function(value){
		// 		$(this).html(
		// 			'<span>' + parseFloat(value) + '</span>'
		// 		);
		// 	}
		// });
		
  //   	// Range slider 1 - With fixed intervals
  //       $(".range-slider-1").noUiSlider({
		// 	start: [300, 5000],
		// 	snap: true,
		// 	range: {
		// 		'min': 0,
		// 		'10%': 100,
		// 		'20%': 500,
		// 		'30%': 1000,
		// 		'40%': 1500,
		// 		'60%': 3000,
		// 		'70%': 3500,
		// 		'80%': 4000,
		// 		'90%': 4500,
		// 		'max': 5000
		// 	}
		// });
  //       // Range slider with connect option
  //       $(".range-slider-connect-1").noUiSlider({
		// 	start: [300, 5000],
		// 	connect: true,
		// 	snap: true,
		// 	range: {
		// 		'min': 0,
		// 		'10%': 100,
		// 		'20%': 500,
		// 		'30%': 1000,
		// 		'40%': 1500,
		// 		'60%': 3000,
		// 		'70%': 3500,
		// 		'80%': 4000,
		// 		'90%': 4500,
		// 		'max': 5000
		// 	}
		// });
		// // Range slider with connect option + tooltip
  //       $(".range-slider-connect-2").noUiSlider({
		// 	start: [500, 4000],
		// 	connect: true,
		// 	snap: true,
		// 	range: {
		// 		'min': 0,
		// 		'10%': 100,
		// 		'20%': 500,
		// 		'30%': 1000,
		// 		'40%': 1500,
		// 		'60%': 3000,
		// 		'70%': 3500,
		// 		'80%': 4000,
		// 		'90%': 4500,
		// 		'max': 5000
		// 	},
		// 	// Add tooltip
		// 	serialization: {
		// 		lower: [ customToolTip ],
		// 		upper: [ customToolTip ]
		// 	}
		// });

  //       $(".range-slider-2").noUiSlider({
		// 	start: [300, 5000],
		// 	snap: true,
		// 	range: {
		// 		'min': 0,
		// 		'10%': 100,
		// 		'20%': 500,
		// 		'30%': 1000,
		// 		'40%': 1500,
		// 		'60%': 3000,
		// 		'70%': 3500,
		// 		'80%': 4000,
		// 		'90%': 4500,
		// 		'max': 5000
		// 	},
		// 	// Add tooltip
		// 	serialization: {
		// 		lower: [ customToolTip ],
		// 		upper: [ customToolTip ]
		// 	}
		// });

		// // Simple slider - With fixed intervals
		// $('.simple-slider-1').noUiSlider({
		// 	start: [ 500 ],
		// 	range: {
		// 		'min': [     0 ],
		// 		'10%': [   500,  500 ],
		// 		'50%': [  4000, 1000 ],
		// 		'max': [ 10000 ]
		// 	}
		// });

		// $('.simple-slider-2').noUiSlider({
		// 	start: [ 500 ],
		// 	range: {
		// 		'min': [     0 ],
		// 		'10%': [   500,  500 ],
		// 		'50%': [  4000, 1000 ],
		// 		'max': [ 10000 ]
		// 	},
		// 	// Add tooltip
		// 	serialization: {
		// 		lower: [ customToolTip ]
		// 	}
		// });

		// // Simple slider - Connect lower
		// $('.simple-slider-connect-1').noUiSlider({
		// 	start: [ 2500 ],
		// 	connect: "lower",
		// 	range: {
		// 		'min': [     0 ],
		// 		'10%': [   500,  500 ],
		// 		'50%': [  4000, 1000 ],
		// 		'max': [ 10000 ]
		// 	}
		// });
		// // Simple slider - Connect lower + tooltip
		// $('.simple-slider-connect-2').noUiSlider({
		// 	start: [ 2500 ],
		// 	connect: "lower",
		// 	range: {
		// 		'min': [     0 ],
		// 		'10%': [   500,  500 ],
		// 		'50%': [  4000, 1000 ],
		// 		'max': [ 10000 ]
		// 	},
		// 	// Add tooltip
		// 	serialization: {
		// 		lower: [ customToolTip ]
		// 	}
		// });
  //   }
	// Scroll to top
	// $().UItoTop({ easingType: 'easeOutQuart' });
	// // Inview animations
	// $.fn.waypoint.defaults = {
	// 	context: window,
	// 	continuous: true,
	// 	enabled: true,
	// 	horizontal: false,
	// 	offset: 300,
	// 	triggerOnce: false
	// }	
	// $('.animate-in-view, .pie-chart').waypoint(function(direction) {
	// 	// Easy Pie Chart
	// 	$(".pie-chart").easyPieChart({
	// 		size:150,
	// 		easing: 'easeOutBounce',
	// 		onStep: function(from, to, percent) {
	// 			$(this.el).find('.percent').text(Math.round(percent));
	// 		},
	// 		barColor: '#FFF',
	// 		delay: 3000,
	// 		trackColor:'rgba(255,255,255,0.2)',
	// 		scaleColor:false,
	// 		lineWidth:16,
	// 		lineCap:'butt'
	// 	});
	// });
	// // Search
	// if($('#btnSearch').length > 0){
	// 	// Search function
	// 	$("#btnSearch").click(function(){
	// 		if($("#divSearch").is(":visible")){
	// 			$("#divSearch").removeClass('animated slideInDown');
	// 			$("#divSearch").addClass('animated slideOutUp');
	// 			$('#divSearch').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
	// 				$(this).hide();
	// 				$("#divSearch").removeClass('animated slideOutUp');
	// 			});
	// 		} else {
	// 			$("#divSearch").show().addClass('animated slideInDown');
	// 		}
	// 		return false;	
	// 	});
	// 	$("#cmdCloseSearch").click(function(){
	// 		if($("#divSearch").is(":visible")){
	// 			$("#divSearch").removeClass('animated slideInDown');
	// 			$("#divSearch").addClass('animated slideOutUp');
	// 			$('#divSearch').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
	// 				$(this).hide();
	// 				$("#divSearch").removeClass('animated slideOutUp');
	// 			});
	// 		}
	// 	});
		
	// 	// Keyboard shortcuts
	// 	$('html').keyup(function(e){
	// 		if(e.keyCode == 27){
	// 			if($("#divSearch").is(":visible")){
	// 				$("#divSearch").removeClass('animated slideInDown');
	// 				$("#divSearch").addClass('animated slideOutUp');
	// 				$('#divSearch').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
	// 					$(this).hide();
	// 					$("#divSearch").removeClass('animated slideOutUp');
	// 				});
	// 			}
	// 		}
	// 	});
	// }
	// // Hover direction animation	
	// $(".animate-hover-slide-4 .figure").each( function(){ 
	// 	$(this).hoverdir({
	// 		hoverDelay: 50,
	// 		inverse: 	false
	// 	}); 
	// });
	// // Custom animations
	// $(".animate-click").click(function(){
	// 	var animateIn = $(this).data("animate-in");
	// 	var animateOut = $(this).data("animate-out");
	// 	var animatedElement = $(this).find(".animate-wr");

	// 	console.log(animateIn+'-'+animateOut);

	// 	if(animateIn != undefined){
	// 		console.log('incepem animatia');
	// 		if(animatedElement.is(":hidden")){
	// 			console.log('start IN');
	// 			animatedElement.addClass(animateIn);
	// 			animatedElement.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
	// 				animatedElement.removeClass(animateIn);
	// 			});
	// 		}
	// 	}
	// });
	
	// $(".animate-hover").hover(function(){
	// 	var animation = $(this).data("animate-in");
	// 	if(animation != undefined || animation != ""){
	// 		$(this).find(".animate-wr").addClass(animation);
	// 	}
	// });

	// $(".animate-click").click(function(){
	// 	var animation = $(this).data("animate-in");
	// 	if(animation != undefined || animation != ""){
	// 		$(this).find(".animate-wr").addClass(animation);
	// 	}
	// });

	// // Main nav for mobiles - left
	// $(".navbar-toggle-mobile-nav, #btnHideMobileNav").click(function(){
	// 	if($("#navMobile").is(":visible")){
	// 		$("#navMobile").removeClass('animated bounceInLeft');
	// 		$("#navMobile").addClass('animated bounceOutLeft');
	// 		$('#navMobile').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
	// 			$(this).hide();
	// 			$("#navMobile").removeClass('animated bounceOutLeft');
	// 		});
	// 		$("body").removeClass("nav-menu-in");
	// 	}
	// 	else{
	// 		$("#navMobile").show().addClass('animated bounceInLeft');
	// 		$("body").addClass("nav-menu-in");
	// 	}
	// 	return false;	
	// });	
 
	// // Slide bar - right
	// $("#cmdAsideMenu, #btnHideAsideMenu, .navbar-toggle-aside-menu").click(function(){
	// 	if($("#asideMenu").is(":visible")){
	// 		$("#asideMenu").removeClass('animated bounceInRight');
	// 		$("#asideMenu").addClass('animated bounceOutRight');
	// 		$('#asideMenu').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
	// 			$(this).hide();
	// 			$("#asideMenu").removeClass('animated bounceOutRight');			
	// 		});
	// 	}
	// 	else{
	// 		$("#asideMenu").show().addClass('animated bounceInRight');
	// 	}
	// 	return false;	
	// });	

	// Close opened element when body is clicked
	// $(document).mouseup(function(e){
 //    	var container = $(".aside-menu");

 //    	if(!container.is(e.target) && container.has(e.target).length === 0){
 //        	if(container.is(":visible")){
	// 			container.hide();
	// 			$("body").removeClass("nav-menu-in");
	// 		}
 //    	}
	// });

	// Calendar
	$("#filter_date_in, #filter_date_out").datepicker({
        dateFormat: 'MM dd, yy',
        minDate: 0,
        showOtherMonths: true
    });

    // Step process
    $("ol.progtrckr").each(function(){
        $(this).attr("data-progtrckr-steps", $(this).children("li").length);
    });

    // Optional filters
    $("#btnToggleOptionalFIlters").click(function(){
    	var animateIn = $(this).data("animate-in");
	    var animateOut = $(this).data("animate-out");

    	if($(this).hasClass("opened")){
    		$(".hidden-form-filters").addClass('hide');
    		$(this).removeClass("opened");
    	} else{
	    	$(this).addClass("opened");
	    	$(".hidden-form-filters").removeClass("hide");
	    }
	    return false;
    });

    // Layer Slider Dynamic- Set height to fit navbar
    if($(".layer-slider-dynamic").length > 0){
    	layerSliderDynamic();
    }

    // Layer Slider Fullsize
    if($(".layer-slider-fullsize").length > 0){
    	layerSliderFullsize();
    }

    // Window resize events
    $(window).resize(function() {
    	if($(".layer-slider-dynamic").length > 0){
	    	layerSliderDynamic();
	    }
		if($(".layer-slider-fullsize").length > 0){
	    	layerSliderFullsize();
	    }
	});
    
    // Functions
    function layerSliderDynamic(){
    	var windowHeight = $(window).height();
    	var headerHight = $("#divHeaderWrapper").height();
    	var newSliderHeight = windowHeight - headerHight;
    	$("#layerslider").css({"height": newSliderHeight + "px"});
    }
    function layerSliderFullsize(){
    	var windowHeight = $(window).height();
    	$("#layerslider").css({"height": windowHeight + "px"});
    }


    var screenRes = $(window).width(),
        screenHeight = $(window).height(),
        html = $('html');

    // IE<8 Warning
    if (html.hasClass("ie8")) {
        $("body").empty().html('Please, Update your Browser to at least IE9');
    }

    // Disable Empty Links
    $("[href=#]").click(function(event){
        event.preventDefault();
    });

    // Body Wrap
    $(".body-wrap").css("min-height", screenHeight);
    $(window).resize(function() {
        screenHeight = $(window).height();
        $(".body-wrap").css("min-height", screenHeight);
    });

    // styled Select, Radio, Checkbox
    if ($("select").hasClass("select_styled")) {
        cuSel({changedEl: ".select_styled", visRows: 8, scrollArrows: true});
    }

 //    // Rating Stars
 //    var star = $(".rating span.star");

 //    star.hover(
 //        function() {
 //            $(this).addClass("over");
 //            $(this).prevAll().addClass("over");
 //        }
 //        , function() {
 //            $(this).removeClass("over");
 //            $(this).prevAll().removeClass("over");
 //        }
 //    );
 //    star.click( function() {
 //        $(this).parent().children(".star").removeClass("voted");
 //        $(this).prevAll().addClass("voted");
 //        $(this).addClass("voted");
 //    });

 //    // Tooltip & Popover
 //    $('.ttip').tooltip({
 //    	placement: $(this).data('toggle'),
 //    	html: true
 //    });

 //    $('.pop').popover({
 //    	placement: 'right',
 //    	html: true
 //    });

 //    // Hover animations
 //    $('.hov').hoverup({
	// 	// You could set options in here too.
	// });



 
});