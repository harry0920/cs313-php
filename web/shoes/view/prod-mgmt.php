<?php

if ($_SESSION['clientData']['level'] < 2) {
    header('location: /shoes/index.php');
    exit;
}


if (isset($_SESSION['message'])) {
 $message = $_SESSION['message'];
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>shoes</title>
        <link href="/shoes/css/style.css" rel="stylesheet" type="text/css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <main>

            <header>
                <div class="logo">
                    <img src="/shoes/images/logo.gif" alt="logo"/>
                </div>
                <div class="side-options">
<a href="/shoes/accounts/index.php?action=loggedIn"><?php if(isset($_SESSION['clientData']['firstname']))
                     { 
                         echo "Welcome ".$_SESSION['clientData']['firstname'];
                     }
                   ?></a>
                    <span><img src="/shoes/images/account.gif" alt=""/> 
                    <?php
                    echo $accountStatus;
                    ?>
                    </span>
                    <span><img src="/shoes/images/help.gif" alt=""/>Help</span>
                </div>

                <nav id= "container">
<?php echo $navList; ?>
                </nav>
            </header> 
            <h1>Welcome to Products Management Page</h1>
            <a href="/shoes/products/index.php?action=new-cat">Add a new Category</a>
            <br>
            <a href="/shoes/products/index.php?action=new-product">Add a new Product</a>

<?php
if (isset($message)) {
    echo $message;
} if (isset($prodList)) {
    echo $prodList;
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
<?php unset($_SESSION['message']); ?>

