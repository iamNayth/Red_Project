<?php
require_once('../model/connexion.php');
require_once('../model/categorie_managment.php');

function displayAdd_SCategorie() {
    $msg ="";
    require('../templates/add_Scategorie.php');

}


if (isset($_POST['addSCategorie'])) {
    $msg = addS_Categories();
    require('../templates/add_Scategorie.php');
}

