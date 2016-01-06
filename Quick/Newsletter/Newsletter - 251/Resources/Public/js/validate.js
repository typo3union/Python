
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


 });