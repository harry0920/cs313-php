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
        for ($i=0; $i< count($products); $i++) {

            /**echo "<label for='".$products[i]."'>".
                "<div>".
                "<img src='images/".$products[i].".jpg' alt='".$products[i]."'>" .
                " <button onclick='addshoe('".$products[i]."')' class='w3-circle w3-green' >+</button>" .
                "</div>".
                "</label>";
            **/

            echo "<label for=\"$products[$i]\">Nike Shoe $i</label>"
            ."<div>"
            ."<img src=\"images/$products[$i]\.jpg\" alt=\"$products[$i]\">"
            ."<button onclick=\"addshoe('$products[$i]')\" class=\"w3-circle w3-green\" >+</button>"
            ."</div>";


        }

            ?>
      <!--


            <label for="shoe1">Nike Shoe 1</label>
            <div>
                <img src="images/shoe1.jpg" alt="shoe1">
                <button onclick="addshoe('shoe1')" class="w3-circle w3-green" >+</button>
            </div>

            <label for="shoe2">Nike Shoe 2</label>
            <div>
                <img src="images/shoe2.jpg" alt="shoe2">
                <button onclick="addshoe('shoe2')" class="w3-circle w3-green" >+</button>
            </div>

            <label for="shoe3">Nike Shoe 3</label>
            <div>
                <img src="images/shoe3.jpg" alt="shoe3">
                <button onclick="addshoe('shoe3')" class="w3-circle w3-green" >+</button>
            </div>

            <label for="shoe4">Nike Shoe 4</label>
            <div>
                <img src="images/shoe4.jpg" alt="shoe4">
                <button onclick="addshoe('shoe4')" class="w3-circle w3-green" >+</button>
            </div>

            <label for="shoe5">Nike Shoe 5</label>
            <div>
                <img src="images/shoe5.jpg" alt="shoe5">
                <button onclick="addshoe('shoe5')" class="w3-circle w3-green" >+</button>
            </div>

            <label for="shoe6">Nike Shoe 6</label>
            <div>
                <img src="images/shoe6.jpg" alt="shoe6">
                <button onclick="addshoe('shoe6')" class="w3-circle w3-green" >+</button>
            </div>

            <label for="shoe7">Nike Shoe 7</label>
            <div>
                <img src="images/shoe7.jpg" alt="shoe7">
                <button onclick="addshoe('shoe7')" class="w3-circle w3-green" >+</button>
            </div>

            <label for="shoe8">Nike Shoe 8</label>
            <div>
                <img src="images/shoe8.jpg" alt="shoe8">
                <button onclick="addshoe('shoe8')" class="w3-circle w3-green" >+</button>
            </div>

            <label for="shoe9">Nike Shoe 9</label>
            <div>
                <img src="images/shoe9.jpg" alt="shoe9">
                <button onclick="addshoe('shoe9')" class="w3-circle w3-green" >+</button>
            </div>

            -->
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