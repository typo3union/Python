
 jQuery(document).ready(function($) {

 	  $('#email-form').submit(function(event){
        
        var cValids = 0;
            
        $("#email-form .validate").removeClass("error");
        
        $("#email-form .validate").each(function(){
            if($(this).val()==''){
                $($(this)).addClass("error");
                $(this).attr("placeholder",$(this).attr('mendatory_message'));
                cValids = 1;
            } 
        });
        
        if ($('.alert').hasClass('alert-success')) {
         $('#email').focus();
     }
    
  
        if($('#email.validate').length > 0){
            
            var email  = $('#email');
            if(email.val()!=""){
                if(!checkValidEmail(email)) {
                    email.attr("placeholder",email.attr('valid_message'));
                    $('#email').val("").addClass("error");                   
                    cValids = 1;
                }
            }
        }

        if(cValids == 0) { 
            return true;     
        }else {
            return false;
        }
        
    }); 
   
    
    $(".validate").keyup(function(){        
        if(trim($(this))!=""){
            $(this).removeClass("error");
        }else{
            $(this).addClass("error");
        }
    });

     jQuery(".alert-success").delay(9000).hide(500);
 });

 function checkValidEmail(field) { var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; if (!filter.test(field.val())) { return false; } return true; } function trim(field){ return jQuery.trim(field.val()); } 