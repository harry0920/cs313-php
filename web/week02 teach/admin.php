<?php
/**
 * Created by PhpStorm.
 * User: Harry
 * Date: 5/3/18
 * Time: 4:46 PM
 */
session_start();
$_SESSION['LoggedIn'] = true;
$_SESSION['Admin'] = true;
$_SESSION['Tester'] = false;

header("Location: home.php");