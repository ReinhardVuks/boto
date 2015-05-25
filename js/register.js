$(document).ready(function() {
	$("#email").keyup(function() {
		var email = $('#email').val();
		if(email=="") {
			$("#valid").html("");
		} else {
			$.ajax({
<<<<<<< HEAD
				type: "GET",
=======
				type: "POST",
>>>>>>> c725b2c9653b1c65aa732ce79d010911577e7469
				url: "ajax_checking.php",
				data: "email="+ email ,
				success: function(html){
					$("#valid").html(html);
				}
			});
			return false;
		}
	});
});