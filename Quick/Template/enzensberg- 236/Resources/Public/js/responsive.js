jQuery(document).ready(function() {
     
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
});