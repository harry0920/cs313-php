<?php

/*
 *  Model for produccts application
 */


/* * *********************************
 * Adds A category
 * ********************************* */

function addCateogry($categoryName) {

    $db = shoesDB();
    $sql = 'INSERT INTO categories(name)
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

function addProduct($invName, $invDescription, $invImage, $invThumbnail,  $categoryId, $invPrice = 0, $invStock = 0) {
    $db = shoesDB();


    $sql = 'INSERT INTO inventory (name, description, image, thumbnail,price,stock,categoryId) 
            VALUES (:invName, :invDescription, :invImage, :invThumbnail,
            :invPrice, :invStock, :invSize, :categoryId)';

    $stmt = $db->prepare($sql);


    $stmt->bindValue(':invName', $invName, PDO::PARAM_STR);
    $stmt->bindValue(':invDescription', $invDescription, PDO::PARAM_STR);
    $stmt->bindValue(':invImage', $invImage, PDO::PARAM_STR);
    $stmt->bindValue(':invThumbnail', $invThumbnail, PDO::PARAM_STR);
    $stmt->bindValue(':invPrice', $invPrice, PDO::PARAM_INT);
    $stmt->bindValue(':invStock', $invStock, PDO::PARAM_INT);
    $stmt->bindValue(':categoryId', $categoryId, PDO::PARAM_INT);

    $stmt->execute();

    $rowsChanged = $stmt->rowCount();

    $stmt->closeCursor();

    return $rowsChanged;
}

/* * *********************************
 * Update A product
 * ********************************* */

function updateProduct($prodName, $prodDesc, $prodImg, $prodThumb, $catType, $prodPrice = 0, $prodStock = 0, $prodId) {
// Create a connection
    $db = shoesDB();
// The SQL statement to be used with the database
    $sql = 'UPDATE inventory SET name = :prodName, description = :prodDesc, '
            . 'image = :prodImg, thumbnail = :prodThumb, '
            . 'price = :prodPrice, stock = :prodStock, '
            . 'categoryId = :catType,'
            . 'WHERE id = :prodId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':catType', $catType, PDO::PARAM_INT);
    $stmt->bindValue(':prodName', $prodName, PDO::PARAM_STR);
    $stmt->bindValue(':prodDesc', $prodDesc, PDO::PARAM_STR);
    $stmt->bindValue(':prodImg', $prodImg, PDO::PARAM_STR);
    $stmt->bindValue(':prodThumb', $prodThumb, PDO::PARAM_STR);
    $stmt->bindValue(':prodPrice', $prodPrice, PDO::PARAM_STR);
    $stmt->bindValue(':prodStock', $prodStock, PDO::PARAM_INT);
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
    $db = shoesDB();
    $sql = 'SELECT name, id FROM inventory ORDER BY name ASC';
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
    $db = shoesDB();
    $sql = 'SELECT * FROM inventory WHERE id = :prodId';
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
    $db = shoesDB();
    $sql = 'DELETE FROM inventory WHERE id = :prodId';
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
    $db = shoesDB();
    $sql = 'SELECT * FROM inventory WHERE categoryid IN (SELECT id FROM categories WHERE categoryName = :catType)';
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
        $pd .= "<a href='/shoes/products/index.php?";
        $pd .= "action=prod-detail&productId=$product[id]'>";
        $pd .= "<img src='$product[image]' alt='Image of $product[name] on Shoes.com'>";
        $pd .= '<hr>';
        $pd .= "<h2>$product[name]</h2>";
        $pd .= "<span>$$product[price]</span>";
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
        $pd .= "<a href='/shoes/products/index.php?";
        $pd .= "action=prod-detail&productId=$product[inventoryId]'>";
        $pd .= "<img src='$product[image]' alt='Image of $product[name] on Shoes.com'>";
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
    $db = shoesDB();
    $sql = 'SELECT * FROM inventory WHERE id = :catId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':catId', $id, PDO::PARAM_STR);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $products;
}


