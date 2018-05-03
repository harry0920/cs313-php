<!DOCTYPE html>
<html>
    <head>
        <title>Food Stuff- Login Page</title>
        <style>
            .loginbtns div{
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

            .loginbtns:hover div{
                border-color: #666 #aaa #bbb #888;
                border-width:4px 3px 3px 4px;
                color:#000;
            }
        </style>
    </head>

    <body>
        <header>
            <?php
                include 'nav.php';
            ?>
        </header>
        <h1>
            Login
        </h1>



        <div class="loginbtns">
            <a>Login As Admin</a>
            <a>Login as Tester</a>
        </div>

    </body>
</html>