<?php
include "head.php";
?>	
	<script type="text/javascript">
	$(document).ready(function() {
			var table = document.getElementById('streamsTable');
			var rows = table.getElementsByTagName("tr");
			for(i=0; i<rows.length-11; i++){
				var n = "link" + i;
				document.getElementById(n).style.display = "none";
			}
		});
	</script>
	<div id="main">
		<div class="streams">
			<h2>STREAMS</h2>
			<table class="streamsTable" id="streamsTable">
			<tbody>
			<tr>
				<th>Kell</th>
				<th>Spordiala</th>
				<th>Kirjeldus</th>
				<th>Ülekanne</th>
			</tr>
			<?php
			for($i = 0; $i<10; $i++){
				echo '<tr onclick="expand(this)">';
				echo '<td id="streamTime">';
				echo date("H:i:s");;
				echo '</td>';
				echo '<td id="streamSport">';
				echo 'Korvpall'. $i;
				echo '</td>';
				echo '<td id="streamComp">';
				echo 'Bc Kalev/Cramo - Tartu Ülikool/Rock';
				echo '</td>';
				echo '<td id="image">';
				echo '</td>';
				echo '</tr>';
				echo '<tr id="link'. $i. '">';
				echo '<td>';
				echo 'link'. $i;
				echo '</td>';
				echo '</tr>';
			}

			?>
			</tbody>
			</table>
		</div>
		
		<div class="calendar" id="calendar">
		</div>

		<div class="news">
			<h1>UUDISED</h1>
			<ul>
			<div id="news1">
				<h3>Esimene</h3>
				Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate
			</div>
			<div id="news2">
				<h3>Teine</h3>
				Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate
			</div>
			<div id="news3">
				<h3>Kolmas</h3>
				Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate
			</div>
			</ul>
		</div>
	</div>
	<div style="clear: both;"></div>
<?php
include "footer.php";
?>