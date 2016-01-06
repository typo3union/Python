 jQuery(document).ready(function($) {
 
        $('#myCarousel').carousel({
                interval: 5000
        });
 
        $('#carousel-text').html($('#slide-content-0').html());
 
        //Handles the carousel thumbnails
       $('[id^=carousel-selector-]').click( function(){
            var id = this.id.substr(this.id.lastIndexOf("-") + 1);
            var id = parseInt(id);
            $('#myCarousel').carousel(id);
        });
 
 
        // When the carousel slides, auto update the text
        $('#myCarousel').on('slid.bs.carousel', function (e) {
                 var id = $('.item.active').data('slide-number');
                $('#carousel-text').html($('#slide-content-'+id).html());
        });
        
        if(!jQuery('li.current').length > 0){
        	jQuery('.pagination').remove();
        	}
       
});



$(document).ready(function() {
    
    function checkValidEmail(field) {
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!filter.test(field.val())) {
            return false;
        }
        return true;
    }
    
    
    function trim(field){
        return jQuery.trim(field.val());    
    }
    
    $('#newContactForm').submit(function(event){
        
        var cValids = 0;
            
        $("#newContactForm .validate").removeClass("error");
        
        $("#newContactForm .validate").each(function(){
            if($(this).val()==''){
                $($(this)).addClass("error");
                $(this).attr("placeholder",$(this).attr('mendatory_message'));
                cValids = 1;
            } 
        });
        
        if($('#email.validate').length > 0){
            
            var email       = $('#email');
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
    })
    
      
    
});