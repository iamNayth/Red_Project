<?php
require_once('../model/connexion.php');
require_once('../model/categorie_managment.php');

function displayEdit_Categorie() {
    $msg ="";
    $categories = getCategories();
    require('../templates/edit_categorie.php');

}

