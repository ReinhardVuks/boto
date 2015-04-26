

<?php
include('simple_html_dom.php');
$html = file_get_html('http://www.livescore.com/soccer/estonia/meistriliiga/fixtures/all/');

//to fetch all hyperlinks from a webpage
$links = array();
foreach($html->find('div[class="content"]') as $a) {
 $links[] = $a->plaintext;
}
foreach ($html->find('div[class="row-gray"]') as $a) {
	//$links[] = $a->innertext;
}
$games = explode(" ", $links[0]);
for ($i=0; $i < count($games); $i++) { 
	if(strlen($games[$i]) == 0){
		unset($games[$i]);
	} 
}

$games = array_slice($games, 18);
$games1 = implode(" ", $games);


$kuud1 = ["April", "May", "June", "July", "August", "September", "Oktober", "November"];
$big = array();
for($i = 0; $i < count($games); $i++){
	if(in_array($games[$i], $kuud1)){
		//echo $games[$i]. " ". $games[i+1]. " ". $i;
		$sub = array();
		$j = $i + 1;
		array_push($sub, $games[$i]);
		while(!in_array($games[$j], $kuud1)){
			array_push($sub, $games[$j]);
			$j++;
		}
		print_r($sub);
		array_push($big, $sub);
	}
	
}
//print_r($big);



?>