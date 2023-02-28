<?php

require_once('../model/connexion.php');
require_once('../model/categorie_managment.php');


function displayCategorie() {
    $categories = getCategories();
    $s_categories = getS_Categories();
    require('../templates/categorie.php');
}

