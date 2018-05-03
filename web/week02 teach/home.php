<?php

?>
<!DOCTYPE html>
<html>
<head>
    <title>Food Stuff</title>
</head>

<body>
<header>
    <?php
    include 'nav.php';
    ?>
</header>

<style>
    .message{
        margin: 300px;
        border: 100px solid rgb(100,200,100);
        background-color: rgb(100,200,100);
        font-size: 50px;
        font-family: "Calibri", Times, serif;
        color: white;
    }

    #logOut{
        display:block;
        border-style:solid;
        border-color:#bbb #888 #666 #aaa;
        border-width:3px 4px 4px 3px;
        width:9em;
        height:2em;
        background:#ccc;
        color:#333;
        line-height:2;
        text-align:center;
        text-decoration:none;
        font-weight:900;
    }

    #logOut:hover {
        border-color: #666 #aaa #bbb #888;
        border-width:4px 3px 3px 4px;
        color:#000;
    }
</style>
<h1>
    Food and Stuff
</h1>

<p class=message>Welcome,
    <?php

    if(ifset($_SESSION['Admin']) && $_SESSION['Admin'] == true)
    {
        echo 'You are logged in as Admin';
    }
    else if(ifset($_SESSION['Tester'])  && $_SESSION['Tester'] == true)
    {
        echo 'You are logged in as Tester';
    }
    else{
        echo 'You are not logged In';
    }
    ?>!


    <?php

    if(isset($_SESSION['LoggedIn']) && $_SESSION['LoggedIn'] == true)
    {
        echo '<a id="logOut">Log Out</a>';


    }



    ?>
</p>

</body>
</html>