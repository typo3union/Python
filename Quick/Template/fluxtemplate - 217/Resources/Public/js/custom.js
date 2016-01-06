$(document).ready(function() {
var  c = $('.country_select').val();
var biggestHeight1;
var biggestHeight;

$(".kontakt-row").hide();
$("."+c).fadeIn();

$('.country_select').on('change', function() {
  var c =  this.value ;
	 $(".kontakt-row").hide();
     $("."+c).fadeIn();
});	

$(document).on('click','.dropdown',function(event){	
		var classCustom = $(this).attr("class");
		
        event.stopPropagation();
        if ($(window).width() < 767){
            $(this).parents(".dropdown").removeClass('open'); 
			$(".dropdown").each(function() {
				 var insideClass = $(this).attr("class");
				 if(insideClass != classCustom) {
				 	if($(this).hasClass('open')){
			     	
			     	$(this).removeClass('open');
			    }
			 }
			});
        }
        else {
       
        $(".dropdown").each(function() {
                $(this).removeClass('open');
        });
        }
        $(this).parents(".dropdown").addClass('open');
        $(this).toggleClass('open');
	});

$('.img-col,.level-03 a,.level-02 a').each(function(){
    var $this = $(this);
    var t = $this.text();
    $this.html(t.replace('&lt;','<').replace('&gt;', '/>'));
    $this.html(t); 
});

$('li.menu-large > a').each(function(){
   
    $(this).removeAttr('href');
});
	
$('.level-02 img').remove();

    $('.lang-menu ul li.active').prependTo($('.lang-menu ul'));
	$('.lang-menu ul li').not('.active').css('display','none');	
	$('.lang-menu ul li.active').click(function(){
		if($('.lang-menu ul li').not('.active').css('display') == 'none'){											
		$('.lang-menu ul li').each(function(){
										
			$(this).css('display','block');	
                    
                   
			});
                    }
                     else {
                        $('.lang-menu ul li').not('.active').css('display','none');	
                    }
		
		});
            
		$('.lang-menu ul li').not('.active').css('display','none');	   
	$('.social-icon p > *').unwrap();
	$('.social-icon br').remove(); 
	$('.carousel').carousel({
        interval: 5000 //changes the speed
    });
	
		
	 var biggestHeight = 0;  
	//check each of them  
	$('.colm3-box-text, .colm4-box-text, .colm4-box-btmtext, .height').each(function(){  
		if($(this).height() > biggestHeight){      
			biggestHeight = $(this).height(); 			  
			}
	});        
	$('.colm3-box-text, .colm4-box-text, .colm4-box-btmtext,.height').height(biggestHeight); 
	
	$('.colm4-box-toptext').each(function(){  
		if($(this).height() > biggestHeight){      
			biggestHeight1 = $(this).height(); 			  
		}  
	});        
	$('.colm4-box-toptext').height(biggestHeight1); 


	$("#cslide-slides").cslide();	
	$('.only-content .csc-default table').addClass('table date-table table-hover');
	$( ".only-content .csc-default table" ).wrap( "<div class='table-responsive'></div>" );
	
	$('.tx-indexedsearch table').addClass('table');
	$( ".tx-indexedsearch table" ).wrap( "<div class='table-responsive'></div>" );
	
	
	function centerModal() {
		$(this).css('display', 'block');
		var $dialog = $(this).find(".modal-dialog");
		var offset = ($(window).height() - $dialog.height()) / 2;
		// Center modal vertically in window
		$dialog.css("margin-top", offset);
		}
	
		$('.modal').on('show.bs.modal', centerModal);
		$(window).on("resize", function () {
			$('.modal:visible').each(centerModal);
		});
		
		 
		jQuery('.popup').magnificPopup({
          type: 'image',
          closeOnContentClick: true,
          closeBtnInside: true,
          fixedContentPos: false,
          mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
          image: {
            verticalFit: true
          },
          zoom: {
            enabled: true,
            duration: 300 // don't foget to change the duration also in CSS
          }
     });  
});

function checkEmail(){	
	
	var e = 'Dieses Feld muss ausgefüllt werden!';
	var e1 = 'Geben Sie bitte eine gültige E-Mail Adresse ein.';
	
    var  emailStr =  jQuery.trim(jQuery("#email").val());
    var regex = /^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i;
	if(emailStr == ""){
		jQuery('span.email_err').text(e).addClass('parsley-required');
						   return false;
	
	}else{
	 
     if( regex.test(emailStr) ){
     	 jQuery('span.email_err').text('');
		 return true;
 	 }
    else{
         jQuery('span.email_err').text(e1).addClass('parsley-required')
		 return false;
  		  }
		  
		  }
		  
	}

	
	
