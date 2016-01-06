jQuery(document).ready(function() {
	function close_accordion_section() {
		jQuery('.accordion .accordion-section-title').removeClass('active');
		jQuery('.map-point.selected').removeClass('active');
		jQuery('.accordion .accordion-section-content').slideUp(300).removeClass('open');
	}
	
	function inactive() {
		jQuery('.map-circle').removeClass('active');
	}

	jQuery('.accordion-section-title').click(function(e) {
		// Grab current anchor value
		var currentAttrValue = jQuery(this).attr('href');
		var id = jQuery(this).attr('id');

		if(jQuery(e.target).is('.active')) {
			close_accordion_section();
		}else {
			close_accordion_section();

			// Add active class to section title
			jQuery(this).addClass('active');
			jQuery(".accordion"+id).addClass('active');
			// Open up the hidden content panel
			jQuery('.accordion ' + currentAttrValue).slideDown(300).addClass('open'); 
		}

		e.preventDefault();
	});

	
	jQuery('.map-point.selected').click(function(e) {


		var id = jQuery(this).attr('id');

		var currentAttrValue = "#accordion-"+id;

		if(jQuery(e.target).is('.active')) {
			close_accordion_section();
		}else {
			close_accordion_section();

			// Add active class to section title
			jQuery(this).addClass('active');
			jQuery(".clinik"+id).addClass('active');
			// Open up the hidden content panel
			jQuery('.accordion ' + currentAttrValue).slideDown(300).addClass('open'); 
		}

		e.preventDefault();
	});
	
	jQuery('.map-circle').click(function(e) {

		var id = jQuery(this).attr('id');
		var lat = jQuery(this).attr('lat');
		var lan = jQuery(this).attr('lan');
		var icon = jQuery(this).attr('icon');

		if(jQuery(e.target).is('.active')) {
			inactive();
		}else {
			inactive();
			jQuery(this).addClass('active');
			
			loadMap(id,lat,lan,icon);
		}

		e.preventDefault();
	});
	
	
	jQuery(document).ready(function() {

		jQuery('nav').easyPie();
			
		var x= 0;
	
		jQuery("#nav > li > ul > li").each(function(){
					x = parseInt(x) + 1;
					jQuery(this).addClass('submenu'+x);
			})
		
	//	});
		
	//	jQuery(window).load(function() {
	     
		if (jQuery(window).width() > 1000) {
			jQuery('#nav > li > ul').addClass('dropdown-menu');
		}
		else {jQuery('#nav > li > ul').removeClass('dropdown-menu');}
		
		
	});
	
	/*jQuery(window).resize(function(e) {
        //alert();
		
			jQuery('#nav').find('li').each(function(index, element) {
				jQuery(this).find('span').each(function() {
						if(jQuery(this).hasClass('caret')){
							jQuery(this).remove();											
						}
				});
			});		
			jQuery('nav').easyPie();
		
			
		var x= 0;
	
		jQuery("#nav > li > ul > li").each(function(){
					x = parseInt(x) + 1;
					jQuery(this).addClass('submenu'+x);
			})
	     
		if (jQuery(window).width() > 1000) {
			jQuery('#nav > li > ul').addClass('dropdown-menu');
		}
		else {jQuery('#nav > li > ul').removeClass('dropdown-menu');}
    });*/
	
	
});