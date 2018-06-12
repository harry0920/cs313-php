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
            <h2>
                Welcome to shoes!
            </h2>

        </main>
    </body>
</html>

