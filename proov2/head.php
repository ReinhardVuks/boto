<!DOCTYPE html>
<head>

	<meta charset="utf-8" />
	<title>Sportlink</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link rel='stylesheet' href='style/fullcalendar.css' />
	<script src='js/jquery-2.1.4.min.js'></script>
	<script src='js/moment.js'></script>
	<script src='js/fullcalendar.js'></script>
	<script src='js/expand.js'></script>
	<script type="text/javascript">
		$(document).ready(function() {
			
	    // page is now ready, initialize the calendar...
	    $('#calendar').fullCalendar({
	        // put your options and callbacks here
	    })
	    });
	</script>
	
</head>
<body>
	<div class="logo">
	</div>
	<div class="menu">
		<ul>
			<li><a href="index.php" id="indexButton">Avaleht</a></li>
			<li><a href="calendar.php" id="calendarButton">Kalender</a></li>
			<li><a href="news.php" id="newsButton">Uudised</a></li>
			<li><a href="contact.php" id="contactsButton">Kontakt</a></li>
		</ul>
	</div>