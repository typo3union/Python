$(document).scroll(function(e) {
	
    var scrollTop = $(document).scrollTop();
    if (scrollTop > 73) {
        $('.header').addClass("sticky");
       
    } else {
        $('.header').removeClass("sticky");
    }
});