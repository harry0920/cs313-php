<?php
session_start();

$products = array("shoe1", "shoe2", "shoe3", "shoe4", "shoe5", "shoe6", "shoe7", "shoe8", "shoe9");
$amounts = array("120.99", "130.99", "167.99", "120.99", "130.99", "167.99", "120.99", "130.99", "167.99");
$names = array("Nike Lunar Epic Flyknit", "Nike SB Koston Hyperfeel 3.", "NikeLab ACG Lupinek Flyknit Low SFB.",
    "Skate Mental x Nike SB Janoski Pepperoni Pizza", "NikeLab Air Zoom LWP x Kim Jones.", "Atmos x Nike Air Max 1 Safari.",
    "NikeLab Air Rift Wrap", "Nike Air Yeezy", "Nike Total 90");



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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body style="background-color:whitesmoke;">
<?php
include '../../nav.php';
?>
<h1>
    Your Cart
</h1>

<?php
if ( isset($_SESSION["cart"]) ) {
    ?>
    <br/><br/><br/>
    <h2>Cart</h2>
    <table>
        <tr>
            <th>Product</th>
            <th width="10px">&nbsp;</th>
            <th>Qty</th>
            <th width="10px">&nbsp;</th>
            <th>Amount</th>
            <th width="10px">&nbsp;</th>
            <th>Action</th>
        </tr>
        <?php
        $total = 0;
        foreach ( $_SESSION["cart"] as $i ) {
            ?>
            <tr>
                <td><?php echo( $products[$_SESSION["cart"][$i]] ); ?></td>
                <td><?php echo( $names[$_SESSION["cart"][$i]] ); ?></td>
                <td width="10px">&nbsp;</td>
                <td><?php echo( $_SESSION["qty"][$i] ); ?></td>
                <td width="10px">&nbsp;</td>
                <td><?php echo( $_SESSION["amounts"][$i] ); ?></td>
                <td width="10px">&nbsp;</td>
                <td><a href="?delete=<?php echo($i); ?>">Delete from cart</a></td>
            </tr>
            <?php
            $total = $total + $_SESSION["amounts"][$i];
        }
        $_SESSION["total"] = $total;
        ?>
        <tr>
            <td colspan="7">Total : <?php echo($total); ?></td>
        </tr>

        <tr>
            <td><a href="?reset=true">Reset Cart</a></td>
        </tr>
    </table>

    <?php
}
?>
</body>
</html>