<?php

/*
 * Uploads Model
 */

// Add image information to the database table
function storeImages($imgPath, $prodId, $imgName) {
    $db = shoesDB();
    $sql = 'INSERT INTO images (inventoryId, path, name) VALUES (:prodId, :imgPath, :imgName)';
    $stmt = $db->prepare($sql);
    // Store the full size image information
    $stmt->bindValue(':prodId', $prodId, PDO::PARAM_INT);
    $stmt->bindValue(':imgPath', $imgPath, PDO::PARAM_STR);
    $stmt->bindValue(':imgName', $imgName, PDO::PARAM_STR);
    $stmt->execute();

    // Make and store the thumbnail image information
    // Change name in path
    $imgPath = makeThumbnailName($imgPath);
    // Change name in file name
    $imgName = makeThumbnailName($imgName);
    $stmt->bindValue(':prodId', $prodId, PDO::PARAM_INT);
    $stmt->bindValue(':imgPath', $imgPath, PDO::PARAM_STR);
    $stmt->bindValue(':imgName', $imgName, PDO::PARAM_STR);
    $stmt->execute();

    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

// Get Image Information from images table
function getImages() {
    $db = shoesDB();
    $sql = 'SELECT id, path, name, "date", inventory.id, images.name FROM images JOIN inventory ON images.inventoryId = inventory.id';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $imageArray = $stmt->fetchAll(PDO::FETCH_NAMED);
    $stmt->closeCursor();
    return $imageArray;
}

// Delete image information from the images table
function deleteImage($id) {
    $db = shoesDB();
    $sql = 'DELETE FROM images WHERE id = :imgId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':imgId', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->rowCount();
    $stmt->closeCursor();
    return $result;
}

// Check for an existing image
function checkExistingImage($name) {
    $db = shoesDB();
    $sql = "SELECT name FROM images WHERE name = :name";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->execute();
    $imageMatch = $stmt->fetch();
    $stmt->closeCursor();
    return $imageMatch;
}


// CHecking Existing Thumbnail for given productId.
function getThumbnailImages($productId)
{
    $db = shoesDB();
    $sql = "SELECT * FROM images"
            . " WHERE inventoryId = :productId && path LIKE '%-tn.%'";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':productId', $productId, PDO::PARAM_INT);
    $stmt->execute();
    $imageArray = $stmt->fetchAll(PDO::FETCH_NAMED);
    $stmt->closeCursor();
    return $imageArray;
}


