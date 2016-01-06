$(document).ready(function() {
$('.facebook p > *').unwrap(); 
$('#c92').remove();
$('#historicalList_wrapper .row:first-child .col-sm-12:first-child').remove();

  $('.language li a').each(function(){
  if($(this).hasClass('active')){
    var _langLink = $(this).find('a').attr('href');
    $('.language li a').attr('href',_langLink);
  }
});


$('.reload img').on('click',function(){
		var _id = $('.reload').data('id');	
		var _currentURL = '/index.php?id='+_id;		
		
		$.ajax({
			url: _currentURL+'&type=123',
			cache:false,
			success: function(result) {	
				$.getScript('typo3conf/ext/fluxtemplate/Resources/Public/js/custom.js');					
				$('.powermail_captcha_outer').html($(result).find('.powermail_captcha_outer').html());				
			},
			error: function(result) {
				consol.log('Error');
			}
		});
		return false;
	});
	
$('#allNewsList').on('change',function(){
	var _id = $('.newsList').data('id');	
	var _num = $('#allNewsList').val();	
	var _currentURL = '/index.php?id='+_id+'&num='+_num;
	$('.ajax_load_img').show();	
	$('.newsListPage').addClass('ajax_load_div');		
			
	$.ajax({
		url: _currentURL,
		success: function(result) {	
			$('.ajax_load_img').hide();
			$('.newsListPage').removeClass('ajax_load_div');
				
			$.getScript('typo3conf/ext/fluxtemplate/Resources/Public/js/custom.js');					
			$('.newsListPage').html($(result).find('.newsListPage').html());
			var _num = $('#allNewsList').val();	
			$('.newsListPage #allNewsList option[value=+_num+]').attr('selected','selected');				
		},
		error: function(result) {
			consol.log('Error');
		}
	});
	return false;
});

var metaslider_182 = function($) {
	
	$('#metaslider_182_filmstrip').flexslider({
		animation:'slide',
		controlNav:false,
		animationLoop:false,
		slideshow:true,
		slideshowSpeed:300,
		itemWidth:150,
		itemMargin:5,
		asNavFor:'#metaslider_182',
		directionNav:true,
	});
	$('#metaslider_182').flexslider({ 
		slideshowSpeed:10000,
		animation:"fade",
		controlNav:false,
		directionNav:true,
		pauseOnHover:true,
		direction:"horizontal",
		reverse:false,
		animationSpeed:600,
		prevText:false,
		nextText:false,
		slideshow:true,
		sync:'#metaslider_182_filmstrip',
		before: function(slider) {
			if (slider.currentSlide + 1 == slider.count) { $('#metaslider_182_filmstrip').flexslider(0); }
		}
	});
};
var timer_metaslider_182 = function() {
	var slider = !window.jQuery ? window.setTimeout(timer_metaslider_182, 100) : !jQuery.isReady ? window.setTimeout(timer_metaslider_182, 1) : metaslider_182(window.jQuery);
};
timer_metaslider_182();
    
 // <![CDATA[
	var disqus_shortname = 'metaslider';
	(function () {
		var nodes = document.getElementsByTagName('span');
		for (var i = 0, url; i < nodes.length; i++) {
			if (nodes[i].className.indexOf('dsq-postid') != -1) {
				nodes[i].parentNode.setAttribute('data-disqus-identifier', nodes[i].getAttribute('rel'));
				url = nodes[i].parentNode.href.split('#', 1);
				if (url.length == 1) { url = url[0]; }
				else { url = url[1]; }
				nodes[i].parentNode.href = url + '#disqus_thread';
			}
		}
		var s = document.createElement('script'); 
		s.async = true;
		s.type = 'text/javascript';
		s.src = '//' + disqus_shortname + '.disqus.com/count.js';
		(document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
	}());       
		

});

jQuery('#historicalList').dataTable({
		    "iDisplayLength": 50,
			"aaSorting": [],
			//"aLengthMenu": [[50, 100, 200, 100], ["10 Per Page", "25 Per Page", "50 Per Page", "100 Per Page"]],			
			"lengthChange": false,
			//"dom": '<"top"iflp<"clear">>rt',
			"info":false,
			 "language": {
           			"sEmptyTable":      "Keine Daten in der Tabelle vorhanden",
					"sInfo":            "_START_ bis _END_ von _TOTAL_ Einträgen",
					"sInfoEmpty":       "0 bis 0 von 0 Einträgen",
					"sInfoFiltered":    "(gefiltert von _MAX_ Einträgen)",
					"sInfoPostFix":     "",
					"sInfoThousands":   ".",
					"sLengthMenu":      "_MENU_ Einträge anzeigen",
					"sLoadingRecords":  "Wird geladen...",
					"sProcessing":      "Bitte warten...",
					"sSearch":          "Suchen",
					"sZeroRecords":     "Keine Einträge vorhanden.",
					"oPaginate": {
						"sFirst":       "Erste",
						"sPrevious":    "Zurück",
						"sNext":        "Nächste",
						"sLast":        "Letzte"
					},
					"oAria": {
						"sSortAscending":  ": aktivieren, um Spalte aufsteigend zu sortieren",
						"sSortDescending": ": aktivieren, um Spalte absteigend zu sortieren"
					}				
        	},
			 
	});


jQuery.extend( jQuery.fn.dataTableExt.oSort, {
"date-de-pre": function ( a ) {
    var ukDatea = a.split('.');
    return (ukDatea[2] + ukDatea[1] + ukDatea[0]) * 1;
},

"date-de-asc": function ( a, b ) {
    return ((a < b) ? -1 : ((a > b) ? 1 : 0));
},

"date-de-desc": function ( a, b ) {
    return ((a < b) ? 1 : ((a > b) ? -1 : 0));
}
} );
function urlParam(name){
		var results = new RegExp('[\\?&]' + name + '=([^&#]*)').exec(window.location.href);
		if (results==null){
		   return '0';
		}
		else{
		   return results[1] || 0;
		}
	}


