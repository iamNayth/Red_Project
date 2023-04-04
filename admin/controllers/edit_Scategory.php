<?php
require_once('../model/connexion.php');
require_once('../model/categorie_managment.php');

function displayEdit_SCategory() {
    $categories = getCategories();
    
    $msg ="";
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $subcategorie = recupSubCategoryId($id);
    }
    require_once('../templates/edit_Scategory.php');
}

function validate_edit_subCategory() {

    if (isset($_GET['id']) || !empty($_GET['id'])) {
        $id = intval($_GET['id']);
        $subcategorie = recupCategoryId($id);
        $msg = editSubCategory($id);
    }
    require_once('../templates/edit_Scategory.php');
}

