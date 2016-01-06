

(function( $ ) {

    //Function to animate slider captions 
    function doAnimations( elems ) {
        //Cache the animationend event in a variable
        var animEndEv = 'webkitAnimationEnd animationend';
        
        elems.each(function () {
            var $this = $(this),
                $animationType = $this.data('animation');
        // requires you add [data-delay] & [data-dur] in markup. values are in ms
        $animDur = parseInt($this.data('dur'));
        $animDelay = parseInt($this.data('delay'));
        
            $this.css({"animation-duration": $animDur + "ms", "animation-delay": $animDelay + "ms", "animation-fill-mode": "both"}).addClass($animationType).one(animEndEv, function () {
                $this.removeClass($animationType);
            });
        });
    }
    
    //Variables on page load 
    var $myCarousel = $('#carousel-example-generic'),
        $firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animation ^= 'animated']");
        
    //Initialize carousel 
    $myCarousel.carousel();
    
    //Animate captions in first slide on page load 
    doAnimations($firstAnimatingElems);
    
    //Pause carousel  
    $myCarousel.carousel('pause');
    
    
    //Other slides to be animated on carousel slide event 
    $myCarousel.on('slide.bs.carousel', function (e) {
        var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
        doAnimations($animatingElems);
    });  
    
})(jQuery);

        // ===================================
        wow = new WOW( {
            boxClass:     'wow',
            animateClass: 'animated',
            offset:       100
            }
        );
        wow.init();
        
        //Added to remove animation in mobile view
        if($(window).width() < 1024){
            $('.wow').removeClass('wow');
        }    

$(document).ready(function() {

      $(window).scroll(function() {
          if ($(this).scrollTop() > 1){  
              $('header').addClass("sticky");
          }
          else{
              $('header').removeClass("sticky");
          }
      });


      $("#owl-example").owlCarousel({
 
            // Most important owl features
            items : 4,
            itemsCustom : false,
            itemsDesktop : [1199,4],
            itemsDesktopSmall : [980,2],
            itemsTablet: [768,2],
            itemsTabletSmall: false,
            itemsMobile : [600,1],
            singleItem : false,
            itemsScaleUp : false,
         
            //Basic Speeds
            slideSpeed : 200,
            paginationSpeed : 800,
            rewindSpeed : 1000,
         
            //Autoplay
            autoPlay : true,
            stopOnHover : false,
            
            //navigation
            navigation : true,
            navigationText : ["prev","next"],
            rewindNav : true,
            scrollPerPage : false,

            //Pagination
            pagination : false,
            paginationNumbers: false,
            
            stopOnHover: true,
    });

      $("#owl-video").owlCarousel({
 
            // Most important owl features
            items : 4,
            itemsCustom : false,
            itemsDesktop : [1199,4],
            itemsDesktopSmall : [980,2],
            itemsTablet: [768,2],
            itemsTabletSmall: false,
            itemsMobile : [600,1],
            singleItem : false,
            itemsScaleUp : false,
         
            //Basic Speeds
            slideSpeed : 200,
            paginationSpeed : 800,
            rewindSpeed : 1000,
         
            //Autoplay
            autoPlay : true,
            stopOnHover : false,
            
            //navigation
            navigation : true,
            navigationText : ["prev","next"],
            rewindNav : true,
            scrollPerPage : false,

            //Pagination
            pagination : false,
            paginationNumbers: false,
    });

   


});
// Resize Carousel Slider's text according to device
    $(document).ready(function() {
        var resizeText = function (obj) {
            if($(window).width() < 1800){
                // Standard height, for which the body font size is correct
                var preferredFontSize = 100; //$(obj).css('font-size').replace('px',''); // %
                var preferredSize = 240*320//320*480; //1024 * 768;

                var currentSize = $('#carousel-example-generic').width() * $('#carousel-example-generic').height();
                var scalePercentage = Math.sqrt(currentSize) / Math.sqrt(preferredSize);
                var newFontSize = preferredFontSize * scalePercentage;
                $(obj).css("font-size", newFontSize + '%');
            }
        };

        $(window).bind('resize', function() {
            resizeText('.carousel-caption h1');
            resizeText('.carousel-caption h3');
            
        }).trigger('resize');
});   
// set maximum height of Div
$(document).ready(function(){  
        //set the starting bigestHeight variable  
        var biggestHeight = 0;  
        //check each of them  
        $('.height, .l-r-height').each(function(){  
            //if the height of the current element is  
            //bigger then the current biggestHeight value  
            if($(this).height() > biggestHeight){  
                //update the biggestHeight with the  
                //height of the current elements  
                biggestHeight = $(this).height();  
            }  
        });  
        //when checking for biggestHeight is done set that  
        //height to all the elements  
        $('.height, .l-r-height').height(biggestHeight);  
      
});  

/*
$(document).ready(function(){

    $(".backstretch img").each(function(){
        imageHeight = $(this).height();
        imageWidth = $(this).width();
        wrapperHeight = jQuery(window).height();
        wrapperwidth = jQuery(window).width();
        overlap = parseInt((wrapperHeight - imageHeight) / 2);
        overlapwidth = parseInt((wrapperwidth - imageWidth) / 2);
        
        
        var aj_height = parseInt(wrapperwidth / 1.9 );
        var aj_width = parseInt(wrapperHeight * 1.9 );
        if( aj_height >= wrapperHeight ){
            var top_position = parseInt((wrapperHeight - aj_height) / 2 ); 
            var left_position = 0;
            $(this).parent().css({'width':wrapperwidth,'height':wrapperHeight,'left': '0px', 'top': '0px', 'overflow': 'hidden', 'margin': '0px', 'padding': '0px','position': 'fixed'});
            $(this).css({'width':wrapperwidth,'height':aj_height,'left': left_position, 'top': top_position, 'overflow': 'hidden', 'margin': '0px', 'padding': '0px','max-width':'none','position':'absolute'});
            //if(top_position >= 0){
            //  var top_position = 0;
            //  container.find('img').parent().css({'width':wrapperwidth,'height':wrapperHeight,'left': '0px', 'top': '0px', 'overflow': 'hidden', 'margin': '0px', 'padding': '0px'});
            //  container.find('img').css({'width':aj_width,'height':wrapperHeight,'left': left_position, 'top': top_position, 'overflow': 'hidden', 'margin': '0px', 'padding': '0px'});
            //}
            
            
        }
        else{
            var left_position = parseInt((wrapperwidth - aj_width) / 2 ); 
            var top_position = 0;
            $(this).parent().css({'width':wrapperwidth,'height':wrapperHeight,'left': '0px', 'top': '0px', 'overflow': 'hidden', 'margin': '0px', 'padding': '0px','position': 'fixed'});
            $(this).css({'width':aj_width,'height':wrapperHeight,'left': left_position, 'top': top_position, 'overflow': 'hidden', 'margin': '0px', 'padding': '0px','max-width':'none','position':'absolute'});
            if(left_position >= 0){
                //var top_position = parseInt((wrapperHeight - aj_height) / 2 ); 
                var left_position = 0;
                $(this).parent().css({'width':wrapperwidth,'height':wrapperHeight,'left': '0px', 'top': '0px', 'overflow': 'hidden', 'margin': '0px', 'padding': '0px','position': 'fixed'});
                $(this).css({'width':wrapperwidth,'height':aj_height,'left': left_position, 'top': top_position, 'overflow': 'hidden', 'margin': '0px', 'padding': '0px','max-width':'none','position':'absolute'});
            }
            
            
        }
    
    });
    
    
    $( window ).resize(function() {
        $(".backstretch img").each(function(){
        imageHeight = $(this).height();
        imageWidth = $(this).width();
        wrapperHeight = jQuery(window).height();
        wrapperwidth = jQuery(window).width();
        overlap = parseInt((wrapperHeight - imageHeight) / 2);
        overlapwidth = parseInt((wrapperwidth - imageWidth) / 2);
        
        
        var aj_height = parseInt(wrapperwidth / 1.9 );
        var aj_width = parseInt(wrapperHeight * 1.9 );
        if( aj_height >= wrapperHeight ){
            var top_position = parseInt((wrapperHeight - aj_height) / 2 ); 
            var left_position = 0;
            $(this).parent().css({'width':wrapperwidth,'height':wrapperHeight,'left': '0px', 'top': '0px', 'overflow': 'hidden', 'margin': '0px', 'padding': '0px','position': 'fixed'});
            $(this).css({'width':wrapperwidth,'height':aj_height,'left': left_position, 'top': top_position, 'overflow': 'hidden', 'margin': '0px', 'padding': '0px','max-width':'none','position':'absolute'});
            //if(top_position >= 0){
            //  var top_position = 0;
            //  container.find('img').parent().css({'width':wrapperwidth,'height':wrapperHeight,'left': '0px', 'top': '0px', 'overflow': 'hidden', 'margin': '0px', 'padding': '0px'});
            //  container.find('img').css({'width':aj_width,'height':wrapperHeight,'left': left_position, 'top': top_position, 'overflow': 'hidden', 'margin': '0px', 'padding': '0px'});
            //}
            
            
        }
        else{
            var left_position = parseInt((wrapperwidth - aj_width) / 2 ); 
            var top_position = 0;
            $(this).parent().css({'width':wrapperwidth,'height':wrapperHeight,'left': '0px', 'top': '0px', 'overflow': 'hidden', 'margin': '0px', 'padding': '0px','position': 'fixed'});
            $(this).css({'width':aj_width,'height':wrapperHeight,'left': left_position, 'top': top_position, 'overflow': 'hidden', 'margin': '0px', 'padding': '0px','max-width':'none','position':'absolute'});
            if(left_position >= 0){
                //var top_position = parseInt((wrapperHeight - aj_height) / 2 ); 
                var left_position = 0;
                $(this).parent().css({'width':wrapperwidth,'height':wrapperHeight,'left': '0px', 'top': '0px', 'overflow': 'hidden', 'margin': '0px', 'padding': '0px','position': 'fixed'});
                $(this).css({'width':wrapperwidth,'height':aj_height,'left': left_position, 'top': top_position, 'overflow': 'hidden', 'margin': '0px', 'padding': '0px','max-width':'none','position':'absolute'});
            }
            
            
        }
    
    });
    
        
        //$(this).css({'width':wrapperwidth,'height':wrapperHeight,'left': '0px', 'top': '0px', 'overflow': 'hidden', 'margin': '0px', 'padding': '0px'});
    });
    

});
*/