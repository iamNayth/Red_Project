<?php
require_once('../model/connexion.php');
require_once('../model/categorie_managment.php');

function displayAdd_Category() {
    $msg ="";
    require('../templates/add_category.php');

}

function validateAddCategory() {

    if (isset($_POST['addCategorie'])) {
        $msg = addCategories();
        require('../templates/add_category.php');
    }
    
}
