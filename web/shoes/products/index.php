<?php

/* * *******************************************
 * PRODUCTS CONTROLLER
 * ******************************************** */
// Create or access a Session
session_start();


require_once '../library/connections.php';
// Get the shoes model for use as needed
require_once '../model/shoes-model.php';

require_once '../model/products-model.php';

require_once '../model/uploads-model.php';

require_once '../model/reviews-model.php';

require_once '../library/functions.php';
// Get the array of categories
$categories = getCategories();

$navList = navigation($categories);

$accountStatus = getLoginStatus();

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        header('location: ?action=products');
    }
}

switch ($action) {

    case 'products':  //Sup3rU$er
        $products = getProductBasics();
        if (count($products) > 0) {
            $prodList = '<table>';
            $prodList .= '<thead>';
            $prodList .= '<tr><th>Product Name</th><td>&nbsp;</td><td>&nbsp;</td></tr>';
            $prodList .= '</thead>';
            $prodList .= '<tbody>';
            foreach ($products as $product) {
                $prodList .= "<tr><td>$product[name]</td>";
                $prodList .= "<td><a href='/shoes/products?action=mod&id=$product[id]' title='Click to modify'>Modify</a></td>";
                $prodList .= "<td><a href='/shoes/products?action=del&id=$product[id]' title='Click to delete'>Delete</a></td></tr>";
            }
            $prodList .= '</tbody></table>';
        } else {
            $message = '<p class="notify">Sorry, no products were returned.</p>';
        }

        include '../view/prod-mgmt.php';
        break;

    case 'new-cat':
        include '../view/new-cat.php';
        break;

    case 'new-product':
        include '../view/new-product.php';
        break;

    case 'addcategory':
        /// Collect for registration
        $categoryname = filter_input(INPUT_POST, 'categoryname', FILTER_SANITIZE_STRING);

        // Validate data
        if (empty($categoryname)) {
            $message = '<P>Please provide a category name.</P>';
            include '../view/new-cat.php';
            exit;
        }

        $categoryOutcome = addCateogry($categoryname);
        if ($categoryOutcome === 1) {
            header('location: ../?action=products');
            exit;
        } else {
            $message = "<p>Sorry $categoryname cannot be added to the database</p>";
            include '../view/new-cat.php';
            exit;
        }


        break;
    case 'addproduct':

        /// Collect for registration
        $inventoryName = filter_input(INPUT_POST, 'inventoryname', FILTER_SANITIZE_STRING);
        $inventoryDescription = filter_input(INPUT_POST, 'inventorydescription', FILTER_SANITIZE_STRING);
        $inventoryImage = filter_input(INPUT_POST, 'inventoryimage', FILTER_SANITIZE_STRING);
        $inventoryThumbnail = filter_input(INPUT_POST, 'inventorythumbnail', FILTER_SANITIZE_STRING);
        $inventoryPrice = filter_input(INPUT_POST, 'inventoryprice', FILTER_SANITIZE_STRING);
        $inventoryStock = filter_input(INPUT_POST, 'inventorystock', FILTER_SANITIZE_STRING);
        $categoryId = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
        $inventoryPrice = checkFloat($inventoryPrice);
        $inventoryStock = checkInteger($inventoryStock);
        $categoryId = checkInteger($categoryId);

        // Validate data
        if (empty($inventoryName) || empty($inventoryDescription) || empty($inventoryImage) || empty($inventoryThumbnail)) {
            $message = '<P>Please provide information for all empty form fields.</P>';
            include '../view/new-product.php';
            exit;
        }

        $productOutcome = addProduct($inventoryName, $inventoryDescription, $inventoryImage, $inventoryThumbnail, $categoryId,  $inventoryPrice, $inventoryStock);
        if ($productOutcome === 1) {
            $message = "<p> $inventoryName has been added to the Inventory</p>";
            include '../view/new-product.php';
            exit;
        } else {
            $message = "<p>Sorry $inventoryName cannot be added to the Inventory</p>";
            include '../view/new-product.php';
            exit;
        }

        break;


    case 'mod':
        $prodId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $prodInfo = getProductInfo($prodId);
        if (count($prodInfo) < 1) {
            $message = 'Sorry, no product information could be found.';
        }
        include '../view/prod-update.php';
        exit;
        break;


    case 'updateProd':
        $inventoryName = filter_input(INPUT_POST, 'inventoryname', FILTER_SANITIZE_STRING);
        $inventoryDescription = filter_input(INPUT_POST, 'inventorydescription', FILTER_SANITIZE_STRING);
        $inventoryImage = filter_input(INPUT_POST, 'inventoryimage', FILTER_SANITIZE_STRING);
        $inventoryThumbnail = filter_input(INPUT_POST, 'inventorythumbnail', FILTER_SANITIZE_STRING);
        $inventoryPrice = filter_input(INPUT_POST, 'inventoryprice', FILTER_SANITIZE_STRING);
       // $inventoryWeight = filter_input(INPUT_POST, 'inventoryweight', FILTER_SANITIZE_STRING);
       // $inventorySize = filter_input(INPUT_POST, 'inventorysize', FILTER_SANITIZE_STRING);
        $inventoryStock = filter_input(INPUT_POST, 'inventorystock', FILTER_SANITIZE_STRING);
       // $inventoryLocation = filter_input(INPUT_POST, 'inventorylocation', FILTER_SANITIZE_STRING);
        $categoryId = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
        //$inventoryVendor = filter_input(INPUT_POST, 'inventoryvendor', FILTER_SANITIZE_STRING);
        //$inventoryStyle = filter_input(INPUT_POST, 'inventorystyle', FILTER_SANITIZE_STRING);

        $inventoryPrice = checkFloat($inventoryPrice);
       // $inventoryWeight = checkFloat($inventoryWeight);
       // $inventorySize = checkFloat($inventorySize);
        $inventoryStock = checkInteger($inventoryStock);
        $categoryId = checkInteger($categoryId);

        $prodId = filter_input(INPUT_POST, 'prodId', FILTER_SANITIZE_NUMBER_INT);

        // Validate data
        if (empty($inventoryName) || empty($inventoryDescription) || empty($inventoryImage) || empty($inventoryThumbnail)) {
            $message = '<P>Please provide information for all empty form fields.</P>';
            include '../view/prod-update.php';
            exit;
        }

        $updateResult = updateProduct($inventoryName, $inventoryDescription, $inventoryImage, $inventoryThumbnail, $categoryId, $inventoryPrice, $inventoryStock, $prodId);

        if ($updateResult) {
            $message = "<p class='notify'>Congratulations,"
                    . " $inventoryName was successfully updated.</p>";
            $_SESSION['message'] = $message;
            header('location: /shoes/products/');
            exit;
        } else {
            $message = "<p>Sorry $inventoryName cannot be updated in the Inventory</p>";
            include '../view/prod-update.php';
            exit;
        }
        break;


    case 'del':
        $prodId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $prodInfo = getProductInfo($prodId);
        if (count($prodInfo) < 1) {
            $message = 'Sorry, no product information could be found.';
        }
        include '../view/prod-delete.php';
        exit;
        break;


    case 'deleteProd':
        $prodName = filter_input(INPUT_POST, 'prodName', FILTER_SANITIZE_STRING);
        $prodId = filter_input(INPUT_POST, 'prodId', FILTER_SANITIZE_NUMBER_INT);

        $deleteResult = deleteProduct($prodId);
        if ($deleteResult) {
            $message = "<p class='notice'>Congratulations, $prodName was successfully deleted.</p>";
            $_SESSION['message'] = $message;
            header('location: /shoes/products/');
            exit;
        } else {
            $message = "<p class='notice'>Error: $prodName was not deleted.</p>";
            $_SESSION['message'] = $message;
            header('location: /shoes/products/');
            exit;
        }
        break;

    case 'category':
        $type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_STRING);
        $products = getProductsByCategory($type);
        if (!count($products)) {
            $message = "<p class='notice'>Sorry, no $type products could be found.</p>";
        } else {
            $prodDisplay = buildProductsDisplay($products);
        }
        include '../view/category.php';
        break;
        
        
    case 'prod-detail':

        echo 'Product-Detail';

        $productId = filter_input(INPUT_GET, 'productId', FILTER_SANITIZE_NUMBER_INT);
        
        $productDetail = getProductById($productId);

       // var_dump($productDetail);
        //
        ///
        ///  // $productThumbnail = getThumbnailImages($productId);


/**


        if($_SESSION['loggedin'])
        {
            $screenName = $_SESSION['clientData']['firstName'][0].
                $_SESSION['clientData']['lastName'];
            
            $reviewForm = buildReviewForm($screenName, $_SESSION['clientData']['id']
                    ,$productId);
    
        }

 *
 * **/
       $customerReviews = getReviewsByInvId($productId);
        var_dump($customerReviews);
       $customerReviews = buildCustomerReviews($customerReviews);

       var_dump($customerReviews);

    /***
        if (!count($productDetail)) {
            $message = "<p class='notice'>Sorry, Product details coundn't exist.</p>";
        } else {
             $productDetailDisplay = buildProductDetail($productDetail);
        }
        

         if (!count($productThumbnail)) {
            //$message = "<p class='notice'>Sorry, Product thumbnail not avai exist.</p>";
        } else {
             $productThumbnailDisplay = buildThumbnailDisplay($productThumbnail);
        }

      *


        include '../view/product-detail.php';

      *
      * **/
        break;
}
