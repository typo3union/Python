
var afirst_node = $('.afterloginMenu li:first');
$('.afterloginMenu li').eq(0).removeClass('hidden');
$('.afterloginMenu li').eq(2).after( afirst_node ); 

var first_node = $('ul.main_navigation > li').eq(2);
$('ul.main_navigation > li').eq(0).before( first_node );
$('ul.main_navigation').removeClass('hidden'); 

$(document).ready(function(){	
	// for news section
	$( ".news" ).find( ".no-news-found" ).parents(".small-container.clearfix").hide();
	$( ".news.news-single" ).parents(".right-content").find( ".page-header.text-center" ).hide();	
	
	$('.loginscroll').click(function(e) {
		 $('.navbar-collapse.collapse.in').scrollTop($('.navbar-collapse.collapse.in').height());		 		
     });
    $(".table.table-striped.table-hover.table-condensed").wrap("<div class='table-responsive'>");
    $(".index-inner.clearfix h2").addClass("page-header");
    $(".small-container.clearfix h2").addClass("page-header");
    $( ".errormessage" ).html("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Error! </strong>Einloggen Fehlgeschlagen.</div>");
    var activeclass = $(".thumbimage").find('.active').length;
    if (activeclass == 0) {
        $(".thumbimage .First").show();
        $(".thumbimage .sub").show();
    } else {
        $(".thumbimage .active").show();
    }
    $( ".right-bar .right-content ol li:first-child" ).remove();    
    $( ".csc-textpic .csc-textpic-image img" ).removeAttr("width").removeAttr("height");
    $( ".iconbarmenu li img" ).removeAttr("width").removeAttr("height");
    $( ".thumbimage li img" ).removeAttr("width").removeAttr("height");
    $( ".afterloginMenu li img" ).removeAttr("width").removeAttr("height");
    $( ".right-bar img" ).removeAttr("width").removeAttr("height");
    
    $( ".loggedinuser" ).clone(false).appendTo( ".cust-name" );
    $( ".errormessage" ).clone(false).appendTo( ".login-error" );
    $( ".form-group.login-error .alert.alert-danger" ).unwrap();
    $( ".testimonial .carousel-inner .item .container-fluid h2" ).addClass("speak" );
    $( ".testimonial .carousel-inner .item .container-fluid p" ).addClass("author" );
	$( ".testimonial" ).wrapInner( "<div class='small-container'></div>");
	//set iconbarmenu in middle beforelogin start
	/*var first = $(".iconbarmenu li:first");
	var last = $(".iconbarmenu li:nth-child(3)");
	$( ".iconbarmenu .menu_103" ).clone(false).prependTo( ".iconbarmenu" );
	$( ".iconbarmenu li:nth-child(4)" ).replaceWith(first);
	$( ".iconbarmenu .menu_102" ).clone(false).prependTo( ".iconbarmenu" );
	$( ".iconbarmenu li:nth-child(3)" ).hide();
	
	//set iconbarmenu in middle afterlogin start
	var first = $(".tx-events .afterloginMenu li:first");
	var last = $(".tx-events .afterloginMenu li:nth-child(3)");
	$( ".tx-events .afterloginMenu #li_2" ).clone(false).prependTo( ".afterloginMenu" );
	$( ".tx-events .afterloginMenu li:nth-child(4)" ).replaceWith(first);
	$( ".tx-events .afterloginMenu #li_1" ).clone(false).prependTo( ".afterloginMenu" );
	$( ".tx-events .afterloginMenu li:nth-child(3)" ).hide();*/
	
	
	//Set Search Page form with JS start
	$('.tx-indexedsearch .form-group label').removeClass('col-sm-2').addClass('col-sm-4');
	$('.tx-indexedsearch .form-group .col-sm-3').removeClass('col-sm-3').addClass('col-sm-7');
	$('.tx-indexedsearch .form-group .col-sm-offset-2').removeClass('col-sm-offset-2').addClass('col-sm-offset-4');
	$('.tx-indexedsearch-descr').addClass('align-justify');
	$('.afterlogin_navigation').addClass('main_navigation');
	//resize images with jquery.resizecrop.js
	$('.crop-image img').resizecrop({
   	  width: '120',
   	  height: '185'
	});
	//Put download link to download PDF file
	$(".crop-image a").attr("download","");
	//For magnific Popup JS
	$('.popup-gallery img').closest('a').removeAttr('onclick');
	$('.popup-gallery').magnificPopup({
          delegate: 'a',
          type: 'image',
          
          
          image: {
          	verticalFit: false
          }
        });
	
});

$('p, li, span, h1, h2, h3, h4, td,.left-head, .form-control,.btn,.grid-description a,.tzdate,.tzverse,.tzreference').jfontsize({
  btnMinusMaxHits: 1,
  btnPlusMaxHits: 2,
  sizeChange: 2
});

$(window).load(function() { 	
	$('.table-head-box .table-grid-1').click(function(){ 
	 	if($(this).hasClass('active')){
			 var e = $(this).attr('id');
			 $(this).removeClass('active'); 
			 $('.tx-events .table tr.'+e).addClass('hidden');
			 $('.table-head-box .table-grid-1 tr.'+e).removeClass('active1');
		 }else{	
		 	 
			$('#scheduleView').removeClass('active');
			$('.pull-right .btn').eq(0).removeClass('active');
			var c = $(this).attr('id');	
			$(this).addClass('active');
			
			var b = $('.tx-events .pull-right .btn.active').attr('id');
			
			if(b){
				if(b!='private' || !isNaN(b)){
					$('.tx-events .table tr.'+b).addClass('active1');						 						 	
				}else{
					$('.tx-events .pull-right .btn').removeClass('active');	
				}
			}
		 		
			$('.tx-events .table tr').addClass('hidden');
			$('.table-grid-1.active').each(function(){ 
				var d = $(this).attr('id');
 				if(b){
					if(b!='private' || !isNaN(b)){
						$('.tx-events .table tr.'+d+'.active1').removeClass('hidden');					 						 	
					}
				}else{
						$('.tx-events .table tr.'+d).removeClass('hidden');							 
				}
			 });
		 }	
	});
	
	$('.tx-events .pull-right .btn').click(function(){ 
		$('.pull-right .btn').eq(0).removeClass('active');
		$('.tx-events .pull-right .btn').removeClass('active');
		$(this).addClass('active');
		$('#scheduleView').removeClass('active');
		
		$('.tx-events .table tr').removeClass('active1');
		$('.tx-events .table tr').addClass('hidden');				
		
		var c = $(this).attr('id');				
		var b = $('.tx-events .pull-right .btn.active').attr('id');
		if(b){
			if(b!='private' || !isNaN(b)){
				$('.tx-events .table tr.'+b).addClass('active1');						 						 	
			}else{
				if(b=='private'){
					$('.tx-events .table tr.'+b).addClass('active1');	
				}else{
					$('.table-head-box .table-grid-1').removeClass('active');
				}
			}
		}else{
			$('.tx-events .table tr').addClass('active1');
		}
			
		if($('.table-grid-1').hasClass('active')){
			$('.table-grid-1.active').each(function(){ 
			var d = $(this).attr('id');
			
				if(b){
							
				if(b!='private' || !isNaN(b)){
					$('.tx-events .table tr.'+d+'.active1').removeClass('hidden');						 						 	
				}else{
					if(b=='private'){
						$('.tx-events .table tr.private').removeClass('hidden');
						$('.table-head-box .table-grid-1').removeClass('active');			
					}else{
						$('.table-head-box .table-grid-1').removeClass('hidden');
					}
				}
			
			}else{
					$('.tx-events .table tr.'+d).removeClass('hidden');						 
			}
			
		 });
		}else{
		 	$('.tx-events .table tr.active1').removeClass('hidden');	
		 }
	});
	$('#scheduleView').on('change', function() {
	    var c = this.value; 
		if(c !=''){						
			$('.tx-events .pull-right .btn').removeClass('active');
			$('.table-head-box .table-grid-1').removeClass('active'); 
			
			$(this).addClass('active');
			$('.tx-events .table tr').removeClass('hidden');
			$('.tx-events .table tr:not(.'+c+')').addClass('hidden');
		}
	});
	
	$('.tx-events .afterloginMenu li').each(function(){ 
		var c = $(this).attr('id');	
		var v = $('.activemenu div#'+c).text();	
		if(v==1){
			$('.tx-events .afterloginMenu li#'+c).addClass('active');
		}
	});	
	
	
	
});




$(function () {
	
	jQuery(".makeSymbolNew").html('&#64;'); 
	jQuery(".makePointNew").html('&#46;');
});
