

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
$kuud1 = ["March", "April", "May", "June", "July", "August", "September", "October", "November"];

//echo "jah";
/*
end($games1);
$n = key($games1);
$games1[$n] = explode($kuud1[0], $games1[$n]);
$kuud12 = array_shift($kuud1);
*/
$mängud = array();
$mäng = array();
$kontroll = false;
foreach ($games as $k) {
	if(count($kuud1) > 0){
		if($k == $kuud1[1]){
			array_push($mängud, $mäng);
			$mäng = array();
			array_shift($kuud1);
		}
	}
	array_push($mäng, $k);
}
array_push($mängud, $mäng);



/*
function split_month ($games, $kuud){
	if(count($kuud) > 0){	
		end($games);
		$n = key($games);
		$games[$n] = explode($kuud[0], $games[$n]);
		$kuud12 = array_shift($kuud);
		split_month($games, $kuud);
	} else {
		print_r($games);
	}
}

split_month($games1, $kuud1);
*/

?>