
    $(document).ready(function() {
	
	var listElement = $('.candleViewList');
    var perPage = 45; 
    var numItems = listElement.children().size();
    var numPages = Math.ceil(numItems/perPage);
		
    $('.pager').data("curr",0);

    var curr = 0;
    while(numPages > curr){
      $('<li><a href="#" class="page_link">'+(curr+1)+'</a></li>').appendTo('.pager');
      curr++;
    }

    $('.pager .page_link:first').addClass('active'); 
    $(".pager li:nth-child(1) a").addClass("present"); 
	
    listElement.children().css('display', 'none');
    listElement.children().slice(0, perPage).css('display', 'block');

    $('.pager li a').click(function(){
      var clickedPage = $(this).html().valueOf() - 1;
	 $('.pager li a').removeClass("present");
	 $(this).addClass("present"); 
      goTo(clickedPage,perPage);
	  return false;
    });

    function goTo(page){
      var startAt = page * perPage,
        endOn = startAt + perPage;
      
      listElement.children().css('display','none').slice(startAt, endOn).css('display','block');
      $('.pager').attr("curr",page);	  
	
    }
	  var size = $( " .pager li" ).size();
		  if(size<2){
			  $('.pager').remove();
		  }	  	  
    });
	
	var current =  $( ".pager" ).attr( "curr" );
	
	