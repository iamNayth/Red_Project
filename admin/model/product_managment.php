<?php

function getProducts() {
    $database = dbConnect();

    $statement = $database->prepare("SELECT * FROM products");
    $statement->execute();
    $products = [];
    while (($row = $statement->fetch())) {
        $product = [
            'id' => $row['id'],
            'ident_product' => $row['ident_product'],
            'name' => $row['name'],
            'description' => $row['description'],
            'price' => $row['price'],
        ];
        $products[] = $product;
    }
    return $products;
}