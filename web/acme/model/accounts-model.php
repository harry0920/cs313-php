<?php

/*
 *  Model for accounts application
 */

function regVisitor($firstname, $lastname, $email, $password) {

    $db = acmeDB();
    $sql = 'INSERT INTO clients(clientFirstName, clientLastName, 
            clientEmail, clientPassword) 
            VALUES (:firstname, :lastname, :email, :password)';

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
    $db = acmeDB();
    $sql = 'SELECT clientEmail FROM clients WHERE clientEmail = :email';
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
    $db = acmeDB();
    $sql = 'SELECT clientId, clientFirstname, clientLastname, clientEmail, clientLevel, clientPassword FROM clients WHERE clientEmail = :email';
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
    $db = acmeDB();
    $sql = 'SELECT * FROM clients WHERE clientId = :cliId';
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
    $db = acmeDB();
// The SQL statement to be used with the database
    $sql = 'UPDATE clients SET clientPassword = :password '
            . 'WHERE clientId = :cliId';
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
    $db = acmeDB();
// The SQL statement to be used with the database
    $sql = 'UPDATE clients SET clientFirstName = :firstName, '
            . 'clientLastName = :lastName, '
            . 'clientEmail = :email '
            . 'WHERE clientId = :cliId';
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
