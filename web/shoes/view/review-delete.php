<?php 

 if(!$_SESSION['loggedin'])
   { 
       header('location: /shoes/index.php');  
       exit;
   }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Review Update | shoes, Inc</title>
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
                  <a href="/shoes/accounts/index.php?action=loggedIn"><?php if(isset($_SESSION['clientData']['Firstname']))
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
            
            <h1><?php if(isset($prodInfo['name'])){ echo "Modify $prodInfo[name] ";} elseif(isset($prodName)) { echo $prodName; }?> Review</h1>
                <?php
                if (isset($message)) {
                    echo $message;
                }
                 ?>
            <form action="/shoes/reviews/" method="post">
                <ul class="flex-outer">
                   
                   
                    <li>
                        <label for="reviewText">Review Text</label>
                        <textarea rows="8" cols="80"
                                  name="reviewText" id="reviewText" 
                                  readonly ><?php 
                        if(isset($reviewText))
                            {echo $reviewText;} 
                        elseif(isset($reviewInfo['text']))
                            {echo $reviewInfo['text']; }
                        ?></textarea>
                        
                    
                    </li>
                    <li>
                        
                        <label>Delete cannot be undone!</label>
                        <button type="submit" name="submit" id="deletebtn" value="delete">Delete Review</button>
                        <!--This is the action key value pair-->

                        <input type="hidden" name="action" value="del-review">
                        
                        <input type="hidden" name="reviewId" value="
                            <?php if(isset($reviewInfo['id']))
                                { echo $reviewInfo['id'];}
                                elseif(isset($reviewId))
                                    { echo $reviewId; } 
                                    ?>">
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