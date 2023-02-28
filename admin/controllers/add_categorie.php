<?php
require_once('../model/connexion.php');
require_once('../model/categorie_managment.php');

function displayAdd_Categorie() {
    $msg ="";
    require('../templates/add_categorie.php');

}

if (isset($_POST['addCategorie'])) {
    $msg = addCategories();
    require('../templates/add_categorie.php');
}

