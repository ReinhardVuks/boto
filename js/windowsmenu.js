$(document).ready(function() {
	$('#menu a').hover(function() {
		$(this).stop().animate({
			opacity: 1
		}, 300);
	}, function() {
		$(this).stop().animate({
			opacity: 0.7
		}, 300);
	});

	function resizeMenu() {
		var width = $(window).width();
	    var height = $(window).height();
	    $('#menu').width(width * 0.7);
		$('.size').width(width * 0.7 / 3 - 10);
	    if (width > 900) {
	    	$('#main-menu').height(height);
		    var lineHeight = height / 3;
		} else if (width < 400) {
			var lineHeight = width * 0.7;
			$('#main-menu').height(7 * lineHeight);
			$('.size').width(lineHeight);
		} else {
			var lineHeight = width * 0.7 / 3;
			$('#main-menu').height(3 * lineHeight);
		}
		$('.size').css("line-height", lineHeight + "px");
		$('#menu').css('padding', lineHeight / 2 + "px 0");
	}

	resizeMenu();

	$(window).resize(function(){
	    resizeMenu();
	});

});