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
    
            
            <h1>shoes Login</h1>
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
            <form action="/shoes/accounts/index.php?action=Login" method="post">
                <ul class="flex-outer">
                    <li>
                        
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email" 
                               placeholder="Enter Your Email" 
                               <?php if(isset($email)){echo "value='$email'";} ?>
                               required>
                        
                    </li>
                    <li>
                        <label for="password">Password: </label>
                        <span>
                            Passwords must be at least 8 characters and 
                            contain at least 1 number, 1 capital letter 
                            and 1 special character
                        </span>
                        <input type="password" placeholder="Enter Your Password" name="password" id="password" 
                               required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                    </li>
                    <li>     
<!--                        <input type="hidden" name="action" value="Login">-->
                        <button type="Submit" id="Login" value="Login">Login</button>
                    </li>
                
                    <li>
                        <label>
                            Dont Have an Account?
                        </label>
                        <a class="button" href="?action=registration">Register</a>
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

