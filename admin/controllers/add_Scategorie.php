<?php
require_once('../model/connexion.php');
require_once('../model/categorie_managment.php');

function displayAdd_SCategorie() {
    $categories = getCategories();
    $msg ="";
    require('../templates/add_Scategorie.php');

}

function validate_add_subCategorie() {
    
    if (isset($_POST['addSCategorie'])) {
        $msg = addS_Categories();
        require('../templates/add_Scategorie.php');
    }
    
}
