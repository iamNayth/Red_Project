<?php
require_once('../model/connexion.php');
require_once('../model/categorie_managment.php');

function displayEdit_Categorie() {
    $msg ="";
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $categorie = recupCategorieId($id);
    }
    require('../templates/edit_categorie.php');
}

