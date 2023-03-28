<?php 

require_once('../model/connexion.php');
require_once('../model/categorie_managment.php');

function deleteCategory() {

    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $database = dbConnect();
        suppCat($id, $database);  
        require('../templates/category.php');
    }
    
}