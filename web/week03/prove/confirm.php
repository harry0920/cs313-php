<?php
session_start();

$products = array("shoe1", "shoe2", "shoe3", "shoe4", "shoe5", "shoe6", "shoe7", "shoe8", "shoe9");
$amounts = array("120.99", "130.99", "167.99", "120.99", "130.99", "167.99", "120.99", "130.99", "167.99");
$names = array("Nike Lunar Epic Flyknit", "Nike SB Koston Hyperfeel 3.", "NikeLab ACG Lupinek Flyknit Low SFB.",
    "Skate Mental x Nike SB Janoski Pepperoni Pizza", "NikeLab Air Zoom LWP x Kim Jones.", "Atmos x Nike Air Max 1 Safari.",
    "NikeLab Air Rift Wrap", "Nike Air Yeezy", "Nike Total 90");


$address = $_POST['address'];





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
    Confirmation Page
</h1>

<p><?php echo $address;?> </p>


</body>
</html>