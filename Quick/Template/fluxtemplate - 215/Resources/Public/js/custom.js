jQuery(document).ready(function() {
    jQuery(".my-fade").addClass("hidden1").viewportChecker({
        classToAdd: "visible animated fadeIn",
        offset: 100
    });
    jQuery(".my-left").addClass("hidden1").viewportChecker({
        classToAdd: "visible animated bounceInLeft",
        offset: 100
    });
    jQuery(".my-right").addClass("hidden1").viewportChecker({
        classToAdd: "visible animated bounceInRight",
        offset: 100
    });
    jQuery(".my-fad-in").addClass("hidden1").viewportChecker({
        classToAdd: "visible animated fadeInDown",
        offset: 100
    });
    jQuery(".my-fad-up").addClass("hidden1").viewportChecker({
        classToAdd: "visible animated fadeInUp",
        offset: 100
    });
    jQuery(".my-fadeInDownBig").addClass("hidden1").viewportChecker({
        classToAdd: "visible animated fadeInDownBig",
        offset: 100
    });
    if ($(window).width() > 767) {
        jQuery(".my-fadeInLeft").addClass("hidden1").viewportChecker({
            classToAdd: "visible animated fadeInLeft",
            offset: 100
        });
        jQuery(".my-fadeInRight").addClass("hidden1").viewportChecker({
            classToAdd: "visible animated fadeInRight",
            offset: 100
        });
    }
});

if ($(window).width() > 1023) {
    $(".call2action a").hover(function(a) {
        $(".c2a-left").addClass("animated fadeInRight");
    });
    $(".call2action a").bind("animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd", function() {
        $(".c2a-left").removeClass("animated fadeInRight");
    });
    $(".call2action-outer a").hover(function(a) {
        $(".c2a-left").removeClass("animated fadeInRight");
    });
}

$(".carousel").carousel({
    interval: 8e3
});

$(".dropdown").click(function(a) {
    a.stopPropagation();
    $(this).find(".dropdown").removeClass("open");
    $(this).parents(".dropdown").addClass("open");
    $(this).toggleClass("open");
});

$(document).ready(function() {
    var a = 0;
    $(".height").each(function() {
        if ($(this).height() > a) a = $(this).height();
    });
    $(".height").height(a);
});

$(document).ready(function() {
    $(".crop-images img").resizecrop({
        width: "200",
        height: "200"
    });
    $(".social-icon p > *").unwrap();
    $(".social-icon br").remove();
    jQuery(".popup").magnificPopup({
        type: "image",
        tLoading: "Loading image #%curr%...",
        closeOnContentClick: true,
        closeBtnInside: true,
        fixedContentPos: false,
        mainClass: "mfp-no-margins mfp-with-zoom",
        image: {
            verticalFit: true
        },
        zoom: {
            enabled: true,
            duration: 300
        },
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [ 0, 1 ]
        }
    });
    $(".csc-default table").addClass("table date-table table-hover");
    $(".csc-default table").wrap('<div class="table-responsive"></div>');
    $(".csc-textpic-imagecolumn").addClass("img-gallery");
    $(".csc-textpic .table caption").each(function() {
        var a = $(this).text();
        $(this).closest(".popup").removeAttr("title");
        $(this).closest(".popup").attr("title", "+a+");
    });
    $(".menu_images").insertAfter($("ul.navbar-nav li .level-02 li:last-child"));
    $("ul.level-03 .menu_images").remove();
    $(".nav.navbar-nav >li").each(function() {
        var a = $(this).attr("id");
        $(".nav.navbar-nav li." + a + " ul li").each(function() {
            var b = $(this).attr("id");
            $(".nav.navbar-nav li." + a + " .menu_images div." + a).addClass("present");
            $(".nav.navbar-nav li." + a + " .menu_images div." + b).addClass("present");
        });
        jQuery(".nav.navbar-nav li." + a + " .menu_images> div:not(.present)").remove();
        jQuery(".nav.navbar-nav li." + a + " .menu_images div").removeClass("present");
    });
    $(".nav.navbar-nav >li").each(function() {
        var a = $(this).attr("id");
        $("li." + a + " div." + a).removeClass("hidden");
        $(".nav.navbar-nav li ul li").hover(function() {
            $("li." + a + " .menu_images >div").addClass("hidden");
            var b = $(this).attr("id");
            $("li." + a + " div." + b).removeClass("hidden");
        });
    });
    $(".nav.navbar-nav >li").hover(function() {
        var a = $(this).attr("id");
        $("li." + a + " .menu_images >div").addClass("hidden");
        $(".nav.navbar-nav li." + a + " .menu_images div." + a).removeClass("hidden");
    });
    $("ul.level-03 .menu_images").remove();
   /// if ($(window).width() <= 1270) centerImage();
});

$(window).resize(function() {
   
    //if ($(window).width() <= 1270) location.reload();
});

$(window).scroll(function() {
    $(".navbar").addClass("scroll");
    var a = $(window).scrollTop();
    if (a <= 50) $(".navbar").removeClass("scroll");
    var b = ($(window).height() - ($($(".call2action")[0]).height() + 100)) / 2;
    if ($(window).scrollTop() >= b) {
        $($(".call2action")[0]).css("position", "fixed");
        $($(".call2action")[0]).css("top", b + "px");
    } else {
        $($(".call2action")[0]).css("position", "absolute");
        $($(".call2action")[0]).css("top", "100px");
    }
});

var imageHeight, wrapperHeight, overlap, container = jQuery("#myCarousel");

function centerImage() {
    
    imageHeight = container.find(".item img").height();
    imageWidth = container.find(".item img").width();
    wrapperHeight = jQuery(window).height();
    wrapperwidth = jQuery(window).width();
    overlap = parseInt((wrapperHeight - imageHeight) / 2);
    overlapwidth = parseInt((imageWidth - wrapperwidth) / 2);
    container.find(".item img").css("left", -overlapwidth);
    container.find(".item img").css("right", -overlapwidth);
    
 

}