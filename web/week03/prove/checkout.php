<?php
session_start();

$products = array("shoe1", "shoe2", "shoe3", "shoe4", "shoe5", "shoe6", "shoe7", "shoe8", "shoe9");
$amounts = array("120.99", "130.99", "167.99", "120.99", "130.99", "167.99", "120.99", "130.99", "167.99");
$names = array("Nike Lunar Epic Flyknit", "Nike SB Koston Hyperfeel 3.", "NikeLab ACG Lupinek Flyknit Low SFB.",
    "Skate Mental x Nike SB Janoski Pepperoni Pizza", "NikeLab Air Zoom LWP x Kim Jones.", "Atmos x Nike Air Max 1 Safari.",
    "NikeLab Air Rift Wrap", "Nike Air Yeezy", "Nike Total 90");

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
<body style="background-color:whitesmoke;">
<?php
include '../../nav.php';
?>
<h1>
    Checkout Page
</h1>

<form method="post">
    <labal for="address">Enter Your Address: </labal>
    <textarea name="address" cols="50" maxlength="100">

    </textarea>
    <button type="submit"><a href="confirm.php">Confirm Purchase</a></button>

</form>
<button><a href="view-cart.php">Return to cart</a></button>
</body>
</html>