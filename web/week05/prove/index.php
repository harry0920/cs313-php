<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <title>
        Shoes - Main Page
    </title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="../../styles/style.css">
</head>
    <body>
        <?php
        include '../../nav.php';
        ?>
        <div class="mainDiv">

        <?php

              $dbUrl = getenv('DATABASE_URL');

              $dbopts = parse_url($dbUrl);

              $dbHost = $dbopts["host"];
              $dbPort = $dbopts["port"];
              $dbUser = $dbopts["user"];
              $dbPassword = $dbopts["pass"];
              $dbName = ltrim($dbopts["path"],'/');

              $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

              $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              foreach ($db->query('SELECT * FROM inventory') as $row)
              {
                echo "<b>".$row['name'].":".$row['stock'];
                echo '<br/>';
              }



            /**
        for ($i=0; $i< count($products); $i++)
        {
            $j = $i+1;
            $y = $amounts[$i] + 20;

            echo "<figure class=\"shoes\">"
                ."<img src=\"images$products[$i].jpg\" alt=\"$names[$i]\">"
                ."<figcaption>"
                ."<h3>$names[$i]</h3>"
                ."<p>Feel the latest Design!</p>"
                ."<div class=\"price\"><s>$y</s>$amounts[$i]</div>"
                ."</figcaption><i class=\"ion-android-cart\"></i>"
                ."<a href=\"?add=$i\"></a>"
                ."</figure>";
        }
         *
         **/
        ?>
        </div>

        <form class="browseform" action="view-cart.php">
            <input type="submit" value="Shopping Cart">
        </form>
    </body>

    <script>

    </script>
</html>