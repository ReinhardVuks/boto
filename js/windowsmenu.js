$(document).ready(function() {
	$('.menu a').hover(function() {
		console.log("jobu");
		$(this).stop().animate({
			opacity: 1
		}, 300);
	}, function() {
		$(this).stop().animate({
			opacity: 0.3
		}, 300);
	});
});