<?php

/* * *******************************************
 *  Reviews Controller
 * *********************************************/

// Create or access a Session
session_start();


require_once '../library/connections.php';
// Get the acme model for use as needed
require_once '../model/acme-model.php';

require_once '../model/reviews-model.php';

require_once '../model/products-model.php';

require_once '../library/functions.php';
// Get the array of categories
$categories = getCategories();

$navList = navigation($categories);

$accountStatus = getLoginStatus();


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        header('location: ?action=review');
        exit;
    }
}

switch ($action) {
    case 'review':
        header("location: /acme/accounts/index.php?action=loggedIn");
        break;
    
    case 'add-review':
        $clientId = filter_input(INPUT_POST, 'clientId', FILTER_VALIDATE_INT);
        $invId = filter_input(INPUT_POST, 'productId', FILTER_VALIDATE_INT);
        
        $text = filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING);
      
       if (empty($text)) {
            $message = '<P>Please provide information for all empty form fields.</P>';
            header("location: /acme/products/index.php?action=prod-detail&productId=$invId");
            exit;
        }
        
        

        $reviewOutcome = addReview($text, $invId, $clientId);
        if ($reviewOutcome === 1) {
            $message = "<p> Comment has been added to the Product</p>";
   
        } else {
            $message = "<p>Sorry Comment cannot be added to the Product</p>";   
        }
        
        $_SESSION['message'] = $message;
        header("location: /acme/products/index.php?action=prod-detail&productId=$invId");
        break;
    
    case 'edit-review':
        $reviewId = filter_input(INPUT_GET, 'reviewId', FILTER_VALIDATE_INT);
        $reviewInfo = getReview($reviewId);   
        $prodInfo = getProductInfo($reviewInfo['invId']);
        
        
        if($reviewInfo > 0)
        {
             $reviewText = $reviewInfo['reviewText'];
             $prodName = $prodInfo['invName'];
        }
        else
        {
            $message = "<p>Sorry, Coudn't Retrieve the review from the database</p>";
        }
        
        include '../view/review-update.php';
        break;
        
    case 'update-review':
        $reviewText = filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING);
        $reviewId = filter_input(INPUT_POST, 'reviewId', FILTER_VALIDATE_INT);
        
        
        
        if(empty($reviewText))
        {
            $message = "<p>The Review Text field cannot be Empty</p>";
            $reviewInfo = getReview($reviewId);   
            $prodInfo = getProductInfo($reviewInfo['invId']);
            include '../view/review-update.php';
            exit;
        }
             
        $updateResult = updateReview($reviewId,$reviewText);
        if($updateResult > 0)
        {
            $message = "<p>The Review was updated</p>";
          
        }
        else
        {
            $message = "<p>Sorry! The Review cannot be updated</p>";
        }
        
        $_SESSION['message'] = $message;
        
        header("location: /acme/accounts/index.php?action=loggedIn");
        break;
            

       
    case 'delete': 
        $reviewId = filter_input(INPUT_GET, 'reviewId', FILTER_VALIDATE_INT);
        $reviewInfo = getReview($reviewId);   
        $prodInfo = getProductInfo($reviewInfo['invId']);
        
        
        if($reviewInfo > 0)
        {
             $reviewText = $reviewInfo['reviewText'];
             $prodName = $prodInfo['invName'];
        }
        else
        {
            $message = "<p>Sorry, Coudn't Retrieve the review from the database</p>";
        }
        
        include '../view/review-delete.php';
        break;
    
    case 'del-review':
        
        $reviewId = filter_input(INPUT_POST, 'reviewId', FILTER_VALIDATE_INT);
        
        $deleteCount = deleteReview($reviewId);
        
        if ($deleteCount > 0)
        {
            $message = "<p>The Review was successfully deleted</p>";
        }
        else
        {
            $message = "<p>The Review was NOT deleted</p>";
        }
        $_SESSION['message'] = $message;
        header("location: /acme/accounts/index.php?action=loggedIn");
        break;    
}
         

          