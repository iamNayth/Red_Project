<?php

function recupProductsBySubCatId($id) {
    $database = dbConnect();

    $statement = $database->prepare("SELECT prod.*, pic.path FROM products prod INNER JOIN pictures pic ON prod.id = pic.id_products WHERE prod.id_subcategory = :id_subcategory");
    $statement ->bindParam(':id_subcategory', $id, PDO::PARAM_INT);
    $statement->execute();
    $products = $statement-> fetchAll(PDO::FETCH_ASSOC);
    return $products;
}