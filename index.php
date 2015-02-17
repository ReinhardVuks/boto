<!DOCTYPE html>
<html>
<head>
    
    <title> CL </title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    
</head>
<body style="background-color:#DCDCDC">
	<?php
				$fileToimunud = "Ronald.txt";
				$toimunudRida = count(file($fileToimunud));
				$toimunud = fopen("Ronald.txt", 'r');
				$toimunudListRonald = array();
				
				for($i = 0; $i<$toimunudRida; $i++){
					$line = fgets($toimunud);
					array_push($toimunudListRonald, $line);
					}
				
				$fileToimunud = "Reinhard.txt";
				$toimunudRida = count(file($fileToimunud));
				$toimunud = fopen("Reinhard.txt", 'r');
				$toimunudListReinhard = array();
				
				for($i = 0; $i<$toimunudRida; $i++){
					$line = fgets($toimunud);
					array_push($toimunudListReinhard, $line);
					}
					
				$fileToimunud = "Gerrerth.txt";
				$toimunudRida = count(file($fileToimunud));
				$toimunud = fopen("Gerrerth.txt", 'r');
				$toimunudListGerrerth = array();
				
				for($i = 0; $i<$toimunudRida; $i++){
					$line = fgets($toimunud);
					array_push($toimunudListGerrerth, $line);
					}
					
				$fileToimunud = "Tulemused.txt";
				$toimunudRida = count(file($fileToimunud));
				$toimunud = fopen("Tulemused.txt", 'r');
				$toimunudListTulemused = array();
				
				for($i = 0; $i<$toimunudRida; $i++){
					$line = fgets($toimunud);
					array_push($toimunudListTulemused, $line);
					}
				
				echo '<table style="margin: 0 auto 0 auto; text-align: center;">';
				$ronald = 0;
				$reinhard = 0;
				$gerrerth = 0;
				
				
				for($i = 0; $i < 45; $i++){
					$grupp = substr($toimunudListRonald[$i], 0, 5);
					echo '<tr>';
					if($grupp != "Grupp"){
					$õige = $toimunudListTulemused[$i];
					
					echo '<td>';
					$grupp = substr($toimunudListRonald[$i], 0, 5);
					if ( $grupp != "Grupp"){
							if($toimunudListRonald[$i] == $õige){
							echo '<font color="green">';
							echo $toimunudListRonald[$i];
							$ronald++;
							echo '</font>';
						}else{
							echo '<font color="red">';
							echo $toimunudListRonald[$i];
							echo '</font>';
						}
					}
					echo '</td>';
					echo '<td>';
					if($grupp != "Grupp"){
						if($toimunudListReinhard[$i] == $õige){
							echo '<font color="green">';
							echo $toimunudListReinhard[$i];
							$reinhard++;
							echo '</font>';
						}else{
							echo '<font color="red">';
							echo $toimunudListReinhard[$i];
							echo '</font>';
						}
					}
					echo '</td>';
					echo '<td>';
					if ($grupp != "Grupp"){
						if($toimunudListGerrerth[$i] == $õige){
							echo '<font color="green">';
							echo $toimunudListGerrerth[$i];
							$gerrerth++;
							echo '</font>';
						}else{
							echo '<font color="red">';
							echo $toimunudListGerrerth[$i];
							echo '</font>';
						}
					}
					echo '</td>';
					echo '<td>';
					if($grupp != "Grupp"){
					echo $toimunudListTulemused[$i];
					}
					echo '</td>';
					
					}
					else{
						echo '<td style=" border-bottom: 1px solid;">';
						echo $toimunudListRonald[$i];
						echo '</td>';
					}
					echo '</tr>';
				}
				
				echo '<tr>';
				echo '<td style="font-size: 18px;">';
				echo 'Ronald ';
				echo $ronald;
				echo ' punkti';
				echo '</td>';
				echo '<td style="font-size: 18px;">';
				echo 'Reinhard ';
				echo $reinhard;
				echo ' punkti';
				echo '</td>';
				echo '<td style="font-size: 18px;">';
				echo 'Gerrerth ';
				echo $gerrerth;
				echo ' punkti';
				echo '</td>';
				echo '</tr>';
				echo '</table>';
				
	?>
</body> 