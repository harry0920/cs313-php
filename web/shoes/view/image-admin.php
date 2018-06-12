<?php
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>shoes | Image Management</title>
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


            <h1>Image Management</h1>

            <P> Welcome to Image Management View </P>
            <h2>Add New Product Image</h2>
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
            <form action="/shoes/uploads/" method="post" enctype="multipart/form-data">
                <label for="invItem">Product</label><br>
                <?php echo $prodSelect; ?><br><br>
                <label>Upload Image:</label><br>
                <input type="file" name="file1"><br>
                <input type="submit" class="regbtn" value="Upload">
                <input type="hidden" name="action" value="upload">
            </form>

            <hr>
            <h2>Existing Images</h2>
            <p class="notice">If deleting an image, delete the thumbnail too and vice versa.</p>
            <?php
            if (isset($imageDisplay)) {
                echo $imageDisplay;
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
<?php
unset($_SESSION['message']);
?>


