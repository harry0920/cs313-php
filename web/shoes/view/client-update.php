<?php
/**
   if(!$_SESSION['loggedin'])
   { 
       header('location: /shoes/index.php');  
       exit;
   }   
   **/
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Update Account | shoes, Inc</title>
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
            
            <h1>Update Account</h1>
            <h3>Use this form to update your Name and Email Information</h3>
            <?php
                if (isset($message)) {
                    echo $message;
                }
                 ?>
            
            <form action="/shoes/accounts/" method="post">
                <ul class="flex-outer">
                    <li>
                        <label for="firstname">First Name</label>
                        <input type="text" name="firstname" id="firstname" 
                               placeholder="Enter Your First Name" 
                               <?php if(isset($firstname)){echo "value='$firstname'";} 
                               elseif(isset($clientInfo['firstName'])) {echo "value='$clientInfo[firstName]'"; }
                               ?> required>

                    </li>
                    <li>
                        <label for="lastname">Last Name</label>
                        <input type="text" name="lastname" id="lastname" 
                               placeholder="Enter Your First Name" 
                               <?php if(isset($lastname)){echo "value='$lastname'";} 
                               elseif(isset($clientInfo['lastName'])) {echo "value='$clientInfo[lastName]'"; }
                               ?> required>

                    </li>
                    <li>
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" 
                               placeholder="Enter Your First Name" 
                               <?php if(isset($email)){echo "value='$email'";} 
                               elseif(isset($clientInfo['email'])) {echo "value='$clientInfo[email]'"; }
                               ?> required>

                    </li>
                    
                    <li>       
                        <button type="submit" name="submit" id="upduserbtn" value="Update Account">Update Account</button>
                        <!--This is the action key value pair-->

                        <input type="hidden" name="action" value="updateClient">
                        
                        <input type="hidden" name="clientId" value="<?php 
                        if(isset($clientInfo['id']))
                                { echo $clientInfo['id'];}
                                elseif(isset($clientId))
                                    { echo $clientId; }?>">
                    </li>
                </ul>
            </form>
            <br>
            <h3>Use this form to change your password</h3>
            <?php
                if (isset($message)) {
                    echo $message;
                }
                 ?>
            <form action="/shoes/accounts/" method="post">
                <ul class="flex-outer">
                    
                    <li>
                        <label for="password">New Password: </label>
                        <span>
                            Passwords must be at least 8 characters and 
                            contain at least 1 number, 1 capital letter 
                            and 1 special character
                        </span>
                        <input type="password" placeholder="Enter Your Password" name="password" id="password" 
                               required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                        
                    </li>
                    <li>       
                        <button type="submit" name="submit" id="updpassbtn" value="Change Password">Change Password</button>
                        <!--This is the action key value pair-->

                        <input type="hidden" name="action" value="updatePassword">
                        
                        <input type="hidden" name="clientId" value="<?php 
                        if(isset($clientInfo['id']))
                                { echo $clientInfo['id'];}
                                elseif(isset($clientId))
                                    { echo $clientId; }?>">
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

