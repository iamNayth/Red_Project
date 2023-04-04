<?php

require_once('../model/show_products.php');
require_once('../admin/model/categorie_managment.php');

require_once('../model/db.php');

function displayShowProducts() {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        //Afficher les produits
        $products = recupProductsBySubCatId($id);
        //Afficher le nom de la sous-categorie
        $subcategorie = recupSubCategoryId($id);
    }
    require('../templates/show_products.php');
}