<?php

if($_SESSION['clientData']['clientLevel'] < 2)
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
            
            <h1> Add a new Category View </h1>
            
            <?php
                if (isset($message)) {
                    echo $message;
                }
            ?>
            <form action="/acme/products/index.php?action=products" method="post">
                <ul class="flex-outer">   
                    <li>
                        <label for="categoryname">Category Name</label>
                        <input type="text" size="30" name="categoryname" id="categoryname" 
                               placeholder="Enter the New Category"
                               <?php if(isset($categoryname)){echo "value='$categoryname'";} ?>required>
                    </li>
                    <li>       
                        <button type="submit" name="action" id="categorybtn" value="addcategory">Submit</button>
                        <!--This is the action key value pair-->
                    </li>
                </ul>
            </form>
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

