<?php 

if($_SESSION['clientData']['level'] < 2)
   { 
       header('location: /shoes/index.php');  
       exit;
   }
   
// Build the categories option list
$catList = '<select name="category" id="category">';
//$catList .= "<option>Choose a Category</option>";
foreach ($categories as $category) {
 $catList .= "<option value='$category[id]'";
  if(isset($catType)){
   if($category['id'] === $catType){
   $catList .= ' selected ';
  }
 } elseif(isset($prodInfo['categoryId'])){
  if($category['id'] === $prodInfo['categoryId']){
   $catList .= ' selected ';
  }
}
$catList .= ">$category[name]</option>";
}
$catList .= '</select>';



?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php if(isset($prodInfo['name'])){ echo "Modify $prodInfo[name] ";} elseif(isset($prodName)) { echo $prodName; }?> | shoes, Inc</title>
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
            
            <h1><?php if(isset($prodInfo['name'])){ echo "Modify $prodInfo[name] ";} elseif(isset($prodName)) { echo $prodName; }?></h1>
                <?php
                if (isset($message)) {
                    echo $message;
                }
                 ?>
            <form action="/shoes/products/" method="post">
                <ul class="flex-outer">
                    <li>
                        <label for="inventoryname">Product Name</label>
                        <input type="text" size="30" maxlength="50" name="inventoryname" 
                               id="inventoryname" placeholder="Enter Product Name"
                               <?php if(isset($inventoryName)){echo "value='$inventoryName'";}
                               elseif(isset($prodInfo['name'])) {echo "value='$prodInfo[name]'"; }
                               ?>required>

                    </li>
                    <li>
                        <label for="inventorydescription">Product Description</label>
                        <textarea rows="8" cols="80"
                                  name="inventorydescription" id="inventorydescription" 
                                  required ><?php 
                        if(isset($inventoryDescription))
                            {echo $inventoryDescription;} 
                        elseif(isset($prodInfo['description']))
                            {echo $prodInfo['description']; }
                        ?></textarea>
                        
                    
                    </li>
                    <li>
                        <label for="inventoryimage">Product Image</label>
                        <input type="text" size="30" maxlength="50" name="inventoryimage" 
                               id="inventoryimage" placeholder="Enter Product Image" 
                        <?php if(isset($inventoryImage)){echo "value='$inventoryImage'";}
                        elseif(isset($prodInfo['image'])) {echo "value='$prodInfo[image]'"; }
                        ?>required>

                    </li>
                    
                    <li>
                        <label for="inventorythumbnail">Product Thumbnail</label>
                        <input type="text" size="30" maxlength="50" name="inventorythumbnail" 
                               id="inventorythumbnail" 
                               placeholder="Enter Product Thumbnail" 
                               <?php if(isset($inventoryThumbnail)){echo "value='$inventoryThumbnail'";} 
                               elseif(isset($prodInfo['name'])) {echo "value='$prodInfo[name]'"; }
                               ?>required>

                    </li>
                    
                    <li>
                        <label for="inventoryprice">Product Price</label>
                        <input type="number" size="10" name="inventoryprice" 
                               id="inventoryprice" step="0.1"
                               placeholder="Enter Product Price" 
                               <?php if(isset($inventoryPrice)){echo "value='$inventoryPrice'";} 
                               elseif(isset($prodInfo['price']))
                                   {echo "value='$prodInfo[price]'"; }?>required>

                    </li>
                    
                     <li>
                         <label for="inventorystock">Product Stock</label>
                        <input type="number" size="10" name="inventorystock" 
                               id="inventorystock" 
                               placeholder="Enter Product Stock" 
                               <?php if(isset($inventoryStock)){echo "value='$inventoryStock'";} 
                               elseif(isset($prodInfo['stock']))
                                   {echo "value='$prodInfo[stock]'"; }?>required>

                    </li>

                    <li>
                        <label>Category</label>
                        <?php echo $catList; ?>
                    </li>
                    <li>       
                        <button type="submit" name="submit" id="regbtn" value="Update Product">Update Product</button>
                        <!--This is the action key value pair-->

                        <input type="hidden" name="action" value="updateProd">
                        
                        <input type="hidden" name="prodId" value="
                            <?php if(isset($prodInfo['id']))
                                { echo $prodInfo['id'];}
                                elseif(isset($prodId))
                                    { echo $prodId; } 
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

