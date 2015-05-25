function addRowHandlers() {
			var table = document.getElementById('streamsTable');
			var rows = table.getElementsByTagName("tr");
			for(i=0; i<rows.length-1; i++){
				var n = "link" + i;
				document.getElementById(n).style.visibility = "hidden";
			}
			for(i = 0; i<rows.length; i++){

				var currentRow = table.rows[i];
				var createClickHandler = 
					function(row) {
						return function() {
							var cell = row.getElementsByTagName("td")[4].style.visibility = "visible";
						};
					};
				currentRow.onclick = createClickHandler(currentRow);
			}
		}
		window.onload = addRowHandlers();