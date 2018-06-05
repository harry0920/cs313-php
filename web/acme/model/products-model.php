<?php

/*
 *  Model for accounts application
 */


/* * *********************************
 * Adds A category
 * ********************************* */

function addCateogry($categoryName) {

    $db = acmeDB();
    $sql = 'INSERT INTO categories(categoryName)
            VALUES (:categoryName)';

    $stmt = $db->prepare($sql);

    $stmt->bindValue(':categoryName', $categoryName, PDO::PARAM_STR);

    $stmt->execute();

    $rowsChanged = $stmt->rowCount();

    $stmt->closeCursor();

    return $rowsChanged;
}

/* * *********************************
 * Adds A product
 * ********************************* */

function addProduct($invName, $invDescription, $invImage, $invThumbnail, $invLocation, $categoryId, $invVendor, $invStyle, $invPrice = 0, $invStock = 0, $invSize = 0, $invWeight = 0) {
    $db = acmeDB();



    $sql = 'INSERT INTO inventory (invName, invDescription, invImage, invThumbnail
            ,invPrice,invStock,invSize,invWeight,invLocation,
            categoryId,invVendor,invStyle) 
            VALUES (:invName, :invDescription, :invImage, :invThumbnail,
            :invPrice, :invStock, :invSize, :invWeight, :invLocation,
            :categoryId, :invVendor, :invStyle)';

    $stmt = $db->prepare($sql);


    $stmt->bindValue(':invName', $invName, PDO::PARAM_STR);
    $stmt->bindValue(':invDescription', $invDescription, PDO::PARAM_STR);
    $stmt->bindValue(':invImage', $invImage, PDO::PARAM_STR);
    $stmt->bindValue(':invThumbnail', $invThumbnail, PDO::PARAM_STR);
    $stmt->bindValue(':invPrice', $invPrice, PDO::PARAM_INT);
    $stmt->bindValue(':invStock', $invStock, PDO::PARAM_INT);
    $stmt->bindValue(':invSize', $invSize, PDO::PARAM_INT);
    $stmt->bindValue(':invWeight', $invWeight, PDO::PARAM_INT);
    $stmt->bindValue(':invLocation', $invLocation, PDO::PARAM_STR);
    $stmt->bindValue(':categoryId', $categoryId, PDO::PARAM_INT);
    $stmt->bindValue(':invVendor', $invVendor, PDO::PARAM_STR);
    $stmt->bindValue(':invStyle', $invStyle, PDO::PARAM_STR);

    $stmt->execute();

    $rowsChanged = $stmt->rowCount();

    $stmt->closeCursor();

    return $rowsChanged;
}

/* * *********************************
 * Update A product
 * ********************************* */

function updateProduct($prodName, $prodDesc, $prodImg, $prodThumb, $prodLocation, $catType, $prodVendor, $prodStyle, $prodPrice = 0, $prodStock = 0, $prodSize = 0, $prodWeight = 0, $prodId) {
// Create a connection
    $db = acmeDB();
// The SQL statement to be used with the database
    $sql = 'UPDATE inventory SET invName = :prodName, invDescription = :prodDesc, '
            . 'invImage = :prodImg, invThumbnail = :prodThumb, '
            . 'invPrice = :prodPrice, invStock = :prodStock, '
            . 'invSize = :prodSize, invWeight = :prodWeight, '
            . 'invLocation = :prodLocation, categoryId = :catType,'
            . ' invVendor = :prodVendor, invStyle = :prodStyle '
            . 'WHERE invId = :prodId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':catType', $catType, PDO::PARAM_INT);
    $stmt->bindValue(':prodName', $prodName, PDO::PARAM_STR);
    $stmt->bindValue(':prodDesc', $prodDesc, PDO::PARAM_STR);
    $stmt->bindValue(':prodImg', $prodImg, PDO::PARAM_STR);
    $stmt->bindValue(':prodThumb', $prodThumb, PDO::PARAM_STR);
    $stmt->bindValue(':prodPrice', $prodPrice, PDO::PARAM_STR);
    $stmt->bindValue(':prodStock', $prodStock, PDO::PARAM_INT);
    $stmt->bindValue(':prodSize', $prodSize, PDO::PARAM_INT);
    $stmt->bindValue(':prodWeight', $prodWeight, PDO::PARAM_INT);
    $stmt->bindValue(':prodLocation', $prodLocation, PDO::PARAM_STR);
    $stmt->bindValue(':prodVendor', $prodVendor, PDO::PARAM_STR);
    $stmt->bindValue(':prodStyle', $prodStyle, PDO::PARAM_STR);
    $stmt->bindValue(':prodId', $prodId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

/* * ****************************************
 * Get Products from the Database to display
 * **************************************** */

function getProductBasics() {
    $db = acmeDB();
    $sql = 'SELECT invName, invId FROM inventory ORDER BY invName ASC';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_NAMED);
    $stmt->closeCursor();
    return $products;
}

/* * **********************************
 *  Returns profucts information
 * ********************************** */

function getProductInfo($prodId) {
    $db = acmeDB();
    $sql = 'SELECT * FROM inventory WHERE invId = :prodId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':prodId', $prodId, PDO::PARAM_INT);
    $stmt->execute();
    $prodInfo = $stmt->fetch(PDO::FETCH_NAMED);
    $stmt->closeCursor();

    return $prodInfo;
}

/* * ********************************
 * Delete Product
 * ********************************* */

function deleteProduct($prodId) {
    $db = acmeDB();
    $sql = 'DELETE FROM inventory WHERE invId = :prodId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':prodId', $prodId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

/* * *************************************
 * Get Products by Category
 * ********************************* */

function getProductsByCategory($type) {
    $db = acmeDB();
    $sql = 'SELECT * FROM inventory WHERE categoryId IN (SELECT categoryId FROM categories WHERE categoryName = :catType)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':catType', $type, PDO::PARAM_STR);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $products;
}

/* * *******************************
 * Build Products Display
 * ***************************** */

function buildProductsDisplay($products) {
    $pd = '<ul id="prod-display">';
    foreach ($products as $product) {
        $pd .= '<li>';
        $pd .= "<a href='/acme/products/index.php?";
        $pd .= "action=prod-detail&productId=$product[invId]'>";
        $pd .= "<img src='$product[invThumbnail]' alt='Image of $product[invName] on Acme.com'>";
        $pd .= '<hr>';
        $pd .= "<h2>$product[invName]</h2>";
        $pd .= "<span>$$product[invPrice]</span>";
        $pd .= '</a>';
        $pd .= '</li>';
    }
    $pd .= '</ul>';
    return $pd;
}


/* * *******************************
 * Build Products Display
 * ***************************** */

function buildThumbnailDisplay($products) {
    $pd = '<ul id="thumb-display">';
    foreach ($products as $product) {
        $pd .= '<li>';
        $pd .= "<a href='/acme/products/index.php?";
        $pd .= "action=prod-detail&productId=$product[invId]'>";
        $pd .= "<img src='$product[imgPath]' alt='Image of $product[imgName] on Acme.com'>";
        $pd .= '<hr>';
        $pd .= '</a>';
        $pd .= '</li>';
    }
    $pd .= '</ul>';
    return $pd;
}
/* * *************************************
 * Get Product by Id
 * ********************************* */

function getProductById($id) {
    $db = acmeDB();
    $sql = 'SELECT * FROM inventory WHERE invId = :catId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':catId', $id, PDO::PARAM_STR);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $products;
}


