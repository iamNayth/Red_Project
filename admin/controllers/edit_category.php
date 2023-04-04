<?php
require_once('../model/connexion.php');
require_once('../model/categorie_managment.php');

function displayEdit_Category() {
    $msg ="";
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $categorie = recupCategoryId($id);
    }
    
    require_once('../templates/edit_category.php');
}

function validate_edit_category() {

    if (isset($_GET['id']) || !empty($_GET['id'])) {
        $id = intval($_GET['id']);
        $categorie = recupCategoryId($id);
        $msg = editCategory($id);
    }
    require_once('../templates/edit_category.php');
}

