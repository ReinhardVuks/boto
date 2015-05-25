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
	        scrollTop: $("#contact").offset().top
	    }, 1000);
	})

})