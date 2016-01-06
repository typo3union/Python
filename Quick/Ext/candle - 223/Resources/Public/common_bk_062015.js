$(function () {
	
	$('.mfp-hide').removeClass('.mfp-hide');		
	$('.listView').on('click', function () {	
	
		$(".BurnImage .checkBurn").val('0');
		$('.err_name').text('');
		$('.err_candle_for').text('');
		$('.err_message').text('');	
		
		
		var model = $($(this).find(".triggerbtn").children()[0]).attr('data-modal');
				 
		$.magnificPopup.open({
		  type: 'inline',
		  preloader: false,         
		  modal: true,
		  items: {
			 src: '#'+model, 
			 type: 'inline'
		  },  
		});
	});
	
	$(document).on('click', '.md-close', function (e) {	
		e.preventDefault();
		$.magnificPopup.close();
	});	
	
	$('.pop-upDetail img.notBurn').on('click', function () {	
           
		var burnImage = $(".BurnImage img").attr('src');
                 var name1= $('.registrationForm #name').val();
                var candle_for1= $('.registrationForm #candle_for').val();
                
                if(name1!='' && candle_for1!=''){
                    $(this).attr('src',burnImage);
		//$(".mfp-content .lightCandle").fadeOut();
		//$(".mfp-content .lightCandle").removeClass('red');
		$(".BurnImage .checkBurn").val(1);
                }
                else{
                    if(name1==''){
			$('.err_name').text('Pflichtfeld');
		}else{
			$('.err_name').fadeOut();
		}
                if(candle_for1==''){
			$('.err_candle_for').text('Pflichtfeld');
		}else{
			$('.err_candle_for').fadeOut();
		}
                }
                
		
	});
        
         jQuery(".popup").magnificPopup({
            type: "image",
            tLoading: "Loading image #%curr%...",
            closeOnContentClick: true,
            closeBtnInside: true,
            fixedContentPos: false,
            mainClass: "mfp-no-margins mfp-with-zoom",
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
                preload: [ 0, 1 ]
        }
    });
	
	$('.candle_submit').on('click', function () {	
		var name= $('.registrationForm #name').val();
		var candle_for= $('.registrationForm #candle_for').val();
		var message= $('.registrationForm #message').val();
		var checkBurn= $(".BurnImage .checkBurn").val();
			
		if(name==''){
			$('.err_name').text('Pflichtfeld');
		}else{
			$('.err_name').fadeOut();
		}
		
		if(candle_for==''){
			$('.err_candle_for').text('Pflichtfeld');
		}else{
			$('.err_candle_for').fadeOut();
		}
		
		if(message==''){
			$('.err_message').text('Pflichtfeld');
		}else{
			$('.err_message').fadeOut();
		}
		
		
		if(checkBurn =='0'){
			//$(".mfp-content .lightCandle").addClass('red');
			$(".mfp-content .lightCandle").text('Um die Kerze anzuzünden, klicken Sie auf den Docht.');
		}else{
			//$(".mfp-content .lightCandle").removeClass('red');
			$(".mfp-content .lightCandle").fadeOut();
		}
		
		//if(name!='' && candle_for!='' && message!='' && checkBurn==1){
		if(name!='' && candle_for!='' && checkBurn==1){
			return true;
		}else{
			return false;
		}		
	});
	
	

});





