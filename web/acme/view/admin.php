<?php
   if(!$_SESSION['loggedin'])
   { 
       header('location: /acme/index.php');  
       exit;
   }   
   
?>
<!DOCTYPE html>
<html>
    <head>
        <title>ACME</title>
        <link href="/acme/css/style.css" rel="stylesheet" type="text/css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <main>
         
            <header>
                <div class="logo">
                    <img src="/acme/images/logo.gif" alt="logo"/>
                </div>
                <div class="side-options">
                    <a href="/acme/accounts/index.php?action=loggedIn"><?php if(isset($_SESSION['clientData']['clientFirstname']))
                     { 
                         echo "Welcome ".$_SESSION['clientData']['clientFirstname'];
                     }
                   ?></a>
                    <span><img src="/acme/images/account.gif" alt=""/> 
                        <?php
                            echo $accountStatus;
                         ?>
                    </span>
                    <span><img src="/acme/images/help.gif" alt=""/>Help</span>
                </div>
            
                <nav id= "container">
                    <?php echo $navList; ?>
                </nav>
            </header> 
            
            <P> You are Logged In </P>
            <?php
                if (isset($_SESSION['clientData'])) 
                    {
                        
                        echo "<h1>".$_SESSION['clientData']['clientFirstname']."</h1>";
                       
                        if (isset($message)) {
                            echo $message;
                        }
                        
                        if (isset($_SESSION['message'])){
                            echo $_SESSION['message'];
                        }
               
                        echo "<ul>";
                        echo "<li>Firstname: ".$_SESSION['clientData']['clientFirstname']."</li>";
                        echo "<li>Lastname: ".$_SESSION['clientData']['clientLastname']."</li>";
                        echo "<li>Email: ".$_SESSION['clientData']['clientEmail']."</li>";
                       // echo "<li>Id: ".$_SESSION['clientData']['clientId']."</li>";
                        echo "</ul>";
                        
                        
                        
                        echo "<p><a href='/acme/accounts?action=update&id=".$_SESSION['clientData']['clientId'].
                                "'>Update Account Information</a></p>";
                        
                        if ($_SESSION['clientData']['clientLevel'] > 1)
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
                        <li><a href="#">Recipes  | </a></li>
                        <li><a href="#">Demos  | </a></li>
                        <li><a href="#">First Aid  | </a></li>
                        <li><a href="#">Policy  | </a></li>
                        <li><a href="#">About  | </a></li>
                        <li><a href="#">Contact  </a></li>

                    </ul>
                </div>
                <div class="CR">&copy; ACME, All rights reserved.</div>
                <div class="CR">
                    All images used are believed to be in "Fair Use". 
                    Please notify the author if any are not and they will be removed.
                </div>
                <div class="CR">
                    Last Updated: 3 January, 2017
                </div>
            </footer>
        </main>
    </body>
</html>
<?php unset($_SESSION['message']); 
    unset($message)?>


