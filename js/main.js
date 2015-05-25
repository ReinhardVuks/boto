$(document).ready(function(){

	$("#replace-img").hover(function() {
        $("#main-img").css("opacity", "0");
        $("#replace-img").css("opacity", "1");
    }, function() {
        $("#replace-img").css("opacity", "0");
        $("#main-img").css("opacity", "1");
    })

    $("#arrow-button").click(function() {
	    $('html, body').animate({
	        scrollTop: $("#main-menu").offset().top
	    }, 1000);
	})

    $(window).scroll(function() {
        if ($(window).scrollTop() + 15 > $('#main-menu').offset().top) {
            $('.help-menu').css("visibility", "hidden");
        } else {
            $('.help-menu').css("visibility", "visible");
        }
    });

    function resizeHeader() {
        if ($(window).width() < 800) {
            $('header').css('height', '600px');
        } else {
            $('header').css('height', '100%');
        }
    }

    resizeHeader();
    $(window).resize(function() {
        resizeHeader();
    });

})