<?php

/*
 * Reviews Model
 */


/**********************************
 * Add a review to the database
 **********************************/
function addReview($text, $invId, $clientId) {
    $db = acmeDB();
    $sql = 'INSERT INTO reviews (reviewText, invId, reviewDate, clientId) VALUES (:text, :invId, CURRENT_TIMESTAMP, :clientId)';
    $stmt = $db->prepare($sql);
    
    $stmt->bindValue(':text', $text, PDO::PARAM_STR);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
    
    $stmt->execute();

    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}


/******************************************************
 * retrieve a review from the database using invId 
 ****************************************************/
function getReviewsByInvId($invId) {
    $db = acmeDB();
    $sql = 'SELECT * from reviews where invId = :invId ORDER BY reviewDate DESC';
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
    $db = acmeDB();
    $sql = 'SELECT * from reviews where clientId = :clientId ORDER BY reviewDate DESC';
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
    $db = acmeDB();
    $sql = 'SELECT * from reviews where reviewId = :reviewId';;
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
    $db = acmeDB();
    $sql = 'UPDATE reviews SET reviewText = :text, reviewDate = CURRENT_TIME() '
            . 'WHERE reviewId = :reviewId';
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
    $db = acmeDB();
    $sql = 'DELETE FROM reviews WHERE reviewId = :reviewId';
    $stmt = $db->prepare($sql);
    
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    
    $stmt->execute();

    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}