<?php

require_once('../model/connexion.php');
require_once('../model/categorie_managment.php');


function getCategorie() {
    $categories = displayCategories();
    $s_categories = displayS_Categories();
    require('../templates/categorie.php');
}

function addCat() {
    $addCategorie = addCategories();
    $addS_Categorie = addS_Categories();
    require('../templates/categorie.php');
}