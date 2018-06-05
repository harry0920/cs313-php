<?php
/*********************************************
 * SHOES CONTROLLER
 **********************************************/

session_start();


require_once 'library/connections.php';
// Get the shoes model for use as needed
require_once 'model/shoes-model.php';

require_once 'library/functions.php';
// Get the array of categories
$categories = getCategories();

//var_dump($categories);


$navList = navigation($categories);

$accountStatus = getLoginStatus();


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'home';
    }
}

switch ($action) {
    case 'home':
        include 'view/home.php';
        break;
    case 'error':
        include 'Errordocs/500.php';
        break;
    case 'login':
        include 'view/login.php';
        break;
    case 'registration':
        include 'view/registration.php';
        break;
//    case 'products':
//        include 'view/prod-mgmt.php';
//        break;
   
}


          