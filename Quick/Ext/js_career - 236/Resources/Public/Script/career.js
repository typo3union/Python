/*
 *  (c) 2015 Jainish Senjaliya <jainish.online@gmail.com>
 *  All rights reserved 
*/

jQuery(document).ready(function() {

jQuery('#searchJob #klinik_select').change(function(){
    jQuery(".career-search .submit-icon").click();
});


var activeClinik = 	jQuery('.activeClinik').text();

if(activeClinik){
	jQuery("#klinik_select").val(activeClinik);		
}
	if(!jQuery('li.current').length > 0){
		jQuery('.pagination-section').remove();
	}
	
	function checkValidEmail(field) {
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if (!filter.test(field.val())) {
			return false;
		}
		return true;
	}
	
	function validatePhone(field) {
		   
	    var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
	    
	    if (!filter.test(field.val())) {
	        return false;
	    }
	    return true;
	}

	function len(value) {
		return value.val().length;
	}
	
	function trim(field){
		return jQuery.trim(field.val());	
	}
	
	jQuery('#jobApplication').submit(function(event){
		
		var cValids = 0;
 			
		jQuery("#jobApplication .validate").removeClass("error");
		
		jQuery("#jobApplication .validate").each(function(){
			if(jQuery(this).val()==''){
				jQuery(jQuery(this)).addClass("error");
				jQuery(this).next().html(jQuery(this).attr('mendatory_message'));
				jQuery(this).next().addClass("validateMessage");
				cValids = 1;
			} 
		});
		
		if(jQuery('#email.validate').length > 0){
			
			var email		= jQuery('#email');
			if(email.val()!=""){
				if(!checkValidEmail(email)) {
					email.next().html(email.attr('valid_message'));
					email.next().addClass("validateMessage");
					jQuery('#email').val("").addClass("error");
					cValids = 1;
				}
			}
		}
		
		if(jQuery('#phone.validate').length > 0){
			
			var phone		= jQuery('#phone');
			if(phone.val()!=""){
				if(!validatePhone(phone)) {
					phone.next().html(phone.attr('valid_message'));
					phone.next().addClass("validateMessage");
					jQuery('#phone').val("").addClass("error");
					cValids = 1;
				}
			}
		}
		
		if(jQuery('#resume.validate').length > 0){
			
			var resume		= jQuery('#resume');
			
			var fup = document.getElementById('resume');
			var fileName = fup.value;
			var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
			if(ext == "pdf" )
			{
				resume.next().removeClass("validateMessage");
				jQuery('#resume').removeClass("error");
				resume.next().html("");

			}else{
				resume.next().html(resume.attr('valid_message'));
				resume.next().addClass("validateMessage");
				jQuery('#resume').val("").addClass("error");
				cValids = 1;
			}
			
		}
		
		if(cValids == 0) { 
			jQuery(".formLoading").css("display","block");
		
		}else {
			jQuery(".validateMessage").effect( "shake",{times:1}, 600 );
			return false;
		}
		
	});
	
	
	jQuery("#jobApplication #name.validate").blur(function(){
		
		var name		= jQuery('#name');
		if(name.val()==""){
			name.next().html(name.attr('valid_message'));
			name.next().addClass("validateMessage");
			jQuery('#name').val("").addClass("error");
		}else{
			name.next().removeClass("validateMessage");
			jQuery('#name').removeClass("error");
			name.next().html("");
		}
	})
	
	
	jQuery("#jobApplication #email.validate").blur(function(){
		
		var email		= jQuery('#email');
		if(email.val()!=""){
			if(!checkValidEmail(email)) {
				email.next().html(email.attr('valid_message'));
				email.next().addClass("validateMessage");
				jQuery('#email').val("").addClass("error");
			}else{
				email.next().removeClass("validateMessage");
				jQuery('#email').removeClass("error");
				email.next().html("");	
			}
		}
	})
	
	jQuery("#jobApplication #phone.validate").blur(function(){
		
		var phone		= jQuery('#phone');
		if(phone.val()!=""){
			if(!validatePhone(phone)) {
				phone.next().html(phone.attr('valid_message'));
				phone.next().addClass("validateMessage");
				jQuery('#phone').val("").addClass("error");
			}else{
				phone.next().removeClass("validateMessage");
				jQuery('#phone').removeClass("error");
				phone.next().html("");	
			}
		}
	})
	
	jQuery("#jobApplication #resume.validate").change(function(){
		
		var resume		= jQuery('#resume');

		if(resume.val().length > 0){
			
			var fup = document.getElementById('resume');
			var fileName = fup.value;
			var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
			if(ext == "pdf" )
			{
				resume.next().removeClass("validateMessage");
				jQuery('#resume').removeClass("error");
				resume.next().html("");

			}else{
				resume.next().html(resume.attr('valid_message'));
				resume.next().addClass("validateMessage");
				jQuery('#resume').val("").addClass("error");
			}
		}
	})
	
	jQuery(".successMessage").delay(9000).hide(500);

/*
	jQuery('nav').easyPie();
		
	var x= 0;

	jQuery("#nav > li > ul > li").each(function(){
				x = parseInt(x) + 1;
				jQuery(this).addClass('submenu'+x);
		})
    });
	
	jQuery(window).load(function() {

    if (jQuery(window).width() > 1000) {
		jQuery('#nav > li > ul').addClass('dropdown-menu');
    }
    else {jQuery('#nav > li > ul').removeClass('dropdown-menu');}
*/	
});
