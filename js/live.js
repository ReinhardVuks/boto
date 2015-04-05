$(document).ready(function() {
	setInterval(function () {
	    $.ajax({
			url: "checkForNewCompetitions.php",
			success: function(html){
				$("#newComps").html(html);
			}
		});
	}, 3000);
});