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
            <h2>
                Welcome to shoes!
            </h2>

            <div id="cart">
                        <ul>
                            <li><h2>Get Dinner Rocket</h2></li>
                            <li>Quick lighting fuse</li>
                            <li>NHTSA approved seat belts</li>
                            <li>Mobile launch stand included</li>
                            <li> <a href="#"><img src = "/shoes/images/iwantit.gif" id="actionbtn" alt="Add to cart button" ></a></li>
                        </ul>
                   
             
            </div>


            <div class="recipes">
                <ul id="recipes">
                    
                    <li><h2>Featured recipes</h2></li>
                
                    <li><img src = "/shoes/images/recipes/bbqsand.jpg" alt="1"> <a href="#">Puller Roadrunner BBQ</a></li>
                    <li><img src = "/shoes/images/recipes/potpie.jpg" alt="2"><a href="#">Roadrunner Pot Pie</a></li>
                    <li><img src = "/shoes/images/recipes/soup.jpg" alt="3"><a href="#">Roadrunner Soup</a></li>
                    <li><img src = "/shoes/images/recipes/taco.jpg" alt="4"><a href="#">Roadrunner Tacos</a></li>
                </ul>
                
        
                
                <ul id="review">
                    <li><h2>Get dinner Rocket Reviews</h2></li>
                    
                    <li>"I don't know how I ever caught roadrunners before this." (9/10)</li>
                    <li>"That thing was fast!" (8/10)</li>
                    <li>"Talk about fast delivery." (10/10)</li>
                    <li>"I didn't even have to pull the meat apart." (9/10)</li>
                    <li>"I'm on my thirtieth one. I love these things!" (10/10)</li>
                </ul>
            </div>


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

