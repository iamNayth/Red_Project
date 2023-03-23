<?php
require_once('../model/connexion.php');
require_once('../model/categorie_managment.php');

function displayEdit_Categorie() {
    $msg ="";
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $categorie = recupCategorieId($id);
    }
    
    require_once('../templates/edit_categorie.php');
}

function validate_edit_categorie() {

    if (isset($_GET['id']) || !empty($_GET['id'])) {
        $id = intval($_GET['id']);
        $categorie = recupCategorieId($id);
        $msg = editCategorie($id);
    }
    require_once('../templates/edit_categorie.php');
}

