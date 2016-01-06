// JavaScript Document
$('.bxslider').bxSlider({
  mode: 'horizontal',
  captions: true,
  auto: true,
  pause: 3000,
});

$('.bxslidersub').bxSlider({
  mode: 'horizontal',
  captions: true,
  auto: true,
  pause: 3000,
});

 $(window).load(function() {
  // The slider being synced must be initialized first
  $('#carousel').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    itemWidth: 153,
	minItems:6,
    itemMargin:2,
    asNavFor: '#slider',
	direction: "vertical",
  });
   
  $('#slider').flexslider({
    animation: "fade",
    animationSpeed: 1000,
    direction: "vertical",
    slideshowSpeed: 2000,
    pauseOnHover: true, 
    slideshow: true,
    sync: "#carousel",	
  });
});
  
  
  $(window).scroll(function() {
		$('#animatedElement').each(function(){
		var imagePos = $(this).offset().top;

		var topOfWindow = $(window).scrollTop();
			if (imagePos < topOfWindow+400) {
				$(this).addClass("slideUp");
			}
		});
	});
	
$(window).load(function(){
jQuery(document).ready(function ($) {

    $('[data-popup-target]').click(function () {
        $('html').addClass('overlay');
        var activePopup = $(this).attr('data-popup-target');
        $(activePopup).addClass('visible');

    });

    $(document).keyup(function (e) {
        if (e.keyCode == 27 && $('html').hasClass('overlay')) {
            clearPopup();
        }
    });

    $('.popup-exit').click(function () {
        clearPopup();

    });

    $('.popup-overlay').click(function () {
        clearPopup();
    });

    function clearPopup() {
        $('.popup.visible').addClass('transitioning').removeClass('visible');
        $('html').removeClass('overlay');

        setTimeout(function () {
            $('.popup').removeClass('transitioning');
        }, 200);
    }

});
});

jQuery(document).ready(function() {
  $('#gallery-2').royalSlider({
    fullscreen: {
      enabled: true,
      nativeFS: true
    },
    controlNavigation: 'thumbnails',
    thumbs: {
      orientation: 'vertical',
      paddingBottom:0,
      appendSpan: true
    },
    transitionType:'fade',
    //autoScaleSlider: false, 
    //autoScaleSliderWidth: 960,     
    //autoScaleSliderHeight: 600,
    loop: true,
    arrowsNav: true,
    keyboardNavEnabled: true

  });
});
