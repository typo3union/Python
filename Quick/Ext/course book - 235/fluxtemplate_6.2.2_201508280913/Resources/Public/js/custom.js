$(function(){
	$("#btm_scroll").click(function() {
		$('html, body').animate({
			scrollTop: $(".right-bar .content").offset().top
		}, 2000);
	});
})

$(document).ready(function() {
	
	$( "div.breadcrum ul li:last-child" ).replaceWith("<li class='deactive'>"+$('div.breadcrum ul li:last-child').text()+"</li>");
	
	var p = $('#c41 .tx-course span.price').text();
	$('.tx-course .priceVal').val(p);
	
	var c = $('#powermail_fieldwrap_28 h2').text();
	$('.tx-course .coursePrice').val(c);
	
	
        $('.zoom-gallery').magnificPopup({
          delegate: 'a',
          type: 'image',
          closeOnContentClick: false,
          closeBtnInside: false,
          mainClass: 'mfp-with-zoom mfp-img-mobile',
          image: {
            verticalFit: true,
            titleSrc: function(item) {
              return item.el.attr('title');
            }
          },
          gallery: {
            enabled: true
          },
          zoom: {
            enabled: true,
            duration: 300, 
            opener: function(element) {
              return element.find('img');
            }
          }
          
        });
      });