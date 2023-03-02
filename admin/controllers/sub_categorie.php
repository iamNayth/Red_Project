<?php

require_once('../model/connexion.php');
require_once('../model/categorie_managment.php');


function displaySub_Categorie() {
    $s_categories = getS_Categories();
    $categories = getCategories();
    require('../templates/sub_categorie.php');
}
