<?php

function getOrder() 
{
    $database = dbConnect();
    $statement = $database->prepare("SELECT * FROM orders");
    $statement->execute();
    $orders = [];
    while (($row = $statement->fetch())) {
        $order = [
            'id' => $row['id'],
            'ident_order' => $row['ident_order'],
            'price' => $row['price'],
            'first_name' => $row['first_name'],
            'name' => $row['name'],
            'street' => $row['street'],
            'home_number' => $row['home_number'],
            'country_code' => $row['country_code'],
            'city' => $row['city'],
        ];
        $orders[] = $order;
    }
    return $orders;

}