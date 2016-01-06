

$(document).ready(function() {  	
	var _currentURL = window.location; // Current URL Path	
	$('.ajax_load_img').hide();			

	$('#companyStatement').on('change',function(){	
			
		var _sort = $('#companyStatement').val();		
		$('.ajax_load_img').show();	
		$('.companySatementList').addClass('ajax_load_div');				
							
		$.ajax({
			url: _currentURL,
			data: '&type=1234567890&sort='+_sort,
			cache:false,
			success: function(result) {
				$('.ajax_load_img').hide();	
				$('.companySatementList').removeClass('ajax_load_div');				
				$('.companySatementList').html($(result).find('.companySatementList').html());				
			},
			error: function(result) {
				consol.log('Error');
			}
		});
		return false;
	});
	
	$('#companyList').on('change',function(){
		$('.ajax_load_img').show();	
		$('.filterwrap').addClass('ajax_load_div');		
		
		var _sort = $('#companyList').val();				
		
		$.ajax({
			url: _currentURL,
			data: '&type=1234567890&sort='+_sort,
			cache:false,
			success: function(result) {	
				$('.ajax_load_img').hide();
				$('.filterwrap').removeClass('ajax_load_div');
					
				$('.filterglry').html($(result).find('.filterglry').html());
				$('.filterglry li').css('display','inline-block');
			},
			error: function(result) {
				consol.log('Error');
			}
		});
		return false;
	});
	
	$('#allCompanyList').on('change',function(){
		$('.ajax_load_img').show();	
		$('.filtertableSection').addClass('ajax_load_div');		
		
		var _sort = $('#allCompanyList').val();				
		
		$.ajax({
			url: _currentURL,
			data: '&type=1234567890&sort='+_sort,
			cache:false,
			success: function(result) {	
				$('.ajax_load_img').hide();
				$('.filtertableSection').removeClass('ajax_load_div');
					
				$('.cd-gallery').html($(result).find('.cd-gallery').html());
				$('.filterglry li').css('display','inline-block');
			},
			error: function(result) {
				consol.log('Error');
			}
		});
		return false;
	});
	
	
});

 $(function () {		
	$('.popup-modal').on('click', function () {
		
	 var model = $(this).attr("data-modal");		 
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
	
	if (navigator.userAgent.indexOf('Safari') == 91 ) {
	   $(".uploadVideo").remove();
	   var vedioclassmp4 = $(".vedioclassmp4").html();
	   
	   if(vedioclassmp4 == "vedioclassmp4"){
	   
		$(".video").remove();
	   }
	}
	
	$('.tableSectionDetail .cd-filters li').on('click', function () {
		$('.alfafilter a').removeClass('active');
		var _currentURL = window.location;
		var _stateId = $(this).attr("data-filter");	
		//$('#historicalList124 tr').addClass('hidden');
		//$('#historicalList124 tr'+model).removeClass('hidden');
		$('.ajax_load_img').show();	
		$('.filtertableSection').addClass('ajax_load_div');		
		
		
		$.ajax({
			url: _currentURL,
			data: '&type=1234567890&stateId='+_stateId,
			cache:false,
			success: function(result) {	
				$('.ajax_load_img').hide();
				$('.filtertableSection').removeClass('ajax_load_div');
					
				$('.cd-gallery').html($(result).find('.cd-gallery').html());
				$('.filterglry li').css('display','inline-block');
			},
			error: function(result) {
				consol.log('Error');
			}
		});
		return false;
			
	});
	$('.alfafilter li a').on('click', function () {
		
		$('.alfafilter li a').removeClass('active');
		$('.cd-filters a').removeClass('selected');	
		$('.filtertableSection .cd-filters li a').removeClass('active');	
		$(this).addClass('active');
		
		
		var _currentURL = window.location;
		var _alpha = $(this).attr("data-filter");	
		//$('#historicalList124 tr').addClass('hidden');
		//$('#historicalList124 tr'+model).removeClass('hidden');
		$('.ajax_load_img').show();	
		$('.filtertableSection').addClass('ajax_load_div');		
		
		$.ajax({
			url: _currentURL,
			data: '&type=1234567890&alpha='+_alpha,
			cache:false,
			success: function(result) {	
				$('.ajax_load_img').hide();
				$('.filtertableSection').removeClass('ajax_load_div');
					
				$('.cd-gallery').html($(result).find('.cd-gallery').html());
				$('.filterglry li').css('display','inline-block');
			},
			error: function(result) {
				consol.log('Error');
			}
		});
		return false;
	});
	
	$('#search_submit').on('click', function () {
		$('#historicalList_filter').toggle( "drop" );
	});
	
});


function socialsharing_twitter_click(message)
{
	if (typeof message === 'undefined')
		message = encodeURIComponent(location.href);
		window.open('https://twitter.com/intent/tweet?text=' + message , 'sharertwt', 'toolbar=0,status=0,width=640,height=445');
	}

function socialsharing_facebook_click(message)
{
	window.open('https://www.facebook.com/sharer.php?u=' + encodeURIComponent(location.href)+'&v=1', 'sharer', 'toolbar=0,status=0,width=660,height=445');
}

function socialsharing_google_click(message)
{
	window.open('https://plus.google.com/share?url=' + encodeURIComponent(location.href) + '&data-prefilltext=hfghfdjgh', 'sharergplus', 'toolbar=0,status=0,width=660,height=445');
}

