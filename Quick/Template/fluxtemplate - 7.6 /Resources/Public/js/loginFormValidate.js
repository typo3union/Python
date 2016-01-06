
 jQuery(document).ready(function($) {

$('#login-form span.name').html('');
$('#login-form span.email').html('');

      $('#login-form').submit(function(event){
        
        var cValids = 0;
            
        $("#login-form .validate").removeClass("error");        
        $("#login-form #name").each(function(){
            if($(this).val()==''){
                $('#login-form span.name').addClass('error');
                $('#login-form span.name').html($(this).attr('mendatory_message'));
                cValids = 1;
            }
            else{
                $('#login-form span.name').html('');
                $('#login-form span.name').removeClass('error');
            }
        });
        
        if ($('.alert').hasClass('alert-success')) {
         $('#login-form #email').focus();
        }
      
      
      $("#login-form #email").each(function(){
        if($(this).val() !=''){            
            var email  = $('#login-form #email');            
            if(!checkValidEmail(email)) {
                $('#login-form span.email').addClass('error');
                $('#login-form span.email').html($(this).attr('valid_message'));                  
                cValids = 1;
            }
            else{   
                $('#login-form span.email').removeClass('error');
                $('#login-form span.email').html('');
            }
            
        }else{
             $('#login-form span.email').addClass('error');
            $('#login-form span.email').html($(this).attr('mendatory_message'));
        }
    });
        if(cValids == 0) { 
            return false;     
        }else {
            return false;
        }
        
    });    
     
    $("#login-form #name").change(function(){        
        if(trim($(this))!=""){           
             $('#login-form span.name').removeClass('error');
            $('#login-form span.name').html('');
           
        }
    });
     $("#login-form #email").change(function(){        
        if($(this).val() !=''){            
            var email  = $('#login-form #email');            
            if(!checkValidEmail(email)) {
                $('#login-form span.email').addClass('error');
                $('#login-form span.email').html($(this).attr('valid_message'));                  
                cValids = 1;
            }
            else{   
                $('#login-form span.email').removeClass('error');
                $('#login-form span.email').html('');
            }
            
        }else{
             $('#login-form span.email').addClass('error');
            $('#login-form span.email').html($(this).attr('mendatory_message'));
        }
    });    
});
    
 function checkValidEmail(field) { var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; if (!filter.test(field.val())) { return false; } return true; } function trim(field){ return jQuery.trim(field.val()); } 