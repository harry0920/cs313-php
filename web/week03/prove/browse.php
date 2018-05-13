<?php
$products = array("shoe1", "shoe2", "shoe3", "shoe4", "shoe5", "shoe6", "shoe7", "shoe8", "shoe9");

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

            echo "<label for=\"$products[$i]\">Nike Shoe ($i+1)</label>"
            ."<div>"
            ."<img src=\"images/$products[$i].jpg\" alt=\"$products[$i]\">"
            ."<button onclick=\"addshoe('$products[$i]')\" class=\"w3-circle w3-green\" >+</button>"
            ."</div>";
        }

        ?>

        <form class="browseform" method="POST" action="view-cart.php">
            <input type="submit" value="Submit Answers">
        </form>
    </body>

    <script>
        function addshoe(shoenumber){
            var req = new XMLHttpRequest();
            req.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {

                   // document.getElementById("list").innerHTML = this.responseText;
                }
            }
            req.open("GET", "cart.php", true);
            req.send();



        }
    </script>
</html>