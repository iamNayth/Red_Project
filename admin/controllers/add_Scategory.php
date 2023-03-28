<?php
require_once('../model/connexion.php');
require_once('../model/categorie_managment.php');

function displayAdd_SCategory() {
    $categories = getCategories();
    $msg ="";
    require('../templates/add_Scategory.php');

}

function validate_add_subCategory() {
    
    if (isset($_POST['addSCategorie'])) {
        $msg = addS_Categories();
        require('../templates/add_Scategory.php');
    }
    
}
