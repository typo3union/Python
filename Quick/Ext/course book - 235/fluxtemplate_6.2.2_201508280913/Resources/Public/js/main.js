   var w = $(window).width();
 
 
 if (w <= 768) {
     $('.left-bar').removeClass('left-large');
         $('.navbar-collapse').removeClass('in');
 }else{
     setTimeout(function() {

    try{
     if ($(".left-bar").is(':hover')) {

     } else {
        
         $('.left-bar').removeClass('left-large');
         $('.navbar-collapse').removeClass('in');
         
     }
 }
 catch(e){
     
         $('.left-bar').removeClass('left-large');
         $('.navbar-collapse').removeClass('in');
        
 }
  }, 1000);
 }



 $(document).ready(function() {
   
   $('.tx-powermail').find('form :input[type=text], textarea').val('');
    
    
     var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ? true : false;

     $(window).resize(function() {
         var w = $(window).width();
         if (!isMobile) {
             if (w <= 768) {
                 window.location.href = window.location.href;
             }
         }
     });
 });

 $(document).ready(function() {

     if ($('.alert').hasClass('alert-success')) {
         $('#email').focus();
     }

     $('#email-form').validate();


     $('.contenttable').each(function() {
         $(this).addClass('table table-striped');
         $(this).parent().addClass('calender');
         $(this).find('tr').addClass('text-uppercase');
         $(this).wrap('<div class="table-responsive"></div>');
     });


     $(".box").hide();
     $(".box-not").hide();

     $("#back-top").hide();
     $(window).scroll(function() {
         
////         if($('.left-bar').hasClass('left-large')){
////             $('.left-bar').css('position','absolute'); 
////         }
//         else {
//         
         if ($(this).scrollTop() > 100) {
             $('#back-top').fadeIn();
             //$('.left-bar').css('position','fixed'); 
        } else {
             $('#back-top').fadeOut();
            // $('.left-bar').css('position','absolute'); 
             
        // }
     }
     });
     
    
 $('.btn-menu').click(function () {

       $('body,html').animate({
           scrollTop: 0
       }, 800);

       if ($('#back-top').css('display') == 'block') {
           setTimeout(function () {

               $('.left-bar').addClass('left-large');
               $('.navbar-collapse').addClass('in');

           }, 1500);
           return false;
       }


   });
     
     $('#back-top ').click(function() {
         $('body,html').animate({
             scrollTop: 0
         }, 800);
         return false;
     });


     
   $(window).scroll(function() {
         
          var w = $(window).width();

       if (w <= 768) {
            $('.left-bar').css('position','absolute'); 
           }
          else{
              if($('.left-bar').hasClass('left-large')){
             $('.left-bar').css('position','absolute'); 
         }
          else {
         
         if ($(this).scrollTop() > 20) {
             //$('#back-top').fadeIn();
             $('.left-bar').css('position','fixed'); 
         } else {
              //$('#back-top').fadeOut();
             $('.left-bar').css('position','absolute'); 
             
         }
      }
          }
       }); 



     $(window).resize(function() {
         var w = $(window).width();

         if (w >= 768) {

             $('.navbar-nav li a').hover(function() {

                 $(this).stop().animate({
                     paddingLeft: '30px'
                 }, 9000, 'easeOutCirc');
             }, function() {
                 $(this).stop().animate({
                     paddingLeft: '20px'
                 }, 9000, 'easeOutBounce');
             });
             
             
             
         } else {

             $('.navbar-nav li a').hover(function() {

                 $(this).stop().animate({
                     paddingLeft: '20px'
                 }, 9000, 'easeOutCirc');
             }, function() {
                 $(this).stop().animate({
                     paddingLeft: '20px'
                 }, 9000, 'easeOutBounce');
             });
         }
     });

     var w1 = $(window).width();
     if (w1 >= 768) {
         $('.navbar-nav li a').hover(function() {
             $(this).stop().animate({
                 paddingLeft: '35px'
             }, 300, 'easeOutCirc');
         }, function() {
             $(this).stop().animate({
                 paddingLeft: '20px'
             }, 300, 'easeOutBounce');
         });
     } else {
         $('.navbar-nav li a').hover(function() {

             $(this).stop().animate({
                 paddingLeft: '15px'
             }, 500, 'easeOutCirc');
         }, function() {
             $(this).stop().animate({
                 paddingLeft: '15px'
             }, 500, 'easeOutBounce');
         });
     }



     $('#powermail_fieldwrap_8,#powermail_fieldwrap_35,#powermail_fieldwrap_44').find('.fa-user').removeClass('fa-user').addClass('fa-user-plus');
     $('#powermail_fieldwrap_9,#powermail_fieldwrap_34,#powermail_fieldwrap_45').find('.fa-user').removeClass('fa-user').addClass('fa-envelope-o');
     $('#powermail_fieldwrap_10,#powermail_fieldwrap_33,#powermail_fieldwrap_46').find('.fa-user').removeClass('fa-user').addClass('fa-phone');
	 $('#powermail_fieldwrap_50').find('.fa-user').removeClass('fa-user').addClass('fa-euro');
	 $('#powermail_fieldwrap_47').find('.fa-user').removeClass('fa-user').addClass('fa-boat');
	
	 
	 
	 $('#powermail_field_course').attr('data-parsley-group','block1');
	 $('#powermail_field_preis').attr('data-parsley-group','block2');
		 
	$("#powermail_field_course option:first").val("");
	 
	$("#body_id_40 .content .tx-powermail").addClass("content-center").addClass("clearfix");
     $(".carousel  .item  .kursListTermine .action.lastMin").each(function() {
         $(this).prev().addClass('deleted-price');
     });

     $(".gallery-top .gallery-hover br").remove();
 

     $('ul.thirdLevel').each(function() {
         if (!$(this).has("li").length) {
             $(this).remove();
         }
     });

     $('ul.secondLevel').each(function() {
         if (!$(this).has("li").length) {
             $(this).remove();
         }
     });


     if ($(".hidediv-inner .tx-powermail .powermail_create").length > 0) {
         $('.box.box-req').fadeIn();
     }

     var w1 = $(window).width();

     if (w1 >= 768) {
         $('.box-column').each(function() {
             var len = $(this).find('.col-lg-4').length;
             if (len == 2) {
                 $(this).addClass('two-box');
             }

         });
     }

     $(window).resize(function() {
         var w1 = $(window).width();
         if (w1 >= 768) {
             $('.box-column').each(function() {
                 var len = $(this).find('.col-lg-4').length;
                 if (len == 2) {
                     $(this).addClass('two-box');
                 }

             });
         }
     });

     var getdate = $('.getDate').text();

     $('#powermail_fieldwrap_41 input').val(getdate);

     if (w1 >= 768) {

         $('.nav > li').each(function() {

             if ($(this).has('ul').length > 0) {

                 $(this).find('a:first').prepend('<span class="main-aerow-wrap" d-title="Zum Öffnen klicken"><span class="pull-right main-aerow"></span></span>');
             }
         });
         $('.nav li li').each(function() {
             if ($(this).has('ul').length > 0) {
                 $(this).find('a:first').prepend('<span class="main-aerow-wrap" d-title="Zum Öffnen klicken"><span class="pull-right main-aerow"></span></span>');
             }
         });


         $('.nav .main-aerow-wrap').click(function() {

             $('ul.thirdLevel').hide();

             if ($(this).parent().parent().find('ul').hasClass('secondLevel')) {
                 $('ul.secondLevel').hide();
                 $(this).parent().parent().find('ul.secondLevel').effect("bounce", {
                     direction: 'right',
                     times: 4,
                     distance: 12
                 }, 500);
             } else if ($(this).parent().parent().find('ul').hasClass('thirdLevel')) {
                 $(this).parent().parent().find('ul.thirdLevel').effect("bounce", {
                     direction: 'right',
                     times: 4,
                     distance: 12
                 }, 500);
             }


             return false;

         });

         $('html').click(function() {
             $('ul.secondLevel').hide();
             $('ul.thirdLevel').hide();
         });

         $('.nav').click(function(event) {
             event.stopPropagation();
         });
     }

     $('#myCarousel_date .carousel-inner .item').each(function() {
         var a = $(this).text();
         if (a.length == 67) {
             $(this).remove();
         }
     });

     $('.stage .carousel').each(function() {
         if (!$(this).has("div").length) {
             $(this).remove();
         }
     });


     if ($('.noLastMin').length) {
         $('.stage .hder').remove();
     }


 });

 function getParameterByName(name) {
     name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
     var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
         results = regex.exec(location.search);
     return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
 }

$('.header, .container').click(function(){
     $('.fix').removeClass('toggle-fix-serach');
});


 $(".con").click(function() {
     $('.fix').addClass('toggle-fix-serach');
     $(".box-con").toggle("slow"); /* show div*/
     $(".box-add , .box-req , .box-not").hide(500); /* hide remaining div*/
     $(".con").addClass("active"); /* add active class*/
     $(".add , .req , .not").removeClass("active"); /* remove remainig class from other*/
 });
 $(".add").click(function() {
     $('.fix').addClass('toggle-fix-serach');
     $(".box-add").toggle("slow");
     $(".box-con , .box-req , .box-not").hide(500);
     $(".add").addClass("active");
     $(".con , .req , .not").removeClass("active");
 });
 $(".req").click(function() {
     $('.fix').addClass('toggle-fix-serach');
     $(".box-req").toggle("slow");
     $(".box-add , .box-con , .box-not").hide(500);
     $(".req").addClass("active");
     $(".add , .con , .not").removeClass("active");
 });
 $(".not").click(function() {
     $('.fix').addClass('toggle-fix-serach');
     $(".box-not").toggle("slow");
     $(".box-add , .box-req , .box-con").hide(500);
     $(".not").addClass("active");
     $(".add , .req , .con").removeClass("active");

 });
 
 
 
 