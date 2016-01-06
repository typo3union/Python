jQuery(document).ready(function(){
	if ($("#osm_container").length > 0) {
		drawmap(markers);
	}
	
	if ( $(".calendarSheet").length > 0 && $(".kursListTermine").length > 0 ) {
		$(document).kurstermine();
		$(".kursplan").show();
		$("tr.kursDescriptionFallback").hide();
	    $(".calendarSheetSet").hide();
	    $(".calendarSheetSet:first").show();
	    $(".kursDescription").hide();
	    $(".kursDescription:first").show();
	}

	if ($(".flash").length > 0) {
		$(".flash")
			.html('')
			.each(function(){
				var $el = $(this);
				var src = $el.metadata().src;
				var height = $el.css("height");
				var width = $el.css("width");
				$(this).flash({
					src: src,
					width: width,
					height: height
				});
			});
	}
	
    if ( $("body.productIndex .product").length > 0 ) {
        $(document).productindex();
    };
    
    if ( $("body.reservierung .yachttyp").length > 0 ) {
        var $yachttyp = $("body.reservierung .yachttyp");
        $yachttyp.addClass("yachttypJs");
        $yachttyp.find("label[for=CharteranfrageTypeOfYachtMotoryacht]").addClass("labelMotoryacht");
        $yachttyp.find("label[for=CharteranfrageTypeOfYachtSegelyacht]").addClass("labelSegelyacht");
        $yachttyp.find("label[for=CharteranfrageTypeOfYachtKatamaran]").addClass("labelKatamaran");
        
        setYachtState($yachttyp);
        $yachttyp.find("label, input").click(function(){
            setYachtState($yachttyp);
        });
    };
    
    var $metaFlyOut = $(".metaNavigation .kontakt, .metaNavigation .suche");
	$metaFlyOut
        .mouseenter(function(){
            $(this).find(".flyOut").show();
            $(this).addClass("hover");
        })
        .mouseleave(function(){
            $(this).find(".flyOut").hide();
            $(this).removeClass("hover");
        });

    var $navFlyOut = $(".navigation li");
    $navFlyOut
        .mouseenter(function(){
            $(this).find(".flyOut").show();
            $(this).addClass("hover");
        })
        .mouseleave(function(){
            $(this).find(".flyOut").hide();
            $(this).removeClass("hover");
        });
	
	if($("#kostenbeispiel").length > 0) {
		$("#kostenbeispiel").wrap('<div style="display: none"></div>');
		$("#kostenbeispielLink").fancybox({
        	'hideOnContentClick': true,
        	'titleShow': false
		});
	}

	if($("#kostenbeispiel-sks").length > 0) {
		$("#kostenbeispiel-sks").wrap('<div style="display: none"></div>');
		$("#kostenbeispielLinkSKS").fancybox({
			'hideOnContentClick': true,
			'titleShow': false
		});
	}

	if($("#literaturliste").length > 0) {
		$("#literaturliste").wrap('<div style="display: none"></div>');
		$("#literaturlisteLink").fancybox({
        	'hideOnContentClick': false,
        	'titleShow': false
		});
	}

	if($("#pruefungstermine").length > 0) {
		$("#pruefungstermine").wrap('<div style="display: none"></div>');
		$("#pruefungstermineLink").fancybox({
			'hideOnContentClick': false,
			'titleShow': false
		});
	}

	// Popups anzeigen, wenn Seite mit Anchor aufgerufen wird
	if(window.location.hash) {
		if (window.location.hash == '#kostenbeispiel') {
			$("#kostenbeispielLink").trigger('click');
		} else if (window.location.hash == '#kostenbeispiel-sks') {
			$("#kostenbeispielLinkSKS").trigger('click');
		} else if (window.location.hash == '#literaturliste') {
			$("#literaturlisteLink").trigger('click');
		} else if (window.location.hash == '#pruefungstermine') {
			$("#pruefungstermineLink").trigger('click');
		}
	}
	  
	// "adressdaten übernehmen"-feature
	if($("#adressdatenSelect").length > 0) {
		$("#adressdatenSelect").change(function(){
			var data = $(this).find("option[selected]").attr("value").split("|");
			var care_of = data[2];
			var address = data[3];
			var zip = data[4];
			var location = data[5];
			var country = data[6];
			$("#KursreservierungAdditionalPersonCareOf").attr("value", care_of);
			$("#KursreservierungAdditionalPersonAddress").attr("value", address);
			$("#KursreservierungAdditionalPersonZip").attr("value", zip);
			$("#KursreservierungAdditionalPersonLocation").attr("value", location);
			$("#KursreservierungAdditionalPersonCountry").attr("value", country);
		});
	}
    
});

function setYachtState($yachttyp) {
    if($yachttyp.find("input#CharteranfrageTypeOfYachtMotoryacht").attr("checked") == true) {
        $yachttyp.find("label[for=CharteranfrageTypeOfYachtMotoryacht]").addClass("labelMotoryachtAktiv");
        $yachttyp.find("label[for=CharteranfrageTypeOfYachtSegelyacht]").removeClass("labelSegelyachtAktiv");
        $yachttyp.find("label[for=CharteranfrageTypeOfYachtKatamaran]").removeClass("labelKatamaranAktiv");
    }
    else if ($yachttyp.find("input#CharteranfrageTypeOfYachtSegelyacht").attr("checked") == true){
        $yachttyp.find("label[for=CharteranfrageTypeOfYachtMotoryacht]").removeClass("labelMotoryachtAktiv");
        $yachttyp.find("label[for=CharteranfrageTypeOfYachtSegelyacht]").addClass("labelSegelyachtAktiv");
        $yachttyp.find("label[for=CharteranfrageTypeOfYachtKatamaran]").removeClass("labelKatamaranAktiv");
    }
    else if ($yachttyp.find("input#CharteranfrageTypeOfYachtKatamaran").attr("checked") == true){
        $yachttyp.find("label[for=CharteranfrageTypeOfYachtMotoryacht]").removeClass("labelMotoryachtAktiv");
        $yachttyp.find("label[for=CharteranfrageTypeOfYachtSegelyacht]").removeClass("labelSegelyachtAktiv");
        $yachttyp.find("label[for=CharteranfrageTypeOfYachtKatamaran]").addClass("labelKatamaranAktiv");
    }
    else {
        $yachttyp.find("label[for=CharteranfrageTypeOfYachtMotoryacht]").removeClass("labelMotoryachtAktiv");
        $yachttyp.find("label[for=CharteranfrageTypeOfYachtSegelyacht]").removeClass("labelSegelyachtAktiv");
        $yachttyp.find("label[for=CharteranfrageTypeOfYachtKatamaran]").removeClass("labelKatamaranAktiv");
    }

}
