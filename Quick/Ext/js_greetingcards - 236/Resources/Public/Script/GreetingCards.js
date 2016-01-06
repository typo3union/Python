/*
 *  (c) 2015 Jainish Senjaliya <jainish.online@gmail.com>
 *  All rights reserved 
*/

jQuery(document).ready(function() {
	
	jQuery('.validationMessage').hide();
	
	jQuery('#greetingStep1').submit(function(event){
		
		var checked = 0;
		
		if (jQuery('.radio:checked').length > 0) {
	    	var checked = 1;
		}
		
		if(checked == 1) { 
			jQuery(".formLoading").css("display","block");
		
		}else {
			jQuery('.validationMessage').show();
			return false;
		}


	});
	
	
	jQuery('#greetingStep2').submit(function(event){
		
		var cValids = 0;
 			
		jQuery("#greetingStep2 .validate").removeClass("error");
		
		jQuery("#greetingStep2 .validate").each(function(){
			if(jQuery(this).val()==''){
				jQuery(jQuery(this)).addClass("error");
				cValids = 1;
			} 
		});
		
		
		if(cValids == 0) { 
			jQuery(".formLoading").css("display","block");
		
		}else {
			jQuery('.validationMessage').show();
			return false;
		}

	});
	
});


var info;
jQuery(document).ready(function(){
	//keine Meldung direkt beim Feld
	
	var options2 = {
		'maxCharacterSize': 500,
		'originalStyle': 'originalTextareaInfo',
		'warningStyle' : 'warningTextareaInfo',
		'warningNumber': 40,
		'displayFormat' : '#input/#max Zeichen'
	//'displayFormat' : '#input/#max | #words words'
	};
	
	jQuery('#textarea').textareaCount(options2);
});