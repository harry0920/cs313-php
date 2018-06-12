<?php

/* * *******************************************
 * Accounts Controller
 * ******************************************** */

// Create or access a Session
session_start();


require_once '../library/connections.php';
// Get the shoes model for use as needed
require_once '../model/shoes-model.php';

require_once '../model/accounts-model.php';

require_once '../library/functions.php';

require_once '../model/reviews-model.php';

require_once '../model/products-model.php';

// Get the array of categories
$categories = getCategories();

$navList = navigation($categories);

$accountStatus = getLoginStatus();

//var_dump($accountStatus);


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        header('location: ../?action=loggedIn');
    }
}

switch ($action) {
    
    case 'registration':
        include '../view/registration.php';
        break;
    case 'register':
        /// Collect for registration
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);


        $email = checkEmail($email);
        $checkPassword = checkPassword($password);

        $existingEmail = checkExistingEmail($email);

// Check for existing email address in the table
        if ($existingEmail) {
            $message = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
            include '../view/login.php';
            exit;
        }

        // Validate data
        if (empty($firstname) || empty($lastname) || empty($email) || empty($checkPassword)) {
            $message = '<P>Please provide information for all empty form fields.</P>';
            include '../view/registration.php';
            exit;
        }
        // Hash the checked password
        $password = password_hash($password, PASSWORD_DEFAULT);

        $regOutcome = regVisitor($firstname, $lastname, $email, $password);
        if ($regOutcome === 1) {
            setcookie('firstname', $firstname, strtotime('+1 year'), '/');
            $message = "<p>Thanks for registering $firstname. Please use your email and password to login.</p>";
            
            
            
            //$_COOKIE['firstName'] = $firstname;
            
            include '../view/login.php';
            exit;
        } else {
            $message = "<p>Sorry $firstname, but the registration failed. Please try again.</p>";
            include '../view/registration.php';
            exit;
        }

        break;


    case 'Login':     // 'L' is for Post... 'l' takes you to the view..
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        $email = checkEmail($email);
        $checkPassword = checkPassword($password);

        if (empty($email) || empty($checkPassword)) {
            $message = '<P>Please provide information for all empty form fields.</P>';
            include '../view/login.php';
            exit;
        }

        $clientData = getClient($email);
        if ($clientData < 1) {
            $message = '<p class="notice">Please check your email and try again.</p>';
            include '../view/login.php';
            exit;
        }

        $hashCheck = password_verify($password, $clientData['password']);

        if (!$hashCheck) {
            $message = '<p class="notice">Please check your password and try again.</p>';
            include '../view/login.php';
            exit;
        }

        // A valid user exists, log them in
        $_SESSION['loggedin'] = TRUE;
        setcookie('firstname', $firstname, strtotime('-1 year'), '/');
       
        // Remove the password from the array
        // the array_pop function removes the last
        // element from an array
        array_pop($clientData);
        // Store the array into the session
        $_SESSION['clientData'] = $clientData;
        $accountStatus = getLoginStatus();
        // Send them to the admin view

        header("location: /shoes/accounts/index.php?action=loggedIn");
        break;


    case 'Logout':
        session_destroy();
        header('location: ../index.php');
        exit;
        break;

    case 'update':
        $clientId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $clientInfo = getClientInfo($clientId);
        if (count($clientInfo) < 1) {
            $message = 'Sorry, Client information could be found.';
        }
        include '../view/client-update.php';
        exit;
        break;


    case 'updateClient':
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

        $email = checkEmail($email);

        $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);

        if ($email != $_SESSION['clientData']['email']) {
            $existingEmail = checkExistingEmail($email);

            // Check for existing email address in the table
            if ($existingEmail) {
                $message = '<p class="notice">That email address already exists.</p>';
                include '../view/client-update.php';
                exit;
            }
        }

        if (empty($email) || empty($firstname) || empty($lastname)) {
            $message = '<P>Please provide information for all empty form fields.</P>';
            include '../view/client-update.php';
            exit;
        }

        $updOutcome = updateUser($firstname, $lastname, $email, $clientId);
        if ($updOutcome === 1) {
            //$message = "<p>Account Information has been updated.</p>";
            $_SESSION['message'] = "<p>Account Information has been updated.</p>";
            $clientData = getClient($email);
            array_pop($clientData);
            // Store the array into the session
            $_SESSION['clientData'] = $clientData;
            include '../view/admin.php';
            exit;
        } else {
            // $message = "<p>Sorry! Account Information cannot be updated.</p>";
            $_SESSION['message'] = "<p>Sorry! Account Information cannot be updated.</p>";
            include '../view/admin.php';
            exit;
        }

        break;


    case 'updatePassword':
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        $checkPassword = checkPassword($password);
        $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);

        if (empty($checkPassword)) {
            $message = '<P>Please provide A valid Password.</P>';
            include '../view/client-update.php';
            exit;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        $updatePass = updatePass($password, $clientId);
        if ($updatePass === 1) {
            $message = "<p>Password has been updated.</p>";
            $_SESSION['message'] = $message;
            include '../view/admin.php';
            exit;
        } else {
            $message = "<p>Sorry password change failed. Please try again.</p>";
            $_SESSION['message'] = $message;
            include '../view/admin.php';
            exit;
        }

        break;


    case 'loggedIn':
        $clientData = $_SESSION['clientData'];
         
        $clientReviews = getReviewsByClientId($clientData['id']);
        //$clientReviews = buildManageReviews($clientReviews);



        if (count($clientReviews) > 0) {
            $clientReviewsTable = "<ul class='flex-outer'>";
            foreach ($clientReviews as $review) 
            {

                $clientReviewsTable .= "<li>";
                
                $productInfo = getProductInfo($review['inventoryId']);
                
                $clientReviewsTable .= "<label><strong>" .$productInfo['name']."</strong>"
                        . " (Reviewed on " .$review['date']."): </label>";

                $clientReviewsTable .= "<a href='/shoes/reviews/index.php?action=edit-review&reviewId=$review[id]' title='Click to modify'>Edit</a>";
                $clientReviewsTable .= " | <a href='/shoes/reviews/index.php?action=delete&reviewId=$review[id]' title='Click to modify'>Delete</a>";
                $clientReviewsTable .= "</li>";
            }

            $clientReviewsTable .= "</ul>";
        }
        include '../view/admin.php';
        break;

    case 'login':
        include '../view/login.php';
        break;
}

          