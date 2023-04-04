<?php

require_once('../model/product_managment.php');
require_once('../model/categorie_managment.php');
require_once('../model/connexion.php');

function displayAdd_Product() {
    $msg ="";
    $s_categories = getS_Categories();
    $products = getProducts();
    require('../templates/add_product.php');
}

if (isset($_POST['addProducts'])) {
    $msg = "";
    addProducts();
    require('../templates/add_product.php');
}