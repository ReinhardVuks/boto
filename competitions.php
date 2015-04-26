<!DOCTYPE html>
<?php
session_start();
include "functions.php";
?>
<html>
    <head>
        <meta charset="utf-8" />

        <link rel="stylesheet" type="text/css" href="style/style.css">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>

        <title>BOTO</title>
    </head>
    <body>
        <div class="main">
            <div class="tab-buttons">
        	    <a id="allCompsButton">All Competitions</a>
                <a id="myCompsButton">Where I participate</a>
                <a id="myCreatedCompsButton">Created by me</a>
            </div>
            <div id="allComps">
            <?php
            if($_SESSION['loggedin'] ==  false){
                header ("Refresh: 0; login.php");
            } else {
            ?>
            <table class="allComps" style="text-align: center;">
              <tr>
                <th class="">Nimi</th>
                <th class="">Looja</th>
                <th class="">Tähtaeg</th>
                <th class="">Osalejate arv</th>
                <th class="">Privaatne</th>
              </tr>
            <?php
            foreach(allComps() as $row) {
                echo '<tr>
                        <td class="">' . $row['compname'] . '</td>
                        <td class="">' . $row['firstname'] .  " " . $row['lastname'] . '</td>
                        <td class="">' . $row['deadline'] . '</td>
                        <td class="">' . $row['participants'] . '</td>
                        <td class="">' . $row['private'] . '</td>
                      </tr>';
            }
            ?>
            </table>
            </div>
            <div id="myComps">
            <table class="myComps" style="text-align: center;">
              <tr>
                <th class="">Nimi</th>
                <th class="">Looja</th>
                <th class="">Tähtaeg</th>
                <th class="">Osalejate arv</th>
                <th class="">Privaatne</th>
              </tr>
            <?php
            foreach(getMyComps($_SESSION['sessionUserId']) as $row) {
                echo '<tr>
                        <td class="">' . $row['compname'] . '</td>
                        <td class="">' . $row['firstname'] .  " " . $row['lastname'] . '</td>
                        <td class="">' . $row['deadline'] . '</td>
                        <td class="">' . $row['participants'] . '</td>
                        <td class="">' . $row['private'] . '</td>
                      </tr>';
            }
            echo '</table>';
            ?>
            </div>
            <div id="myCreatedComps">
            <table class="myCreatedComps" style="text-align: center;">
              <tr>
                <th class="">Nimi</th>
                <th class="">Looja</th>
                <th class="">Tähtaeg</th>
                <th class="">Osalejate arv</th>
                <th class="">Privaatne</th>
              </tr>
            <?php
            foreach(getMyCreatedComps($_SESSION['sessionUserId']) as $row) {
                echo '<tr>
                        <td class="">' . $row['compname'] . '</td>
                        <td class="">' . $row['firstname'] .  " " . $row['lastname'] . '</td>
                        <td class="">' . $row['deadline'] . '</td>
                        <td class="">' . $row['participants'] . '</td>
                        <td class="">' . $row['private'] . '</td>
                      </tr>';
            }
            echo '</table>';
            }
            ?>
            </div>
        </div>
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/tabby.js" defer></script>
    </body>
   
</html>

