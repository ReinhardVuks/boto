
$(document).ready(function(){
	$('.questionRow').hide();

	var j=0;
	window.fun=function(clicked_id){
		var row=document.getElementById(clicked_id);
		var value=row.getElementsByTagName("td");
		var id=value[4].innerHTML;
		
		$('#questionsRow' + id).show();
		
		$.ajax({
			type: "GET",
			url: "getQuestions.php",
			datatype: "json",
			data:{
				compid:  id
			},
			success: function(response){
				var result=$.parseJSON(response);
				var n = result.length;


					if(j==0){
					for(i=0;i<result.length;i++){
						if(result[i]['ans_type']=="ansText"){
							$("#after"+id).after($('<p class="ans">' + n+ ".  " + '</p>' +result[i]['textq']+'<br><input type="text" class="css-input" placeholder="Enter your answer here"/>'));
							$("#after"+id).after($('<div class="clearer"></div>'));
							
						}
						 else if(result[i]['ans_type']=="ansScore"){
						 	
						 	$("#after"+id).after($('<p class="ans">' + n + "." + '</p>'+result[i]['team1']+' ' + result[i]['team2']+'<br><input type="text" placeholder="Enter score"/><input type="text" placeholder="Enter score"/>'));
							$("#after"+id).after($('<div class="clearer"></div>'));
							
						}
						 else if(result[i]['ans_type']=="ans1X2"){
						 	$("#after"+id).after($('<p class="ans">' + n + ".  "+ '</p>'+result[i]['team1']+' ' + result[i]['team2']+'<br>1<input type="radio" value="'+result[i]['team1']+'" name="1X2"/>X<input type="radio" value="X" name="1X2"/>2<input type="radio" value="'+result[i]['team2']+'" name="1X2"/>'));
							$("#after"+id).after($('<div class="clearer"></div>'));
							
						}
						  else if(result[i]['ans_type']=="ans1_2"){

						 	$("#after"+id).after($('<p class="ans">' + n + ".  "+ '</p>'+result[i]['team1']+' ' + result[i]['team2']+'<br>1<input type="radio" value="'+result[i]['team1']+'" name="1-2"/>2<input type="radio" value="'+result[i]['team2']+'" name="1-2"/>'));
							$("#after"+id).after($('<div class="clearer"></div>'));
							
						}
						n--;

					}
				j++;
				}
				
				
				
			}

		});
		
	}
});