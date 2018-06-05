<?php 

 if($_SESSION['clientData']['clientLevel'] < 2)
   { 
       header('location: /shoes/index.php');  
       exit;
   } 
 
   
// Build the categories option list
$catList = '<select name="category" id="category">';
//$catList .= "<option>Choose a Category</option>";
foreach ($categories as $category) {
 $catList .= "<option value='$category[categoryId]'";
  if(isset($catType)){
   if($category['categoryId'] === $catType){
   $catList .= ' selected ';
  }
 } elseif(isset($prodInfo['categoryId'])){
  if($category['categoryId'] === $prodInfo['categoryId']){
   $catList .= ' selected ';
  }
}
$catList .= ">$category[categoryName]</option>";
}
$catList .= '</select>';



?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php if(isset($prodInfo['invName'])){ echo "Modify $prodInfo[invName] ";} elseif(isset($prodName)) { echo $prodName; }?> | shoes, Inc</title>
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
            
            <h1><?php if(isset($prodInfo['invName'])){ echo "Modify $prodInfo[invName] ";} elseif(isset($prodName)) { echo $prodName; }?></h1>
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
                               elseif(isset($prodInfo['invName'])) {echo "value='$prodInfo[invName]'"; }
                               ?>required>

                    </li>
                    <li>
                        <label for="inventorydescription">Product Description</label>
                        <textarea rows="8" cols="80"
                                  name="inventorydescription" id="inventorydescription" 
                                  required ><?php 
                        if(isset($inventoryDescription))
                            {echo $inventoryDescription;} 
                        elseif(isset($prodInfo['invDescription']))
                            {echo $prodInfo['invDescription']; }
                        ?></textarea>
                        
                    
                    </li>
                    <li>
                        <label for="inventoryimage">Product Image</label>
                        <input type="text" size="30" maxlength="50" name="inventoryimage" 
                               id="inventoryimage" placeholder="Enter Product Image" 
                        <?php if(isset($inventoryImage)){echo "value='$inventoryImage'";}
                        elseif(isset($prodInfo['invImage'])) {echo "value='$prodInfo[invImage]'"; }
                        ?>required>

                    </li>
                    
                    <li>
                        <label for="inventorythumbnail">Product Thumbnail</label>
                        <input type="text" size="30" maxlength="50" name="inventorythumbnail" 
                               id="inventorythumbnail" 
                               placeholder="Enter Product Thumbnail" 
                               <?php if(isset($inventoryThumbnail)){echo "value='$inventoryThumbnail'";} 
                               elseif(isset($prodInfo['invName'])) {echo "value='$prodInfo[invName]'"; }
                               ?>required>

                    </li>
                    
                    <li>
                        <label for="inventoryprice">Product Price</label>
                        <input type="number" size="10" name="inventoryprice" 
                               id="inventoryprice" step="0.1"
                               placeholder="Enter Product Price" 
                               <?php if(isset($inventoryPrice)){echo "value='$inventoryPrice'";} 
                               elseif(isset($prodInfo['invPrice'])) 
                                   {echo "value='$prodInfo[invPrice]'"; }?>required>

                    </li>
                    
                     <li>
                         <label for="inventorystock">Product Stock</label>
                        <input type="number" size="10" name="inventorystock" 
                               id="inventorystock" 
                               placeholder="Enter Product Stock" 
                               <?php if(isset($inventoryStock)){echo "value='$inventoryStock'";} 
                               elseif(isset($prodInfo['invStock'])) 
                                   {echo "value='$prodInfo[invStock]'"; }?>required>

                    </li>
                    
                     <li>
                        <label for="inventorysize">Product Size</label>
                        <input type="number" size="10"
                               name="inventorysize" id="inventorysize" 
                               placeholder="Enter Product Size" step="0.1"
                               <?php if(isset($inventorySize)){echo "value='$inventorySize'";}
                               elseif(isset($prodInfo['invSize'])) {echo "value='$prodInfo[invSize]'";}
                               ?>
                               required>

                    </li>
                    <li>
                        <label for="inventoryweight">Product Weight</label>
                        <input type="number" size="6" name="inventoryweight" 
                               id="inventoryweight" step="0.1"
                               placeholder="Enter Product Weight" 
                               <?php if(isset($inventoryWeight)){echo "value='$inventoryWeight'";} 
                               elseif(isset($prodInfo['invWeight']))
                                   {echo "value='$prodInfo[invWeight]'"; }?>required>

                    </li>
                    
                    <li>
                        <label for="inventorylocation">Product Location</label>
                        <input type="text" size="30" maxlength="35"
                               name="inventorylocation" 
                               id="inventorylocation" placeholder="Enter Product Location"
                               <?php if(isset($inventoryLocation)){echo "value='$inventoryLocation'";} 
                               elseif(isset($prodInfo['invLocation'])) 
                                   {echo "value='$prodInfo[invLocation]'"; }?>required>

                    </li>
                   
                    <li>
                        <label>Category</label>
                        <?php echo $catList; ?>
                    </li>
                    <li>
                        <label for="inventoryvendor">Product Vendor</label>
                        <input type="text" maxlength="20" size="20" 
                               name="inventoryvendor" 
                       <?php if(isset($inventoryVendor)){echo "value='$inventoryVendor'";}
                       elseif(isset($prodInfo['invVendor'])) {echo "value='$prodInfo[invVendor]'"; }
                       ?>
                               required id="inventoryvendor" placeholder="Enter Product Vendor">
                    </li>
                    
                     <li>
                         <label for="inventorystyle">Product Style</label>
                        <input type="text" maxlength="20" size="20"
                               name="inventorystyle" id="inventorystyle"
                               placeholder="Enter Product Style" 
                               <?php if(isset($inventoryStyle)){echo "value='$inventoryStyle'";} 
                               elseif(isset($prodInfo['invStyle'])) {echo "value='$prodInfo[invStyle]'"; }
                               ?>
                               required>
                    </li>
                    <li>       
                        <button type="submit" name="submit" id="regbtn" value="Update Product">Update Product</button>
                        <!--This is the action key value pair-->

                        <input type="hidden" name="action" value="updateProd">
                        
                        <input type="hidden" name="prodId" value="
                            <?php if(isset($prodInfo['invId']))
                                { echo $prodInfo['invId'];} 
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

