<?php

require_once('../model/product_managment.php');
require_once('../model/connexion.php');

function displayAdd_Product() {
    $products = getProducts();
    require('../templates/add_product.php');
}