<?php

if(!$_SESSION['loggedin'])
   { 
       header('location: /shoes/index.php');
       exit;
   }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Shoes</title>
        <link href="/shoes/css/style.css" rel="stylesheet" type="text/css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <main>
         
            <header>
                <div class="logo">
                    <img src="/shoes/Images/logo.gif" alt="logo"/>
                </div>
                <div class="side-options">
                    <a href="/shoes/accounts/index.php?action=loggedIn"><?php if(isset($_SESSION['clientData']['firstname']))
                     { 
                         echo "Welcome ".$_SESSION['clientData']['firstname'];
                     }
                   ?></a>
                    <span><img src="/shoes/Images/account.gif" alt=""/>
                        <?php
                            echo $accountStatus;
                         ?>
                    </span>
                    <span><img src="/shoes/Images/help.gif" alt=""/>Help</span>
                </div>
            
                <nav id= "container">
                    <?php echo $navList; ?>
                </nav>
            </header> 
            
            <P> You are Logged In </P>
            <?php
                if (isset($_SESSION['clientData'])) 
                    {
                        
                        echo "<h1>".$_SESSION['clientData']['firstname']."</h1>";
                       
                        if (isset($message)) {
                            echo $message;
                        }
                        
                        if (isset($_SESSION['message'])){
                            echo $_SESSION['message'];
                        }
               
                        echo "<ul>";
                        echo "<li>Firstname: ".$_SESSION['clientData']['firstname']."</li>";
                        echo "<li>Lastname: ".$_SESSION['clientData']['lastname']."</li>";
                        echo "<li>Email: ".$_SESSION['clientData']['email']."</li>";
                        echo "</ul>";
                        
                        
                        
                        echo "<p><a href='/shoes/accounts?action=update&id=".$_SESSION['clientData']['id'].
                                "'>Update Account Information</a></p>";
                        
                        if ($_SESSION['clientData']['level'] > 1)
                        {
                            echo "<br><h2>Administrative Functions</h2>";
                            echo "<p><a href='../products/index.php'>Add, Modify or Remove Products</a></p>";
                        }
                        
                    }     
            ?>
            
            <h2>Manage Product Reviews</h2>
            <?php 
            if(isset($clientReviewsTable))   
            {
                echo $clientReviewsTable;
            }
            
            ?>
            <footer>

                <br>
                <hr class="bar">
                <div class="footer-container">
                    <ul class="footer-menu">
                        <li><a href="#">Products | </a></li>
                        <li><a href="#">Reviews  | </a></li>
                        <li><a href="#">About  | </a></li>
                        <li><a href="#">Contact  </a></li>

                    </ul>
                </div>
                <div class="CR">&copy; SHOES, All rights reserved.</div>
                <div class="CR">
                    All images used are believed to be in "Fair Use".
                    Please notify the author if any are not and they will be removed.
                </div>
                <div class="CR">
                    Last Updated:  June, 2018
                </div>
            </footer>
        </main>
    </body>
</html>
<?php unset($_SESSION['message']); 
    unset($message)?>


