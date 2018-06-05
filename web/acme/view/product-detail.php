<!DOCTYPE html>
<html>
    <head>
        <title>Products | Acme, Inc.</title>
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
            
            <h1>Products Name</h1>
            <?php if(isset($message)){ echo $message; } ?>
            <?php if(isset($productDetailDisplay)){ echo $productDetailDisplay; } ?>
         
            <br>
            <hr>
            
            <?php if(isset($productThumbnailDisplay)){ echo $productThumbnailDisplay;} ?>
            <hr>
            <h2>Customer Reviews</h2>
            
            <?php if(isset($_SESSION['message'])){ echo "<b>".$_SESSION['message']."</b>";} 
            if(isset($reviewForm)){ echo $reviewForm;} 
            echo "<hr>";    
            if(isset($customerReviews)){ echo $customerReviews;} 
                
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
<?php unset($_SESSION['message']); ?>
