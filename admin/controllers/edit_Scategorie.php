<?php
require_once('../model/connexion.php');
require_once('../model/categorie_managment.php');

function displayEdit_SCategorie() {
    $categories = getCategories();
    
    $msg ="";
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $subcategorie = recupSubCategorieId($id);
    }
    require_once('../templates/edit_Scategorie.php');
}

function validate_edit_subCategorie() {

    if (isset($_GET['id']) || !empty($_GET['id'])) {
        $id = intval($_GET['id']);
        $subcategorie = recupCategorieId($id);
        $msg = editSubCategorie($id);
    }
    require_once('../templates/edit_Scategorie.php');
}

