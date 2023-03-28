<?php

require_once('../model/connexion.php');
require_once('../model/categorie_managment.php');


function displayCategory() {
    $categories = getCategories();
    $s_categories = getS_Categories();
    require('../templates/category.php');
}




