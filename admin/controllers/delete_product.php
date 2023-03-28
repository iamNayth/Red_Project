<?php

require_once('../model/product_managment.php');
require_once('../model/connexion.php');

function deleteProduct() {

    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $database = dbConnect();
        suppProduct($id, $database); 
        require('../templates/products.php'); 
    }
    
}