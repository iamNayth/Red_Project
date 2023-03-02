<?php

require_once('../model/connexion.php');
require_once('../model/categorie_managment.php');

function delete_Scat() {

    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $database = dbConnect();
        suppSCategorie($id, $database);  
        require('../templates/sub_categorie.php');
    }
    
}