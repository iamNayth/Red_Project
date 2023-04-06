<?php

function recupProductsById($id) {
    $database = dbConnect();

    $statement = $database->prepare("SELECT prod.*, pic.path, pic.id_products FROM products prod INNER JOIN pictures pic ON prod.id = pic.id_products WHERE prod.id = :id");
    $statement ->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    $products = $statement-> fetchAll(PDO::FETCH_ASSOC);
    return $products;
}

function getProductsInfo($id) {
    $database = dbConnect();

    $statement = $database->prepare("SELECT * FROM products WHERE id = :id");
    $statement ->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    $prodInfos = $statement-> fetchAll(PDO::FETCH_ASSOC);
    return $prodInfos;
}