
jQuery.noConflict();

jQuery(function() {
    jQuery({blurRadius: 0}).animate({blurRadius: 0}, {
        duration: 1000,
        easing: 'swing', // or "linear"
                         // use jQuery UI or Easing plugin for more options
        step: function() {
            console.log(this.blurRadius);
            jQuery('.top-main-image img').css({
                "-webkit-filter": "blur("+this.blurRadius+"px)",
				"-ms-filter": "blur("+this.blurRadius+"px)",
                "filter": "blur("+this.blurRadius+"px)"
            });
		   },
		   complete: function() {
				console.log('here');
				jQuery(".top-image-icon-section ul li").each(function(i) {
    			if(i == 0){
					jQuery(".top-image-icon-section ul li:first-child").hide();
					//	jQuery(this).delay(i * 1000).fadeIn();
				}else{
					jQuery(this).delay(i * 1000).fadeIn();	
				}
			});
        }
    });
});

	
jQuery(document).ready(function() {
 	  
	jQuery('.keybordkeyform').remove();
    
    jQuery('body,p, li, span, h1, h2, h3, h4, td,.left-head, .form-control,.termine-section .odd, .termine-section .even,.btn,.grid-description a,a').jfontsize({
    btnMinusMaxHits: 1,
    btnPlusMaxHits: 1,
    sizeChange: 1
    });
	
	jQuery('#c-button--slide-left').click(function() {
    jQuery('.menu-slide-left').toggleClass("pushSidebar");
	//jQuery("#c-button--slide-left").toggleClass("pushSidebar");
    });
	
	jQuery('#c-button--slide-left').click(function() {
    jQuery('.company-logo').toggleClass("pushlogo");
	//jQuery("#c-button--slide-left").toggleClass("pushSidebar");
    });
	
	jQuery('.c-button').click(function(){
		jQuery(".menu-slide").toggleClass('visible-menu');	
	});
	
	jQuery('button.t').click(function(){
		jQuery(".sub-icon-n-f").toggleClass('sub-icon-d1' );	
	});
	
	jQuery('button.t1').click(function(){
		jQuery(".sub-icon-n").toggleClass('sub-icon-d' );	
	});
	
	jQuery('button.t2').click(function(){
		jQuery(".sub-icon-n2").toggleClass('sub-icon-d2');	
	});
	

/*jQuery('.magnificpopup').click(function() {
	jQuery('body').bind('touchmove', function(e){e.preventDefault()});
});
*/



	/*jQuery('p').each(function() {
		var jQuerythis = jQuery(this);
		if(jQuerythis.html().replace(/\s|&nbsp;/g, '').length == 0)
		jQuerythis.remove();
	});*/

	/* jQuery('.c-button').click(function() {
   		jQuery('body').toggleClass('no-scroll');
	}); */

	
	jQuery('.slecter-redio-btn ul li input[type="radio"] + label').click(function(){
		jQuery( ".image-thumb" ).each(function( index ) {
		  jQuery(this).removeClass('selected');
		});
		var id = jQuery(this).prev().attr('id');
		jQuery('.'+id).addClass('selected');
	 });
	
	jQuery('.radio').click(function () {
		jQuery( ".image-thumb" ).each(function( index ) {
		  jQuery(this).removeClass('selected');
		});
		var id = jQuery(this).attr('id');
		jQuery('.'+id).addClass('selected');
		
	});
	
	var h = jQuery(window).height() - 68;
	jQuery(".top-main-image").height(h);

});



jQuery(document).ready(function () {

	var stickyOffset = jQuery('.topmenu').offset().top;

	jQuery(window).scroll(function(){
  		
  		var sticky = jQuery('.topmenu'),
		scroll = jQuery(window).scrollTop();
    
		if (scroll >= stickyOffset) sticky.addClass('fixed-header');
  		else sticky.removeClass('fixed-header');
	});
});


jQuery(window).scroll(function(){
    if (jQuery(window).scrollTop() >= 400) {
       jQuery('.side-icon-structure').addClass('fixed-side-bar');
    }
    else {
       jQuery('.side-icon-structure').removeClass('fixed-side-bar');
    }
});


/* scrollTop() >= 240
   Should be equal the the height of the header
 */
 

jQuery(document).ready(function () {
	jQuery('#horizontalTab').easyResponsiveTabs({
		type: 'default', //Types: default, vertical, accordion
		width: 'auto', //auto or any width like 600px
		fit: true,   // 100% fit in a container
		closed: 'accordion', // Start closed if in accordion view
		activate: function(event) { // Callback function if tab is switched
			var $tab = jQuery(this);
			var $info = jQuery('#tabInfo');
			$name.text($tab.text());
			$info.show();
		}
	});
	
	jQuery('#verticalTab').easyResponsiveTabs({
		type: 'vertical',
		width: 'auto',
		fit: true
	});
	
});

jQuery(window).load(function(){
	jQuery('.flexslider').flexslider({
		animation: "slide",
		animationLoop: true,
		itemMargin: 1,
		pausePlay: true,
		start: function(slider){
			jQuery('body').removeClass('loading');
		}
	});

	/*
	jQuery('.flexslider').flexslider({
		after: function(slider){
    		currHeight = $('.slides > li').eq(slider.currentSlide).outerHeight(true);
    		jQuery('.flexslider').height(currHeight);
  		}
	});
	*/

});


jQuery(document).ready(function() {
	jQuery('.toBottom').click(function(){
		jQuery('html,body').animate({scrollTop: jQuery(document).height()}, 600);
		return false;
	});
});

jQuery(function(){
	jQuery("#btm_scroll").click(function() {
		jQuery('html, body').animate({
			scrollTop: (jQuery(".white-section.clearfix").offset().top-80)
		}, 2000);
	});
})