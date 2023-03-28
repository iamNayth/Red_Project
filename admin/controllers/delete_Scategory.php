<?php

require_once('../model/connexion.php');
require_once('../model/categorie_managment.php');

function delete_Scat() {

    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $database = dbConnect();
        suppSubCat($id, $database);  
        require('../templates/sub_categorie.php');
    }
    
}