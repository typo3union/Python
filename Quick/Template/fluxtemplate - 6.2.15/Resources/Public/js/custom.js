// Menu Hover add hover class
$('.navbar-nav > li').hover(
    function() {
        $(this).addClass('hover')
    },
    function() {
        $(this).removeClass('hover')
    }
)

$(document).ready(function() {

  $('.fancybox').fancybox({
            autoDimensions: false,
            height: 300,
            width: 800,
            margin: [200,200,200,200],

  });

    $(".cbQuickGoogleMap").wrap("<div class='map_page'></div>");
    $('.dropdown-menu').each(function(){
        var result = $(this).find('.nav').height() + 60;
        $(this).find(".nav-bg img , #showfullimage").height(result);
    });
        
   
        var w = $(window).width();
        if (w > 1024) {
            $('p, li, span, h1, h2, h3, h4,h5,.thumb_detail,a').jfontsize({
                btnMinusClasseId: '#jfontsize-minus',       
                btnPlusClasseId: '#jfontsize-plus',
                btnMinusMaxHits: 1,
                btnPlusMaxHits: 2,
                sizeChange: 2
                });
                }
       
        else {
          if (w > 767) {
           $('li.font-resize').removeClass('dropdown');
           
            $('ul.nav').find('.dropdown').each(function(){
              var clicks = 0;
                $(this).find('a').click(function(event){
                  
                  if(clicks == 0){
                          $(this).parent().addClass('hover');
                          event.preventDefault();

                      }else{
                          $(this).parent().removeClass('hover');
                         
                      }
                           ++clicks;
               });

         });
          }
   }

     


    $('.logo_slider').slick({
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        centerMode: true,
        centerPadding: '0px',
        default: false,
        autoplay: true,
        slidesToShow: 3,
        slidesToScroll: 1,

        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
            }
        }, {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }]

    });

    $('.center').slick({
        centerMode: true,
        centerPadding: '400px',
        slidesToShow: 1,
        dots: true,
        responsive: [{
            breakpoint: 1334,
            settings: {
                centerMode: true,
                centerPadding: '140px',
                slidesToShow: 1
            }
        },{
            breakpoint: 768,
            settings: {
                arrows: true,
                dots:false,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 1
            }
        }, {
            breakpoint: 480,
            settings: {
                arrows: true,
                dots:false,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 1
            }
        }]
    });

    $('.btnPlay').click(function(){
        
        var video = $('.video').find('iframe').attr('src');
         var src = video + '?autoplay=1';
         $('.video').find('iframe').attr('src',src);
        $('.video-img').css('display','none'); 
        $('.control').css('display','none');
        $('.loch-camping').css('display','none'); 
        $('.loch-camping-details').css('display','none');  
        $('.video').css('display','block'); 
        onYouTubeIframeAPIReady();

    });

    $('.video-close').click(function(){
        
        $('.video-img').css('display','block'); 
        $('.control').css('display','block');
        $('.loch-camping').css('display','block'); 
        $('.loch-camping-details').css('display','block');  
        $('.video').css('display','none'); 

    });

});


function getVideoID(){
        var videoIframe =  $('.video').find('iframe');
       
        var videoURL = videoIframe.attr('src');
         if(videoURL){
            console.log(videoURL);
        var id = videoURL.split("/")[4].split("?")[0];
        videoIframe.after('<div id="player"></div>');
        videoIframe.remove();
        return (id);
        }
    }

    var player;
    function onYouTubeIframeAPIReady() {
        var height = $('.video').find('iframe').attr('height');
        var width = $('.video').find('iframe').attr('width');
       var videoID = getVideoID();
       player = new YT.Player('player', {
       height: height,
       width: width,
       videoId: videoID,
       events: {
          'onReady': onPlayerReady,
          'onStateChange': onPlayerStateChange
           }
        });

          function onPlayerReady(event) {
              event.target.playVideo();
          }

          function onPlayerStateChange(event) {
           var state = event.target.getPlayerState();
            if (state === 2) {
                //alert("Paused");
            }
             else if (state === 0) {
                var video = $('.video').find('iframe').attr('src');
                 var src = video + '?autoplay=0';
                 $('.video').find('iframe').attr('src',src);
               $('.video-img').css('display','block'); 
                $('.control').css('display','block'); 
                $('.loch-camping').css('display','block'); 
                $('.loch-camping-details').css('display','block');  
                $('.video').css('display','none'); 
             }
            }
          }


  jQuery('.magnificpopup').magnificPopup({
      type: 'image',
      tLoading: 'Loading image #%curr%...',
      closeOnContentClick: true,
      closeBtnInside: true,
      fixedContentPos: false,
      mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side 
        image: 
        {
        verticalFit: true
        },
        zoom: 
        {
            enabled: true, duration: 300 // don't foget to change the duration also in CSS 
        },
        gallery: 
        { 
        enabled: true, navigateByImgClick: true, preload: [0,1] // Will preload 0 - before current, and 1 after the current image 
        }, 
    });  
      $('.csc-textpic caption').each(function() {
          var a = $(this).text();
          $(this).closest(".magnificpopup").removeAttr("title");
          $(this).closest(".magnificpopup").attr("title", "+a+");
      });

