<?php
require_once('../model/connexion.php');
require_once('../model/categorie_managment.php');

function displayAdd_Category() {
    $msg ="";
    require_once('../templates/add_category.php');

}

function validateAddCategory() {
    $msg="";
    $msg = addCategories();
    require('../templates/add_category.php');
    
}
