<?php

/*
 *  Model for accounts application
 */

function regVisitor($firstname, $lastname, $email, $password) {

    $db = shoesDB();
    $sql = 'INSERT INTO clients(firstName, lastName, email, password) VALUES (:firstname, :lastname, :email, :password)';

    $stmt = $db->prepare($sql);

    $stmt->bindValue(':firstname', $firstname, PDO::PARAM_STR);
    $stmt->bindValue(':lastname', $lastname, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);


    $stmt->execute();

    $rowsChanged = $stmt->rowCount();

    $stmt->closeCursor();

    return $rowsChanged;
}

/* * ************************************
 * Check for the existing email
 * *********************************** */

function checkExistingEmail($email) {
    $db = shoesDB();
    $sql = 'SELECT email FROM clients WHERE email = :email';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $matchEmail = $stmt->fetch(PDO::FETCH_NUM);
    $stmt->closeCursor();
    if (empty($matchEmail)) {
        //

        return 0;
    } else {

        return 1;
    }
}

/* * ******************************************
 *  Get client data based on an email address
 * ******************************************* */

function getClient($email) {
    $db = shoesDB();
    $sql = 'SELECT id, firstname, lastname, email, level, password FROM clients WHERE email = :email';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $clientData = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $clientData;
}

/* * ************************************
 * Gets Client Information 
 * ************************************ */
function getClientInfo($clientId) {
    $db = shoesDB();
    $sql = 'SELECT * FROM clients WHERE id = :cliId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':cliId', $clientId, PDO::PARAM_INT);
    $stmt->execute();
    $clientInfo = $stmt->fetch(PDO::FETCH_NAMED);
    $stmt->closeCursor();

    return $clientInfo;
}

/* * ************************************
 * Updates Password
 * ************************************ */
function updatePass($password, $clientId) {
    $db = shoesDB();
// The SQL statement to be used with the database
    $sql = 'UPDATE clients SET password = :password '
            . 'WHERE id = :cliId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);
    $stmt->bindValue(':cliId', $clientId, PDO::PARAM_INT);
    
    
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

/* * ************************************
 * Updates User Information
 * ************************************ */
function updateUser($firstname, $lastname, $email, $clientId) {
    $db = shoesDB();
// The SQL statement to be used with the database
    $sql = 'UPDATE clients SET firstName = :firstName, '
            . 'lastName = :lastName, '
            . 'email = :email '
            . 'WHERE id = :cliId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':firstName', $firstname, PDO::PARAM_STR);
    $stmt->bindValue(':lastName', $lastname, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':cliId', $clientId, PDO::PARAM_INT);
    
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
    
}
