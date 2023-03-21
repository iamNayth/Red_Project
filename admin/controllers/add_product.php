<?php

require_once('../model/product_managment.php');
require_once('../model/connexion.php');

function displayAdd_Product() {
    $msg ="";
    $products = getProducts();
    require('../templates/add_product.php');
}

if (isset($_POST['addProducts'])) {
    $msg = "";
    addProducts();
    require('../templates/add_product.php');
}