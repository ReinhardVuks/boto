<?php
function dbconnect(){
	$servername="eu-cdbr-azure-north-b.cloudapp.net";
	$username="be6bf743499900";
	$password="2569fe2a";
	$dbname="botodb";

// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	if($conn->connect_error){
    	die("connection failed:" . $conn->connect_error);
	}
	echo 'juut';
	$sql="SELECT * FROM user";
	if ($conn->query($sql)) {
		echo 'juut';
		echo mysql_fetch_assoc(mysql_query($sql);
    	while($row=mysql_fetch_assoc(mysql_query($sql))){
    		echo $row['firstname'];
    	}
	} 

	else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

}
dbconnect();
?>