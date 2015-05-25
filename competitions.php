<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="style/style.css">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>

        <title>BOTO</title>
    </head>
    <body>
        <?php
        session_start();
        include "functions.php";
        if($_SESSION['loggedin'] ==  false){
            header ("Refresh: 0; login.php");
        } else {
        ?>
        <div id="backimg"></div>
        <div id="comps">
            <div class="help-menu">
                <ul>
                    <li><a href="competitions.php#myCompetitions">Minu ennustused</a></li>
                    <li><a href="create_competition.php">Loo ennustus</a></li>
                    <li><a href="#">Minu profiil</a></li>
                    <li><a href="logout.php">Logi välja</a></li>
                </ul>
            </div>
            <a href="http://boto.azurewebsites.net/"><img id="logo" src="images/boto-white-big.png"></a>
            <div class="main">
                <div class="tab-buttons">
                    <ul>
                	    <li>
                            <a id="myCompsButton">Osalen</a></li><li>
                            <a id="myCreatedCompsButton">Minu loodud</a></li><li>
                            <a id="pastCompsButton">Möödunud</a>
                        </li>
                    </ul>
                </div>
                <div id="myComps">
                    <table class="myComps" style="text-align: center;">
                      <tr>
                        <th class="">Nimi</th>
                        <th class="">Looja</th>
                        <th class="">Tähtaeg</th>
                        <th class="">Osalejate arv</th>
                        
                      </tr>
                    <?php
                    $n=0;
                    foreach(getMyComps($_SESSION['sessionUserId']) as $row) {
                        $allowed = $row['allowedusers'];
                        $allowed1 = explode(',', substr($allowed, 1, -1));
                        $allowedNum = count(array_unique($allowed1));
                        echo '<tr id="myCompsRow'.$n. '" class="myCompsRow" onclick=fun(this.id)>
                                <td class="">' . $row['compname'] . '</td>
                                <td class="">' . $row['firstname'] .  " " . $row['lastname'] . '</td>
                                <td class="">' . $row['time_created'] . '</td>
                                <td class="">' . $allowedNum . '</td>
                                <td class="" style="display:none;">' .$row['id'] . '</td>
                              </tr>';
                        echo '<tr id="questionsRow' . $row['id'] . '" class="questionsRow"><td class="questions" colspan="4"><h3 id="after' . $row['id'] . '">Küsimused</h3>';
                        echo '<br><button value="Salvesta">Salvesta</button></td></tr>';
                        $n++;
                    };
                    echo '</table></div>';
                    ?>
                <div id="myCreatedComps">
                    <table class="myCreatedComps" style="text-align: center;">
                      <tr>
                        <th class="">Nimi</th>
                        <th class="">Looja</th>
                        <th class="">Tähtaeg</th>
                        <th class="">Osalejate arv</th>
                        
                      </tr>
                    <?php
                    $n=0;
                    foreach(getMyCreatedComps($_SESSION['sessionUserId']) as $row) {
                        echo '<tr id="myCreatedComps'.$n.'" onclick="fun(this.id)">
                                <td class="">' . $row['compname'] . '</td>
                                <td class="">' . $row['firstname'] .  " " . $row['lastname'] . '</td>
                                <td class="">' . $row['time_created'] . '</td>
                                <td class="">' . $row['numUsers'] . '</td>
                                
                              </tr>';
                        $n++;
                    };
                    echo '</table></div>';
                    ?>
                <div id="pastComps">
                    <table class="pastComps" style="text-align: center;">
                      <tr>
                        <th class="">Nimi</th>
                        <th class="">Looja</th>
                        <th class="">Tähtaeg</th>
                        <th class="">Osalejate arv</th>
                        
                      </tr>
                    
                    <?php
                    /*
                    $n=0;
                    foreach(allComps() as $row) {
                        echo '<tr id="pastCompsRow'.$n.'" onclick="fun(this.id)">
                                <td class="">' . $row['compname'] . '</td>
                                <td class="">' . $row['firstname'] .  " " . $row['lastname'] . '</td>
                                <td class="">' . $row['time_created'] . '</td>
                                <td class="">' . $row['numUsers'] . '</td>
                                <td class="" style="display:none;">'.$row['id'].'</td>
                            
                              </tr>';
                        echo '<tr ><td colspan="0"><table class="span" id= "span"><tr><td>sdfjasdfkfw</td></tr></table></td></tr>';
                        $n++;
                    }*/
                    echo '</table></div></div></div>';
                    } ?>
    
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/tabby.js" defer></script>
    <script src="js/answers.js" defer></script>
    </body>  
</html>