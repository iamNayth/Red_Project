<?php
require_once('../model/connexion.php');
require_once('../model/categorie_managment.php');

function displayEdit_SCategorie() {
    $categories = getCategories();
    $msg ="";
    require('../templates/edit_Scategorie.php');

}


if (isset($_POST['addSCategorie'])) {
    $msg = addS_Categories();
    require('../templates/edit_Scategorie.php');
}