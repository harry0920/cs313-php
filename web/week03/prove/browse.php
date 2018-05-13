<?php
session_start();

$products = array("shoe1", "shoe2", "shoe3", "shoe4", "shoe5", "shoe6", "shoe7", "shoe8", "shoe9");
$amounts = array("120.99", "130.99", "167.99", "120.99", "130.99", "167.99", "120.99", "130.99", "167.99");


if ( !isset($_SESSION["total"]) ) {
    $_SESSION["total"] = 0;
    for ($i=0; $i< count($products); $i++) {
        $_SESSION["qty"][$i] = 0;
        $_SESSION["amounts"][$i] = 0;
    }
}


//Reset
if ( isset($_GET['reset']) )
{
    if ($_GET["reset"] == 'true')
    {
        unset($_SESSION["qty"]); //The quantity for each product
        unset($_SESSION["amounts"]); //The amount from each product
        unset($_SESSION["total"]); //The total cost
        unset($_SESSION["cart"]); //Which item has been chosen
    }
}


//Add
if ( isset($_GET["add"]) )
{
    $i = $_GET["add"];
    $qty = $_SESSION["qty"][$i] + 1;
    $_SESSION["amounts"][$i] = $amounts[$i] * $qty;
    $_SESSION["cart"][$i] = $i;
    $_SESSION["qty"][$i] = $qty;
}


//Delete
if ( isset($_GET["delete"]) )
{
    $i = $_GET["delete"];
    $qty = $_SESSION["qty"][$i];
    $qty--;
    $_SESSION["qty"][$i] = $qty;
    //remove item if quantity is zero
    if ($qty == 0) {
        $_SESSION["amounts"][$i] = 0;
        unset($_SESSION["cart"][$i]);
    }
    else
    {
        $_SESSION["amounts"][$i] = $amounts[$i] * $qty;
    }
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
        {   $j = $i+1;
            echo "<label for=\"$products[$i]\">Nike Shoe $j</label>"
            ."<div>"
            ."<img src=\"images/$products[$i].jpg\" alt=\"$products[$i]\">"
            ."<a href=\"?add=$i\" class=\"w3-circle w3-green\" >+</a>"
            ."</div>";
        }
        ?>

        <form class="browseform" method="POST" action="view-cart.php">
            <input type="submit" value="Submit Answers">
        </form>
    </body>

    <script>

    </script>
</html>