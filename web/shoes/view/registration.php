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
              <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
            <form action="/shoes/accounts/index.php?action=registration" method="post">
                <ul class="flex-outer">
                    <li>
                        <label for="firstname">First Name</label>
                        <input type="text" name="firstname" id="firstname" 
                               placeholder="Enter Your First Name" 
                               <?php if(isset($firstname)){echo "value='$firstname'";} ?>
                               required>

                    </li>
                    <li>
                        <label for="lastname">Last Name</label>
                        <input type="text" name="lastname" id="lastname" 
                               placeholder="Enter Your Last Name" 
                               <?php if(isset($lasstname)){echo "value='$lastname'";} ?>
                               required>

                    </li>
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
                        <button type="submit" name="action" id="regbtn" value="register">Register</button>
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

