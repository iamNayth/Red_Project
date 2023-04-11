<?php


require_once('../model/db.php');
require_once('../model/details.php');


function displayDetails() {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        //Afficher les produits
        $products = recupProductsById($id);
        $prodInfos = getProductsInfo($id);
        $storage = getSizes();
        $randomProd = getRandomProducts();
    }
    require('../templates/details.php');
}