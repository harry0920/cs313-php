<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
    header('location: /shoes/index.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php if (isset($prodInfo['invName'])) {
    echo "Delete $prodInfo[invName] ";
} elseif (isset($prodName)) {
    echo $prodName;
} ?> | shoes, Inc</title>
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
                    <a href="/shoes/accounts/index.php?action=loggedIn"><?php if(isset($_SESSION['clientData']['clientFirstname']))
                     { 
                         echo "Welcome ".$_SESSION['clientData']['clientFirstname'];
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

            <h1><?php if (isset($prodInfo['invName'])) {
    echo "Delete $prodInfo[invName] ";
} elseif (isset($prodName)) {
    echo $prodName;
}
?></h1>
<?php
if (isset($message)) {
    echo $message;
}
?>

            <p>Confirm Product Deletion. The delete is permanent.</p>
            <form method="post" action="/shoes/products/">
                <fieldset>

                    <label for="prodName">Product Name</label>
                    <input type="text" readonly name="prodName" id="prodName" <?php if (isset($prodInfo['invName'])) {
    echo "value='$prodInfo[invName]'";
} ?>>

                    <label for="prodDesc">Product Description</label>
                    <textarea name="prodDesc" readonly id="prodDesc"><?php if (isset($prodInfo['invDescription'])) {
    echo $prodInfo['invDescription'];
} ?></textarea>

                    <label>&nbsp;</label> 
                    <input type="submit" id="regbtn" name="submit" value="Delete Product">

                    <input type="hidden" name="action" value="deleteProd">
                    <input type="hidden" name="prodId" value="<?php if (isset($prodInfo['invId'])) {
    echo $prodInfo['invId'];
} ?>">

                </fieldset>
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
                <div class="CR">&copy; shoes, All rights reserved.</div>
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

