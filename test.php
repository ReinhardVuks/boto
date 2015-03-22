

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
//$games1 = array($games);
//print_r($games);
$games1 = explode("March", $games1);
//$games[6] = explode("April", $games[6]);

$kuud1 = ["April", "May", "June", "July", "August", "September", "Oktober", "November"];

//echo "jah";
/*
end($games1);
$n = key($games1);
$games1[$n] = explode($kuud1[0], $games1[$n]);
$kuud12 = array_shift($kuud1);
print_r($games1);
*/
function split_month ($games, $kuud){
	//echo count($kuud). "  	";
	//echo "jah";
	//print_r($games);
	//print_r($games);
	if(count($kuud) > 0){	
		end($games);
		$n = key($games);
		echo $n;
		$games[$n] = explode($kuud[0], $games[$n]);
		print_r($games);
		$kuud12 = array_shift($kuud);
		
		split_month($games, $kuud);
	} else {
		//print_r($games);
	}
}

split_month($games1, $kuud1);


?>