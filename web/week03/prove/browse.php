<!DOCTYPE html>
<html>
<head>
    <title>
        CS313 Home Page - Harry Vashisht
    </title>
    <link rel="stylesheet" type="text/css" href="../../styles/style.css">
</head>
    <body>
        <?php
        include '../../nav.php';
        ?>
        <h1>
            Harry Vashisht's Home Page.
        </h1>
        <form method="POST" action="results.php">
            <p>Choose Item you want to buy: </p>

            <label for="shoe1">Nike Shoe 1</label>
            <div>
                <img src="images/shoe1.jpg" alt="shoe1">
                <button>+</button>
            </div>

            <input type="submit" value="Submit Answers">


        </form>
    </body>
</html>