<?php

/*
 * Reviews Model
 */


/**********************************
 * Add a review to the database
 **********************************/
function addReview($text, $invId, $clientId) {
    $db = shoesDB();
    $sql = 'INSERT INTO reviews (text, inventoryId, date , clientId) VALUES (:text, :invId, CURRENT_TIMESTAMP, :clientId)';
    $stmt = $db->prepare($sql);
    
    $stmt->bindValue(':text', $text, PDO::PARAM_STR);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
    
    $stmt->execute();

    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();i
    return $rowsChanged;
}


/******************************************************
 * retrieve a review from the database using invId 
 ****************************************************/
function getReviewsByInvId($invId) {
    $db = shoesDB();
    $sql = 'SELECT * from reviews where inventoryid = :invId ORDER BY date DESC';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->execute();
    $reviews = $stmt->fetchAll(PDO::FETCH_NAMED);
    $stmt->closeCursor();
    return $reviews;
}



/******************************************************
 * retrieve a review from the database using clientId
 ****************************************************/
function getReviewsByClientId($clientId) {
    $db = shoesDB();
    $sql = 'SELECT * from reviews where clientid = :clientId ORDER BY date DESC';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
    $stmt->execute();
    $reviews = $stmt->fetchAll(PDO::FETCH_NAMED); 
    $stmt->closeCursor();
    return $reviews;
}

/******************************************************
 * retrieve a review from the database using reviewId
 ****************************************************/
function getReview($reviewId) {
    $db = shoesDB();
    $sql = 'SELECT * from reviews where id = :reviewId';;
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    $stmt->execute();
    $review = $stmt->fetch(PDO::FETCH_NAMED); 
    $stmt->closeCursor();
    return $review;
}


/****************************************************
 * Upadate a review from the database
 ****************************************************/
function updateReview($reviewId, $text) {
    $db = shoesDB();
    $sql = 'UPDATE reviews SET text = :text, date = CURRENT_TIMESTAMP WHERE id = :reviewId';
    $stmt = $db->prepare($sql);
    
    $stmt->bindValue(':text', $text, PDO::PARAM_STR);
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    
    $stmt->execute();

    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}
/****************************************************
 * Delete a review from the database using reviewId
 ****************************************************/
function deleteReview($reviewId) {
    $db = shoesDB();
    $sql = 'DELETE FROM reviews WHERE id = :reviewId';
    $stmt = $db->prepare($sql);
    
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    
    $stmt->execute();

    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}