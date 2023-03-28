<?php

require_once('../model/product_managment.php');
require_once('../model/connexion.php');

function displayProduct() {
    $products = getProducts();
    require('../templates/products.php');
}
