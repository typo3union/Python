jQuery(document).ready(function() {

	jQuery("#quickSearch .drop-search-section .rado-btn input:radio").click(function() {		
    	var val = jQuery('.drop-search-section .rado-btn input:radio:checked').val();
    	if(val=='0'){
            var h1 = jQuery('#quickSearch .select-option #page_select_0').html();
            jQuery('#quickSearch .select-option #page_select').html(h1);    		
    	}else{
    	   var h1 = jQuery('#quickSearch .select-option #page_select_1').html();
            jQuery('#quickSearch .select-option #page_select').html(h1);
        }

	});
 

	jQuery('#quickSearch .select-option select').change(function(){	
		jQuery("#quickSearch .submit-btn-tgl").click();
	});

})
