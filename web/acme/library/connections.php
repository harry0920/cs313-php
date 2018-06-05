<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function acmeDB(){

    $server='localhost';
    $database = 'acme';
    $username = 'iClient';
    $password = '42f7xGjzbMDhAQMZ';
    $dsn = 'mysql:host=' .$server . ';dbname=' . $database;
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    try
    {
        $acmedb = new PDO($dsn , $username, $password, $options);
        //echo 'Connection Successful';
        return $acmedb;
    } catch (PDOException $ex)
    {
        header('Location: ?action=error');
        return NULL;
    }
}

function my_guitar_shop1DB(){
    

    $server='localhost';
    $database = 'my_guitar_shop1';
    $username = 'iClient';
    $password = '42f7xGjzbMDhAQMZ';
    $dsn = 'mysql:host=' .$server . ';dbname=' . $database;
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    try{
        $mg1db = new PDO($dsn , $username, $password, $options);
        //echo 'Connection Successful';
        return $mg1db;
    } catch (PDOException $ex)
    {
        header('Location: ../Errordocs/500.php');
        exit;

    }

}

function my_guitar_shop2DB(){
   
    $server='localhost';
    $database = 'my_guitar_shop2';
    $username = 'iClient';
    $password = '42f7xGjzbMDhAQMZ';
    $dsn = 'mysql:host=' .$server . ';dbname=' . $database;
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    try{
        $mg2db = new PDO($dsn , $username, $password, $options);
        //echo 'Connection Successful';
        return $mg2db;
    } catch (PDOException $ex)
    {
        header('Location: ../Errordocs/500.php');
        exit;

    }

}


  
