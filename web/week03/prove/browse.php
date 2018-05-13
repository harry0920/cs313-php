<?php
session_start();

$products = array("shoe1", "shoe2", "shoe3", "shoe4", "shoe5", "shoe6", "shoe7", "shoe8", "shoe9");
$amounts = array("120.99", "130.99", "167.99", "120.99", "130.99", "167.99", "120.99", "130.99", "167.99");
$names = array("Nike Lunar Epic Flyknit", "Nike SB Koston Hyperfeel 3.", "NikeLab ACG Lupinek Flyknit Low SFB.",
    "Skate Mental x Nike SB Janoski Pepperoni Pizza", "NikeLab Air Zoom LWP x Kim Jones.", "Atmos x Nike Air Max 1 Safari.",
    "NikeLab Air Rift Wrap", "Nike Air Yeezy", "Nike Total 90");

//Add
if ( isset($_GET["add"]) )
{
    $i = $_GET["add"];
    $qty = $_SESSION["qty"][$i] + 1;
    $_SESSION["amounts"][$i] = $amounts[$i] * $qty;
    $_SESSION["cart"][$i] = $i;
    $_SESSION["qty"][$i] = $qty;
}



?>

<!DOCTYPE html>
<html>
<head>
    <title>
        CS313 Home Page - Harry Vashisht
    </title>
    <link rel="stylesheet" type="text/css" href="../../styles/style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
    <body>
        <?php
        include '../../nav.php';
        ?>
        <h1>
            Harry Vashisht's Home Page.
        </h1>

            <p>Choose Item you want to buy: </p>


        <?php
        for ($i=0; $i< count($products); $i++)
        {
            $j = $i+1;
            $y = $amounts[$i] + 20;

            echo "<figure class=\"shoes\">"
                ."<img src=\"images/$products[$i].jpg\" alt=\"$names[$i]\">"
                ."<figcaption>"
                ."<h3>$names[$i]</h3>"
                ." <p>Feel the latest Design!</p>"
                ."<div class=\"price\"><s>$y</s>$amounts[$i]</div>"
                ." </figcaption><i class=\"ion-android-cart\"></i>"
                ."<a href=\"?add=$i\"></a>"
                ."</figure>";

        }
        ?>
        <form class="browseform" action="view-cart.php">
            <input type="submit" value="View Cart">
        </form>
    </body>

    <script>

    </script>
</html>