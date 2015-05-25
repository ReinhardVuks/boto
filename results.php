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
        
            <div id="results">


                <table class="results" style="text-align: center;">
              <tr>
                <th class="">Nimi</th>
                <th class="">Punktid</th>
                
              </tr>
            <?php
            foreach(getUsers() as $row) {
                $points=rand(0,50);
                echo '<tr>
                        <td class="">' . $row['firstname'] .  " " . $row['lastname'] . '</td>
                        <td class="">' . $points.'</td>
                      </tr>';
            }
            ?>
            </table>
             </div>
           
       
   
    </body>
   
</html>